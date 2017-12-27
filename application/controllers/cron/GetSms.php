<?php defined('BASEPATH') OR exit('No direct script access allowed');

class GetSms extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
    }
    public function index($page_num=""){
		
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