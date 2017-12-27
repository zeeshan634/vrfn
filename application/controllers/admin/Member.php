<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
		$this->load->library("pagination");
        $sess_data=$this->session->userdata('admin');
        if(!isset($sess_data->admin_email))
        {
            redirect('admin/login');
        }
		$this->data['page_title'] = "Members";
        $this->load->model(array('admin/member_model'));      
        $this->admin_id = $sess_data->admin_id;  
    }
    public function index($page_num="")
    {     
		redirect("admin/member/users");
    }
	
	public function users($page_num = ""){
		$this->data['page_title'] = "List Companies";
		
		$min = 0;
		$limit = 5;
		if($page_num > 1){
			$min = $limit*($page_num - 1);
		}
		
        $this->data['page_title'] = "List Users";	
		
		$result = $this->db->query("select * from verifan_companies")->result();
		$members = $this->db->query("select * from verifan_companies order by ID desc limit ".$min.", ".$limit)->result_array();//$this->member_model->get_members();
		
		//print_r($members); exit;
			$config = array();
			$config["base_url"] = base_url().'admin/member/users';
			$total_row = count($result);
			$config["total_rows"] = $total_row;
			$config["per_page"] = 5;
			$config['use_page_numbers'] = TRUE;
			$config['num_links'] = $total_row;
			$config['cur_tag_open'] = '&nbsp;<a class="current">';
			$config['cur_tag_close'] = '</a>';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';

			$this->pagination->initialize($config);
			if($this->uri->segment(1)){
			$page = ($this->uri->segment(1)) ;
			}
			else{
			$page = 1;
			}
			
			$str_links = $this->pagination->create_links();
			$links = explode('&nbsp;',$str_links );
			
			$this->data['links'] = $links;
		
		
		$this->data['members'] = $members;
		$this->load->view('admin/list_member_view', $this->data);
		
		
		/* $this->data['members'] = $this->db->query("select * from verifan_companies")->result_array();//$this->member_model->get_members();
		$this->load->view('admin/list_member_view', $this->data); */
	}
	
	/* function view($id){
		$this->data['page_title'] = "Jobs List";
		$this->data['company_id'] = $id;
		$this->data['jobs'] = $this->db->query("select * from jobopenings where company_id = ".$id)->result_array();//$this->member_model->get_members();
		$this->load->view('admin/list_jobs', $this->data);
	} */
	
    /*public function add()
    {
        $this->data['page_title'] = "Add Member";
        //$this->data['countries'] = $this->general_model->get_countries();
		$this->load->view('admin/add_member_view', $this->data);
    }
	
	public function add_job($cid)
    {
        $this->data['page_title'] = "Add Job";
		$this->data['company_id'] = $cid;
        
		$this->load->view('admin/add_job_view', $this->data);
    }
	
    function add_access()
    {
	
		$this->form_validation->set_rules('industry', 'Industry', 'required');
		//$this->form_validation->set_rules('region', 'Region', 'required');
		//$this->form_validation->set_rules('YOE', 'Years Of Experience', 'required');
		
		$this->form_validation->set_rules('companyname', 'Company Name', 'required');
		//$this->form_validation->set_rules('companywebsite', 'Company Website', 'required');
		//$this->form_validation->set_rules('contactperson', 'Contact Person', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		
		//$this->form_validation->set_rules('contactbutton', 'Contact Button', 'required|matches[cpassword]|min_length[8]');
		//$this->form_validation->set_rules('hiddenratingpin', 'Hidden Rating Pin', 'required|min_length[8]');
        
		if ($this->form_validation->run() == FALSE)
			{
		         $error=validation_errors();
                 $this->session->set_flashdata('error', $error);    
                 redirect('admin/member/add');
			}
		  else
			{
				 //$type = $this->input->post('type');
				 
			     $data['Industry'] = $this->input->post('industry');
			     $data['Region'] = $this->input->post('region');
			     $data['City'] = $this->input->post('city');
                 $data['YearOfExperience'] = $this->input->post('YOE');
                 $data['CompanyName'] = $this->input->post('companyname');
			     $data['CompanyWebsite'] = $this->input->post('companywebsite');           
                 $data['ContactPerson'] =$this->input->post('contactperson');
                 $data['Phone'] = $this->input->post('phone');
                 $data['Email'] = $this->input->post('email');
                 $data['ContactButton'] = $this->input->post('contactbutton');
                 $data['HiddenRatingPin'] = $this->input->post('hiddenratingpin');
				 $data['Status'] = 'Active';
                 $data['createdAt'] = date('Y-m-d H:i:s');
				 $pwd = str_shuffle($data['CompanyName'].$data['Phone']);
				 $reset_pwd = str_shuffle($data['Industry'].$data['Phone']);
				 
				 $data['Password'] = md5($pwd);
				 $data['ResetPassword'] = md5($reset_pwd);
				 
				//echo $data['Password']; exit;
				
               /////////////////////
				
				
                $config =  array(
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
					
				}
				
				
				///////////////////////////			 
          
         	     $this->db->insert('companies', $data);
                 $id=$this->db->insert_id();
                 
                 
                 
                  // send activation link //
					$from=$this->config->config['admin_email'];
					$from_name='Admin';
					$name=$this->input->post('companyname'); //$this->input->post('f_name');
					$to=$this->input->post('email');
					$subject='Login Information';
					//$content='Email: '.$to.' <br/>Password: '.$pwd.' <br/> Please click on the following link (or copy and paste it into your browser) to sign in.<br/><br/> '.base_url().'login'.'<br/>';
					$content='Please use following credentials to login to Dating Site: <br/> Email: '.$to.' <br/>Password: '.$pwd.' <br/> Password Reset: '.$reset_pwd;
					$email_data['title']='<span>Login<span> Information';
					$email_data['content']= $content;                 
					$message=$this->load->view('emails/general',$email_data,true); 
					$this->smtp_email->send($from,$from_name,$to,$subject,$message);
		
			     $this->session->set_flashdata('success', 'company Created Successfully');
				 
				 redirect('admin/member');
                 //redirect('admin/member/view_profile/'.$id);
			
			}
		} 
		
	  function add_new_job(){
		    
			$cid = $this->input->post('company_id');
			$data['company_id'] = $this->input->post('company_id');
			$data['title'] = $this->input->post('title');
			$data['description'] = $this->input->post('description');
			$data['positions_opened'] = $this->input->post('positions_opened');
            $data['pay_offered'] = $this->input->post('pay_offered');
            $data['benifits_offered'] = $this->input->post('benifits_offered');
			$data['exp_required'] = $this->input->post('exp_required');           
            $data['time_req_in_field'] =$this->input->post('time_req_in_field');
            $data['job_type'] = $this->input->post('job_type');
            $data['drug_test'] = $this->input->post('drug_test');
            $data['background_check'] = $this->input->post('background_check');
            $data['special_license'] = $this->input->post('special_license');
            $data['strong_points'] = $this->input->post('strong_points');
            $data['share_info'] = $this->input->post('share_info');
			$data['Status'] = 'Active';
            $data['createdAt'] = date('Y-m-d H:i:s');
						
         	$this->db->insert('jobopenings', $data);
            $id=$this->db->insert_id();
            $this->session->set_flashdata('success', 'Job Posted Successfully');
			redirect('admin/member/view/'.$cid);

	  }
	  
	  function edit_job($jobid){
			
			$data['page_title'] = "Edit Job";
			$data['job'] = $this->db->query("select * from jobopenings where id = ".$jobid)->row();
	
			$this->load->view('admin/edit_job_view', $data);
	  }
	  
	  function do_edit_job($job_id){
		  
			//echo $job_id; exit;
		  
			$cid = $this->input->post('company_id');
			$data['company_id'] = $this->input->post('company_id');
			$data['title'] = $this->input->post('title');
			$data['description'] = $this->input->post('description');
			$data['positions_opened'] = $this->input->post('positions_opened');
            $data['pay_offered'] = $this->input->post('pay_offered');
            $data['benifits_offered'] = $this->input->post('benifits_offered');
			$data['exp_required'] = $this->input->post('exp_required');           
            $data['time_req_in_field'] =$this->input->post('time_req_in_field');
            $data['job_type'] = $this->input->post('job_type');
            $data['drug_test'] = $this->input->post('drug_test');
            $data['background_check'] = $this->input->post('background_check');
            $data['special_license'] = $this->input->post('special_license');
            $data['strong_points'] = $this->input->post('strong_points');
            $data['share_info'] = $this->input->post('share_info');
            $data['createdAt'] = date('Y-m-d H:i:s');
						
         	$this->db->where("id", $job_id)->update('jobopenings', $data);
            $id=$this->db->insert_id();
            $this->session->set_flashdata('success', 'Job Updated Successfully');
			redirect('admin/member/view/'.$cid);
	  }*/
	  
      function edit($id)
		{
            $this->data['page_title'] = "Edit Company";
			$r = $this->db->query("select * from verifan_companies where ID = ".$id)->row();
            
           	if ($r == false)
		      {
		     	redirect("admin/member");
    			}
               
            $this->data['user_data'] =$r;
            $this->load->view('admin/edit_member_view', $this->data);
		}
		
        function edit_code($id)
		{

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('companyname', 'Company Name', 'required');
			$this->form_validation->set_rules('phone', 'Phone', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('address1', 'Address1', 'required');
			$this->form_validation->set_rules('city', 'City', 'required');
			$this->form_validation->set_rules('state', 'State', 'required');
			$this->form_validation->set_rules('zip', 'Zip', 'required');
	
		if ($this->form_validation->run() == FALSE)
			{
		         $error=validation_errors();
                 $this->session->set_flashdata('error', $error);    
                 redirect('admin/member/edit/'.$id);
			}
		  else
			{
				 //$type = $this->input->post('type');
				 
			     $data['Name'] = $this->input->post('name');
				 $data['CompanyName'] = $this->input->post('companyname');
				 $data['Phone'] = $this->input->post('phone');
                 $data['Email'] = $this->input->post('email');
				 
			     $data['Address1'] = $this->input->post('address1');
			     $data['Address2'] = $this->input->post('address2');
			     $data['City'] = $this->input->post('city');
                 $data['State'] = $this->input->post('state');
			     $data['Zip'] = $this->input->post('zip');           
                 		
				
                /* $config =  array(
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
					
				} */
				
				
				///////////////////////////			 
          
         	     $this->db->where('ID', $id)->update('verifan_companies', $data);
			     $this->session->set_flashdata('success', 'User Updated Successfully');
				 
				 redirect('admin/member');
                 //redirect('admin/member/view_profile/'.$id);
			
			}
		}

    public function change_status()
    {
        $id=$_POST['id'];
        if($id)
        {
             $query = $this->db->query("SELECT * FROM verifan_companies WHERE ID='".$id."'");
             $result= $query->result_array();
			 
             if($result[0]['Status']=='Active')
             {                
                $this->db->set('Status', 'Inactive');             
		   	    $this ->db->where('ID',$id);
			    $this->db->update('verifan_companies');
               echo json_encode(array("status"=>1,"msg"=>"Status Updated Successfully"));
             }
             else
             {
                $this->db->set('Status', 'Active');
		   	    $this ->db->where('ID',$id);
			    $this->db->update('verifan_companies');
               echo json_encode(array("status"=>1,"msg"=>"Status Updated Successfully"));
             }
               
        }
        else
        {
            echo json_encode(array("status"=>0,"msg"=>"Status Changing Failed"));
        }
     
    }

     
    public function get_states()
    {        
        $cid = $this->input->post('country_id');
       if($cid)
        {
          $result = $this->general_model->get_provinces($cid);
          
          echo "<option value=''>--Select State--</option>"; 
          
          foreach($result as $row){ 
           
            echo "<option value='".$row['id']."'>".$row['name']."</option>"; 
            
          }
         }
    }
    public function get_cities()
    {        
        $sid = $this->input->post('state_id');
       if($sid)
        {
          $result = $this->general_model->get_cities($sid);
          
          echo "<option value=''>--Select City--</option>"; 
          
          foreach($result as $row){ 
           
            echo "<option value='".$row['id']."'>".$row['name']."</option>"; 
            
          }
         }
    }
	
	public function availability($hotel_id){
		//echo $hotel_id; exit;
		$this->data['page_title'] = "Availability";
        $this->load->view('admin/add_availibility', $this->data);
	}
			
	public function delete_company(){
		$del = $this->db->where('ID', $this->input->post('id'))->delete('verifan_companies');
		echo $del;
	}
	
	public function add_profiles(){
		$this->data['page_title'] = "Add Profiles";
        $this->load->view('admin/add_profiles', $this->data);
	}
	
	public function view_profiles($id=""){
		$data['page_title'] = "Profile List";
		
		$date="";
		if($this->input->post("search_date")){
			$date = $this->input->post("search_date");
		}
		
		if($id > 0){
			$profiles = $this->db->query("select * from verifan_profiles where UserId = '$id' and Expiry like '%$date%' order by ID desc")->result();
			
			$data['profiles'] = $profiles;
			$this->load->view('admin/list_profile_view', $data);
			
			//if(count($profiles) > 0){
				//$data['profiles'] = $profiles;
				//$this->load->view('admin/list_profile_view', $data);
			//}else{
				//redirect('admin/member');
			//}
		}else{
			redirect('admin/member');
		}
	}
	
	public function view_user_sms($user_id=""){
		
		$data['page_title'] = "User SMS All";
		
		$i=0;
		$user_numbers = [];
		$numbers = $this->db->query("select Phone from verifan_profiles where UserId = ".$user_id)->result();
		//echo "<pre>"; print_r($numbers); exit;
		foreach($numbers as $numb){
			$number = $numb->Phone;
			//echo $number;
			$msg = $this->db->query("select * from verifan_sms where Phone = '$number' order by ID desc")->result();			
			
			if(count($msg) > 0){
			
				foreach($msg as $m){
					
					$user_numbers[$i]['ID'] = $m->ID;
					$user_numbers[$i]['Phone'] = $m->Phone;
					$user_numbers[$i]['Sms'] = $m->Sms;
					$user_numbers[$i]['createdAt'] = $m->createdAt;
					
					$i++;
				} 
			}		
		}
		
		//echo "<pre>"; print_r($user_numbers); exit;
		$data['messages'] = $user_numbers;
		$this->load->view('admin/list_member_messages', $data);	
	}
	
	public function renew_profiles(){
		$user_id = $this->input->post("user_id");
		$expiry = $this->input->post("modal_expiry");
		$ids = $this->input->post("profile_ids");
		$ids = substr($ids, 0, -1);
		
		$ids = explode(",", $ids);
		foreach($ids as $id){
			$this->db->where("ID", $id)->update("verifan_profiles", array("Expiry"=>$expiry));
		}
		
		redirect('admin/member/view_profiles/'.$user_id);
	}
	
	public function update_phone(){
		$phone = $this->input->post("phone");
		
		if(strlen(trim($phone)) != 10){
			echo "Phone must contain 10 digit";
			exit;
		}
		
		$expiry = $this->input->post("expiry");
		$id = $this->input->post("id");
			
		$cnt = $this->db->query("select count(*) as cnt from verifan_profiles where ID != '$id' and Phone = '$phone'")->row()->cnt;
		if($cnt == 0){
			$this->db->where("ID", $id)->update("verifan_profiles", array("Phone"=>$phone, "Expiry"=>$expiry));	
			echo "success";
		}else{
			echo "Number already exists";
		}
	}
	
	public function delete_profile(){
		$id = $this->input->post("id"); 
		$this->db->query("delete from verifan_profiles where ID = ".$id);
		echo "success";
	}
	
	public function do_add_profiles(){
		$phone_numbers = $this->input->post("phone_numbers");
		$expiry = $this->input->post("date");
		$company_id = $this->input->post("company_id");
		//echo $company_id; exit;
		if($company_id > 0){
			
			$text = trim($phone_numbers); // remove the last \n or whitespace character
			$phAr = explode("\n", $text);
			$phAr = array_filter($phAr, 'trim'); // remove any extra \r characters left behind

			//print_r($phAr); exit;
			
			$success = 0;
			$invalid_numbers = "";
			$existing_numbers = "";
			foreach ($phAr as $phone) {
				
				$phone = trim($phone);
				
				//echo $phone; exit;
				$len = strlen($phone);
				if($len == 10 && is_numeric($phone)){
					
					$cnt = $this->db->query("select count(*) as cnt from verifan_profiles where Phone = '$phone'")->row()->cnt;
					//$cnt = $this->db->query("select count(*) as cnt from verifan_profiles where UserId = '$company_id' and Phone = '$phone'")->row()->cnt;
					//echo $cnt."  ".$phone; exit;
					if($cnt == 0){
						
						$this->db->insert('verifan_profiles', array("UserId"=>$company_id,"Phone"=>$phone,"Status"=>"Ready_for_registration","Expiry"=>$expiry,"createdAt"=>date('Y-m-d H:i:s')));	
						$success++;
					}else{
						$invalid_numbers.= $phone.",";
					}
					
				}else{
					$invalid_numbers.= $phone.",";
				}
				
			}
			
			//echo $invalid_numbers;
			
			$msg = " Invalid numbers: ";
			if(strlen($invalid_numbers) > 3){ $invalid = substr($invalid_numbers, 0, -1); $msg.= $invalid; } else{ $msg = 0; }
			
			if($success > 0){
				$this->session->set_flashdata('success', $success.' profiles added successfully, '.$msg);
				redirect('admin/member/view_profiles/'.$company_id);
			}else{	
				$this->session->set_flashdata('error', 'Something went wrong '.$msg);
				redirect('admin/member/add_profiles/'.$company_id);
			}
			
		}else{
			$this->session->set_flashdata('error', 'User not found');
			redirect('admin/member');
		}
	}
	public function get_all_sms(){
		$recent_sms = $this->input->post('recent_sms');
		$key = $this->input->post('key');
		//print_r($recent_sms);
		$new_sms = 0;
		foreach($recent_sms as $sms){
			$number = $sms[0];
			$msg = $sms[1];
			$date = $sms[2];
			
			$cnt = $this->db->query("select count(*) as cnt from verifan_sms where Phone = '$number' and Sms = '$msg' and createdAt = '$date'")->row()->cnt;
			
			if($cnt == 0){
				$this->db->insert("verifan_sms", array("Phone"=>$number, "Sms"=>$msg, "createdAt"=>$date));
				$new_sms++;
				
				
				
				$company_id = $this->db->query("select UserId from verifan_profiles where Phone = '$number'")->row()->UserId;
				$email = $this->db->query("select Email from verifan_companies where ID = '$company_id'")->row()->Email;
				if($company_id){
					
					$message['member_id'] =  $company_id; 	//$this->company_id;
					$message['msg_key'] = $key;
					$message['user'] = $email;				//'email@domain.tld';
					$message['number'] = $number; //'9874563321';
					$message['messages'] = $msg; //'add profile api text message';
					
					$this->db->insert("verifan_api_message", $message);
				}
				
			}
			
			//echo "</br>";
		}
		
		echo $new_sms;
		
		//print_r($recent_sms);
	}
	
	public function user_sms($user_id, $number){
		$data['page_title'] = "User SMS";
		//echo $user_id;
		//$numbers = $this->db->query("select Phone from verifan_profiles where UserId = ".$user_id)->result();
		//echo "<pre>"; print_r($numbers);
		//foreach($numbers as $numb){
			//$number = $numb->Phone;
			$messages = $this->db->query("select * from verifan_sms where Phone = '$number' order by ID desc")->result();
			
			
		//}
		
		//echo "<pre>"; print_r($messages); exit;
		
		$data['messages'] = $messages;
		$this->load->view('admin/list_member_phones', $data);
	}
	
	public function get_msg_res(){
		$key = '3b0da870f61f362b451a68450bb4de01';
		$sms=file_get_contents('http://www.smspins.com/pins/apiv2/'.$key.'/bulk_sms');
		$sms = json_decode($sms);
		$recent_sms = $sms->data;
		$new_sms = 0;
		foreach($recent_sms as $sms){
			$number = $sms[0];
			$msg = $sms[1];
			$date = $sms[2];
			
			$cnt = $this->db->query("select count(*) as cnt from verifan_sms where Phone = '$number' and Sms = '$msg' and createdAt = '$date'")->row()->cnt;
			
			if($cnt == 0){
				$this->db->insert("verifan_sms", array("Phone"=>$number, "Sms"=>$msg, "createdAt"=>$date));
				$new_sms++;
				
				
				
				$company_id = $this->db->query("select UserId from verifan_profiles where Phone = '$number'")->row()->UserId;
				$email = $this->db->query("select Email from verifan_companies where ID = '$company_id'")->row()->Email;
				if($company_id){
					
					$message['member_id'] =  $company_id; 	//$this->company_id;
					$message['msg_key'] = $key;
					$message['user'] = $email;				//'email@domain.tld';
					$message['number'] = $number; //'9874563321';
					$message['messages'] = $msg; //'add profile api text message';
					
					$this->db->insert("verifan_api_message", $message);
				}
				
			}
		}
	}
	
}