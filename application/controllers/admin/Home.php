<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $sess_data=$this->session->userdata('admin');
        if(!isset($sess_data->admin_email))
        {
            redirect('admin/login');
        }      
        $this->admin_id = $sess_data->admin_id;       
    }
    public function index()
    {
		$this->data['page_title']='Home - Admin';
		redirect('admin/member');
        //$this->load->view('admin/home');
        
    }
   	 /*public function members() 
     {
	   
		$sql = "SELECT COUNT(MemberId) as total from members";
		$res = $this->db->query($sql);
		if($res->num_rows() > 0) {
			$res = $res->result_array();
			return $res[0]['total'];
		}
		return 0;
	 }*/
    


}
