<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// Status 1 = deleted, 2 = updated, 3 = trial_will_end

class Stripe_call extends CI_Controller 

{

    

    public function __construct()

    {

        parent::__construct();

              

    }

    public function index()

    {
		
       require_once(APPPATH . 'libraries/stripe-php/init.php');

       $stripe_api_key = $this->config->config['stripe_api_secret'];               

       \Stripe\Stripe::setApiKey($stripe_api_key);



        // Retrieve the request's body and parse it as JSON

        $input = @file_get_contents("php://input");
		
		//$input = '{"id":"evt_1BL3q0LpqJm5JPBY8lYHgy1i","object":"event","api_version":"2016-07-06","created":1509948720,"data":{"object":{"id":"sub_BhOKsdSRHEC4xq","object":"subscription","application_fee_percent":null,"billing":"charge_automatically","cancel_at_period_end":false,"canceled_at":1509948720,"created":1509693860,"current_period_end":1512285860,"current_period_start":1509693860,"customer":"cus_BdkxhTThRseLsN","discount":null,"ended_at":1509948720,"items":{"object":"list","data":[{"id":"si_1BJzXMLpqJm5JPBYVIg9AAJI","object":"subscription_item","created":1509693860,"metadata":{},"plan":{"id":"1","object":"plan","amount":1000,"created":1508850184,"currency":"usd","interval":"month","interval_count":1,"livemode":false,"metadata":{},"name":"10 Dollar Plan","statement_descriptor":null,"trial_period_days":300},"quantity":1}],"has_more":false,"total_count":1,"url":"\/v1\/subscription_items?subscription=sub_BhOKsdSRHEC4xq"},"livemode":false,"metadata":{},"plan":{"id":"1","object":"plan","amount":1000,"created":1508850184,"currency":"usd","interval":"month","interval_count":1,"livemode":false,"metadata":{},"name":"10 Dollar Plan","statement_descriptor":null,"trial_period_days":300},"quantity":1,"start":1509693860,"status":"canceled","tax_percent":null,"trial_end":null,"trial_start":null}},"livemode":false,"pending_webhooks":1,"request":"req_7m3Z81CWMultzS","type":"customer.subscription.deleted"}';

		/* $myfile = fopen("iiiiii.txt", "w") or die("Unable to open file!");
		 $txt = json_encode($_POST);
		 fwrite($myfile, $txt);
		fclose($myfile) */
		
        $event_json = json_decode($input);
		
		//echo "<pre>"; print_r($input); exit;

        if(isset($event_json->id))

        {

            $res_test=$event_json->data->object;

            $test_sub_id = $res_test->id;

            $tt=array();

            $tt['SubscriptionID'] =$test_sub_id;       

            $tt['text']=$event_json->type;

            //echo '</pre>'; print_r($tt); exit;
			
			$this->db->insert('verifan_stripe_events',$tt);

            if($event_json->type=='customer.subscription.updated')

            {

                    $res=$event_json->data->object; 

                    $sub_id = $res->id;  //'sub_C1JDGuUJvPj1mF';

                    $coustomer = $res->customer; //'cus_BdkxhTThRseLsN';

                    $created   =$res->created;

                    $current_period_end=$res->current_period_end;

                    $current_period_start=$res->current_period_start;

                    $chk=$this->db->query('select * from verifan_memberships where StripeCustomerID="'.$coustomer.'" and StripeSubscriptionID="'.$sub_id.'"');

                    if($chk->num_rows()==1)

                    {

                        $data=array();

                        $data['period_start']=$current_period_start;

                        $data['period_end']=$current_period_end;

                        $data['createdAt']=$created;

                        $data['StripeCustomerID']=$coustomer;

                        $data['StripeSubscriptionID']=$sub_id;

                        //$data['StripeSubscriptionEnded']='';
						
                        $data['Status']=2;

                        $this->db->update('verifan_memberships',$data,array('StripeCustomerID'=>$coustomer,'StripeSubscriptionID'=>$sub_id));

                    }

           

            }

            else if($event_json->type=='customer.subscription.deleted')

            {

                   $res=$event_json->data->object; 

                    $sub_id = $res->id;

                    $coustomer = $res->customer;

                    //$created   =$res->created;

                    $current_period_end=$res->current_period_end;

                    $current_period_start=$res->current_period_start;

                    $ended_at=$res->ended_at;
					
					//echo $ended_at;// "<pre>"; print_r($res); exit;

                    $chk=$this->db->query('select * from verifan_memberships where StripeCustomerID="'.$coustomer.'" and StripeSubscriptionID="'.$sub_id.'"');

                    if($chk->num_rows()==1)

                    {

                        $data=array();

                        $data['period_start']=$current_period_start;

                        $data['period_end']=$current_period_end;

                       // $data['createdAt']=$created;

                        $data['StripeCustomerID']=$coustomer;

                        $data['StripeSubscriptionID']=$sub_id;

                        //$data['StripeSubscriptionEnded']=$ended_at;
						
						$data['Status'] = 1;
						
                        $this->db->update('verifan_memberships',$data,array('StripeCustomerID'=>$coustomer,'StripeSubscriptionID'=>$sub_id));

                    }

            }

            else if($event_json->type=='customer.subscription.trial_will_end')

            {

                    $res=$event_json->data->object; 

                    $sub_id = $res->id;

                    $coustomer = $res->customer;

                    $created   =$res->created;

                    $current_period_end=$res->current_period_end;

                    $current_period_start=$res->current_period_start;

                    $ended_at=$res->ended_at;

                    $chk=$this->db->query('select * from verifan_memberships where StripeCustomerID="'.$coustomer.'" and StripeSubscriptionID="'.$sub_id.'"');

                    if($chk->num_rows()==1)

                    {

                        $data=array();

                        $data['period_start']=$current_period_start;

                        $data['period_end']=$current_period_end;

                        $data['createdAt']=$created;

                        $data['StripeCustomerID']=$coustomer;

                        $data['StripeSubscriptionID']=$sub_id;

                        //$data['StripeSubscriptionEnded']='';
						
						$data['Status'] = 3;

                        $this->db->update('verifan_memberships',$data,array('StripeCustomerID'=>$coustomer,'StripeSubscriptionID'=>$sub_id));

                    }

            }

			/* else if($event_json->type=='plan.created'){
				
				
				
			}
			
			else if($event_json->type=='plan.deleted'){
				
				
				
			}
			
			else if($event_json->type=='plan.updated'){
				
				
				
			} */

			
 }

        

        



        http_response_code(200);

    }



    

}    