<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('check_cookie_login'))
{
    function check_cookie_login(){
     $ci =& get_instance(); 
     $ci->load->database();
     $ci->load->helper('cookie');   
     $ci->load->library('session');
    $rem_email=get_cookie('rem_email');
    $rem_pass=get_cookie('rem_pass');            
             if(isset($rem_email) && isset($rem_pass))
             {
                
                   $ci -> db -> select('MemberID,MemberEmail,MemberFname,MemberLname,MemberGender,MemberStatus,EmailStatus');
            	   $ci -> db -> from('members');
            	   $ci -> db -> where('MemberEmail', $rem_email);
            	   $ci -> db -> where('MemberPassword', MD5($rem_pass));
            	   $ci -> db -> limit(1);
            	   $query = $ci->db->get();
                   
                    if($query -> num_rows() >= 1)
                    {
            			$sess_data = $query->result();
            			$sess_data = $sess_data[0];	
                       
            			if($sess_data->EmailStatus != 'Approved')
                        {			  	         
                           return false;
            			}
                        if($sess_data->MemberStatus == 'Inactive')
                        {			  	         
                           return false;
            			}
                        
                        $ci->session->set_userdata(array('member'=>$sess_data));
            			$data_array = array('MemberLastLogin'=> date('Y-m-d H:i:s'));		
            			$ci->db->update('members', $data_array,array('MemberEmail'=>$rem_email));
                        
                        $cookie = array(
                            'name'   => 'rem_email',
                            'value'  =>  $rem_email,
                            'expire' => '1209600' 
                        );    
                        set_cookie($cookie);
                        
                        $cookie_p = array(
                            'name'   => 'rem_pass',
                            'value'  =>  $rem_pass,
                            'expire' =>  '1209600'
                        );    
                        set_cookie($cookie_p);	
                        return true;  
                        
                   }     
                   
                   
             }
             else
             {
                return false;
             }
    
    }
}




if ( ! function_exists('get_category_name')){
   function get_category_name($cat_id){
       //get main CodeIgniter object
       $ci =& get_instance();
       
       //load databse library
       $ci->load->database();
       
       //get data from database
       $query = $ci->db->get_where('catagories',array('CatagoryId'=>$cat_id));
       
       if($query->num_rows() > 0){
           $result = $query->row_array();
           return $result;
       }else{
           return false;
       }
   }
}

if ( ! function_exists('getSubCategory')){
   function getSubCategory($cat_id){
       //get main CodeIgniter object
       $ci =& get_instance();
       
       //load databse library
       $ci->load->database();
       
       //get data from database
       $query = $ci->db->get_where('catagories',array('CatagoryParentId'=>$cat_id));
       
       if($query->num_rows() > 0){
           $result = $query->result_array();
           return $result;
       }else{
           return false;
       }
   }
}

// Users Commen Helper //

if ( ! function_exists('getCategoryForUsers')){
   function getCategoryForUsers(){
       //get main CodeIgniter object
       $ci =& get_instance();
       
       //load databse library
       $ci->load->database();
       
       //get data from database
       $query = $ci->db->get_where('catagories',array('CatagoryParentId'=>0,'CatagoryStatus'=>1));
       
       if($query->num_rows() > 0){
           $result = $query->result_array();
           return $result;
       }else{
           return false;
       }
   }
}


if ( ! function_exists('getSubCategoryForUsers')){
   function getSubCategoryForUsers($cat_id){
       //get main CodeIgniter object
       $ci =& get_instance();
       
       //load databse library
       $ci->load->database();
       
       //get data from database
       $query = $ci->db->get_where('catagories',array('CatagoryParentId'=>$cat_id,'CatagoryStatus'=>1));
       
       if($query->num_rows() > 0){
           $result = $query->result_array();
           return $result;
       }else{
           return false;
       }
   }
}
if ( ! function_exists('getQuestionOptions')){
   function getQuestionOptions($qid){
       //get main CodeIgniter object
       $ci =& get_instance();
       
       //load databse library
       $ci->load->database();
       
       //get data from database
       $query = $ci->db->get_where('quetion_options',array('QuestionId'=>$qid));
       
       if($query->num_rows() > 0){
           $result = $query->result_array();
           return $result;
       }else{
           return false;
       }
   }
}
if ( ! function_exists('getSQuestionOptions')){
   function getSQuestionOptions($qid){
       //get main CodeIgniter object
       $ci =& get_instance();
       
       //load databse library
       $ci->load->database();
       
       //get data from database
       $query = $ci->db->get_where('suggest_quetion_options',array('SQuestionId'=>$qid));
       
       if($query->num_rows() > 0){
           $result = $query->result_array();
           return $result;
       }else{
           return false;
       }
   }
}
if ( ! function_exists('getQuestionOptionsWithAnswer')){
   function getQuestionOptionsWithAnswer($qid){
       //get main CodeIgniter object
       $ci =& get_instance();
       
       //load databse library
       $ci->load->database();
       
       //get data from database
       $query = $ci->db->query('SELECT quetion_options.*,count(answers.AnswerValue) as UserAnswers FROM `quetion_options`
                                LEFT join answers on quetion_options.QoId=answers.AnswerValue and quetion_options.QuestionId=answers.QuestionId
                                where quetion_options.QuestionId='.$qid.'
                                GROUP by quetion_options.QoId
                                ORDER by UserAnswers DESC');
       
       if($query->num_rows() > 0){
           $result = $query->result_array();
           return $result;
       }else{
           return false;
       }
   }
}
if ( ! function_exists('CheckMates')){
   function CheckMates($userid1,$userid2){
       //get main CodeIgniter object
       $ci =& get_instance();
       
       //load databse library
       $ci->load->database();
       
       //get data from database
       $query = $ci->db->query('SELECT * FROM `mates` WHERE (MUserId='.$userid1.' and FriendId='.$userid2.') or (MUserId='.$userid2.' and FriendId='.$userid1.')');
       return $query->result_array();
       
   }
}
?>