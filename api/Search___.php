<?php  
require APPPATH . 'libraries/REST_Controller.php';
     
class Search extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct($config = 'rest') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Credentials: true');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
       parent::__construct();
       $this->load->database();
    }

    public function search_product_get()
	{
        echo $qstring = $_REQUEST['qstring'].'####';
        if($qstring !== ''){
            $this->db->select('a.*');
            $this->db->from('products a');
            $this->db->like('product_name', $qstring);
            $this->db->order_by('a.id', 'DESC');
            $query = $this->db->get();
            $data = $query->result();
        }
        //$this->response($data, REST_Controller::HTTP_OK);
    }
    	
}