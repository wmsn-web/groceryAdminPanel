<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shippingaddressuser extends CI_Model {

    public function __construct() {
        parent::__construct();
        
        // Load the database library
        $this->load->database();
        
        $this->shipping_addressTbl = 'shipping_address';
        $this->shipping_Tbl = 'shipping_table';
    }

    /*
     * Get rows from the shipping_address table
     */
    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->shipping_addressTbl);
        $this->db->where('user_id',$params);
       // echo $this->db->last_query();
        //$cnt = $this->db->count_all_results();
        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->result_array():false;

        //return fetched data
        return $result;
    }
    /*
     * Get rows from the shipping_address table
     */
    function getSingleRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->shipping_addressTbl);
        $this->db->where('shipping_address_id',$params);
       // echo $this->db->last_query();
        //$cnt = $this->db->count_all_results();
        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->result_array():false;

        //return fetched data
        return $result;
    }
    /*
     * Insert user data
     */
    public function insert($data){        
        //insert user data to shipping_address table
        $insert = $this->db->insert($this->shipping_addressTbl, $data);
        
        //return the status
        return $insert?$this->db->insert_id():false;
    }
    
    /*
     * Update user data
     */
    public function update($data, $id){        
        //update user data in shipping_address table
        $update = $this->db->update($this->shipping_addressTbl, $data, array('shipping_address_id'=>$id));
        
        //return the status
        return $update?true:false;
    }
    
    /*
     * Delete user data
     */
    public function delete($id){
        //update user from shipping_address table
        $delete = $this->db->delete($this->shipping_addressTbl,array('shipping_address_id'=>$id));
        //return the status
        return $delete?true:false;
    }

}