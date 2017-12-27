<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $sess_data=$this->session->userdata('admin');
        if(isset($sess_data->admin_email))
        {
            redirect('admin/home');
        }  
    
    }
    public function index()
    {
        $this->data['page_title']="login - Admin"; 
        $this->load->view('admin/login',$this->data);
        
    }
    public function login_access()
    {
        $this->data['page_title']="login - Admin "; 
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{		  	
			$this->load->view('admin/login', $this->data);
		}
		else
		{     
        		
       $email = $this->input->post('email'); 
	   $password = $this->input->post('password');       
	   $this -> db -> select('admin_id,admin_email,admin_name,login_type,last_login,status');
	   $this -> db -> from('admin');
	   $this -> db -> where('admin_email', $email);
	   $this -> db -> where('password', MD5($password));
	   $this -> db -> limit(1);
	   $query = $this->db->get(); 
	   if($query -> num_rows() >= 1)
       {
			$sess_data = $query->result();
			$sess_data = $sess_data[0];	
			if($sess_data->status == 0)
            {			  	         
               $this->session->set_flashdata('error', 'Admin Inactive, Please Contact Administrator');				
                redirect('admin/login');
			}			

			$this->session->set_userdata(array('admin'=>$sess_data));
			$data_array = array('last_login'=> date('Y-m-d H:i:s'));
			$this->db->where('admin_email', $email);
			$this->db->update('admin', $data_array,array('admin_email'=>$email));				   
            redirect('admin/home');
            exit();

	   }
	   else
	   {	       
	  	$this->session->set_flashdata('error', 'Incorrect Email Or Password');	
        redirect('admin/login');
	    exit;           

	   }
       }
    }
    public function forgot()
    {      
        $this->data['page_title']="login - Admin";
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if ($this->form_validation->run() == FALSE)
 	     {
			 $response=array('code'=>0,'msg'=> validation_errors());
             echo json_encode($response);
             exit();
            
         }
		else
		{
			$email=$this->input->post('email');
            $query = $this->db->query("SELECT * FROM admin WHERE admin_email='".$email."'");
            if($query->num_rows()<1)
                {
                
                 $response=array('code'=>0,'msg'=> 'Email does not exist');
                 echo json_encode($response);
                 exit();
                
                
                } 
                else 
                {
				$pass_code = (uniqid());
				$this->db->set('c-password', $pass_code);
				$this->db->where('admin_email',$email);
				$this->db->update('admin');                
                
                // email //
                 $from=$this->config->config['admin_email'];
                 $name='Administrator';
                 $to=$email;
                 $subject='Reset Password';
                 $message='Your New Password Renewal Link is '.base_url().'admin/login/update_password/'.$pass_code;
                                
                 $this->smtp_email->send($from,$name,$to,$subject,$message);
            
              
                 $response=array('code'=>1,'msg'=> 'A Password Change Link has been sent to your email');
                 echo json_encode($response);
                 exit();

			  }			
		}
        
    }
    public function update_password()
    {        
        $this->data['page_title']='Update password';
		if($this->uri->segment(4)){	
        
        $this -> db -> select('admin_id');
	    $this -> db -> from('admin');
	    $this -> db -> where('c-password', $this->uri->segment(4));
	    $this -> db -> limit(1);
	    $query = $this->db->get(); 
	    if($query -> num_rows() == 0)
        {
        redirect('admin/login');
        exit();       
        }        
        
        $this->data['pass_code']=$this->uri->segment(4);
		$this->load->view('admin/update_password_view', $this->data);
		} else {
		redirect('admin/login');
        exit();
		}
	}
	public function update_password_code() 
    {
        $this->form_validation->set_rules('password', 'Password', 'required|matches[c-password]|min_length[8]');
		$this->form_validation->set_rules('c-password', 'Password Confirmation', 'required');
		$pass_code=$this->input->post('pass_code');
		if ($this->form_validation->run() == FALSE)
		{
		  $error=validation_errors();
		  $this->session->set_flashdata('error', $error);
	       redirect('admin/login/update_password/'.$pass_code);
           exit();
		}
		else
		{
           $this -> db -> select('admin_id');
	       $this -> db -> from('admin');
	       $this -> db -> where('c-password',$pass_code);
	       $this -> db -> limit(1);
	       $query = $this->db->get(); 
	       if($query -> num_rows() == 0)
            {
                redirect('admin/login');
                exit();       
            } 
			$password=md5($this->input->post('password'));
			$this->db->set('password', $password);
			$this->db->where('c-password', $pass_code);
			$this->db->update('admin');			
            $this->db->set('c-password', 0);
			$this->db->where('c-password', $pass_code);
			$this->db->update('admin');
			$this->session->set_flashdata('success', 'The password changed successfully');
			redirect('admin/login');
            exit();

		}

	}   

}
