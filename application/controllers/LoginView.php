<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginView extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
            
    }
    public function index()
    {
		$company=$this->session->userdata('company');
		$applicant=$this->session->userdata('applicant');
		
		if(isset($company->CompanyName) || isset($applicant->ID)){
			redirect('home');
		}
		
		$this->data['page_title'] = "Index";
		$this->load->view('login_view', $this->data);
        
    }

}
