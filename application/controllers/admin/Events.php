<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->library("pagination");
        $sess_data=$this->session->userdata('admin');
        if(!isset($sess_data->admin_email))
        {
            redirect('admin/login');
        }      
        $this->admin_id = $sess_data->admin_id;       
    }
    public function index($page_num = '')
    {
		$min = 0;
		$limit = 5;
		if($page_num > 1){
			$min = $limit*($page_num - 1);
		}
		
		$result = $this->db->query("select * from verifan_events order by ID desc")->result();
		
		$events = $this->db->query("select * from verifan_events order by ID desc limit ".$min.", ".$limit)->result_array();
		
			$config = array();
			$config["base_url"] = base_url().'admin/events/index';
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
		
		
		$this->data['page_title']='Event - Admin';
		$this->data['events'] = $events;
        $this->load->view('admin/list_event_view', $this->data);
        
    }
	
	public function add_event(){
		
		$this->data['page_title']='Add Event - Admin';
		$this->load->view('admin/add_event_view', $this->data);
	}
	public function submit_event(){
		
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
			  redirect("admin/events/add_event");
		}
		else
		{
			/////////////////////
				$url = "";
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
				
			if($this->input->post('url')){
				$url = $this->input->post('url');
			}
					
			///////////////////////////	
					
			$data = array("EventName"=>$this->input->post('name'), "EventDate"=>$this->input->post('date'),"EventAddress"=>$this->input->post('address'),"FreeFormText"=>$this->input->post('freeformtext'),"ExtraPrice"=>$this->input->post('extraprice'),"RegistrationDeadline"=>$this->input->post('deadline'),"EventImage"=>$image,"EventUrl"=>$url);			
						
			//echo "<pre>"; print_r($data); exit;
			
			$this->db->insert("verifan_events", $data);
			$insert_id = $this->db->insert_id();
			if($insert_id > 0){
				$this->session->set_flashdata('psuccess', "Event Added Successfully"); 

				if(strlen($url) > 3){
					$this->db->query("delete from verifan_registration_url where url = '$url'");
					redirect("admin/events/registration_urls");
				}
				
				redirect("admin/events/add_event");
			}
		}
	}
	
	public function edit_event($id){
		$this->data['page_title']='Edit Event - Admin';
		$this->data['event'] = $this->db->query("select * from verifan_events where ID = ".$id)->row();
		$this->load->view("admin/edit_event", $this->data);
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
			  redirect("admin/events/edit_event/".$id);
		}
		else
		{
			
			$data = array("EventName"=>$this->input->post('name'), "EventDate"=>$this->input->post('date'),"EventAddress"=>$this->input->post('address'),"FreeFormText"=>$this->input->post('freeformtext'),"ExtraPrice"=>$this->input->post('extraprice'),"RegistrationDeadline"=>$this->input->post('deadline'));		
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
					//$image = $filed["file_name"];
					$data['EventImage'] = $filed["file_name"];
				}
				else
				{
						
				}
					
			///////////////////////////	
			
			$this->db->where("ID", $id)->update("verifan_events", $data);
			
			$this->session->set_flashdata('psuccess', "Event Updated Successfully");             
			redirect("admin/events/edit_event/".$id);
		}
	
	}
	
	public function delete_event(){
		$del = $this->db->where('ID', $this->input->post('id'))->delete('verifan_events');
		echo $del;
	}
	
	public function registration_urls(){
		
		$this->data['page_title']='Event - Registration URLs';
		$urls = $this->db->query("select * from verifan_registration_url order by ID desc")->result();
		
		foreach($urls as $u){
			$res = $this->db->query("select Name, CompanyName from verifan_companies where ID = ".$u->posted_by)->row();
			$u->name = $res->Name;
			$u->companyname = $res->CompanyName;
		}
		
		$this->data['urls'] = $urls;
		
		$this->load->view('admin/list_registration_url', $this->data);
		
		//echo "<pre>"; print_r($urls);
		
	}
	
	public function change_status()
    {
        $id=$_POST['id'];
        if($id)
        {
             $query = $this->db->query("SELECT * FROM verifan_registration_url WHERE ID='".$id."'");
             $result= $query->result_array();
			 
             if($result[0]['status']=='approved')
             {                
                $this->db->set('status', 'pending');             
		   	    $this ->db->where('ID',$id);
			    $this->db->update('verifan_registration_url');
               echo json_encode(array("status"=>1,"msg"=>"Status Updated Successfully"));
             }
             else
             {
                $this->db->set('status', 'approved');
		   	    $this ->db->where('ID',$id);
			    $this->db->update('verifan_registration_url');
               echo json_encode(array("status"=>1,"msg"=>"Status Updated Successfully"));
             }
               
        }
        else
        {
            echo json_encode(array("status"=>0,"msg"=>"Status Changing Failed"));
        }
     
    }
	
	public function delete_url(){
		$del = $this->db->where('ID', $this->input->post('id'))->delete('verifan_registration_url');
		echo $del;
	}
}
