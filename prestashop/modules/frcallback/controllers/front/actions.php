<?php

class FrCallBackActionsModuleFrontController extends ModuleFrontController {

    public $display_column_left = false;
    public $display_column_right = false;
    
    private $extra = array();
    private $to = array();
    private $isSendMail = true;


    public function postProcess() {
             
        if (Tools::getValue('process') == 'notif') 
            $this->processNotif();
    

        $this->extra = array(
            "form_subject"      => false,
            "form_cc"           => false,
            "ip"                => true,
            "user_agent"        => false
            );
        $lEmails = strval(Configuration::get('FRCALLBACK_EMAIL'));
	$this->to = explode(',', $lEmails);
        $this->isSendMail = (Tools::strlen($lEmails)) ? true : false;
                
        if (Tools::getValue('process') == 'getForm')
            $this->processGetForm();

        if (Tools::getValue('process') == 'sendForm')
            $this->processSendRequest();
        
        die();
                
    }

    public function processNotif() {
	        
        if (!Db::getInstance()->executeS('
            SELECT *
            FROM `'._DB_PREFIX_.'frbc_requests`
            WHERE `id_status` = 1'))
		
            $result = 0;
        else
            $result = Db::getInstance()->numRows();

        $mess = $this->module->l('No new callback requests on your shop.', 'actions');
        if ($result == 1) 
            $mess = $this->module->l('A new callback request has been placed on your shop.', 'actions');
        elseif ($result > 1) 
            $mess = $result.' '.$this->module->l('new callback requests have been placed on your shop.', 'actions');

        $return = array(
            'count' => $result,
            'mess' => $mess,
            );
        die(Tools::jsonEncode($return));
                                                                        
    }

    
    public function processGetForm() {

        $this->context->smarty->assign('extra', $this->extra);
   	$this->context->smarty->assign('to', $this->smcf_token($this->to[0]));

        $tpl = $this->getTemplatePath().'callback_form.tpl';// $this->setTemplate('callback_form.tpl');
        
        $html = $this->context->smarty->fetch($tpl);

        $return = array(
            'html' => $html,
            );
        
        die(Tools::jsonEncode($return));
        
    }

    
    public function processSendRequest() {

        $subject = Configuration::get('FRCALLBACK_ESUBJ'); 

        $name = Tools::getValue('name', '');
        $phone = Tools::getValue('phone', '+'); 
        $subject = Tools::getValue('subject', $subject);
        $message = Tools::getValue('message', ''); 
        $cc = Tools::getValue('cc', '');
        $token = Tools::getValue('token', ''); 

        // make sure the token matches
        if ($token === $this->smcf_token($this->to[0])) {
                $res = true;
                if ($this->isSendMail)
                    $res = $this->smcf_send($name, $phone, $subject, $message, $cc);
        
                if (Configuration::get('FRCALLBACK_LOGREQUEST')) {
                    require_once(_PS_MODULE_DIR_.'frcallback/frRequest.php'); 
                    $req = new frRequest();
                    $req->name = $name;
                    $req->phone = $phone;
                    $req->call_message = $message;
                    $req->id_status = 1;
                    $req->add();
                }
                    
                if (!$res)
                    $html = $this->module->l('Sorry, mail server settings do not allow to send your message.', 'actions');
                else
                    $html = $this->module->l('Your message has been sent.', 'actions');
        }
        else 
            $html = $this->module->l('Sorry, an unexpected error.', 'actions');
        
        $return = array(
            'html' => $html,
            );

        die(Tools::jsonEncode($return));

    }
    
    private function smcf_token($s) {
   
        return md5("smcf-" . $s . date("WY"));
        
    }

    private function smcf_send($name, $phone, $subject, $message, $cc) {

        $test = Tools::getValue('test', '');
        if ($test) {
            unset($this->to);
            $this->to = array($test);
        }
            
        
        include_once(_PS_SWIFT_DIR_.'Swift.php');

        // Filter and validate fields
        $name = $this->smcf_filter($name);
        $subject = $this->smcf_filter($subject);
        $phone = $this->smcf_filter($phone);
        if (!$this->smcf_validate_phone($phone)) {
            $subject .= " - Warning!: CALL-BACK!";
            $message .= "\n\n".$this->module->l('Phone', 'actions').": ".$phone;
            $phone = $this->to[0];
            $cc = 0; // do not CC "sender"
        }

        // Add additional info to the message
        if ($this->extra["ip"]) {
            $message .= "\n\nIP: " . $_SERVER["REMOTE_ADDR"];
        }
        if ($this->extra["user_agent"]) {
            $message .= "\n\nUSER AGENT: " . $_SERVER["HTTP_USER_AGENT"];
        }

        // Set and wordwrap message body
        $body = " ".$this->module->l('Name', 'actions').": $name\n\n";
        $body .= " ".$this->module->l('Phone', 'actions').": $phone\n\n";
        $body .= " ".$this->module->l('User Message', 'actions').": $message";
        $body = wordwrap($body, 70);

        // Build header
        $headers = "From: $phone\n";
        if ($cc == 1) {
            $headers .= "Cc: $phone\n";
        }

        // UTF-8
        //if (function_exists('mb_encode_mimeheader')) {
        //$subject = mb_encode_mimeheader($subject, "UTF-8", "Q", "\n");
        //}
        //else {
                // you need to enable mb_encode_mimeheader or risk
                // getting phones that are not UTF-8 encoded
        //}
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/plain; charset=utf-8\n";
        $headers .= "Content-Transfer-Encoding: quoted-printable\n";

        // Send phone
	$configuration = Configuration::getMultiple(
                array(
                    'PS_SHOP_EMAIL', 
                    'PS_MAIL_METHOD', 
                    'PS_MAIL_SERVER', 
                    'PS_MAIL_USER', 
                    'PS_MAIL_PASSWD', 
                    'PS_SHOP_NAME', 
                    'PS_MAIL_SMTP_ENCRYPTION', 
                    'PS_MAIL_SMTP_PORT', 
                    'PS_MAIL_METHOD', 
                    'PS_MAIL_TYPE'
                    ));

	if (!isset($configuration['PS_MAIL_SMTP_ENCRYPTION'])) 
            $configuration['PS_MAIL_SMTP_ENCRYPTION'] = 'off';
	if (!isset($configuration['PS_MAIL_SMTP_PORT'])) 
            $configuration['PS_MAIL_SMTP_PORT'] = 25;

        $fromName = $phone;
	if (!isset($from)) 
            $from = $configuration['PS_SHOP_EMAIL'];
	if (!isset($fromName)) 
            $fromName = $configuration['PS_SHOP_NAME'];

	$from = new Swift_Address($from, $fromName);

        $smtpChecked = ($configuration['PS_MAIL_METHOD'] == 2);

        $result = true;
        for ($i = 0; $i < count($this->to); $i++)
            if (Validate::isEmail ($this->to[$i]))
                $result = $result && Mail::sendMailTest(
                    Tools::htmlentitiesUTF8($smtpChecked), 
                    Tools::htmlentitiesUTF8($configuration['PS_MAIL_SERVER']), 
                    Tools::htmlentitiesUTF8($body), 
                    Tools::htmlentitiesUTF8($subject), 
                    Tools::htmlentitiesUTF8('text/html'), 
                    Tools::htmlentitiesUTF8($this->to[$i]), 
                    $from, 
                    Tools::htmlentitiesUTF8($configuration['PS_MAIL_USER']), 
                    Tools::htmlentitiesUTF8($configuration['PS_MAIL_PASSWD']), 
                    Tools::htmlentitiesUTF8($configuration['PS_MAIL_SMTP_PORT']), 
                    Tools::htmlentitiesUTF8($configuration['PS_MAIL_SMTP_ENCRYPTION'])
                    );

        if (!$result) 
            return false;

        return true;

    }

    function smcf_filter($value) {
    
        $pattern = array("/\n/","/\r/","/content-type:/i","/to:/i", "/from:/i", "/cc:/i");
        $value = preg_replace($pattern, "", $value);
        
        return $value;
        
    }

    // Validate phone address format in case client-side validation "fails"
    function smcf_validate_phone($phone) {

        // Make sure there aren't multiple periods together
        //if (!preg_match("/^[0-9]{5,20}$/", $phone))
          //      return false;
                
        return true;
              
    }
       
}
