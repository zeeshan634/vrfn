<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_model extends CI_Model{
    
    function __construct() {

        parent::__construct();	

    }    
	public function get_members()
    {		

        $sql="SELECT * FROM members";
        $sql .= " order by MemberID DESC";
        $query = $this->db->query($sql);
        return $query->result_array();

	}
    public function get_single($id){
    $query = $this->db->query("SELECT members.*,cities.id as CityId,cities.name as CityName,countries.id as CountryId,countries.name as CountryName,states.id as StateId,states.name as StateName FROM `members`
                                 LEFT join countries on members.MemberCountry=countries.id 
                                 LEFT join states on members.MemberState=states.id 
                                 LEFT JOIN cities on members.MemberCity=cities.id  
                                 WHERE MemberID='".$id."'");
		if($query->num_rows() > 0)
        {
	       	return $query->result_array();
        }
       else
       {
            return false;
       }

	}
}