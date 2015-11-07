<?php

require_once(_PS_MODULE_DIR_.'frcallback/frRequest.php'); 

class AdminCallBackRequestsController extends ModuleAdminController {
    
    protected $_defaultOrderBy = 'date_add';
    protected $_defaultOrderWay = 'DESC';
  
    public function __construct() {
        
        $this->table = 'frbc_requests';
        $this->identifier = 'id_request';
        $this->className = 'frRequest';
        $this->lang = false;
        $this->list_no_link = true;
        $this->explicitSelect = true;
        $this->addRowAction('edit');
	$this->addRowAction('delete');
	$this->bulk_actions = array(
            'delete' => array(
                'text' => $this->l('Delete selected'), 
                'confirm' => $this->l('Delete selected items?')
                ));
        $this->_select = 'a.*,
            CONCAT(LEFT(c.`firstname`, 1), \'. \', c.`lastname`) AS `employee`,
            `sname`,
            IF(a.id_status = 1, \'Crimson\', \'RoyalBlue\') AS `color`';
        $this->_join = 'LEFT JOIN (
            SELECT 1 AS id,  \''.$this->l('waiting for a call back').'\' AS sname
            UNION ALL 
            SELECT 2 AS id,  \''.$this->l('called').'\' AS sname) os ON (os.`id` = a.`id_status`)
            LEFT JOIN `'._DB_PREFIX_.'employee` c ON (c.`id_employee` = a.`id_employee`)';
        
        $statuses_array = array(
            1 => strtoupper($this->l('waiting for a call back')),
            2 => strtoupper($this->l('called'))                    
            );
                
	$empl_array = array();
	$employees = Employee::getEmployees();
        foreach ($employees as $empl)
            $empl_array[$empl['id_employee']] = Tools::substr($empl['firstname'], 0, 1).'.'.$empl['lastname'];

        $this->fields_list = array(
            'id_request' => array(
                'title' => $this->l('ID'),
                'align' => 'center',
                'remove_onclick' => true,
                'width' => 10
                ),
            'date_add' => array(
                'title' => $this->l('Request date'),
		'width' => 50,
		'type' => 'datetime',
		'align' => 'right'
		),
            'name' => array(
                'title' => $this->l('Name'),
                'width' => 100
                ),
            'phone' => array(
                'title' => $this->l('Phone number'),
                'width' => 50
                ),
            'call_message' => array(
                'title' => $this->l('Message'),
  		'search' => false,
  		'orderby' => false,
                'width' => 'auto'
                ),
            'sname' => array(
                'title' => $this->l('Status'),
                'width' => 180,
		'color' => 'color',
		'type' => 'select',
		'list' => $statuses_array,
		'filter_key' => 'os!id',
		'filter_type' => 'int',
                ),                    
            'employee' => array(
                'title' => $this->l('Employee'),
                'width' => 100,
		'type' => 'select',
		'list' => $empl_array,
		'filter_key' => 'c!id_employee',
		'filter_type' => 'int'
                ),                    
            'employee_note' => array(
                'title' => $this->l('Employee note'),
  		'search' => false,
		'orderby' => false,
                'width' => 'auto'
                ),
            'date_call' => array(
                'title' => $this->l('Date'),
		'width' => 50,
		'type' => 'datetime',
		'align' => 'right'
		),
            );

        parent::__construct();

        $this->override_folder = '';
        // Get the name of the folder containing the custom tpl files
	$this->tpl_folder = '';
        
    }

    public function setMedia() {

        parent::setMedia();
                
 	$this->context->controller->addJqueryUI(array(
            'ui.core',
            'ui.widget',
            'ui.slider',
            'ui.datepicker'
            ));
 	$this->context->controller->addJS(array(
            _PS_JS_DIR_.'jquery/plugins/timepicker/jquery-ui-timepicker-addon.js'
            ));

 	$this->context->controller->addCSS(array(
            _PS_JS_DIR_.'jquery/plugins/timepicker/jquery-ui-timepicker-addon.css',
            ));
        
        $lang = $this->context->language->id;
        if ($lang > 1) {
            $this->js_files[] = __PS_BASE_URI__.'modules/frcallback/views/js/timepicker/localization/jquery-ui-timepicker-'.$this->context->language->iso_code.'.js';
        }
        
                
    }

    public function ajaxProcessSave() {
        
        $this->json = true; 
        $this->content_only = true;    
        
        if (!$this->loadObject(true)) {
            $this->content = '';
            return;
        }

        $obj = $this->object;
        $obj->id_status = Tools::getValue('id_status');
        $obj->id_employee = Tools::getValue('id_employee');
        $obj->employee_note = Tools::getValue('employee_note');
        $obj->date_call = strftime('%Y-%m-%d %H:%M:%S',strtotime(Tools::getValue('date_call')));

        $result = $obj->update();

        if ($result)
            $this->content = 'SAVE';
        else {
            $this->content = 'NO SAVE';
            $this->errors[] = Tools::displayError('An error occurred while updating object.').' <b>'.$this->table.'</b> ('.Db::getInstance()->getMsgError().')';
        }

        $this->display = 'content';
        
    }                
                
    public function ajaxProcessEdit() {
        
        $this->json = true;    
        $this->content_only = true;    
        if (!$this->loadObject(true)) {
            $this->display = 'content';
            $this->content = '';
            return;
        }

        $obj = $this->object;
      
        $statuses_array = '';
        $statuses_array .= '<option value="1" '.(($obj->id_status == 1) ? 'selected="selected"' : '').'>'.strtoupper($this->l('waiting for a call back')).'</option>';
        $statuses_array .= '<option value="2" '.(($obj->id_status == 2) ? 'selected="selected"' : '').'>'.strtoupper($this->l('called')).'</option>';
		
        $employees = Employee::getEmployees();
        $empl_array = '<option value="0"> -- </option>';
        $id_empl = (int)$obj->id_employee;
        if (!$id_empl)
            $id_empl = $this->context->employee->id;
        foreach ($employees as $empl) {
            $selected = ($id_empl == (int)$empl['id_employee']) ? 'selected="selected"' : '';
            $empl_array .= '<option value="'.(int)$empl['id_employee'].'" '.$selected.'>'.Tools::substr($empl['firstname'], 0, 1).'.'.$empl['lastname'].'</option>';
        }
    
        $date_format = $this->context->language->date_format_full;
        $date_format = explode(' ', $date_format); 
        $date_format[0] = str_replace('d', 'dd', $date_format[0]);
        $date_format[0] = str_replace('j', 'd', $date_format[0]);
        $date_format[0] = str_replace('m', 'mm', $date_format[0]);
        $date_format[0] = str_replace('Y', 'yy', $date_format[0]);
           
//        $date_format[1] = str_replace('H', 'HH', $date_format[1]);
        $date_format[1] = str_replace('H', 'hh', $date_format[1]);
        $date_format[1] = str_replace('i', 'mm', $date_format[1]);
        $date_format[1] = str_replace('s', 'ss', $date_format[1]);
            
	$this->context->smarty->assign(array(
            'id_object' => $this->id_object,
            'token' => $this->token,
            'date_format' => $date_format[0],
            'time_format' => $date_format[1],
            'statuses' => $statuses_array,
            'empl_array' => $empl_array,
            'note' => $obj->employee_note,
            'date_call' => ((isset($obj->date_call) && ($obj->date_call > 0)) ? Tools::displayDate($obj->date_call, $this->context->language->id, true) : date($this->context->language->date_format_full)) // $obj->date_upd
            ));
 
        $tpl = $this->createTemplate('edit_form.tpl');
            
        $this->content = $this->context->smarty->fetch($tpl);

    }
        
    public function displayAjax() {
        
        $this->display = 'content';
        if (!empty($this->errors)) {
            $this->jsonError ('');
        }    
        else {    
            $this->status = 'ok';
        }

        return parent::displayAjax();
//        die();
    }        

    public function initContent() {

        if ($this->ajax) {
            if (!$this->viewAccess()) {
                $this->errors[] = Tools::displayError('You do not have permission to view here.');
		return;
            }
        }
        else 
            return parent::initContent();

    }
  
    
    public function initToolbar() {
        
	parent::initToolbar();
	unset($this->toolbar_btn['new']);
        
    }        
  
    // This method generates the Add/Edit form
    public function renderForm() {
        
        $statuses_array = array();
	$statuses_array['0']['id'] = 1;
	$statuses_array['0']['name'] = strtoupper($this->l('waiting for a call back'));
	$statuses_array['1']['id'] = 2;
	$statuses_array['1']['name'] = strtoupper($this->l('called'));
                
        $employees = Employee::getEmployees();
        $empl_array = array();
	$empl_array['']['id_empl']='';
	$empl_array['']['name']='--';
        foreach ($employees as $key => $empl) {
            $empl_array[$key]['id_empl']=(int)$empl['id_employee'];
            $empl_array[$key]['name']= Tools::substr($empl['firstname'], 0, 1).'.'.$empl['lastname'];
        }

        // Building the Add/Edit form
        $this->fields_form = array(
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->l('Request date').':',
                    'name' => 'date_add',
                    'size' => 33,
                    'disabled' => true,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Name').':',
                    'name' => 'name',
                    'size' => 33,
                    'disabled' => true,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Phone number').':',
                    'name' => 'phone',
                    'size' => 33,
                    'disabled' => true,
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Message').':',
                    'name' => 'call_message',
                    'cols' => 33,
                    'rows' => 5,
                    'disabled' => 'disabled',
                ),
		array(
                    'type' => 'select',
                    'label' => $this->l('Status').':',
                    'name' => 'id_status',
                    'options' => array(
                        'query' => $statuses_array,
			'id' => 'id',
			'name' => 'name'
			),
		),
		array(
                    'type' => 'select',
                    'label' => $this->l('Employee').':',
                    'name' => 'id_employee',
                    'options' => array(
                        'query' => $empl_array,
			'id' => 'id_empl',
			'name' => 'name'
			),
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Employee note').':',
                    'name' => 'employee_note',
                    'cols' => 33,
                    'rows' => 5,
                ),
            ),
            'submit' => array(
                'title' => $this->l('Save'),
                'class' => 'button'
            )
        );
  
        return parent::renderForm();
        
    }

}