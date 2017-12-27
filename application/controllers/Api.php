<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
		
		$sess_data=$this->session->userdata('company');
        if(!isset($sess_data->CompanyName))
        {
            redirect('login');
        }      
        $this->company_id = $sess_data->ID;   
		
    }
    public function index()
    {       
		//$this->data['page_title'] = "Index";
		//$this->load->view('index', $this->data);
    }

	public function addprofiles(){
		//echo $this->input->post("stripeToken"); 
		
		$message['member_id'] = $this->company_id;
		$message['msg_key'] = 'msgkey';
		$message['user'] = 'email@domain.tld';
		$message['number'] = '9874563321';
		$message['messages'] = 'add profile api text message';
		
		$this->db->insert("verifan_api_message", $message);
		echo "true";
		//return false;
	}
	
	public function message(){
		echo "messages";
	}
	
	public function alert(){
		echo "alerts goes here";
	}
	
	public function register_profiles(){
		
		$message['member_id'] = $this->company_id;
		$message['msg_key'] = 'msgkey';
		$message['user'] = 'email@domain.tld';
		$message['number'] = '9874563321';
		$message['messages'] = 'register profile with extra price api text message';
		
		$this->db->insert("verifan_api_message", $message);
		
		echo "true";
	}
}