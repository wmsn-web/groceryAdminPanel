<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class Authentication extends REST_Controller {

    public function __construct($config = 'rest') { 
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Credentials: true');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct($config);
        // Load the user model
        $this->load->model('user');
    }
    
    public function index_options() {
        return $this->response(NULL, REST_Controller::HTTP_OK);
    }

    public function login_post() {
        // Get the post data
        $email = $this->post('email');
        $password = $this->post('password');
        
        // Validate the post data
        if(!empty($email) && !empty($password)){
            
            // Check if any user exists with the given credentials
            $con['returnType'] = 'single';
            $con['conditions'] = array(
                'email' => $email,
                'password' => md5($password),
                'verification_status' => '1'
            );
            $user = $this->user->getRows($con);
            
            if($user){
                // Set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'User login successful.',
                    'data' => $user
                ], REST_Controller::HTTP_OK);
            }else{
                // Set the response and exit
                //BAD_REQUEST (400) being the HTTP response code
                $this->response("Wrong email or password.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            // Set the response and exit
            $this->response("Provide email and password.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
	public function facebookgooglesignup_post() {
        // Get the post data
        $logintype = strip_tags($this->post('login_type'));
        $full_name = strip_tags($this->post('full_name'));
        $email = strip_tags($this->post('email'));
        $login_id = $this->post('login_id'); 
        $profileimage= strip_tags($this->post('profileimage'));
        $referral_code = uniqid();

               
        // Validate the post data
        if(!empty($full_name) && !empty($email) && !empty($login_id)){
            
            // Check if the given email already exists
            $con['returnType'] = 'count';
            $con['conditions'] = array(
                'email' => $email,
            );
            $userCount = $this->user->getRows($con);
            
            if($userCount > 0){
            $con['returnType'] = 'single';
            $con['conditions'] = array(
                'email' => $email,
                'login_id' => $login_id,
                'verification_status' => '1'
            );
            $user = $this->user->getRows($con);
            
            if($user){
                // Set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'User login successful.',
                    'data' => $user
                ], REST_Controller::HTTP_OK);
            }else{
                
                $this->response("The given email already exists with password.", REST_Controller::HTTP_BAD_REQUEST);
                }
                
            }else{
                // Insert user data
                $userData = array(
                    'full_name' => $full_name,
                    'email' => $email, 
                    'login_id' => $login_id,
                    'referral_code' => $referral_code,
                    'logintype' => $logintype,
                    'profileimage' => $profileimage,
                    'verification_status' => '1'
                );
                $insert = $this->user->insert($userData);
                
                // Check if the user data is inserted
                if($insert){
                    
            $con['returnType'] = 'single';
            $con['conditions'] = array(
                'email' => $email,
                'login_id' => $login_id,
                'verification_status' => '1'
            );
            $user = $this->user->getRows($con);
            
            if($user){
                // Set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'User login successful.',
                    'data' => $user
                ], REST_Controller::HTTP_OK);
            }else{
                
                $this->response("Wrong email or password.", REST_Controller::HTTP_BAD_REQUEST);
                }  
                }else{
                    // Set the response and exit
                    $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        }else{
            // Set the response and exit
            $this->response("Provide complete user info to add.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
	
    public function registration_post() {
        // Get the post data
        $full_name = strip_tags($this->post('full_name'));
        $email = strip_tags($this->post('email'));
        $password = $this->post('password');
        $phone = strip_tags($this->post('phone'));
        $referral_code = uniqid();
        $referral_code_parent = strip_tags($this->post('referral_code_parent'));
        if( $referral_code_parent==""){
             $referral_code_parent = "NA";
        }
        $this->db->select('amount');
        $this->db->from('referral_setting'); 
        $wherex = array(
          'id' => '2'
        );
        $this->db->where($wherex); 
        $queryr = $this->db->get(); 
        $regbalance = $queryr->row()->amount;

        $this->db->select('id');
        $this->db->from('users'); 
        $where = array(
          'referral_code' => $referral_code_parent 
        );
        $this->db->where($where); 
        $queryf = $this->db->get(); 
        $queryf->num_rows();
       if($referral_code_parent!="NA"){
        if ( $queryf->num_rows() > 0   ){
              $userid = $queryf->row()->id ;

             } else{
              
                echo '[{"message":"The Referral code does not exists."}]';
             die();
        }       
    }else{
          $userid="";
    }
        // Validate the post data
        if(!empty($full_name) && !empty($email) && !empty($password)){
            
            // Check if the given email already exists
            $con['returnType'] = 'count';
            $con['conditions'] = array(
                'email' => $email,
            );
            $userCount = $this->user->getRows($con);
            
            if($userCount > 0){
                // Set the response and exit
                $this->response("The given email already exists.", REST_Controller::HTTP_BAD_REQUEST); 
            }else{
                // Insert user data
                $userData = array(
                    'full_name' => $full_name,
                    'email' => $email,
                    'password' => md5($password),
                    'phone' => $phone,
                    'referral_code' => $referral_code,
                    'referral_code_parent' => $referral_code_parent
                );
                $insert = $this->user->insert($userData);
                
                // Check if the user data is inserted
                if($insert){
                    // Set the response and exit


        

                    $this->response([
                        'status' => TRUE,
                        'message' => 'The user has been added successfully.',
                        'data' => $insert
                    ], REST_Controller::HTTP_OK);
                }else{
                    // Set the response and exit
                    $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        }else{
            // Set the response and exit
            $this->response("Provide complete user info to add.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    public function user_get($id = 0) {
        // Returns all the users data if the id not specified,
        // Otherwise, a single user will be returned.
        $con = $id?array('id' => $id):'';
        $users = $this->user->getRows($con);
        
        // Check if the user data exists
        if(!empty($users)){
            // Set the response and exit
            //OK (200) being the HTTP response code
            $this->response($users, REST_Controller::HTTP_OK);
        }else{
            // Set the response and exit
            //NOT_FOUND (404) being the HTTP response code
            $this->response([
                'status' => FALSE,
                'message' => 'No user was found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    public function user_put() {
        $id = $this->put('id');
        
        // Get the post data
        $first_name = strip_tags($this->put('first_name'));
        $last_name = strip_tags($this->put('last_name'));
        $email = strip_tags($this->put('email'));
        $password = $this->put('password');
        $phone = strip_tags($this->put('phone'));
        
        // Validate the post data
        if(!empty($id) && (!empty($first_name) || !empty($last_name) || !empty($email) || !empty($password) || !empty($phone))){
            // Update user's account data
            $userData = array();
            if(!empty($first_name)){
                $userData['first_name'] = $first_name;
            }
            if(!empty($last_name)){
                $userData['last_name'] = $last_name;
            }
            if(!empty($email)){
                $userData['email'] = $email;
            }
            if(!empty($password)){
                $userData['password'] = md5($password);
            }
            if(!empty($phone)){
                $userData['phone'] = $phone;
            }
            $update = $this->user->update($userData, $id);
            
            // Check if the user data is updated
            if($update){
                // Set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'The user info has been updated successfully.'
                ], REST_Controller::HTTP_OK);
            }else{
                // Set the response and exit
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            // Set the response and exit
            $this->response("Provide at least one user info to update.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function Forgotpass_post($phone = 0) {
        $phone = strip_tags($this->post('phone'));
        $otppass = $this->generateNumericOTP(4);
        $this->db->select('id');
        $this->db->from('users'); 
        $where = array(
          'phone' => $phone 
        );
        $this->db->where($where); 
        $queryu = $this->db->get(); 
        $user_id = $queryu->row()->id;

        $sms = $this->db->get("sms_set")->row();
        $smsUser= $sms->sms_user;
        $smsPass = $sms->sms_pass;
        $sender= $sms->sender;

        

         
        $message = "Your OPT is ".$otppass." for BuyMeNow Password Reset , Please do not share it with anyone.";

        $url="https://www.bulksmsgateway.in/sendmessage.php?user=".urlencode($smsUser)."&password=".urlencode($smsPass)."&mobile=".urlencode( $phone )."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3'); 
           $ch = curl_init($url);

           /*curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $curl_scraped_page = curl_exec($ch);

            curl_close($ch);*/
          $response = $this->get_web_page( $url);
        $resArr = array();
        $resArr = json_decode($response);
        //echo "<pre>"; print_r($resArr); echo "</pre>";


        if($user_id > 0){
           $this->response([
                    'status' => TRUE,
                    'message' => 'SMS SENT',
                    'OTP' =>  $otppass 
                ], REST_Controller::HTTP_OK);

       $dataupdate = [
        'passcode' => $otppass 
        ];

$this->db->where('id', $user_id);
$this->db->update('users',$dataupdate)  ;
        }



    }
    public function ChangePass_post($pass = 0,$otp=0) {
        $newpass = strip_tags($this->post('password'));
        $otp= strip_tags($this->post('otp')); 

        $this->db->select('id');
        $this->db->from('users'); 
        $where = array(
          'passcode' => $otp
        );
        $this->db->where($where); 
        $queryu = $this->db->get(); 
        $user_id = $queryu->row()->id;
        if($user_id > 0){
           $this->response([
                    'status' => TRUE,
                    'message' => 'Password Changed successfully' 
                ], REST_Controller::HTTP_OK);

       $dataupdate = [
        'password' => md5($newpass) 
        ];

$this->db->where('id', $user_id);
$this->db->update('users',$dataupdate)  ;
        }else{
            $this->response([
                    'status' => FALSE,
                    'message' => 'Invalid OTP'
                ], REST_Controller::HTTP_OK); 
        }



    }
    public function generateNumericOTP($n) {  
   
    $generator = "1357902468";  
  
    $result = ""; 
  
    for ($i = 1; $i <= $n; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    }  
     
    return $result; 
} 
function get_web_page($url) {
    $options = array(
        CURLOPT_RETURNTRANSFER => true,   // return web page
        CURLOPT_HEADER         => false,  // don't return headers
        CURLOPT_FOLLOWLOCATION => true,   // follow redirects
        CURLOPT_MAXREDIRS      => 100,     // stop after 10 redirects
        CURLOPT_ENCODING       => "",     // handle compressed
        CURLOPT_USERAGENT      => "test", // name of client
        CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
        CURLOPT_TIMEOUT        => 120,    // time-out on response
    ); 

    $ch = curl_init($url);
    curl_setopt_array($ch, $options);

    $content  = curl_exec($ch);

    curl_close($ch);

    return $content;
}
}