<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subscriptions extends CI_Model {  

    public function __construct() {
        parent::__construct();
        
        // Load the database library
        $this->load->database();
        
        $this->subscriptionTbl = 'subscription';
    }

    /*
     * Get rows from the users table
     */
    function getRows($params = array()){
        $this->db->select('a.*, b.* ');
        $this->db->from($this->subscriptionTbl." a");
         $this->db->join('mem_plan b', 'b.id=a.sid', 'left');
        $this->db->where('a.user_id',$params);
       // echo $this->db->last_query();
        //$cnt = $this->db->count_all_results();
        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->result_array():false;

        //return fetched data
        return $result;
    }

    public function getMembership($data)
    {
        $this->db->select('*');
        $this->db->from( "mem_plan"); 
        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->result_array():false;

        //return fetched data
        return $result;   
    }
    /*
     * Insert user data
     */
    public function insert($data){        
        //insert user data to users table
        $insert = $this->db->insert($this->subscriptionTbl, $data);
        
        //return the status
        return $insert?$this->db->insert_id():false;
    }
    
    /*
     * Update user data
     */
    public function update($data, $id){        
        //update user data in users table
        $update = $this->db->update($this->subscriptionTbl, $data, array('id'=>$id));
        
        //return the status
        return $update?true:false;
    }
    
    /*
     * Delete user data
     */
    public function delete($id){
        //update user from users table
        $delete = $this->db->delete($this->subscriptionTbl,array('id'=>$id));
        //return the status
        return $delete?true:false;
    }

}