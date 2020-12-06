<?php  
require APPPATH . 'libraries/REST_Controller.php';
     
class Product extends REST_Controller {
    
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
                //$this->db->order_by('a.id', 'DESC');
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
     * Get All Offers from this method.
     *
     * @return Response
    */

    public function offers_get($status = 0, $limit = 0)
	{
        
        if(!empty($status)){
            if(!empty($limit)){
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('*');
                $this->db->from('offers a');
                $this->db->join('category b', 'b.id = a.offer_category'); 
                $this->db->where('a.offer_status', '1');
                $this->db->order_by('a.offer_id', 'DESC');
                $this->db->limit($limit);
                $query = $this->db->get();
                $data = $query->result();
            } else {
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('*');
                $this->db->from('offers a');
                $this->db->join('category b', 'b.id = a.offer_category'); 
                $this->db->where('a.offer_status', '1');
                $this->db->order_by('a.offer_id', 'DESC');
                $query = $this->db->get();
                $data = $query->result();
            }
        }else{
            //$data = $this->db->get("items")->result();
            if(!empty($limit)){
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('*');
                $this->db->from('offers a');
                $this->db->join('category b', 'b.id = a.offer_category'); 
                $this->db->order_by('a.offer_id', 'DESC');
                $this->db->limit($limit);
                $query = $this->db->get();
                $data = $query->result();
            } else {
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('*');
                $this->db->from('offers a');
                $this->db->join('category b', 'b.id = a.offer_category'); 
                $this->db->order_by('a.offer_id', 'DESC');
                $query = $this->db->get();
                $data = $query->result();
            }
        }
     
        $this->response($data, REST_Controller::HTTP_OK);
    }
    
    /**
     * Get Products from a category by this method.
     *
     * @return Response
    */

    public function category_products_get($cat = 0, $limit = 0)
	{
        
        if(!empty($cat)){
            if(!empty($limit)){
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('a.*');
                $this->db->from('products a');
                $this->db->where('a.cat_id', $cat);
                $this->db->order_by('a.id', 'DESC');
                $this->db->limit($limit);
                $query = $this->db->get();
                $data = $query->result();
            } else {
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('a.*');
                $this->db->from('products a');
                $this->db->where('a.cat_id', $cat);
                $this->db->order_by('a.id', 'DESC');
                $query = $this->db->get();
                $data = $query->result();
            }
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            $this->response("Please provide a category id.", REST_Controller::HTTP_BAD_REQUEST);
        }
        
    }
    
    public function allCategory_get()
	{
        
        $this->db->select('a.*');
        $this->db->from('category a');
        $this->db->order_by('a.id', 'ASC');
        $query = $this->db->get();
        $data = $query->result();
        $this->response($data, REST_Controller::HTTP_OK);
        
    }
    
    public function searchproduct_post()
	{
        $qstring = strip_tags($this->post('qstring'));
        if($qstring !== ''){
            $this->db->select('a.*');
            $this->db->from('products a');
            $this->db->like('product_name', $qstring);
            $this->db->order_by('a.id', 'DESC');
            $query = $this->db->get();
            $data = $query->result();
        }

        $cnt = count($data);
        //if($cnt>0){
            $this->response($data, REST_Controller::HTTP_OK);
        // } else {
        //     $response_arr = array();
        //     $response_arr[] = [];
        //     $this->response('No result found', REST_Controller::HTTP_OK);
        // }
    }
}