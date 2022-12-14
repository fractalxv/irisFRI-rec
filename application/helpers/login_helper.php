<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function check_logged_in() {
		$CI =& get_instance();
		if($CI->session->userdata('is_login') != TRUE){
			redirect('main');
			exit();
		}
    }