<?php
if (!defined('_PS_VERSION_'))
	exit;

class frRequest extends ObjectModel {
    
    public $id_request;
    public $date_add;
    public $name;
    public $phone;
    public $call_message;
    public $id_status;
    public $id_employee;
    public $employee_note;
    public $date_call;
  
    public static $definition = array(
        'table' => 'frbc_requests',
	'primary' => 'id_request',
	'fields' => array(
            'name' =>		array('type' => self::TYPE_STRING, 'validate' => 'isMessage'),
            'phone' =>		array('type' => self::TYPE_STRING, 'validate' => 'isMessage'), //, 'required' => true),
            'call_message' =>	array('type' => self::TYPE_STRING, 'validate' => 'isMessage'),
            'date_add' =>		array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'id_status' =>          array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'id_employee' =>	array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'employee_note' =>	array('type' => self::TYPE_STRING, 'validate' => 'isMessage'),
            'date_call' =>		array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
	)
    );
    
}
