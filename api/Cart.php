<?php  
require APPPATH . 'libraries/REST_Controller.php';
     
class Cart extends REST_Controller {
    
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
       $this->load->model('carts');
    }

    public function itemsCart_get($userID=0)
	{
        //echo $userID;
        $cartItems = $this->carts->getRows($userID);
        if($cartItems>0){
            $this->response($cartItems, REST_Controller::HTTP_OK);
        } else {
            $this->response('Empty', REST_Controller::HTTP_OK); 
        }
    }

    public function addtoCart_post()
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
            $catID = $val['catID'];
            $qty = $val['qty'];
            $price = $val['price'];
            $date = $val['date'];
            //echo $productID.'####'.$userID;

            // Insert user data
            if($productID !== '' && $userID !== ''){
                $cartData = array(
                    'product_id' => $productID,
                    'user_id' => $userID,
                    'cat_id' => $catID,
                    'qty' => $qty,
                    'price' => $price,
                    'date' => $date,
                    'status' => '1',
                    'modified' => date("Y-m-d H:i:s")
                );
                $insert = $this->carts->insert($cartData);
                $response_arr[] = ['status' => TRUE, 'message' => 'Added to cart successfully.'];
            } else {
                $response_arr[] = ['status' => FALSE, 'message' => 'Not added to cart.'];
            }
            $this->response($response_arr, REST_Controller::HTTP_OK);
        }
    }

    public function updateCart_put()
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
            $cartID = $val['cartID'];
            $productID = $val['productID'];
            $userID = $val['userID'];
            $catID = $val['catID'];
            $qty = $val['qty'];
            $price = $val['price'];
            $date = $val['date'];
            //echo $productID.'####'.$userID;

            // Insert user data
            if($cartID!== '' && $userID !== ''){
                $cartData = array();
                $cartData['product_id'] = $productID;
            
                $cartData['user_id'] = $userID;
            
                $cartData['cat_id'] = $catID;
            
                $cartData['qty'] = $qty;
            
                $cartData['price'] = $price;

                $cartData['date'] = $date;

                $cartData['status'] = '1';
                
                $update = $this->carts->update($cartData, $cartID);

                if($update){
                    // Set the response and exit
                    $response_arr[] = ['status' => TRUE, 'message' => 'Cart updated successfully.'];
                    // $this->response([
                    //     'status' => TRUE,
                    //     'message' => 'Cart updated successfully.'
                    // ], REST_Controller::HTTP_OK);
                }else{
                    // Set the response and exit
                    $response_arr[] = ['status' => FALSE, 'message' => 'Cart not updated.'];
                    //$this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
                }
            } else {
                $response_arr[] = ['status' => FALSE, 'message' => 'Cart not updated.'];
            }
            //$this->response($return, REST_Controller::HTTP_OK);
        }

        $this->response($response_arr, REST_Controller::HTTP_OK);
    }

    public function deletefromCart_delete($cartID){
            $delete = $this->carts->delete($cartID);
            $this->response('Deleted', REST_Controller::HTTP_OK);
    }
}