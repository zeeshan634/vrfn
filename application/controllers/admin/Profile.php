<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller
{
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
        $this->data['page_title'] = "Admin Profile Update";
        $query = $this->db->query("SELECT * FROM admin WHERE admin_id='".$this->admin_id."'");
        $this->data['user_data']= $query->result_array();       
        $this->load->view('admin/admin_edit', $this->data);
        
    }
    public function update_code()
    {
   	    $this->form_validation->set_rules('admin_name', 'Name', 'required');   	    $this->form_validation->set_rules('admin_email', 'Email', 'required');

		if ($this->form_validation->run() == FALSE)
		{
		    $this->session->set_flashdata('error', validation_errors());
			redirect("admin/profile");
		}
		else
		{		
            $user_date['admin_name']=$this->input->post('admin_name');            $user_date['admin_email']=$this->input->post('admin_email');
            $this->db->where('admin_id', $this->admin_id);
		    $this->db->update('admin',$user_date);
            
            $this -> db -> select('admin_id,admin_email,admin_name,login_type,last_login,status');
	        $this -> db -> from('admin');
	        $this -> db -> where('admin_id', $this->admin_id);
            $query = $this->db->get();
            $sess_data = $query->result();
			$sess_data = $sess_data[0]; 
            $this->session->set_userdata(array('admin'=>$sess_data));
            
		    $this->session->set_flashdata('success', 'Admin Updated Successfully');
		    redirect('admin/profile');
			
		}
        
    }
     public function change_password()
    {
        		
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('new_password', 'New Password', 'required|matches[c-password]|min_length[8]');
		$this->form_validation->set_rules('c-password', 'Password Confirmation', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			  $error=validation_errors();
		      $this->session->set_flashdata('perror', $error);             
			  redirect("admin/profile");
		}
		else
		{						
			$password=md5($this->input->post('password'));
			$new_password=md5($this->input->post('new_password'));
			
			$this -> db -> select('admin_id, admin_email, password');
			$this -> db -> from('admin');
			$this -> db -> where('admin_id', $this->admin_id);
			$this -> db -> where('password', $password);
			$this -> db -> limit(1);			
			$query = $this->db->get(); 
			if($query -> num_rows() == 1)
			{
			   $this->db->set('password', $new_password);
		   	   $this -> db -> where('admin_id', $this->admin_id);
			   $this->db->update('admin');
			}
            else
            {
            $this->session->set_flashdata('perror', 'The password is incorrect!!!');
			redirect('admin/profile');
            }
			
			$this->session->set_flashdata('psuccess', 'The password changed successfully');
			redirect('admin/profile');
		}
    }
}