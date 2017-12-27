<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $sess_data=$this->session->userdata('company');
        /* if(isset($sess_data->CompanyName))
        {
            //redirect('home');
        }  */ 
    
    }
    public function index()
    {
		$sess_data=$this->session->userdata('company');
        if(isset($sess_data->CompanyName))
        {
            redirect('home');
        }
        
		$this->data['page_title'] = "Index";
		$this->load->view('login', $this->data);
        
    }
	
	public function login()
    {
		$this->data['page_title'] = "Login";
		$this->load->view('login_view', $this->data);        
    }
	
	public function register(){
		$sess_data=$this->session->userdata('company');
        if(isset($sess_data->CompanyName))
        {
            redirect('home');
        }
		$this->data['page_title'] = "Register";
		$this->data['countries'] = $this->db->query("select * from countries")->result();
		$this->load->view('register', $this->data);
	}
	
	public function forgot()
    {
		$this->data['page_title']="Forgot - Password";
		$this->load->view('forgot', $this->data);
	}
	
	/* public function reg_company(){
		$this->data['page_title'] = "Register Company";
		$this->data['industries'] = $this->db->query("select * from industries")->result();
		$this->load->view('registerasacompany', $this->data);
	} */
	
	public function check_email_company(){
		
		if(isset($_GET['email']))
        {
            $email=$_GET['email'];
			
			$cnt = $this->db->query("select count(*) as cnt from verifan_companies where Email = '$email'")->row()->cnt;
			if($cnt > 0){
				echo 'false';
			}else{
				echo 'true';
			}
		}
	}
	
	public function add_access(){
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('companyname', 'Company Name', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('address1', 'Address1', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('state', 'State', 'required');
		$this->form_validation->set_rules('zip', 'Zip', 'required');
		 
		if ($this->form_validation->run() == FALSE)
			{
		         $error=validation_errors();
                 $this->session->set_flashdata('error', $error);    
                 redirect('login/register');
			}
		  else
			{
				 $email = $this->input->post('email');
				 $cnt = $this->db->query("select count(*) as cnt from verifan_companies where Email = '$email'")->row()->cnt;
				 
				 if($cnt > 0){ 
					 $this->session->set_flashdata('error', "Account already register with this email, Please login");  
					 redirect('login/register');
				 }
				 
				 $companyname = $this->input->post('companyname');
				 $password = $this->input->post('password');
			     $data['Name'] = $this->input->post('name');
				 $data['CompanyName'] = $companyname;
				 $data['Email'] = $this->input->post('email');
			     $data['Phone'] = $this->input->post('phone');
				 $data['Password'] = md5($this->input->post('password'));
				 $data['Address1'] = $this->input->post('address1');
				 $data['Address2'] = $this->input->post('address2');
			     $data['City'] = $this->input->post('city');
				 $data['State'] = $this->input->post('state');
				 $data['Zip'] = $this->input->post('zip');
				 $data['Country'] = $this->input->post('country');
				 
                 $EmailVerification = md5($companyname.time());
				 $data['EmailVerification'] = $EmailVerification;
                 $data['createdAt'] = date('Y-m-d H:i:s');
				
               /////////////////////
				
				
                /*$config =  array(
                  'upload_path'     => './uploads/companies/',
                  'allowed_types'   => "gif|jpg|png|jpeg",
                  'max_size'        => "0",
                  'max_height'      => "1768",
                  'max_width'       => "2048"  
                );
					
				$this->load->library('upload', $config);
				
				if($this->upload->do_upload('UserPhoto'))
				{
					$filed = $this->upload->data();
					$data['Logo'] = $filed["file_name"];	
				}
				else
				{
					
				}*/
				
				
				///////////////////////////			 
          
         	     $this->db->insert('verifan_companies', $data);
                 $id=$this->db->insert_id();
                 
                 
                 
                  // send activation link //
					$from=$this->config->config['admin_email'];
					$from_name='Admin';
					$name=$this->input->post('companyname'); //$this->input->post('f_name');
					$to=$this->input->post('email');
					$subject='Account Creation';
					//$content='Email: '.$to.' <br/>Password: '.$pwd.' <br/> Please click on the following link (or copy and paste it into your browser) to sign in.<br/><br/> '.base_url().'login'.'<br/>';
					$vlink = base_url().'login/EmailVerification/'.$EmailVerification;
					$content='Welcome to VeriFan, Your account has been created successfully, Please click the <a href="'.$vlink.'">link</a> to verify your email.</br>';
					$email_data['title']='<span>Verification<span> Email';
					$email_data['content']= $content;                 
					$message=$this->load->view('emails/general',$email_data,true); 
					$this->smtp_email->send($from,$from_name,$to,$subject,$message);
				
			        $this->session->set_flashdata('success', 'Registered successfully, Please check your email');
					
					// login after registration
					
					   $email = $this->input->post('email'); 
					   $password = $this->input->post('password');       
					   $this -> db -> select('ID,Name,CompanyName,Email,Phone,Address1,Address2,City,State,Zip,Country,EmailVerification,Status');
					   $this -> db -> from('verifan_companies');
					   $this -> db -> where('Email', $email);
					   $this -> db -> where('password', md5($password));
					   $this -> db -> limit(1);
					   $query = $this->db->get(); 
					   if($query -> num_rows() >= 1)
					   {
							$sess_data = $query->result();
							$sess_data = $sess_data[0];	
							$this->session->set_userdata(array('company'=>$sess_data));
							redirect('profile');//redirect('CompanyProfile/'.$sess_data->ContactButton);
					   }
					   else
					   {
						//echo "No match found"; exit;
						$this->session->set_flashdata('error', 'Incorrect Email Or Password');	
						redirect('login');
						exit;           

					   }
					
					//login after registration 
					
					
				    //redirect('login/register');
                 			
			}
	}
	
	public function EmailVerification($token=""){
		
		$cnt = $this->db->query("select count(*) as cnt from verifan_companies where EmailVerification = '$token'")->row()->cnt;
		if($cnt > 0){
			$this->db->where('EmailVerification', $token);
			$this->db->update('verifan_companies', array('EmailVerification'=>1));
			$this->session->set_flashdata('success', 'Email verified successfully, Please login');
		}	
		redirect('login');	
	}
		
		
    public function login_access()
    {
        $this->data['page_title']="login - Company "; 
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{		  	
			redirect('login');
		}
		else
		{ 	   
			   $email = $this->input->post('email'); 
			   $password = $this->input->post('password');       
			   $this -> db -> select('ID,Name,CompanyName,Email,Phone,Address1,Address2,City,State,Zip,Country,EmailVerification,Status');
			   $this -> db -> from('verifan_companies');
			   $this -> db -> where('Email', $email);
			   $this -> db -> where('password', md5($password));
			   $this -> db -> limit(1);
			   $query = $this->db->get(); 
			   if($query -> num_rows() >= 1)
			   {
					//echo "match found"; exit;
					$sess_data = $query->result();
					$sess_data = $sess_data[0];	
					
					$this->session->set_userdata(array('company'=>$sess_data));
					
					//$this->session->set_flashdata('success', 'Logged in successfully');
					redirect('profile');//redirect('CompanyProfile/'.$sess_data->ContactButton);
			   }
			   else
			   {
				//echo "No match found"; exit;
				$this->session->set_flashdata('error', 'Incorrect Email Or Password');	
				redirect('login');
				exit;           

			   }
		}

    }
	
	/* 
	public function PostProfile(){
		$this->data['page_title'] = "Register Applicant";
		
		$this->data['benefits'] = $this->db->query("select * from benefits_offered")->result();
        $this->data['degrees'] = $this->db->query("select * from degree")->result();
        $this->data['industries'] = $this->db->query("select * from industries")->result();
        $this->data['institution'] = $this->db->query("select * from institution")->result();
        $this->data['position_sought'] = $this->db->query("select * from position_sought")->result();
        $this->data['skills'] = $this->db->query("select * from skills")->result();
        $this->data['sub_industries'] = $this->db->query("select * from sub_industries")->result();
		
		$this->load->view('postprofile', $this->data);
	}
	    */
	
	public function forgot_password()
    {      
        $this->data['page_title']="Forgot - Password";
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		//$this->form_validation->set_rules('login_type', 'Login As', 'required');
		if ($this->form_validation->run() == FALSE)
 	     {
			 $this->session->set_flashdata('perror', 'Please Fill All Required Fields');
			 redirect('login/forgot');
         }
		else
		{
			$email=$this->input->post('email');
			
			$ResetPassword = "";
			
			
				$query = $this->db->query("SELECT * FROM verifan_companies WHERE Email='".$email."'");
				if($query->num_rows()>0)
                {
					$ResetPassword = time().(uniqid());
					$this->db->set('ResetPassword', $ResetPassword);
					$this->db->where('Email',$email);
					$this->db->update('verifan_companies'); 
				}else{
					$this->session->set_flashdata('error', 'Email not found');
					redirect('login/forgot');
				}
            
            
                // email //
                 $from=$this->config->config['admin_email'];
                 $name='Administrator';
                 $to=$email;
                 $subject='Reset Password';
                 $message='Your New Password Renewal Link is '.base_url().'login/update_password/'.$ResetPassword;
                                
                 $this->smtp_email->send($from,$name,$to,$subject,$message);
				 
				 $this->session->set_flashdata('success', 'Reset link sent. Please check your email');
				 redirect('login/forgot');
		}
        
    }
    public function update_password($ResetPassword)
    {  
        	
		$this->data['page_title']="Update - Password";
		$this->data['ResetPassword']= $ResetPassword;
		
			$res = $this->db->query("select * from verifan_companies where ResetPassword = '".$ResetPassword."'")->row();
			if(count($res) > 0){
				//$this->data['login_type']='verifan_companies';
				$this->load->view('reset_password', $this->data);
			}else{
				$this->session->set_flashdata('error', 'Reset link not found');
				 redirect('login/forgot');
			}

	}
	
	public function change_password() {
		
		//$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[8]');
		$this->form_validation->set_rules('c-password', 'Password Confirmation', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			  $error=validation_errors();
		      $this->session->set_flashdata('error', $error);             
			  redirect("login/update_password/".$this->input->post('ResetPassword'));
		}
		else
		{						
			//$password=md5($this->input->post('password'));
			$new_password=$this->input->post('new_password');
			$c_password=$this->input->post('c-password');
			
			$ResetPassword = $this->input->post('ResetPassword');
			
			if($new_password != $c_password){
				$this->session->set_flashdata('error', 'Password does not match');
				redirect("login/update_password/".$ResetPassword);
			}else{
				$this->db->set('Password', md5($new_password));
				$this -> db -> where('ResetPassword', $ResetPassword);
				$this->db->update('verifan_companies');
				
				$this->db->set('ResetPassword', '');
				$this -> db -> where('Password', md5($new_password));
				$this->db->update('verifan_companies');
				
				$this->session->set_flashdata('success', 'The password changed successfully, Please Login');
			    redirect("login");
				
			}
			
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

	public function send_link(){
		// send activation link //
		$from=$this->config->config['admin_email'];
		$from_name='Admin';
		$name= $_GET['name']; //$this->input->post('name'); //$this->input->post('companyname');
		$to=$_GET['email']; //$this->input->post('email');
		$subject='Email verification';
		$token = $this->db->query("select EmailVerification from verifan_companies where Email = '$to'")->row()->EmailVerification;
		//echo $token; exit;
		$vlink = base_url().'login/EmailVerification/'.$token;
		$content='Welcome to VX HIRE, Please click the <a href="'.$vlink.'">link</a> to complete your profile.';
		$email_data['title']='<span>Email<span> Verification';
		$email_data['content']= $content;                 
		$message=$this->load->view('emails/general',$email_data,true); 
		$this->smtp_email->send($from,$from_name,$to,$subject,$message);
		
		echo 'true';
	}
	
}
