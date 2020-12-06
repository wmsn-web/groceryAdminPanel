<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Carts extends CI_Model {

    public function __construct() {
        parent::__construct();
        
        // Load the database library
        $this->load->database();
        
        $this->cartTbl = 'cart';
    }

    /*
     * Get rows from the users table
     */
    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('cart');
        $this->db->where('user_id',$params);
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
        //insert user data to users table
        $insert = $this->db->insert($this->cartTbl, $data);
        
        //return the status
        return $insert?$this->db->insert_id():false;
    }
    
    /*
     * Update user data
     */
    public function update($data, $id){        
        //update user data in users table
        $update = $this->db->update($this->cartTbl, $data, array('cart_id'=>$id));
        
        //return the status
        return $update?true:false;
    }
    
    /*
     * Delete user data
     */
    public function delete($id){
        //update user from users table
        $delete = $this->db->delete($this->cartTbl,array('cart_id'=>$id));
        //return the status
        return $delete?true:false;
    }

}