<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    private $date_format;
	
	function __construct()
    {
        parent::__construct();
        
        if(!is_loaded('ion_auth')) show_error("This package cooperates with Ion_Auth and it's not loaded");
		$this->load->config('login_control', TRUE);
		$this->load->model('login_control');
		$this->date_format = $this->config->item('lc_dateformat', 'login_control');
		$this->lang->load('auth');
    }
    
    function logins()
    {
		$data	=	array(
			'logs'			=>	$this->login_control->get_logins(),
			'date_format'	=>	$this->date_format,
			'names'			=>	$this->config->item('lc_names','login_control')
		);
		
		$this->load->view('lc_logins',$data);
    }
	
	function all()
	{
		$data	=	array(
			'logs'			=>	$this->login_control->get_all(),
			'date_format'	=>	$this->date_format,
			'names'			=>	$this->config->item('lc_names','login_control')
		);
		
		$this->load->view('lc_logins',$data);
	}
}