<?php

class UseDayTime {

    public $isUse = 0;
    public $days = array('1' => '1', '2' => '1','3' => '1','4' => '1','5' => '1','6' => '0','7' => '0');
    public $hours = array('1' => '9-18', '2' => '9-18', '3' => '9-18', '4' => '9-18','5' => '9-18', '6' => '9-18', '7' => '9-18');

}

class frCallBack extends Module {

    private $_html = '';

    private $_displayTop = 1;
    private $_displayLeft = 1;
    private $_displayRight = 1;
    private $_displayFooter = 1;
    private $_useDayTime;

    function __construct() {
		
        $this->name = 'frcallback';
	$this->tab = 'front_office_features';
	$this->version = '1.15.2';
	$this->author = 'froZZen';
        $this->ps_versions_compliancy = array('min' => '1.5', 'max' => '1.5.9.9');
	$this->need_instance = 0;
	$this->module_key = '58c831a278b049d48691a91062ed8f27';

	parent::__construct();

	$this->displayName = $this->l('CallBack block');
	$this->description = $this->l('Adds a block for CallBack.');
        
        $hooks = Configuration::get('FRCALLBACK_HOOKS');
        $hooks = explode(",", $hooks);
        $this->_displayTop = (int)$hooks[0];
        $this->_displayLeft = (int)$hooks[1];
        $this->_displayRight = (int)$hooks[2];
        $this->_displayFooter = (int)$hooks[3];
        
        $udt = Configuration::get('FRCALLBACK_USEDAYTIME');
        if (!$udt)
            $this->_useDayTime = new UseDayTime();
        else {
            $this->_useDayTime = unserialize($udt);
        }

    }

    function install() {
        
        if (!parent::install()
            || !$this->registerHook('displayHeader')
            || !$this->registerHook('displayTop')
            || !$this->registerHook('displayLeftColumn')
            || !$this->registerHook('displayRightColumn')
            || !$this->registerHook('displayFooter')
            || !$this->registerHook('displayBackOfficeHeader')
	    || !Configuration::updateValue('FRCALLBACK_EMAIL', 'test@mail.com')
	    || !Configuration::updateValue('FRCALLBACK_ESUBJ', 'CALL-BACK')
	    || !Configuration::updateValue('FRCALLBACK_HOOKS', '1,1,1,1')
	    || !Configuration::updateValue('FRCALLBACK_USEDAYTIME', serialize($this->_useDayTime))
	    || !Configuration::updateValue('FRCALLBACK_LOGREQUEST', '1')
	    || !Configuration::updateValue('FRCALLBACK_NUMMASK', '(999) 999-9999')
            || !$this->installModuleTab(true)
            )
            return false;
        
        return true;

    }

    function uninstall() {
		
        if (!Configuration::deleteByName('FRCALLBACK_EMAIL') 
            || !Configuration::deleteByName('FRCALLBACK_ESUBJ')
            || !Configuration::deleteByName('FRCALLBACK_HOOKS')
	    || !Configuration::deleteByName('FRCALLBACK_USEDAYTIME')
	    || !Configuration::deleteByName('FRCALLBACK_LOGREQUEST')
	    || !Configuration::deleteByName('FRCALLBACK_NUMMASK')
            || !$this->uninstallModuleTab(true)
            || !parent::uninstall()
            )
            return false;

        return true;
    
    }

    private function installModuleTab($createTable = false) {
    
         $idTab = Tab::getIdFromClassName('AdminCallBackRequests');

        if (!$idTab) { 
            $tab = new Tab();
            $tab->name = array();
            foreach (Language::getLanguages(true) as $lang)
                switch ($lang['iso_code']) {
                    case 'ru':
                        $tab->name[$lang['id_lang']] = 'Запросы Обратного звонка';
                        break;
                    case 'sk':
                        $tab->name[$lang['id_lang']] = 'Spätné volania';
                        break;
                    default:
                        $tab->name[$lang['id_lang']] = 'CallBack Requests';
                        break;
                } 
                    
            $tab->class_name = 'AdminCallBackRequests';
            $tab->module = $this->name;
            $tab->id_parent = 11;
            if(!$tab->save())
                return false;
        }
        if ($createTable) {
            
            $sql = '
                CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'frbc_requests` (
                `id_request` int(10) unsigned NOT NULL AUTO_INCREMENT,
                `date_add` datetime NOT NULL,
                `name` varchar(255),
                `phone` varchar(50) NOT NULL DEFAULT "+",
                `call_message` text,
                `id_status` int(10) unsigned NOT NULL DEFAULT "1",
                `id_employee` int(10) unsigned,
                `employee_note` text,
                `date_call` datetime,
                PRIMARY KEY (`id_request`),
                KEY `date_add` (`date_add`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10';
            Db::getInstance()->Execute(trim($sql));
        }
            
        return true;
        
    } 

    private function uninstallModuleTab($dropTable = false) {
  
        $idTab = Tab::getIdFromClassName('AdminCallBackRequests');
  
        if($idTab != 0) {
            $tab = new Tab($idTab);
            $tab->delete();
        }
 
        if ($dropTable)
            Db::getInstance()->Execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'frbc_requests`');
            
        return true;
        
    } 
    
    public function getContent() {
        
	$this->context->controller->addJqueryUI(array(
            'ui.core',
            'ui.widget',
            'ui.slider'
            ));
	$this->_html = '<h2>'.$this->displayName.'</h2>';
	if (Tools::isSubmit('submitFrCallBackEMail')) {

            $emails = strval(Tools::getValue('frCallBack_EMail'));

            if ($emails || !empty($emails)) {
                $emails = explode("\n", $emails);
		foreach ($emails as $k => $email) {
                    $email = trim($email);
                    if (!empty($email) && !Validate::isEmail($email)) {
                        $this->_errors[] = $this->l('Invalid e-mail:').' '.Tools::safeOutput($email);
			break;
                    }
                    else if (!empty($email) && count($email) > 0)
                        $emails[$k] = $email;
                    else
                        unset($emails[$k]);
                }

		$emails = implode(',', $emails);
            
            }

            $this->_displayTop = (int)Tools::getValue('frCallBack_hTop');
            $this->_displayLeft = (int)Tools::getValue('frCallBack_hLeft');
            $this->_displayRight = (int)Tools::getValue('frCallBack_hRight');
            $this->_displayFooter = (int)Tools::getValue('frCallBack_hFooter');
                        
            $hooks = $this->_displayTop.','.$this->_displayLeft.','.
                $this->_displayRight.','.$this->_displayFooter;

            $days = Tools::getValue('days', array());
            $hours = Tools::getValue('hours');
            $this->_useDayTime->isUse = (int)Tools::getValue('frCallBack_useTime');
            for ($i = 1; $i <= 7; $i++) {
                if (array_key_exists(strval($i), $days))
                    $this->_useDayTime->days[strval($i)] = $days[strval($i)];
                else
                    $this->_useDayTime->days[strval($i)] = '0';
                        
                $this->_useDayTime->hours[strval($i)] = strval($hours[strval($i)]);
            }
                        
            if (!Configuration::updateValue('FRCALLBACK_EMAIL', strval($emails)))
                $this->_errors[] = $this->l('Cannot update settings').': '.$this->l('CallBack e-Mail');
            else if (!Configuration::updateValue('FRCALLBACK_ESUBJ', Tools::getValue('frCallBack_ESubj')))
                $this->_errors[] = $this->l('Cannot update settings').': '.$this->l('e-Mail Subject');
            else if (!Configuration::updateValue('FRCALLBACK_NUMMASK', Tools::getValue('frCallBack_NumMask')))
                $this->_errors[] = $this->l('Cannot update settings').': '.$this->l('The input mask for the field Phone');
            else if (!Configuration::updateValue('FRCALLBACK_HOOKS', $hooks))
		$this->_errors[] = $this->l('Cannot update settings').': '.$this->l('Display Module in:');
            else if (!Configuration::updateValue('FRCALLBACK_USEDAYTIME', serialize ($this->_useDayTime)))
		$this->_errors[] = $this->l('Cannot update settings').': '.$this->l('Use Module on:');
            
            if (!Configuration::updateValue('FRCALLBACK_LOGREQUEST', (int)Tools::getValue('frCallBack_LogReq')))
		$this->_errors[] = $this->l('Cannot update settings').': '.$this->l('Use log Requests:');
            else {
                if ((int)Tools::getValue('frCallBack_LogReq')) {
                    if (!$this->isRegisteredInHook('displayBackOfficeHeader'))
                        $this->registerHook('displayBackOfficeHeader');
                    $this->installModuleTab();
                }
                else {
                    if ($this->isRegisteredInHook('displayBackOfficeHeader'))
                        $this->unregisterHook('displayBackOfficeHeader');
                    $this->uninstallModuleTab();
                }
            }

            if (count($this->_errors) > 0) {
                $this->_html .= $this->displayError(implode('<br />', $this->_errors));
            }        
            else {       
                $this->_html .= $this->displayConfirmation($this->l('Settings updated'));
            }
        }
        
        $this->_displayForm();
        
        return $this->_html;

    }

    private function _displayForm() {

        $this->_html .= '
            <form method="post" action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'">
                <fieldset>
                    <legend><img src="'.$this->_path.'views/img/settings.gif" />'.$this->l('Settings').'</legend>
                    
                    <label>'.$this->l('CallBack e-Mail').' </label>
                    <div class="margin-form">
                        <div style="float:left; margin-right:10px;">
                            <textarea id="frCallBack_EMail" name="frCallBack_EMail" rows="10" cols="40">'
                            .Tools::safeOutput(Tools::getValue('frCallBack_EMail', str_replace(',', "\n", strval(Configuration::get('FRCALLBACK_EMAIL')))))
                            .'</textarea>
			</div>
			<div>
			'.$this->l('One or more e-mail address (one e-mail per line, e.g. test@mail.com). If you leave it blank - the letter was not formed.').'
			</div>
                    <div style="clear:both;"></div>
                    </div>
                    <label for="frCallBack_Esubj">'.$this->l('e-Mail Subject').'</label>
                    <div class="margin-form">
                        <input type="text" size="20" id="frCallBack_ESubj" name="frCallBack_ESubj" value="'.Tools::getValue('frCallBack_ESubj',Configuration::get('FRCALLBACK_ESUBJ')).'" />
                    </div>
                    
                    <label for="frCallBack_NumMask">'.$this->l('The input mask for the field Phone').'</label>
                    <div class="margin-form">
                        <div style="float:left; margin-right:10px;">
                        <input type="text" size="20" id="frCallBack_NumMask" name="frCallBack_NumMask" value="'.Tools::getValue('frCallBack_NumMask',Configuration::get('FRCALLBACK_NUMMASK')).'" />
			</div>
			<div>
			'.$this->l('Clear the field if you do not want to use an input mask. Valid characters for input masks: 9 - for any digit; whitespace and other characters will be used as is (for example: +9 (999) 999-9999 ext.9999).').'
			</div>
                    <div style="clear:both;"></div>
                    </div>

                    <label>'.$this->l('Display Module in:').' </label>
                    <div class="margin-form">    
                        <div style="float:left;margin-right:10px;">    
                            <div style="padding-bottom:1em;">
                                <input type="checkbox" value="1" id="frCallBack_hTop" name="frCallBack_hTop" '
                                    .(Tools::getValue('frCallBack_hTop', $this->_displayTop) == 1 ? 'checked' : '').'>&nbsp;
                                <label for="frCallBack_hTop" class="t">Top</label>
                            </div>
                            <div style="padding-bottom:1em;">
                                <input type="checkbox" value="1" id="frCallBack_hLeft" name="frCallBack_hLeft" '
                                    .(Tools::getValue('frCallBack_hLeft', $this->_displayLeft) == 1 ? 'checked' : '').'>&nbsp;
                                <label for="frCallBack_hLeft" class="t">Left column</label>
                            </div>
                            <div style="padding-bottom:1em;">
                                <input type="checkbox" value="1" id="frCallBack_hRight" name="frCallBack_hRight" '
                                    .(Tools::getValue('frCallBack_hRight', $this->_displayRight) == 1 ? 'checked' : '').'>&nbsp;
                                <label for="frCallBack_hRight" class="t">Right column</label>
                            </div>
                            <div style="padding-bottom:1em;">
                                <input type="checkbox" value="1" id="frCallBack_hFooter" name="frCallBack_hFooter" '
                                    .(Tools::getValue('frCallBack_hFooter', $this->_displayFooter) == 1 ? 'checked' : '').'>&nbsp;
                                <label for="frCallBack_hFooter" class="t">Footer</label>
                            </div>
                        </div>
			<div>
                            '.$this->l('This setting is used to temporarily on-off visibility of the module on the page. For actual use, it is strongly recommended to use the settings on the "Module-Position" tab.').'
			</div>
                    <div style="clear:both;"></div>
                    </div>

                    <label>'.$this->l('Use Module on:').' </label>
                    <div class="margin-form">    
                        <div style="float:left;margin-right:10px;">    
                            <input type="checkbox" value="1" id="frCallBack_useTime" name="frCallBack_useTime" '
                                .(Tools::getValue('frCallBack_useTime', $this->_useDayTime->isUse) == 1 ? 'checked' : '').'>&nbsp;
                            <label for="frCallBack_useTime" class="t">'.$this->l('Enable the use of the module in the opening hours').'</label>
                        </div>
			<div style="float:left;">
                            '.$this->l('To determine the time of use "Time Zone" setting on the "Localization" tab.').'
			</div>
                    </div>
                    <div style="clear:both;">&nbsp;</div>
                    <table id="use_hours" cellspacing="2" cellpadding="2" style="padding: 10px; margin: 15px 0 20px 260px; border: 1px solid #BBB;">
                        <tbody>
                            <tr>
                                <th colspan="2">'.$this->l('Hours of use:').'</th>
                            </tr>
        ';

        $days = Tools::getValue('days', $this->_useDayTime->days);
        $hours = Tools::getValue('hours', $this->_useDayTime->hours);
        $weekday = array(
            '1' => $this->l('Monday'),    
            '2' => $this->l('Tuesday'),    
            '3' => $this->l('Wednesday'),    
            '4' => $this->l('Thursday'),    
            '5' => $this->l('Friday'),    
            '6' => $this->l('Saturday'),    
            '7' => $this->l('Sunday'));  
        for ($i = 1; $i <= 7; $i++) 
            $this->_html .= '
                            <tr style="color: #7F7F7F; font-size: 0.85em;">
                                <td align="right">'.$weekday[strval($i)].'</td>
				<td>
                                    <input type="checkbox" value="1" id="days_'.$i.'" name="days['.$i.']" '   
                                        .($days[strval($i)] == 1 ? 'checked' : '').'>
                                </td>
				<td width="200px">
                                    <div id="slider_'.$i.'" class="slider"></div>
                                </td>
				<td>
                                    <input type="text" value="" class="dispTime" size="8" disabled >
                                </td>
                                <td>
                                    <input type="hidden" value="'.$hours[strval($i)].'"  id="hours_'.$i.'" name="hours['.$i.']" class="valTime" size="8" >
                                </td>
                            </tr>
            ';    
    
        $this->_html .= '
                        </tbody>
                    </table>
                    <div style="clear:both;">&nbsp;</div>

                    <label>'.$this->l('Use log Requests:').' </label>
                    <div class="margin-form">    
                        <input type="checkbox" value="1" id="frCallBack_LogReq" name="frCallBack_LogReq" '
                                .(Tools::getValue('frCallBack_LogReq', Configuration::get('FRCALLBACK_LOGREQUEST')) == 1 ? 'checked' : '').'>&nbsp;
                        <label for="frCallBack_LogReq" class="t">'.$this->l('Enable the use Log of CallBack Requests (tab "Customers-CallBack Requests") and show notification').'</label>
                    </div>

                    <div style="clear:both;">&nbsp;</div>

                    <div class="margin-form clear pspace">
                        <input type="submit" name="submitFrCallBackEMail" value="'.$this->l('Update settings').'" class="button" />
                    </div>
    		</fieldset>
                <br />
                <fieldset>
                    <legend><img src="'.$this->_path.'logo.gif" />'.$this->l('Support, feedback and issues').'</legend>
                    <label>'.$this->l('e-Mail:').' </label>
                    <div class="margin-form">
                        <b><a href="mailto:frozzen@pisem.net">frozzen(at)pisem.net</a></b>
                    </div>
    		</fieldset>
            </form>';
        
	$this->_html .= '
<script type="text/javascript">
    $(document).ready(
        function() { 
            $("table#use_hours input[type=checkbox]").change(
                function() {
                    DayClick(this);
                }
            );

            $("table#use_hours .slider").slider({
                range: true,
                min: 0,
                max: 24,
                step: 0.5,
                values: [9, 19],
                slide: function(event, ui) {
                    $(this.parentElement).parent().find("input.dispTime").val( GetHourMinutes(ui.values[0]) + " - " + GetHourMinutes(ui.values[1]));
                    $(this.parentElement).parent().find("input.valTime").val(ui.values[0] + "-" + ui.values[1]);
                }
            });

            $("table#use_hours input.valTime").each(
                function() {
                    var tst = $(this).val().split("-");
                    $(this.parentElement).parent().find("input.dispTime").val(GetHourMinutes(tst[0]) + " - " + GetHourMinutes(tst[1]));
                    $(this.parentElement).parent().find(".slider").slider("values", [tst[0], tst[1]]);
            });

            $("input#frCallBack_useTime").change( 
                function() {
                    if (this.checked) {
                        $("table#use_hours input:checkbox").each(
                            function() {
                                $(this).attr("disabled", false);
                                DayClick(this);
                        })
                    }
                    else {
                        $("table#use_hours input:checkbox").attr("disabled", true);
                        $("table#use_hours .slider").slider("disable");
                    }
            }).change();

    });

    function GetMinutes(a) {
        if (a == 0)
            return ":00";
        if (a == 0.5)
            return ":30";
    }

    function GetHourMinutes(a) {
        var out = "";
        if (a < 10)
            out = "0";
        return out + (Math.round(a-0.1)) + GetMinutes(a % 1);
    }

    function DayClick(el) {
        if (el.checked) {
            $(el).parent().parent().find(".slider").slider("enable");
        }
        else {
            $(el).parent().parent().find(".slider").slider("disable");
        }
    }
</script>

        ';
        
	return $this->_html;
        
    }

    function hookDisplayBackOfficeHeader($params) {
		
        
	$tab_link = 'index.php?controller='.'AdminCallBackRequests'.'&token='.Tools::getAdminTokenLite('AdminCallBackRequests');
        $this->context->smarty->assign(array(
            'base_url' => Tools::getShopDomain(true),
            'tab_link' => $tab_link,
            'notif_link' => $this->context->link->getModuleLink($this->name, 'actions', array('process' => 'notif')),
            ));        

        return $this->display(__FILE__, 'frcallback_BO_Header.tpl');
        
    }
    
    function hookDisplayHeader($params) {
       
        $this->context->controller->addCSS($this->_path.'views/css/frcallback.css', 'screen');
        $this->context->controller->addJS($this->_path.'views/js/jquery.simplemodal.js');

        $mask = Configuration::get('FRCALLBACK_NUMMASK');
        if ($mask) 
            $this->context->controller->addJS($this->_path.'views/js/jquery.maskedinput.min.js');
        
        $this->context->smarty->assign(array(
            'actions_link' => $this->context->link->getModuleLink($this->name, 'actions'),
            'mask' => $mask,
            ));        
        
        return $this->display(__FILE__, 'frcallback_FO_Header.tpl');
        
    }
    

    private function _prepareHook($params) {

        if (!$this->_useDayTime->isUse)
            return true;
        else {
            $d = time();
            $N = date('N', $d);
            if ($this->_useDayTime->days[$N]) {
                $tconf = explode('-', $this->_useDayTime->hours[$N]);
                $tt = (int)date('G', $d) + (int)date('i', $d) / 60;
            
                if (($tconf[0] <= $tt) && ($tt<= $tconf[1]))
                    return true;
            }
        }
        
        return false;
       
    }
    
    function hookDisplayTop($params) {
        
        if (!$this->_displayTop)
            return;

        if (!$this->_prepareHook($params))
            return;

	return $this->display(__FILE__, 'frcallback.tpl');
        
    }
   
    public function hookDisplayRightColumn($params) {
        
        if (!$this->_displayRight)
            return;
        
        if (!$this->_prepareHook($params))
            return;

        $tpl = 'frcallback_right.tpl';
	$ptpl =	$this->getTemplatePath($tpl);
        
        if (is_null($ptpl))
            $tpl = 'frcallback.tpl';
		
        return $this->display(__FILE__, $tpl);
        
    }
        
    public function hookDisplayLeftColumn($params) {
        
        if (!$this->_displayLeft)
            return;
        
        if (!$this->_prepareHook($params))
            return;

        $tpl = 'frcallback_left.tpl';
	$ptpl =	$this->getTemplatePath($tpl);
        
        if (is_null($ptpl))
            $tpl = 'frcallback.tpl';
        
	return $this->display(__FILE__, $tpl);
                
    }        
	
    function hookDisplayFooter($params) {
        
        if (!$this->_displayFooter)
            return;

        if (!$this->_prepareHook($params))
            return;
        
        $tpl = 'frcallback_footer.tpl';
	$ptpl =	$this->getTemplatePath($tpl);
        
        if (is_null($ptpl))
            $tpl = 'frcallback.tpl';
        
	return $this->display(__FILE__, $tpl);

    }

}


