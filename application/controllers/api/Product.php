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
//        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Headers: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

        parent::__construct();
       $this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_options() {
        return $this->response(NULL, REST_Controller::HTTP_OK);
    }

    public function index_get($id = 0, $limit = 0, $start=0, $order_by=0)
	{
        $id = $this->uri->segment(3);
        $limit = $this->uri->segment(4); 
        $start = $this->uri->segment(5);
          $order_byex = explode('-', $this->uri->segment(6));
        if(!empty($id)){
            if(!empty($limit)){
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('a.*');
                $this->db->from('products a');
                $this->db->where('a.id', $id);
                if($order_by!="0"){
            $this->db->order_by('a.'.$order_byex[0], $order_byex[1]);
            }else{
            $this->db->order_by('a.id', 'DESC');
            }
                $this->db->limit($limit, $start);
                $query = $this->db->get();
                $data = $query->result();
                  
                
            } else {
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('a.*');
                $this->db->from('products a');                
                $arraywhere = array('a.id' => $id, 'a.active' => '1' );
                $this->db->where($arraywhere);
               if($order_by!="0"){
            $this->db->order_by('a.'.$order_byex[0], $order_byex[1]);
            }else{
            $this->db->order_by('a.id', 'DESC');
            }
                $query = $this->db->get(); 
                $data = $query->result();
            }
                $this->db->select('*');
                $this->db->from('various');
                $this->db->where('product_id',$data[0]->pro_id ); 
                $queryv = $this->db->get();
                $datav = $queryv->result(); 
                $data[0]->variations  =   $datav;

                $this->db->select('*');
                $this->db->from('product_gallery');
                $this->db->where('product_id',$id ); 
                $queryp = $this->db->get();
                $datap = $queryp->result(); 
                $data[0]->gallery  =   $datap;
               // $data['variations'] = $datav;
                $data[0]->avgreview  =  $this->avgreview($id);
        }else{
            //$data = $this->db->get("items")->result();
            if(!empty($limit)){
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('a.*');
                $this->db->from('products a');
                $arraywhere = array( 'a.active' => '1' );
                $this->db->where($arraywhere);
               if($order_by!="0"){
            $this->db->order_by('a.'.$order_byex[0], $order_byex[1]);
            }else{
            $this->db->order_by('a.id', 'DESC');
            }
                 $this->db->limit($limit, $start);
                $query = $this->db->get();
                $data = $query->result();
            } else {
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('a.*');
                $this->db->from('products a');
                $arraywhere = array(  'a.active' => '1' );
                $this->db->where($arraywhere);
               if($order_by!="0"){
            $this->db->order_by('a.'.$order_byex[0], $order_byex[1]);
            }else{
            $this->db->order_by('a.id', 'DESC');
            }
                $query = $this->db->get();
                $data = $query->result();
            }
            $pro=0;
            foreach($data as $prodata){
                $this->db->select('*');
                $this->db->from('various');
                $this->db->where('product_id',$prodata->pro_id ); 
                $queryv = $this->db->get();
                $datav = $queryv->result(); 
                $data[$pro]->variations  =   $datav; 
                $this->db->select('*');
                $this->db->from('product_gallery');
                $this->db->where('product_id',$prodata->id); 
                $queryp = $this->db->get();
                $datap = $queryp->result(); 
                $data[$pro]->gallery  =   $datap;
                $data[$pro]->avgreview  = $this->avgreview($prodata->id);
            $pro++;}
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
        $status = $this->uri->segment(4);
        $limit = $this->uri->segment(5);

        if(!empty($status)){
            if(!empty($limit)){
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('*');
                $this->db->from('offers a');
                $this->db->join('category b', 'b.id = a.offer_category'); 
                $this->db->where('a.offer_status', $status);
                $this->db->order_by('a.offer_id', 'DESC');
                $this->db->limit($limit);
                $query = $this->db->get();
                $data = $query->result();
            } else {
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('*');
                $this->db->from('offers a');
                $this->db->join('category b', 'b.id = a.offer_category'); 
                $this->db->where('a.offer_status', $status);
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

    public function category_products_get($cat = 0, $limit = 0, $start=0, $order_by = 0)
	{
        $cat = $this->uri->segment(4);
        $limit = $this->uri->segment(5);
         $start = $this->uri->segment(6);
          $order_byex = explode('-', $this->uri->segment(7));
        if(!empty($cat)){
            if(!empty($limit)){
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('a.*');
                $this->db->from('products a');
                $arraywhere = array('a.cat_id' => $cat, 'a.active' => '1' );
                $this->db->where($arraywhere); 
                if($order_by!="0"){
            $this->db->order_by('a.'.$order_byex[0], $order_byex[1]);
            }else{
            $this->db->order_by('a.id', 'DESC');
            }
                $this->db->limit($limit,$start);
                $query = $this->db->get();
                $data = $query->result();

                 
            } else {
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('a.*');
                $this->db->from('products a');
                $arraywhere = array('a.cat_id' => $cat, 'a.active' => '1' );
                $this->db->where($arraywhere);
                 if($order_by!="0"){
            $this->db->order_by('a.'.$order_byex[0], $order_byex[1]);
            }else{
            $this->db->order_by('a.id', 'DESC');
            }
                $query = $this->db->get();
                $data = $query->result();
                
            }
            $pro=0;
            foreach($data as $prodata){
                $this->db->select('*');
                $this->db->from('various');
                $this->db->where('product_id',$prodata->pro_id ); 
                $queryv = $this->db->get();
                $datav = $queryv->result(); 
                $data[$pro]->variations  =   $datav;
                $data[$pro]->avgreview  = $this->avgreview($prodata->id);
            $pro++;}
                
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            $this->response("Please provide a category id.", REST_Controller::HTTP_BAD_REQUEST);
        }
        
    }
    /**
     * Get Products from a category and brands by this method.
     *
     * @return Response
    */

    public function category_brand_get($cat = 0,$brand, $limit = 0,$start = 0,$order_by = 0)
    {
        $cat = $this->uri->segment(5);
        $brand = $this->uri->segment(6); 
        $limit = $this->uri->segment(7);
        $start = $this->uri->segment(8);
            $order_byex = explode('-', $this->uri->segment(9)); 
        if(!empty($cat)){
            if(!empty($limit)){
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('a.*');
                $this->db->from('products a');
                $arraywhere = array('a.cat_id' => $cat, 'a.active' => '1','a.brand_id' => $brand );
                $this->db->where($arraywhere); 
                 if($order_by!="0"){
            $this->db->order_by('a.'.$order_byex[0], $order_byex[1]);
            }else{
            $this->db->order_by('a.id', 'DESC');
            }
                $this->db->limit($limit,$start); 
                $query = $this->db->get();
                $data = $query->result();

                 
            } else {
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('a.*');
                $this->db->from('products a');
                $arraywhere = array('a.cat_id' => $cat, 'a.active' => '1' ,'a.brand_id' => $brand );
                $this->db->where($arraywhere);
                 if($order_by!="0"){
            $this->db->order_by('a.'.$order_byex[0], $order_byex[1]);
            }else{
            $this->db->order_by('a.id', 'DESC');
            }
                $query = $this->db->get();
                $data = $query->result();
                
            }
            $pro=0;
            foreach($data as $prodata){
                $this->db->select('*');
                $this->db->from('various');
                $this->db->where('product_id',$prodata->pro_id ); 
                $queryv = $this->db->get();
                $datav = $queryv->result(); 

                $data[$pro]->variations  =   $datav;
                $data[$pro]->avgreview  = $this->avgreview($prodata->id);
            $pro++;}
                
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
    /**
     * Get Products from a category by this method.
     *
     * @return Response
    */

    public function brandproducts_get($cat = 0, $limit = 0, $start =0 , $order_by = 0)
    {
       $cat = $this->uri->segment(4);
        $limit = $this->uri->segment(5);
         $start = $this->uri->segment(6);
         $order_by= $this->uri->segment(7);
          $order_byex = explode('-', $order_by);
        if(!empty($cat)){
            if(!empty($limit)){
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('a.*');
                $this->db->from('products a');
                $arraywhere = array('a.brand_id' => $cat, 'a.active' => '1' );
                $this->db->where($arraywhere); 
                if($order_by!="0"){
            $this->db->order_by('a.'.$order_byex[0], $order_byex[1]);
            }else{
            $this->db->order_by('a.id', 'DESC');
            }
                $this->db->limit($limit,$start);
                $query = $this->db->get();
                $data = $query->result();

                 
            } else {
                //$data = $this->db->get_where("products", ['id' => $id])->row_array();
                $this->db->select('a.*');
                $this->db->from('products a');
                $arraywhere = array('a.brand_id' => $cat, 'a.active' => '1' );
                $this->db->where($arraywhere);
               if($order_by!="0"){
            $this->db->order_by('a.'.$order_byex[0], $order_byex[1]);
            }else{
            $this->db->order_by('a.id', 'DESC');
            }
                $query = $this->db->get();
                $data = $query->result();
                
            }
            $pro=0;
            foreach($data as $prodata){
                $this->db->select('*');
                $this->db->from('various');
                $this->db->where('product_id',$prodata->pro_id ); 
                $queryv = $this->db->get();
                $datav = $queryv->result(); 
                $data[$pro]->variations  =   $datav;
                $data[$pro]->avgreview  = $this->avgreview($prodata->id);
            $pro++;}
                
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
           // $this->response("", REST_Controller::HTTP_BAD_REQUEST);
        echo "[]";
        }
        
    }
    
    public function allBrands_get()
    {
        
        $this->db->select('a.*');
        $this->db->from('brands a');
        $this->db->order_by('a.brand_id', 'ASC');
        $query = $this->db->get();
        $data = $query->result();
        $this->response($data, REST_Controller::HTTP_OK);
        
    }
    
    public function searchproduct_post($order_by)
	{   
        $order_byex = explode('-', $order_by);
        $qstring = strip_tags($this->post('qstring'));
        if($qstring !== ''){
            $this->db->select('a.*');
            $this->db->from('products a');
            $this->db->like('product_name', $qstring);
            $arraywhere = array( 'active' => '1' );
            $this->db->where($arraywhere);
            if($order_by!="0"){
            $this->db->order_by('a.'.$order_byex[0], $order_byex[1]);
            }else{
            $this->db->order_by('a.id', 'DESC');
            }
            $query = $this->db->get();
            $data = $query->result();
        }

        $cnt = count($data);
         if($cnt>0){
             $pro=0;
            foreach($data as $prodata){
                $this->db->select('*');
                $this->db->from('various');
                $this->db->where('product_id',$prodata->pro_id ); 
                $queryv = $this->db->get();
                $datav = $queryv->result(); 
                $data[$pro]->variations  =   $datav;
            $pro++;}
            $this->response($data, REST_Controller::HTTP_OK);
          } else {
             $response_arr = array();
             $response_arr[] = [];
             $this->response('No result found', REST_Controller::HTTP_OK);
        }
    }
    
    public function productReview_get($pro = 0, $limit = 0 ,$start =0)
    {
        $pro = $this->uri->segment(4);
        $limit = $this->uri->segment(5);
        if(!empty($pro)){
           if(!empty($limit)){
               
                $this->db->select('a.*,b.full_name,b.email');
                $this->db->from('product_reviews a');
                $this->db->join('users b', 'b.id=a.user_id', 'left');
                $this->db->where('a.product_id', $pro);
                $this->db->order_by('a.date', 'DESC');
                $this->db->limit($limit, $start);
                $query = $this->db->get();
                $data = $query->result();
            } else {
                
                $this->db->select('a.*,b.full_name,b.email');
                $this->db->from('product_reviews a');
                 $this->db->join('users b', 'b.id=a.user_id', 'left');
                $this->db->where('a.product_id', $pro); 
                $this->db->order_by('a.date', 'DESC');
                $query = $this->db->get();
                $data = $query->result();
            }
             
            $this->response(["reviewdata" => $data, "totalreview"  => count($data ) ], REST_Controller::HTTP_OK);
        }else{
            $this->response("Please provide a product id.", REST_Controller::HTTP_BAD_REQUEST);
        }
        
    }
   public  function addToReview_post()
   {
     $this->input->raw_input_stream;
     $input_data = json_decode($this->input->raw_input_stream, true);
      $response_arr = array();
        foreach($input_data as $val){
            $productID = $val['productID'];
            $userID = $val['userID'];
            $starRating = $val['starRating'];
            $Comments = $val['Comments']; 
            $date = $val['date'];
            //echo $productID.'####'.$userID;

            // Insert user data
            if($productID !== '' && $userID !== ''){
                $RevData = array(
                    'product_id' => $productID,
                    'user_id' => $userID,
                    'star_rating' => $starRating,
                    'comments' => $Comments, 
                    'date' => $date 
                );
                $insert = $this->db->insert("product_reviews",$RevData);
                $response_arr[] = ['status' => TRUE, 'message' => 'Review added successfully.'];
            } else {
                $response_arr[] = ['status' => FALSE, 'message' => 'Not added review.'];
            }
            $this->response($response_arr, REST_Controller::HTTP_OK);
        }
   }
   public function addDetails_get($adid=0){

        $this->db->select('*');
        $this->db->from( "ad_banner"); 
        $query = $this->db->get();
        $data = $query->result();
        $this->response($data, REST_Controller::HTTP_OK);

    }
    public function avgreview($pid=0){

        $this->db->select('avg(star_rating) as avg_r');
        $this->db->from( "product_reviews"); 
        $this->db->where('product_id', $pid); 
        $query = $this->db->get();
        $data = $query->result();
        return $data[0]->avg_r;
        

    }
    public function avgreviewbystar($pid=0,$rate=5){

        $this->db->select('avg(star_rating) as avg_r');
        $this->db->from( "product_reviews"); 
        $this->db->where('product_id', $pid); 
        $this->db->where('star_rating', $rate); 
        $query = $this->db->get();
        $data = $query->result();
        if($data[0]->avg_r==""){
            $ratep = 0;
        }else{
            $ratep =$data[0]->avg_r;
        }
        return $ratep ;
        

    }
    public function avgratebysingle_get($pid=0){

        $this->db->select('*');
        $this->db->from( "products"); 
        $this->db->where('id', $pid); 
        $query = $this->db->get();
        $data = $query->result();
       
echo '[{"id":"'.$data[0]->id.'","pro_id":"'.$data[0]->pro_id.'","product_name":"'.$data[0]->product_name.'", "avgreview":"'.$this->avgreview($pid).'", "onerate":"'.$this->avgreviewbystar($pid,'1').'", "tworate":"'.$this->avgreviewbystar($pid,'2').'", "threerate":"'.$this->avgreviewbystar($pid,'3').'", "fourrate":"'.$this->avgreviewbystar($pid,'4').'", "fiverate":"'.$this->avgreviewbystar($pid,'5').'"}]';
    }

    public function appsetting_get($id = 0,$app = 0){

        $this->db->set('app_setting', $app );
        $this->db->where('id', $id );
        $this->db->update('keys');

        $this->db->select('*');
        $this->db->from( "keys");  
        $this->db->where('id', $id);
        $query = $this->db->get();
        $data = $query->result();
         $this->response($data, REST_Controller::HTTP_OK);

    }
}