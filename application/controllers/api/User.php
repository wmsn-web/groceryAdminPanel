<?php
require APPPATH . 'libraries/REST_Controller.php';
     
class User extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
          header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Credentials: true');
 
        header("Access-Control-Allow-Headers: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
       parent::__construct();
       $this->load->database();

    }
       
    public function index_options() {
        return $this->response(NULL, REST_Controller::HTTP_OK);
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($id = 0, $limit = 0)
	{   
        $id = $this->uri->segment(3); 
        if(!empty($id)){
            if(!empty($limit)){
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('a.*');
                $this->db->from('users a');
                $this->db->where('a.id', $id);
                $this->db->order_by('a.id', 'DESC');
                $this->db->limit($limit);
                $query = $this->db->get();
                $data = $query->result();
            } else {
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('a.*');
                $this->db->from('users a');
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
                $this->db->from('users a');
                $this->db->order_by('a.id', 'DESC');
                $this->db->limit($limit);
                $query = $this->db->get();
                $data = $query->result();
            } else {
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('a.*');
                $this->db->from('users a');
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
    public function updateuserprofileimage_post( )
    {
     $this->input->raw_input_stream;
     $input_data = json_decode($this->input->raw_input_stream, true);
     foreach($input_data as $val){

      $userData = array();
      $Uid =    $val['uid'];
      $img =    $val['profileimage'];
      $pimg = uniqid() . '.png';
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $file = './uploads/profileimage/' . $pimg;
    $success = file_put_contents($file, $data);
    $userData['profileimage'] = 'https://buymenow.app/uploads/profileimage/' . $pimg;
    $userData['modified'] = date("Y-m-d H:i:s");    
       $update =  $this->db->update( 'users', $userData, array('id'=> $Uid ));
        if($update){
             $this->response([
                'profileimage' => 'https://buymenow.app/uploads/profileimage/'.$pimg,
                'message' => 'Profile image updated successfully.'
            ], REST_Controller::HTTP_OK);
 
                }else{
   $this->response(['Nothing is updated.'], REST_Controller::HTTP_OK);                  
                }
     }

    }
    public function MyDeviceID_post(){
        $this->input->raw_input_stream;
        $input_data = json_decode($this->input->raw_input_stream, true);
        $userData = array();
        $Uid =    $input_data[0]['uid'];
        $userData['deviceid'] = $input_data[0]['deviceid'];
        $update =  $this->db->update( 'users', $userData, array('id'=> $Uid ));

                if($update){
                $this->response(['success' => true ], REST_Controller::HTTP_OK);
                
                }else{
                 echo '[]';                  
                }  

    }  
    public function updateuser_post( )
    {
        $this->input->raw_input_stream;
        $input_data = json_decode($this->input->raw_input_stream, true);

        foreach($input_data as $val){
         
                $userData = array();

                $Uid =    $val['uid'];
                $userData['full_name'] = $val['full_name'];
            
                $userData['password'] =md5($val['password']);
            
                $userData['username'] = $val['username'];
            
                $userData['referral_code'] = $val['referral_code'];
             
                $userData['phone'] = $val['phone'];  

                $userData['modified'] = date("Y-m-d H:i:s");
 
                $update =  $this->db->update( 'users', $userData, array('id'=> $Uid ));

                if($update){
 $this->response(['User updated successfully.'], REST_Controller::HTTP_OK);
                }else{
   $this->response(['Nothing is updated.'], REST_Controller::HTTP_OK);                  
                }
        }
        
             
       
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

    public function Myreferral_get()
    {   

        $userID = $this->uri->segment(3);

        $this->db->select('referral_code');
        $this->db->from('users'); 
        $where = array(
          'id' => $userID 
        );
        $this->db->where($where); 
        $queryf = $this->db->get(); 

        $this->db->select('amount');
        $this->db->from('referral_setting'); 
        $wherex = array(
          'id' => '2'
        );
        $this->db->where($wherex); 
        $queryr = $this->db->get(); 
        $regbalance = $queryr->row()->amount; 
 
        $response_arr[] = ['referral_code' => $queryf->row()->referral_code, 'referral_amount'=> $regbalance];
        $this->response($response_arr, REST_Controller::HTTP_OK);
    }
    public function Mywallet_get($id){
                $userID = $this->uri->segment(3);
                $this->db->select('a.*,b.full_name,b.email');
                $this->db->from('wallet a');
                $this->db->join('users b', 'b.id=a.user_id', 'left');
                $this->db->where('user_id', $userID);
                $this->db->order_by('id', 'DESC');
                $query = $this->db->get();
                $data = $query->result();
            
     
        $this->response($data, REST_Controller::HTTP_OK);

    }
    	
}