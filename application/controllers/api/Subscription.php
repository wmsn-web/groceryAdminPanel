<?php  
require APPPATH . 'libraries/REST_Controller.php';
     
class Subscription extends REST_Controller {
    
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
       $this->load->model('subscriptions');
    }
    public function index_options() {
        return $this->response(NULL, REST_Controller::HTTP_OK);
    }


    public function SubscriptionlistUser_get($userID=0)
	{
        //echo $userID;
        $subscriptionItems = $this->subscriptions->getRows($userID);
        if($subscriptionItems>0){
            $this->response($subscriptionItems, REST_Controller::HTTP_OK);
          } else {
              echo '[]'; 
          }
    }
     public function Subscriptionlist_get($userID=0)
	{
        //echo $userID;
        $subscriptionItems = $this->subscriptions->getMembership($userID);
        if($subscriptionItems>0){
            $this->response($subscriptionItems, REST_Controller::HTTP_OK);
          } else {
              echo '[]'; 
          }
    }
    public function addtoSubscription_post()
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
        $SID = $val['SID'];
        $userID = $val['userID'];
        $txnId = $val['txn_id'];

        $this->db->select('*');
        $this->db->from('mem_plan'); 
        $wherex = array(
          'id' => $SID
        );
        $this->db->where($wherex); 
        $queryr = $this->db->get(); 
        $nextmonth = $queryr->row()->duration;
        $amount = $queryr->row()->price;
 
         
 
            if($SID !== '' && $userID !== ''){
                $subscriptionData = array(
                    'sid' => $SID,
                    'user_id' => $userID,
                    'datefrom' => date("Y-m-d"),
                    'dateto'=> date("Y-m-d",strtotime("+ ".$nextmonth." day")),
                    'duration'=>$nextmonth,
                    'txn_id'    =>$txnId,
                    'payment_status' =>'Paid',
                    'amount' => $amount,
                    'status'=>1
                );
                $insert = $this->subscriptions->insert($subscriptionData);
                $response_arr[] = ['status' => TRUE, 'message' => 'Added to subscription successfully.'];
            } else {
                $response_arr[] = ['status' => FALSE, 'message' => 'Not added to subscription.'];
            }
        
            $this->response($response_arr, REST_Controller::HTTP_OK);
        }
    }

    public function updateSubscription_put()
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
            $subscriptionID = $val['subscriptionID'];
            $productID = $val['productID'];
            $userID = $val['userID'];
            //echo $productID.'####'.$userID;

            // Insert user data
            if($subscriptionID!== '' && $userID !== ''){
                $subscriptionData = array();
                $subscriptionData['product_id'] = $productID;
            
                $subscriptionData['user_id'] = $userID;
                
                $update = $this->subscriptions->update($subscriptionData, $subscriptionID);

                if($update){
                    // Set the response and exit
                    $response_arr[] = ['status' => TRUE, 'message' => 'subscription updated successfully.'];
                    // $this->response([
                    //     'status' => TRUE,
                    //     'message' => 'Cart updated successfully.'
                    // ], REST_Controller::HTTP_OK);
                }else{
                    // Set the response and exit
                    $response_arr[] = ['status' => FALSE, 'message' => 'subscription not updated.'];
                    //$this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
                }
            } else {
                $response_arr[] = ['status' => FALSE, 'message' => 'subscription not updated.'];
            }
            //$this->response($return, REST_Controller::HTTP_OK);
        }

        $this->response($response_arr, REST_Controller::HTTP_OK);
    }

    public function deletefromSubscription_delete($subscriptionID){
        $subscriptionID = $this->uri->segment(4);
        $delete = $this->subscriptions->delete($subscriptionID);
        $this->response('Deleted', REST_Controller::HTTP_OK);
    }
    public function Membershiplist_get($memID="")
    {
        $MembershiplistItems = $this->subscriptions->getMembership($memID);
        $this->response($MembershiplistItems, REST_Controller::HTTP_OK);
    }
}