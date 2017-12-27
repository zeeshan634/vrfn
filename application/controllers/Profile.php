<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller
{
      public function __construct()
    {
        parent::__construct();
		$this->load->library('pagination');
        $sess_data=$this->session->userdata('company');
        if(!isset($sess_data->CompanyName))
        {
            redirect('login');
        }      
        $this->company_id = $sess_data->ID; 
		$this->email = $sess_data->Email;  		
    }
    public function index()
    {
		
		require_once(APPPATH . 'libraries/stripe-php/init.php');
        $stripe_api_key = $this->config->config['stripe_api_secret']; 	
        \Stripe\Stripe::setApiKey($stripe_api_key);
		
		
		
		$plans = \Stripe\Plan::all();
		
		$stripeids="(";
		
		foreach ($plans->data as $p) {
			
			$stripeids.= $p->id.",";
			
			$data = array("PackageName"=>$p->name, "Price"=>($p->amount/100), "createdAt"=>$p->created);
			$is_plan_exist_db = $this->db->query("select count(*) as cnt from verifan_packages where ID = ".$p->id)->row()->cnt;
			
			if($is_plan_exist_db > 0){
				$this->db->where("ID", $p->id)->update("verifan_packages", $data);
			}else{
				$data1 = array("ID"=>$p->id, "PackageName"=>$p->name, "NoOfProfiles"=>($p->amount/100), "Price"=>($p->amount/100), "createdAt"=>$p->created);
				$this->db->insert("verifan_packages", $data1);
			}
		
		}
		
		
		$stripeids = substr(trim($stripeids), 0, -1).")";
		
		// delete plans/packages which are deleted or not present in stripe accounts
		$this->db->query("delete from verifan_packages where ID NOT IN".$stripeids);
		
		$IsStripeCus = 0;
		$noofuser = 0;
		
		$StripeMemberID = $this->db->query("select StripeCustID from verifan_companies where ID = ".$this->company_id)->row()->StripeCustID;
		if(strlen($StripeMemberID) > 4){
			$IsStripeCus = 1;
		}	
		
		$plans = $this->db->query("select PackageID from verifan_user_package where CompanyID = ".$this->company_id)->result();
		foreach($plans as $p){
			$noofuser+=$this->db->query("SELECT sum(NoOfProfiles) as cnt FROM verifan_packages where ID = ".$p->PackageID)->row()->cnt;
		}
		
		$this->data['page_title'] = "Select Membership Plan";
		$this->data['noofuser'] = $noofuser;
		$this->data['IsStripeCus'] = $IsStripeCus;
		$this->data['verifan_packages'] = $this->db->query("select * from verifan_packages")->result();
		$this->load->view('verifan_packages', $this->data);
		
    }
	
	/* public function select_package($pkg_id){
		
		$plancnt = $this->db->query("select count(*) as cnt from verifan_user_package where CompanyID = ".$this->company_id)->row()->cnt;
		if($plancnt > 0){
			$data = array("PackageID"=>$pkg_id);
			$this->db->update('verifan_user_package', $data);
			$this->session->set_flashdata('success', 'Plan updated');
		}else{
			$data = array("CompanyID"=>$this->company_id, "PackageID"=>$pkg_id, "createdAt"=>date('Y-m-d H:i:s'));
			$this->db->insert('verifan_user_package', $data);
			$this->session->set_flashdata('success', 'Plan updated');
		}
		redirect("profile");
	} */
	
	public function manageprofiles(){
		
		//$userplans = $this->db->query("select * from verifan_memberships where Status=0 and MemberID = ".$this->company_id)->result();
		$userplans = $this->db->query("select * from verifan_memberships where period_end > UNIX_TIMESTAMP() and MemberID = ".$this->company_id)->result();
		
		$data = array();
		foreach($userplans as $p){
			
			
			$res = $this->db->query("select * from verifan_packages where ID = ".$p->MPID)->row();
			$p->PackageName = $res->PackageName;
			$p->NoOfProfiles = $res->NoOfProfiles;
			$p->Price = $res->Price;
		}
		//echo "<pre>"; print_r($userplans); exit;
		
		$this->data['userplans'] = $userplans; 
		$this->load->view('manageprofiles', $this->data);
	
	}
	
	public function manageprofiles_bk(){
		
		$userplans = $this->db->query("select PackageID from verifan_user_package where CompanyID = ".$this->company_id)->result();
		
		$data = array();
		foreach($userplans as $p){
			
			
			$res = $this->db->query("select * from verifan_packages where ID = ".$p->PackageID)->row();
			$p->PackageName = $res->PackageName;
			$p->NoOfProfiles = $res->NoOfProfiles;
			$p->Price = $res->Price;
			//$this->data['package'] = $package;
			//$this->data['page_title'] = "Manage Profiles";
			//$this->data['profiles'] = $this->db->query("select * from verifan_profiles where CompanyID = ".$this->company_id)->result();
			
			//$this->load->view('manageprofiles', $this->data);
		
		}
		
		$this->data['userplans'] = $userplans; 
		$this->load->view('manageprofiles', $this->data);
		//echo $userplans[0]->NoOfProfiles;
		//echo "<pre>"; print_r($userplans);
	}
	
	public function addprofiles(){
		$this->data['page_title'] = "Add Profiles";
		
		$plancnt = $this->db->query("select count(*) as cnt, PackageID from verifan_user_package where CompanyID = ".$this->company_id)->row();	
		if($plancnt->cnt > 0) { 
			$NoOfProfiles = $this->db->query("select NoOfProfiles from verifan_packages where ID = ".$plancnt->PackageID)->row()->NoOfProfiles;
			$data['NoOfProfiles'] = $NoOfProfiles;
			$this->load->view('addprofiles', $data);
		}else{
			redirect('profile/manageprofiles');
		}
		
		
	}
	
	public function do_addprofiles(){
		
		$prof = $this->input->post('profile[]');
		$NoOfProfiles = $this->input->post("NoOfProfiles");
		
		$validate = 'true';
		for($i=0; $i<$NoOfProfiles; $i++){
			if(empty($prof[$i])){
				$validate = 'false';
			}
		}
				
		 if ($validate == 'false')
		{
			  $error=validation_errors();
		      $this->session->set_flashdata('perror', "Please fill all required fields");             
			  redirect("profile/addprofiles");
		}
		else
		{ 						
			for($i=0; $i<$NoOfProfiles; $i++){
				$this->db->insert('verifan_profiles', array("CompanyID"=>$this->company_id, "Name"=>$prof[$i], "Account"=>"", "createdAt"=>date('Y-m-d H:i:s')));
			}
						
			$this->session->set_flashdata('psuccess', 'Profiles added successfully');
			redirect('profile/manageprofiles');
		}
    }
	
	public function edit_profile($id){
		$this->data["profile"] = $this->db->query("select * from verifan_profiles where ID = ".$id)->row();
		$this->load->view("edit_profile", $this->data);
	}
	
	public function update_profile(){
		$this->db->where("ID", $this->input->post('id'))->update("verifan_profiles", array("Name"=>$this->input->post('name')));
		$this->session->set_flashdata('psuccess', 'Profiles updated successfully');
		redirect('profile/manageprofiles');
	}
	
	public function manageevents($page_num = ''){
		
		$min = 0;
		$limit = 5;
		if($page_num > 1){
			$min = $limit*($page_num - 1);
		}
		
		
		$sort = $this->input->post("search_list");
		
		$orderby = "";
		
		if(strlen($sort) > 3){
			if($sort == 'coming_soon'){
				$orderby = "EventDate asc";
			}else if($sort == 'ending_soon') {
				$orderby = "RegistrationDeadline asc";
			}else if($sort == "newest"){
				$orderby = "ID desc";
			}
		}
		
		if($orderby == ""){
			$orderby = "ID desc";
		}
		
		
		//echo $orderby; exit;
		
		//$orderby = "ID desc";		
		//if($this->input->post("s_val")){
			//$sort = $this->input->post("s_val");
			/* if($sort == 'coming_soon'){
				$orderby = "EventDate asc";
			}elseif($sort == 'ending_soon'){
				$orderby == "RegistrationDeadline asc";
			}else{
				$orderby = "ID desc";
			} */
		//}
		
		//echo $orderby; exit;
		
		$query = $this->db->query("select * from verifan_events where EventDate > NOW()");
		$result = $query->result();

		//echo "select * from verifan_events where EventDate > NOW() order by ".$orderby." limit ".$min.", ".$limit;
		
		//exit;
		$events = $this->db->query("select * from verifan_events where EventDate > NOW() order by ".$orderby." limit ".$min.", ".$limit)->result();
				
		foreach($events as $e){
			$e->cnt = $this->db->query("select count(*) as cnt from verifan_event_requests where user_id = '$this->company_id' and event_id = '$e->ID'")->row()->cnt;
		}
		
		//echo '<pre>'; print_r($events); exit;
			
		$this->data['events'] = $events;
		
		$noofuser = 0;
		$plans = $this->db->query("select PackageID from verifan_user_package where CompanyID = ".$this->company_id)->result();
		foreach($plans as $p){
			$noofuser+=$this->db->query("SELECT sum(NoOfProfiles) as cnt FROM verifan_packages where ID = ".$p->PackageID)->row()->cnt;
		}
		
		//$is_purchased_package = $this->db->query("select count(*) as cnt from verifan_user_package where CompanyID = ".$this->company_id)->row()->cnt;
		//$is_purchased_package = $this->db->query("select count(*) as cnt from verifan_memberships where period_end > UNIX_TIMESTAMP() and MemberID = ".$this->company_id)->row()->cnt;
//echo UNIX_TIMESTAMP();
//echo "select count(*) as cnt from verifan_memberships where period_end > UNIX_TIMESTAMP() and MemberID = 84";
		
		$is_purchased_package = $this->db->query("select count(*) as cnt from verifan_memberships where period_end > UNIX_TIMESTAMP() and MemberID = ".$this->company_id)->row()->cnt;
		
		//echo $is_purchased_package; exit;
		
		$this->data['is_purchased_package'] = $is_purchased_package;
		
		$this->data['noofuser'] = $noofuser;
		$this->data['company_id'] = $this->company_id;
			
			$config = array();
			$config["base_url"] = base_url().'profile/manageevents';
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
		
			$this->data['sort'] = $sort;
			//$this->data['events'] = $events; //$this->db->query("select * from verifan_events order by ID desc")->result();
			$this->load->view("manageevents", $this->data);
	}
	
	public function submit_url(){
		
		$url = $this->input->post('url');
		
		if(strpos($url, "http://") === 0){
			$url =str_replace("http://","https://",$url);
		}else if(strpos($url, "www.") === 0){
			$url =str_replace("www.","https://",$url);
		}else{
			
		}
		
		$istrailingslash = substr($url, -1);
		
		if($istrailingslash == '/'){
			//echo "yes";
		}else{
			$url.='/';
		}
		
		$cnt = $this->db->query("select count(*) as cnt from verifan_registration_url where url = '$url'")->row()->cnt;
		
		if($cnt > 0){
			echo "exist"; //"URL already submitted for admin review";
			return;
		}
		
		$data = array("url"=>$url, "status"=>"pending", "posted_by"=>$this->company_id);
				
		if($this->db->insert("verifan_registration_url", $data))
		{
			echo "true";
			return;
		}else{
			echo "false";
			return;
		}
	}
	
	public function create_event(){
		$this->load->view("create_event");
	}
	
	public function add_event(){
		$this->form_validation->set_rules('name', 'Event Name', 'required');
		$this->form_validation->set_rules('date', 'Event Date', 'required');
		$this->form_validation->set_rules('address', 'Event Address', 'required');
		
		//$this->form_validation->set_rules('freeformtext', 'Freeform Text', 'required');
		//$this->form_validation->set_rules('extraprice', 'Extra Price', 'required');
		$this->form_validation->set_rules('deadline', 'Registration Deadline', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			  $error=validation_errors();
		      $this->session->set_flashdata('perror', $error);             
			  redirect("profile/create_event");
		}
		else
		{
			/////////////////////
				$image = "";  
				$config =  array(
					  'upload_path'     => './uploads/events/',
					  'allowed_types'   => "gif|jpg|png|jpeg",
					  'max_size'        => "0",
					  'max_height'      => "1768",
					  'max_width'       => "2048"  
				);
						
				$this->load->library('upload', $config);
					
				if($this->upload->do_upload('image'))
				{
					$filed = $this->upload->data();
					$image = $filed["file_name"];	
				}
				else
				{
						
				}
					
			///////////////////////////	
			
			$data = array("CompanyID"=>$this->company_id, "EventName"=>$this->input->post('name'), "EventDate"=>$this->input->post('date'),"EventAddress"=>$this->input->post('address'),"FreeFormText"=>$this->input->post('freeformtext'),"ExtraPrice"=>$this->input->post('extraprice'),"RegistrationDeadline"=>$this->input->post('deadline'),"EventImage"=>$image);			
			
			$this->db->insert("verifan_events", $data);
			$insert_id = $this->db->insert_id();
			if($insert_id > 0){
				$this->session->set_flashdata('psuccess', "Event Added");             
				redirect("profile/manageevents");
			}
		}
	}
	
	public function event_detail($id){
		$this->data['event'] = $this->db->query("select * from verifan_events where ID = ".$id)->row();
		$this->load->view("event_detail", $this->data);
	}
	
	public function edit_event($id){
		$this->data['event'] = $this->db->query("select * from verifan_events where ID = ".$id)->row();
		$this->load->view("edit_event", $this->data);
	}
	
	public function update_event(){
		
		$id=$this->input->post('id');
		$this->form_validation->set_rules('name', 'Event Name', 'required');
		$this->form_validation->set_rules('date', 'Event Date', 'required');
		$this->form_validation->set_rules('address', 'Event Address', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			  $error=validation_errors();
		      $this->session->set_flashdata('perror', $error);             
			  redirect("profile/edit_event/".$id);
		}
		else
		{
			
			$data = array("CompanyID"=>$this->company_id, "EventName"=>$this->input->post('name'), "EventDate"=>$this->input->post('date'),"EventAddress"=>$this->input->post('address'),"FreeFormText"=>$this->input->post('freeformtext'),"ExtraPrice"=>$this->input->post('extraprice'),"RegistrationDeadline"=>$this->input->post('deadline'));		
			/////////////////////
				$image = "";  
				$config =  array(
					  'upload_path'     => './uploads/companies/',
					  'allowed_types'   => "gif|jpg|png|jpeg",
					  'max_size'        => "0",
					  'max_height'      => "1768",
					  'max_width'       => "2048"  
				);
						
				$this->load->library('upload', $config);
					
				if($this->upload->do_upload('image'))
				{
					$filed = $this->upload->data();
					//$image = $filed["file_name"];
					$data['EventImage'] = $filed["file_name"];
				}
				else
				{
						
				}
					
			///////////////////////////	
			
			//$data = array("CompanyID"=>$this->company_id, "EventName"=>$this->input->post('name'), "EventDate"=>$this->input->post('date'),"EventAddress"=>$this->input->post('address'));
				
			
			$this->db->where("ID", $id)->update("verifan_events", $data);
			
			$this->session->set_flashdata('psuccess', "Event Updated");             
			redirect("profile/edit_event/".$id);
		}
	
	}
	
	public function account(){
		$this->data['page_title'] = "Account";
		$company = $this->db->query("select * from verifan_companies where ID = ".$this->company_id)->row();
		$company->countryname = 0;
		if($company->Country > 0){
			$company->countryname = $this->db->query("select name from countries where id = ".$company->Country)->row()->name;
		}
		
		$this->data['company'] = $company;
		$this->load->view('account', $this->data);
	}
	
	public function update_password(){
		$this->data['page_title'] = "Profile Update";
        $query = $this->db->query("SELECT * FROM verifan_companies WHERE ID='".$this->company_id."'");
        $this->data['user_data']= $query->result_array();       
        $this->load->view('changepassword', $this->data);
	}
	
	public function change_password()
    {
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('new_password', 'New Password', 'required|matches[c_password]|min_length[8]');
		$this->form_validation->set_rules('c_password', 'Password Confirmation', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			  $error=validation_errors();
		      $this->session->set_flashdata('perror', $error);             
			  redirect("profile/update_password");
		}
		else
		{						
			$password=md5($this->input->post('password'));
			$new_password=md5($this->input->post('new_password'));
			$c_password=md5($this->input->post('c_password'));
			
			$this -> db -> select('ID, Email, Password');
			$this -> db -> from('verifan_companies');
			$this -> db -> where('ID', $this->company_id);
			$this -> db -> where('Password', $password);
			$this -> db -> limit(1);			
			$query = $this->db->get(); 
			if($query -> num_rows() == 1)
			{
			   if($new_password != $c_password){
				    $this->session->set_flashdata('perror', 'Password does not match');
					redirect('profile/update_password');
			   }else{
				   $this->db->set('Password', $new_password);
				   $this -> db -> where('ID', $this->company_id);
				   $this->db->update('verifan_companies');
			   }
			}
            else
            {
            $this->session->set_flashdata('perror', 'The password is incorrect!!!');
			redirect('profile/update_password');
            }
			
			$this->session->set_flashdata('psuccess', 'The password changed successfully');
			redirect('profile/update_password');
		}
    }
	
	public function check_contact(){
		$gatewaycontact = $this->input->post('gatewaycontact');
		$contact = $this->db->query("select * from verifan_companies where ContactButton = '".$gatewaycontact."'")->row();
		if(count($contact) > 0){
			echo 'true';
		}else{
			echo 'false';
		}
	}
	
	public function getStripeResponse(){
		echo "here are we ";
	}
	
    /* public function update_code()
    {
   	    $this->form_validation->set_rules('industry', 'Industry', 'required');
   	    $this->form_validation->set_rules('subindustry', 'Field', 'required');
   	    $this->form_validation->set_rules('company_name', 'Company Name', 'required');
   	    $this->form_validation->set_rules('email', 'Email Address', 'required');
   	    $this->form_validation->set_rules('phone', 'Phone', 'required');
   	    $this->form_validation->set_rules('contactbutton', 'Contact Button', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$error=validation_errors();
			$this->session->set_flashdata('error', $error);  
		    //$this->session->set_flashdata('error', 'Name is Missing.');
			redirect("profile");
		}
		else
		{
			$contactbutton = $this->input->post('contactbutton');
		    $cntbtn = $this->db->query("select count(*) as cnt from verifan_companies where ContactButton = '$contactbutton' and ID !='$this->company_id'")->row()->cnt;
			if($cntbtn > 0){
				$this->session->set_flashdata('error', "Contact Button is already in use, Please use different value for Contact Button");    
				redirect('profile');
			}
				 
            $user_data['Industry']=$this->input->post('industry');
			$user_data['SubIndustry'] = $this->input->post('subindustry');
            $user_data['Zip']=$this->input->post('zip');
            $user_data['City']=$this->input->post('city');
            $user_data['YearOfExperience']=$this->input->post('YOE');
            $user_data['CompanyName']=$this->input->post('company_name');
            $user_data['Description']=$this->input->post('description');
            $user_data['CompanyWebsite']=$this->input->post('companywebsite');
            $user_data['NumberOfEmployee']=$this->input->post('numberofemployee');
            $user_data['ContactPerson']=$this->input->post('contactperson');
            $user_data['Phone']=$this->input->post('phone');
            $user_data['ContactButton']=$this->input->post('contactbutton');
            $user_data['ProfileStatus']="complete";
           
            //$user_data['Email']=$this->input->post('email');
			
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
					$user_data['Logo'] = $filed["file_name"];	
					
					$old_img = $this->input->post('old_image');
					$path = FCPATH.'uploads/companies/'.$old_img;
					unlink($path);
				}
				else
				{
					
				}
			
			
            $this->db->where('ID', $this->company_id);
		    $update = $this->db->update('verifan_companies',$user_data);
			
			
			//if($this->db->affected_rows()){
			$this->session->set_flashdata('success', 'Profile Updated Successfully');
			//}
            			
			/*$this->db->select('ID,Industry,Logo,CompanyName,Email,Status');
		    $this->db->from('companies');
		    $this->db->where('Email', $this->company_id);
		    $this->db->limit(1);
		    $query = $this->db->get();*/
			
			/*$query = $this->db->query("select ID,Industry,Logo,CompanyName,Email,Status from verifan_companies where ID = ".$this->company_id)->row();
			
			
            $sess_data = $query; //$query->result();
			//$sess_data = $sess_data[0];

			//echo $sess_data->CompanyName; print_r($sess_data); exit;
			
            $this->session->set_userdata(array('company'=>$sess_data));
			 
		    redirect('profile');
			
		}
        
    }
    
	
	public function update_pins(){
		$pin = $this->input->post('pin');
		$res = $this->db->where("ID", $this->company_id)->update("verifan_companies", array("HiddenRatingPin"=>$pin));
		echo $res;
	}
	
	public function job_applied(){
		$this->db->query("select * from job_applications ja left join jobopenings jo on ja.job_id = jo.id where jo.company_id = ".$this->company_id)->result();
		
		$this->load->view('job_applied');		
	}
	public function get_app(){
		$job_id = $this->input->post('job_id');
		$res = $this->db->query("select a.* from applicants a join job_applications ja on a.ID = ja.applicant_id where ja.job_id = '$job_id'")->result();
		
		//echo '<pre>'; print_r($res);
		
		foreach($res as $r){ ?>
			<div class="employees">
					<div class="photobox">
						<div class="add-image">
							<a href="#"><img src="<?php echo base_url().'uploads/applicants/'; if(strlen($r->Picture) > 1) echo $r->Picture; else echo 'default.png'; ?>" alt=""></a>
						</div>
					</div>
					<div class="add-desc-box">
						<div class="add-details">
							<h5 class="add-title"><a style="cursor: pointer" onclick="view_profile('<?php echo $r->GatewayContact; ?>')"><?php echo $r->Name; ?></a></h5>
							<div class="info">
							  <span class="category"><?php echo $r->Email; ?></span>
							</div>
							<div class="item_desc">
							  <?php echo $r->SkillSet; ?>										
							</div>
							<div class="item_desc">
							  <b>Applied For <?php echo $this->input->post('job_title'); ?> Job</b>
							</div>
						</div>
					</div>
				</div>
		<?php }
		
		//echo '<pre>'; print_r($res);
	} */
	
	public function getSubscription(){
		
		/* require_once(APPPATH . 'libraries/stripe-php/init.php');
        $stripe_api_key = $this->config->config['stripe_api_secret']; 	
        \Stripe\Stripe::setApiKey($stripe_api_key);
		
		
		
		$plans = \Stripe\Plan::all();
		
		foreach ($plans->data as $p) {
			// Do something with $subscription
			
			$data = array("PackageName"=>$p->name, "Price"=>($p->amount/100), "createdAt"=>$p->created);
			$is_plan_exist_db = $this->db->query("select count(*) as cnt from verifan_packages where ID = ".$p->id)->row()->cnt;
			
			if($is_plan_exist_db > 0){
				$this->db->where("ID", $p->id)->update("verifan_packages", $data)
			}else{
				$data = array("ID"=>$p->id, "PackageName"=>$p->name, "Price"=>($p->amount/100), "createdAt"=>$p->created);
			}
		
		} */
		
		//echo "<pre>"; print_r($plans);
		
	}
	
	
	public function register_profiles(){
		
		$token = $this->input->post('extra');
		$event_id = $this->input->post('event_id');;
		$data['event_id'] = $event_id; //$this->input->post('event_id');
		$data['user_id'] = $this->input->post('user_id');
		$data['NoOfProfiles'] = $this->input->post('NoOfProfiles');
		$data['extra'] = $this->input->post('extra');
		$data['createdAt'] = date('Y-m-d H:i:s');
		
		if($token == 'YES'){
			
			$amount = $this->input->post("total");
			
			require_once(APPPATH . 'libraries/stripe-php/init.php');

            $stripe_api_key = $this->config->config['stripe_api_secret']; 
			
            \Stripe\Stripe::setApiKey($stripe_api_key);
			
			$token=$this->input->post('stripeToken');
			//$plan_id=$this->input->post('PlanID');
			
			
			//$cid = $this->db->query("select StripeCustID from verifan_companies where ID = ".$this->company_id)->row()->StripeCustID;
			
			$customer_email = $this->email;
					
			/* $customer = \Stripe\Customer::create(array(
				  'email' => $customer_email,
				  'source'  => $token
			)); */
			
			$cid = $this->db->query("select StripeCustID from verifan_companies where ID = ".$this->company_id)->row()->StripeCustID;
			
			$charge = \Stripe\Charge::create(array(
				  'customer' => $cid,
				  'amount'   => $amount,
				  'currency' => 'usd'
			));
			
			$data1['MemberID'] = $this->company_id;
			$data1['EventID'] = $event_id;
			$data1['StripeCustomerID'] =  $charge->customer;
			$data1['StripeTxID'] =  $charge->id;	
			$data1['amount'] =  $charge->amount;
			$data1['createdAt'] =  $charge->created;
				
			$this->db->insert("verifan_transaction", $data1);
			
			//echo "<pre>"; print_r($charge); exit;

			//echo '<h1>Successfully charged $'.$amount.'!</h1>';
		}
		
		$this->db->insert("verifan_event_requests", $data);
		
		echo 'true';
		
	}
	
	public function api_messages($page_num = ""){
		
		$min = 0;
		$limit = 10;
		if($page_num > 1){
			$min = $limit*($page_num - 1);
		}
		
		
		$result = $this->db->query("select * from verifan_api_message where member_id = '$this->company_id' order by id desc")->result();
		
		$api_messages = $this->db->query("select * from verifan_api_message where member_id = '$this->company_id' order by id desc limit ".$min.", ".$limit)->result();
		
		$this->data['api_messages'] = $api_messages;
		
		//$data = array("status"=>'1');
		//$this>db->update("verifan_api_message", $data);
		
		$data=array('status'=>1);
		$this->db->where('member_id',$this->company_id);
		$this->db->update('verifan_api_message',$data);
		
			$config = array();
			$config["base_url"] = base_url().'profile/api_messages';
			$total_row = count($result);
			$config["total_rows"] = $total_row;
			$config["per_page"] = 10;
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
			
		
		//echo "<pre>"; print_r($api_messages); exit;
	 
		$this->load->view('api_messages', $this->data);

	}
	
	public function notification(){
		
		$messages = $this->db->query("select * from verifan_api_message where status=0 and member_id = '$this->company_id'")->result();
		$cnt = count($messages);
		
		$data['cnt'] = $cnt;
		$data['messages'] = $messages;
		
		echo json_encode($data);
		
		//echo $messages;
		//echo '<pre>'; print_r($messages); exit;
	}
}