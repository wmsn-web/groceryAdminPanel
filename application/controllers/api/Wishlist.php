<?php  
require APPPATH . 'libraries/REST_Controller.php';
     
class Wishlist extends REST_Controller {
    
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
       $this->load->model('wishlists');
    }
    public function index_options() {
        return $this->response(NULL, REST_Controller::HTTP_OK);
    }


    public function itemsWishlist_get($userID=0)
	{
        //echo $userID;
        $wishlistItems = $this->wishlists->getRows($userID);
      if(@count($wishlistItems) > 1)  {
        $pro=0;
            foreach($wishlistItems as $prodata){
                $this->db->select('*');
                $this->db->from('various');
                $this->db->where('product_id',$prodata['product_code'] ); 
                $queryv = $this->db->get();
                $datav = $queryv->result(); 
                 $wishlistItems[$pro]['variations']  =   $datav;
            $pro++;}
        if($wishlistItems>0){
            $this->response($wishlistItems, REST_Controller::HTTP_OK);
          } else {
              echo '[]'; 
          }
      }else{
         echo '[]'; 
      }
    }

    public function addtoWishlist_post()
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
            $productID = $val['productID'];
            $userID = $val['userID'];

         
          
        $this->db->select('id');
        $this->db->from('wishlist'); 
        $where = array(
          'user_id' => $userID,
          'product_id'   =>  $productID
        );
        $this->db->where($where);
        
        $queryf = $this->db->get(); 
        
        if ($queryf->num_rows() > 0){
            $response_arr[] = ['status' => FALSE, 'message' => 'Already in Wishlist.'];
        }else{
 
            if($productID !== '' && $userID !== ''){
                $wishlistData = array(
                    'product_id' => $productID,
                    'user_id' => $userID
                );
                $insert = $this->wishlists->insert($wishlistData);
                $response_arr[] = ['status' => TRUE, 'message' => 'Added to wishlist successfully.'];
            } else {
                $response_arr[] = ['status' => FALSE, 'message' => 'Not added to wishlist.'];
            }
        }
            $this->response($response_arr, REST_Controller::HTTP_OK);
        }
    }

    public function updateWishlist_put()
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
            $wishlistID = $val['wishlistID'];
            $productID = $val['productID'];
            $userID = $val['userID'];
            //echo $productID.'####'.$userID;

            // Insert user data
            if($wishlistID!== '' && $userID !== ''){
                $wishlistData = array();
                $wishlistData['product_id'] = $productID;
            
                $wishlistData['user_id'] = $userID;
                
                $update = $this->wishlists->update($wishlistData, $wishlistID);

                if($update){
                    // Set the response and exit
                    $response_arr[] = ['status' => TRUE, 'message' => 'Wishlist updated successfully.'];
                    // $this->response([
                    //     'status' => TRUE,
                    //     'message' => 'Cart updated successfully.'
                    // ], REST_Controller::HTTP_OK);
                }else{
                    // Set the response and exit
                    $response_arr[] = ['status' => FALSE, 'message' => 'Wishlist not updated.'];
                    //$this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
                }
            } else {
                $response_arr[] = ['status' => FALSE, 'message' => 'Wishlist not updated.'];
            }
            //$this->response($return, REST_Controller::HTTP_OK);
        }

        $this->response($response_arr, REST_Controller::HTTP_OK);
    }

    public function deletefromWishlist_delete($wishlistID){
        $wishlistID = $this->uri->segment(4);
        $delete = $this->wishlists->delete($wishlistID);
        $this->response('Deleted', REST_Controller::HTTP_OK);
    }
}