<?php
require APPPATH . 'libraries/REST_Controller.php';
     
class User extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($id = 0, $limit = 0)
	{
        if(!empty($id)){
            if(!empty($limit)){
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('a.*');
                $this->db->from('products a');
                $this->db->where('a.id', $id);
                $this->db->order_by('a.id', 'DESC');
                $this->db->limit($limit);
                $query = $this->db->get();
                $data = $query->result();
            } else {
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('a.*');
                $this->db->from('products a');
                $this->db->where('a.id', $id);
                $this->db->order_by('a.id', 'DESC');
                $query = $this->db->get();
                $data = $query->result();
            }
        }else{
            //$data = $this->db->get("items")->result();
            if(!empty($limit)){
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('a.*');
                $this->db->from('products a');
                $this->db->order_by('a.id', 'DESC');
                $this->db->limit($limit);
                $query = $this->db->get();
                $data = $query->result();
            } else {
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('a.*');
                $this->db->from('products a');
                $this->db->order_by('a.id', 'DESC');
                $query = $this->db->get();
                $data = $query->result();
            }
        }
     
        $this->response($data, REST_Controller::HTTP_OK);
	}
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {
        $input = $this->input->post();
        $this->db->insert('users',$input);
     
        $this->response(['User created successfully.'], REST_Controller::HTTP_OK);
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($id, $verification_code = 0)
    {
        if(!empty($verification_code)){
            $data = $this->db->get_where("users", ['id' => $id, 'verification_code' => $verification_code])->row_array();
            //return $data;
            if(!empty($data)){
                $input = $this->put();
                $this->db->update('users', $input, array('id'=>$id));
                $msg = 'Item updated successfully.';
            } else {
                $msg = 'No data found';
            }
        } else {
            $input = $this->put();
            $this->db->update('users', $input, array('id'=>$id));
            $msg = 'Item updated successfully.';
        }
     
        $this->response([$msg], REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        $this->db->delete('items', array('id'=>$id));
       
        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
    }
    	
}