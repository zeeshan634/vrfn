<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->library("pagination");
        $sess_data=$this->session->userdata('admin');
        if(!isset($sess_data->admin_email)) {
            redirect('admin/login');
        }      
        $this->admin_id = $sess_data->admin_id;       
    }
    public function index() {
		
		redirect('admin/orders/plans');
        
    }
	
	public function plans($page_num = ""){
		
		$min = 0;
		$limit = 10;
		if($page_num > 1){
			$min = $limit*($page_num - 1);
		}
		
		$result = $this->db->query("select * from verifan_memberships")->result();
		
		$membership = $this->db->query("select * from verifan_memberships order by MembershipID desc limit ".$min.", ".$limit)->result();
		
		foreach($membership as $m){
			$m->email = $this->db->query("select Email from verifan_companies where ID = ".$m->MemberID)->row()->Email;
			$res = $this->db->query("select PackageName, Price from verifan_packages where ID = ".$m->MPID)->row();
			$m->item = $res->PackageName;
			$m->price = $res->Price;	
		}
		
		//echo "<pre>"; print_r($membership); exit;
		
			$config = array();
			$config["base_url"] = base_url().'admin/orders/plans';
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
		
		
		$this->data['page_title']='Event - Admin';
		$this->data['membership'] = $membership;
        $this->load->view('admin/list_plans_view', $this->data);
	}
	
	public function cancel_subscription(){
		$id = $this->input->post("id");
		$stripesubid = $this->input->post("stripesubid");
		
		require_once(APPPATH . 'libraries/stripe-php/init.php');

            $stripe_api_key = $this->config->config['stripe_api_secret']; 
			
            \Stripe\Stripe::setApiKey($stripe_api_key);
			
			$subscription = \Stripe\Subscription::retrieve($stripesubid);
			//echo $subscription->id; exit;
			//echo "</pre>"; print_r($subscription); exit;
			
			if($subscription->id == $stripesubid){
				$subscription->cancel();
				//$this->db->query("delete from verifan_memberships where StripeSubscriptionID = '$stripesubid'");
				$this->db->query("update verifan_memberships set Status=1 where StripeSubscriptionID = '$stripesubid'");
				echo '1';
			}
			
	}
	
	public function extras($page_num = ""){
		
		$min = 0;
		$limit = 10;
		if($page_num > 1){
			$min = $limit*($page_num - 1);
		}
		
		$result = $this->db->query("select * from verifan_transaction")->result();
		
		$transaction = $this->db->query("select * from verifan_transaction order by ID desc limit ".$min.", ".$limit)->result();
		
		foreach($transaction as $m){
			$m->email = $this->db->query("select Email from verifan_companies where ID = ".$m->MemberID)->row()->Email;
			if($m->EventID > 0){ $m->event = $this->db->query("select EventName from verifan_events where ID = ".$m->EventID)->row()->EventName; }
			else{ $m->event = "old record without event id"; }
			/* $res = $this->db->query("select PackageName, Price from verifan_packages where ID = ".$m->MPID)->row();
			$m->item = $res->PackageName;
			$m->price = $res->Price; */	
		}
		
		//echo "<pre>"; print_r($transaction); exit;
		
			$config = array();
			$config["base_url"] = base_url().'admin/orders/extras';
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
		
		
		$this->data['page_title']='Event - Admin';
		$this->data['transaction'] = $transaction;
        $this->load->view('admin/list_extra_payment_view.php', $this->data);
	}

	
}
