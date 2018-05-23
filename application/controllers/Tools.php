<?php
class Tools extends CI_Controller{
    public function __construct() {
        parent::__construct();
        ;
    }
    
    function index(){
        $config= Array(
            'protocol' => 'smtp',
            'smtp_crypto' => 'tls',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 587,
            'smtp_user' => 'duskoprokopijevic@gmail.com',
            'smtp_pass' => '',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
        $this->load->library('email', $config);
        $this->email->from('duskoprokopijevic@gmail.com', 'admin');
        $this->email->to('duskoprokopijevic@gmail.com');
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');
        $this->email->set_newline("\r\n"); 
        $this->email->send();
        $this->email->print_debugger();
    }
    
    
}
