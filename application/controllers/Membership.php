<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Membership extends CI_Controller 

{

    public function __construct()

    {

        parent::__construct();
		//$this->load->library("Smtp_email");
		
		$sess_data=$this->session->userdata('company');
        if(!isset($sess_data->CompanyName))
        {
            redirect('login');
        }      
        $this->company_id = $sess_data->ID;             
        $this->login_email = $sess_data->Email;             

    }

    public function index()

    {
		
        /* $this->data['page_title']='Membership';        

        $qry=$this->db->query('select * from membership_plan order by MPID desc');

        $this->data['plans']=$qry->result_array();      

        $this->load->view('membership', $this->data); */   

    }
	
	public function select_package($pkg_id){
		
		//$plancnt = $this->db->query("select count(*) as cnt from verifan_user_package where CompanyID = ".$this->company_id)->row()->cnt;
		/* if($plancnt > 0){
			$data = array("PackageID"=>$pkg_id);
			$this->db->update('verifan_user_package', $data);
		}else{ */
			
		//}
		//echo "here are we"; exit;
		$data = array("CompanyID"=>$this->company_id, "PackageID"=>$pkg_id, "createdAt"=>date('Y-m-d H:i:s'));
		$this->db->insert('verifan_user_package', $data);
		
		return;
	}
	
	public function getNoOfProfiles(){
		$plans = $this->db->query("select PackageID from verifan_user_package where CompanyID = ".$this->company_id)->result();
		$noofuser = 0;
		foreach($plans as $p){
			$noofuser+=$this->db->query("SELECT sum(NoOfProfiles) as cnt FROM verifan_packages where ID = ".$p->PackageID)->row()->cnt;
			//echo $p->PackageID.'</br>';
		}
		return $noofuser;
	}

    public function process()

    { 

            require_once(APPPATH . 'libraries/stripe-php/init.php');

            $stripe_api_key = $this->config->config['stripe_api_secret']; 
			
            \Stripe\Stripe::setApiKey($stripe_api_key);

            
			
			/* $this->form_validation->set_rules('stripeToken', 'Payment', 'required');

        	if ($this->form_validation->run() == FALSE)

			{		             

                redirect('profile');

                exit();

			}

		    else 

			{ */

			
				$token=$this->input->post('stripeToken');
				$plan_id=$this->input->post('PlanID');
			
				$stripecustomercnt = $this->db->query("select count(*) as cnt from verifan_companies where StripeCustID!='' and ID = '$this->company_id'")->row()->cnt;
				
				//echo $stripecustomercnt;
				
				//exit;
				//redirect if aleady subscribed
				if($stripecustomercnt > 0){
					//$this->session->set_flashdata('error', "customer already subscribed");
					//redirect('profile');
				}else{
					$customer_email = $this->email;
				
					 $customer = \Stripe\Customer::create(array(

								'email' => $customer_email, // customer email id

								'card'  => $token

							));
							
					
						
					$this->db->where("ID", $this->company_id)->update("verifan_companies", array("StripeCustID"=>$customer->id));

					$this->db->insert("verifan_stripe_customer", array("customer"=>$customer));

				}
				
				
				$cid = $this->db->query("select StripeCustID from verifan_companies where ID = ".$this->company_id)->row()->StripeCustID;
				
				//$stripeinfo = \Stripe\Token::retrieve($token);
				//echo "<pre>"; echo $stripeinfo; exit;
				
				                //echo "<pre>"; echo $customer; exit;

             
					$subscription = \Stripe\Subscription::create(array(
					  "customer" => $cid,
					  "items" => array(
						array(
						  "plan" => $plan_id, //"online-access",
						),
					  ),
					));

								
											
					//echo "<pre>"; print_r($subscription); exit;
                     

               if(isset($subscription->id))

               {
				   //$p = $this->db->query("select * from verifan_packages where ID = ".$plan_id)->row();
				   //echo $this->email.' user id: '.$this->company_id.' added, Plan Info:'.$p->PackageName.' No of profiles:'.$p->NoOfProfiles; exit;
				   // send email to admin temporary davidmark0772@gmail.com
										
						$p = $this->db->query("select * from verifan_packages where ID = ".$plan_id)->row();
						
						$from=$this->config->config['admin_email'];
						
						//echo $from; exit;
						
						$from_name='Admin';
						//$name=$this->input->post('companyname'); //$this->input->post('f_name');
						//$to='chrissullivan794@gmail.com';
						$to= 'davidmark0772@gmail.com';//trim($this->db->query("select admin_email from verifan_admin limit 1")->row()->admin_email); //'davidmark0772@gmail.com';
						$subject='New profiles added';
						$content='Dear admin, New profiles has been added against '.$this->login_email.' user id: '.$this->company_id.' added, Plan Info:'.$p->PackageName.' No of profiles:'.$p->NoOfProfiles.'</br>';
						$email_data['title']='<span>New Profile Added<span>';
						$email_data['content']= $content;                 
						$message=$this->load->view('emails/general',$email_data,true); 
						
						//echo $message; exit;
						
						$this->send($from,$from_name,$to,$subject,$message);
							
					// end send email to admin

					$this->select_package($plan_id);					
					//if($subscription->id!="" && $subscription->status=="active")
					 
                    $sub_id = $subscription->id;

                    $coustomer = $subscription->customer;

                    $created   =$subscription->created;

                    $current_period_end=$subscription->current_period_end;

                    $current_period_start=$subscription->current_period_start;

                
                        $data=array();

                        $data['MemberID']=$this->company_id;

                        $data['MPID']=$plan_id; //$membership['MPID'];

                        $data['period_start']=$current_period_start;

                        $data['period_end']=$current_period_end;

                        $data['createdAt']=$created;

                        $data['StripeCustomerID']=$coustomer;

                        $data['StripeSubscriptionID']=$sub_id;

                        //$data['StripeSubscriptionEnded']='';
                        //$data['ask_an_advisor']=1;

                        $this->db->insert('verifan_memberships',$data);

                        //$this->session->set_flashdata('success'," Successfully Subscribe");
	
						echo "success";
						

               } 
			   
			   //$this->session->set_flashdata('success'," Successfully Subscribe");
                 //redirect('profile');
                 //exit();

            //} 
   

    }
	
	public function send($from,$name,$toEmail,$subject,$msg){


    /* $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' => 'alexrobbio.smtp@gmail.com', // change it to yours
      'smtp_pass' => 'Robbiosmtp', // change it to yours
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
    ); */
	
   $config = array (
     'mailtype' => 'html',
     'charset'  => 'utf-8',
     'priority' => '1'
      ); 

        $ci =& get_instance();    
        $ci->load->library('email');
      	$ci->email->initialize($config);
		$ci->email->set_newline("\r\n");
		$ci->email->from($from,$name);
		$ci->email->to($toEmail);//to address here
		$ci->email->subject($subject);
        $ci->email->message($msg);
		if($ci->email->send())
			return true;
		else
		    return false;

	}

    

}    