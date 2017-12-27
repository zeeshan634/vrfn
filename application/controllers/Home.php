<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
		
			$sess_data=$this->session->userdata('company');
			if(isset($sess_data->CompanyName)){
				
				
			}
		
        /*$sess_data=$this->session->userdata('admin');
        if(!isset($sess_data->admin_email))
        {
            redirect('admin/login');
        }
		$this->data['page_title'] = "Members";
        $this->load->model(array('admin/member_model'));      
        $this->admin_id = $sess_data->admin_id;*/  
    }
    public function index()
    {       
		$this->data['page_title'] = "Index";
		$this->load->view('index', $this->data);
    }	    
}