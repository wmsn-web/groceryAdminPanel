<?php  
require APPPATH . 'libraries/REST_Controller.php';

class ShippingAddress extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct($config = 'rest') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Credentials: true');
     //   header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
       parent::__construct();
       $this->load->model('shippingaddressuser');

    }

    public function index_options() {
        return $this->response(NULL, REST_Controller::HTTP_OK);
    }

    public function itemsShipping_get($user_ID=0)
	{
         
         
        $addrItems = $this->shippingaddressuser->getRows($user_ID);
        if($addrItems>0){ 

            $this->response(["AddressList" => $addrItems ], REST_Controller::HTTP_OK);
        } else {
            echo '[]' ; 
        }
    }
    public function itemssingleShipping_get($ship_id=0)
    {
         
         
        $addrItems = $this->shippingaddressuser->getSingleRows($ship_id);
        if($addrItems>0){ 

            $this->response(["AddressDetails" => $addrItems ], REST_Controller::HTTP_OK);
        } else {
            echo '[]' ; 
        }
    }
    public function addtoShipping_post()
	{
        //$cartdata = json_decode($request);
        $this->input->raw_input_stream;
        $input_data = json_decode($this->input->raw_input_stream, true);
        // echo '<pre>';
        // print_r($input_data);
        // echo '</pre>';
        // die();

        $response_arr = array();
        foreach($input_data as $val){
            $user_id = $val['user_id'];
            $full_name = $val['full_name'];
            $phone = $val['phone'];
            $address = $val['address'];
            $city = $val['city'];
            $pin = $val['pin'];
            $nearby_location = $val['nearby_location'];
            
            if($productID !== '' && $userID !== ''){
                $cartData = array(
                    'user_id' => $user_id,
                    'full_name' => $full_name,
                    'phone' => $phone,
                    'address' => $address,
                    'city' => $city,
                    'pin' => $pin,
                    'nearby_location' => $nearby_location 
                );
                $insert = $this->shippingaddressuser->insert($cartData);
                $response_arr[] = ['status' => TRUE, 'message' => 'Address added successfully.'];
            } else {
                $response_arr[] = ['status' => FALSE, 'message' => 'Not added Address.'];
            }
            $this->response($response_arr, REST_Controller::HTTP_OK);
        }
    }

     

    public function deletefromOrder_delete($shipID){
        $shipID = $this->uri->segment(4);
        $delete = $this->shippingaddressuser->delete($shipID);
        $this->response('Deleted', REST_Controller::HTTP_OK);
    }

     public function PolicyDetails_get($id= "0" , $table = "terms_condition"){
                $this->db->select(' * ');
                $this->db->from( $table); 
                if($id > 0){
                $this->db->where('id',  $id);
                 }
                $this->db->order_by('id', 'Asc');  
                $queryd = $this->db->get(); 
                
                $datass = $queryd->result();
                $this->response(  $datass  , REST_Controller::HTTP_OK);


     }
     public function FAQDetails_get($id="0"){
                $this->db->select(' * ');
                $this->db->from( 'faq'); 
                if($id > 0){
                $this->db->where('id',  $id);
                }
                $this->db->order_by('id', 'Asc');  
                $queryd = $this->db->get(); 
                
                $datass = $queryd->result();
                $this->response(  $datass  , REST_Controller::HTTP_OK);


     }
}