<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	function sendEmail($to,$content){
		$ci =& get_instance();
		$ci->load->library('email');
		$ci->load->library('encrypt');
		$config = array(
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'ensyse.lab@gmail.com',
			'smtp_pass' => 'smartsystemc207 ',
			'mailtype'  => 'html',
			'charset'   => 'utf-8'
		);
		$ci->email->initialize($config);
		$ci->email->set_mailtype("html");
		$ci->email->set_newline("\r\n");
		
		$from_email = "ensyse.lab@gmail.com";
        $to_email = $to;
        //Load email library
        $ci->email->from($from_email, 'Artemis System');
        $ci->email->to($to_email);
        $ci->email->subject('Laboratory eRecruitment Registration');
        $ci->email->message($content);
        //Send mail
        if($ci->email->send())
            redirect('main/success');
        else{
            redirect('main/error');
		}
	}
?>