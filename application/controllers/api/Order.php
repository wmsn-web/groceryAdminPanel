<?php  
require APPPATH . 'libraries/REST_Controller.php';

class Order extends REST_Controller {
    
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
       $this->load->model('orders');

    }

    public function index_options() {
        return $this->response(NULL, REST_Controller::HTTP_OK);
    }

    public function OrderList_get($user_ID=0){
     $orderItems = $this->orders->getRowsUser($user_ID);
      if($orderItems>0){
      $this->response(["OrderList" => $orderItems ], REST_Controller::HTTP_OK);
      }else{
        echo '[]';
      }

    }

    public function itemsOrder_get($order_ID=0)
	{
         
        //echo $userID;
        $cartItems=array();
        $orderItems = $this->orders->getRows($order_ID);
        if($orderItems>0){

           $citem=0;
           foreach(explode(',',$orderItems[0]['cart_id']) as $val){
               $CartId = $val;
             

                $this->db->select('a.cart_id,a.product_id,a.variation_name,a.user_id as purchase_by,a.qty as purchase_qty,a.price as purchase_price, a.status as purchase_status,b.*');
                $this->db->from('cart a');
                $this->db->join('products b', 'b.id=a.product_id', 'left');
                $this->db->where('a.cart_id', $CartId);
                $this->db->order_by('a.date', 'DESC');  
                $queryd = $this->db->get(); 
                
                $datav = $queryd->result();
                $cartItems[$citem]   =   $datav[0];
                $citem++;
           }     
                $this->db->select('*');
                $this->db->from('shipping_address'); 
                $this->db->where('shipping_address_id', $orderItems[0]['shipping_address_id']); 
                $querys = $this->db->get(); 
                
                $datas = $querys->result();
                $shipping_address   =   $datas;

                $this->db->select('*');
                $this->db->from('delivery_boys'); 
                $this->db->where('id',  $orderItems[0]['asigned_delivery_boy']); 
                $querydb = $this->db->get(); 
                
                $datadb = $querydb->result_array();

            $this->response(["Orderdetails" => $orderItems, "shipping_address" => $shipping_address, "Delivery_Boy" =>  $datadb , "cartItems" => $cartItems], REST_Controller::HTTP_OK);
        } else {
            $this->response('Empty', REST_Controller::HTTP_OK); 
        }
    }

    public function addtoOrder_post($user)
	{
        //$cartdata = json_decode($request);
         $this->input->raw_input_stream;
         $input_data = json_decode($this->input->raw_input_stream, true); 
        
         $user_id =  $input_data['user_id'];
         $shipping_address_id =  $input_data['shipping_address_id'];
         $pay_method =  $input_data['pay_method'];
         $payment_status =  $input_data['payment_status'];
         $extra_note =  $input_data['extra_note'];
         $date =  $input_data['date'];
         $status =  "hello";//$input_data['status'];
         $gross_total =  $input_data['gross_total'];
         $wallet_price =  $input_data['wallet_price'];
         $order_id = "BUY-".time(); 
         $gross_total=$prices='0.00';
         $cartid=array();
         $response_arr = array();

        $this->db->where("id",$user_id);
        $getcurUser = $this->db->get("users")->row();
        $parentRefferal = $getcurUser->referral_code_parent;

        $this->db->where("user_id",$user_id);
        $getOrdRow = $this->db->get("orders_transaction")->num_rows();
        if($getOrdRow >0)
        {
            $used_refferal_code = null;
        } 
        else
        {
            $used_refferal_code = $parentRefferal;
        }

        $this->db->from('wallet'); 
        $where = array(
          'user_id' => $user_id
        );
        $this->db->where($where); 
        $queryu = $this->db->get(); 
        $wal_bal = $queryu->row()->balance;


       

        if(floatval($wal_bal) <  floatval($wallet_price) ){
        	 $response_arr[] = ['order_id' => NULL, 'message' => 'wallet balance not available'];
        	}else{

         foreach($input_data['Cartdetails'] as $val){
            $product_id = $val['product_id']; 
            $variation_name = $val['variation_name'];
            $user_id = $val['user_id'];
            $cat_id = $val['cat_id'];
            $qty = $val['qty'];
            $price = $val['price'];   
            if($product_id !== '' && $user_id !== ''){
                $cartData = array(
                    'product_id' => $product_id,
                    'variation_name' => $variation_name,
                    'user_id' => $user_id,
                    'cat_id' => $cat_id,
                    'price' => $price,
                    'qty' => $qty, 
                    'date' => date("y-m-d"), 
                    'status' => '0'
                );
                $prices+=($qty*$price);
                $gross_total+=($qty*$price);
                $insert = $this->orders->insertcart($cartData); 
                $cartid[] = $insert;
            } else { 
            } 
         }
         $orderData = array(
                    'user_id' => $user_id,
                    'shipping_address_id' => $shipping_address_id,
                    'pay_method' => $pay_method,
                    'payment_status' => $payment_status,
                    'extra_note' => $extra_note,
                    'status' => $status, 
                    'date' => $date, 
                    'gross_total' => $gross_total,
                    'prices' => $prices,
                    'order_id' => $order_id,
                    'cart_id' => implode(',',  $cartid)
                    'used_refferal_code' =>$used_refferal_code
         );
          $insert = $this->orders->insert($orderData);
         $response_arr[] = ['order_id' => $order_id , 'message' => 'Order added successfully.'];
     }
         $this->response($response_arr, REST_Controller::HTTP_OK);
    }

    public function OrderStatusList_get($order_id){

        $this->db->select('*');
        $this->db->from('order_status');
        $this->db->where('order_id',$order_id);
        $this->db->order_by('id', 'ASC');  
       // echo $this->db->last_query();
        //$cnt = $this->db->count_all_results();
        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->result_array():false;
 
         
         if($result>0){ 

            $this->response(["StatusList" => $result ], REST_Controller::HTTP_OK);
        } else {
           echo '[]';
        }  
    }

    public function shippingavailable_get($zip_code){
        $this->db->select('*');
        $this->db->from('shiping_zone');
        $this->db->where('zip_code',$zip_code);
       // echo $this->db->last_query();
        //$cnt = $this->db->count_all_results();
        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->result_array():false;
 
         
         if($result>0){ 

            $this->response(["Shipdetails" => $result ], REST_Controller::HTTP_OK);
        } else {
           echo '[]';
        }
    }  
    public function  OrderReturn_post($orderID,$Txnid){
       $orderID = $this->uri->segment(4);
       $Txnid = $this->uri->segment(5);
       $payment_status =  strip_tags($this->post('payment_status')) ;
       $slot_details =  strip_tags($this->post('slot_details')) ;
       //$used_refferal_code =  strip_tags($this->post('used_refferal_code')) ; 
       $curent_user =  strip_tags($this->post('user_id')) ; 



        $this->db->select('*');
        $this->db->from('orders_transaction'); 
        $wheredd = array(
          'order_id' =>$orderID
        );
        $this->db->where($wheredd); 
        $queryrs = $this->db->get(); 
        $order_id = $queryrs->row()->id;

        $used_refferal_code = $queryrs->row()->used_refferal_code;

       
        $this->db->select('amount');
        $this->db->from('referral_setting'); 
        $wherex = array(
          'id' => '2'
        );
        $this->db->where($wherex); 
        $queryr = $this->db->get(); 
        $regbalance = $queryr->row()->amount; 


        if( $used_refferal_code!=""){
        /* ----- Check Referral code price --------*/
        

        /* ----- Check code Validity --------*/
        $this->db->select('id');
        $this->db->from('users'); 
        $where = array(
          'referral_code' => $used_refferal_code 
        );
        $this->db->where($where); 
        $queryf = $this->db->get(); 
        $queryf->num_rows();
        if ( $queryf->num_rows() > 0   ){
              $parentuserid = $queryf->row()->id ; 
               $this->db->select('balance');
        $this->db->from('wallet'); 
        $where = array(
          'user_id' => $parentuserid 
        );
        $this->db->where($where); 
        $queryu = $this->db->get(); 
        $wal_bal = $queryu->row()->balance;
        if( $wal_bal==""){ $wal_bal = "0";
        $data = [
            
            'user_id' => $parentuserid,
            'balance' => $regbalance
        ]; 
        
        $this->db->insert('wallet', $data); 
          } 
          else{
        $data = [
            'balance' => ($regbalance+$wal_bal),
        ];
        $this->db->where('user_id', $parentuserid);
        $this->db->update('wallet', $data);
        }
        $dataw = [
            
            'user_id' => $parentuserid,
            'notes' => 'Reward Added to wallet',
            'debit' => '',
            'credit' => $regbalance
        ]; 
        
        $this->db->insert('transaction', $dataw); 
        
        /* ------------- add wallet price for current user ------------*/
        
        $this->db->select('balance');
        $this->db->from('wallet'); 
        $where = array(
          'user_id' => $curent_user 
        );
        $this->db->where($where); 
        $queryu = $this->db->get(); 
        $wal_bal = $queryu->row()->balance;
        if( $wal_bal==""){ $wal_bal = "0";
        $data = [
            
            'user_id' => $curent_user,
            'balance' => $regbalance
        ]; 
        
        $this->db->insert('wallet', $data); 
          } 
          else{
        $data = [
            'balance' => ($regbalance+$wal_bal),
        ];
        $this->db->where('user_id', $curent_user);
        $this->db->update('wallet', $data);
        }
        $datac = [
            
            'user_id' => $curent_user,
            'notes' => 'Reward Added to wallet',
            'debit' => '',
            'credit' => $regbalance
        ]; 
        
        $this->db->insert('transaction', $datac); 
             
        }

       }
       $slot_id =  strip_tags($this->post('slot_id')) ;
       $order_date = date("Y-m-d H:i:s",strtotime(strip_tags($this->post('order_date')))) ;
       $wallet_price =  strip_tags($this->post('wallet_price')) ; 
       if($wallet_price=="0.00"){
            $wallet_price= "0.00";
       }else{

        $this->db->select('balance');
        $this->db->from('wallet'); 
        $where = array(
          'user_id' => $curent_user 
        );
        $this->db->where($where); 
        $queryu = $this->db->get(); 
        $existingbalance = $queryu->row()->balance;

        
         $data = [
            'balance' => ($existingbalance-$wallet_price),
        ];
        $this->db->where('user_id', $curent_user );
        $this->db->update('wallet', $data);
        
        $dataw = [
            
            'user_id' => $curent_user ,
            'notes' => 'Wallet Price deduct for Order #'.$orderID,
            'debit' => $wallet_price,
            'credit' => ''
        ]; 
        
        $this->db->insert('transaction', $dataw);
       }

       $orderData = array(
                    'txnid' => $Txnid, 
                    'payment_status' => $payment_status, 
                    'status' => 'Pending', 
                    'order_date' => $order_date,
                    'slot_details' => $slot_details,
                    'slot_id' => $slot_id,
                    'wallet_price' => $wallet_price,
                    'used_refferal_code' => $used_refferal_code,
                    'payment_date' => date("Y-m-d")  

         );
       $this->orders->update($orderData,$orderID);  
       $orderItems = $this->orders->getRows($orderID);

       $citem=0;
           foreach(explode(',',$orderItems[0]['cart_id']) as $val){
            $CartId = $val;
            $this->db->select('*');
                $this->db->from('cart'); 
                $this->db->where('cart_id',  $CartId); 
                $querys = $this->db->get(); 
                
                $datas = $querys->result_array();

             $product_id = $datas[0]['product_id'];
            $variation  = explode('-', $datas[0]['variation_name']) ;

            $variation_id = $variation[0];
             if($variation_id != ""){

  $this->db->select('stock_qty');
  $this->db->where("id", $variation_id);
  $this->db->limit(1);
  $queryv = $this->db->get('various');
   $stock_qty = $queryv->row()->stock_qty;
   $stock_qty=(int) $stock_qty;
  if($stock_qty < 0 ){ $stock_qty =1 ;}
             $stkoc = ($stock_qty - $datas[0]['qty']);
              if($stkoc < 1) { $stkoc = "0";}
             $datavariation = [
            'stock_qty' => $stkoc,
             ];
        $this->db->where('id', $variation_id);
        $this->db->update('various', $datavariation);
             }else{
 $this->db->select('qty');
  $this->db->where("id", $product_id);
  $this->db->limit(1);
  $queryp = $this->db->get('products');
  $pro_qty = $queryp->row()->qty;
  $pro_qty=(int) $pro_qty;
if($pro_qty < 0 ){ $pro_qty =1 ;}
 $stkoc = ($stock_qty - $datas[0]['qty']);
 if($stkoc < 1) { $stkoc = "0";}
             $datapro = [
            'qty' =>$stkoc ,
             ];
        $this->db->where('id', $product_id);
        $this->db->update('products', $datapro);
             }
             $datacart = [
            'status' => '1',
             ];
        $this->db->where('cart_id', $CartId);
        $this->db->update('cart', $datacart);

           }


     $datast = [
            
            'order_id' => $orderID,
            'slot_details' => $slot_details,
            'slot_date' => $order_date,
            'slot' => $slot_id
        ]; 
        
     $this->db->insert('slot_save', $datast);   




     $dataPending = [ 
            
            'user_id' => $curent_user ,
            'status' =>  'Pending',
            'order_invoice' => $orderID,
            'status_date' => date("Y-m-d H:i:s"),
            'order_id' => $order_id,
            'status_type' => '1' 

        ]; 
     $this->db->insert('order_status', $dataPending);
     $dataProcessing = [ 
            
            'user_id' => $curent_user ,
            'status' =>  'Processing',
            'order_invoice' => $orderID,
            'status_date' => date("Y-m-d H:i:s"),
            'order_id' => $order_id,
            'status_type' => '0' 

        ]; 
     $this->db->insert('order_status', $dataProcessing);
     $dataPacked = [ 
            
            'user_id' => $curent_user ,
            'status' =>  'Packed',
            'order_invoice' => $orderID,
            'status_date' => date("Y-m-d H:i:s"),
            'order_id' => $order_id,
            'status_type' => '0' 

        ]; 
     $this->db->insert('order_status', $dataPacked); 
     $dataDespatched = [ 
            
            'user_id' => $curent_user ,
            'status' =>  'Despatched',
            'order_invoice' => $orderID,
            'status_date' => date("Y-m-d H:i:s"),
            'order_id' => $order_id,
            'status_type' => '0' 

        ]; 
     $this->db->insert('order_status', $dataDespatched);
      $dataDelivered = [ 
            
            'user_id' => $curent_user ,
            'status' =>  'Delivered',
            'order_invoice' => $orderID,
            'status_date' => date("Y-m-d H:i:s"),
            'order_id' => $order_id,
            'status_type' => '0' 

        ]; 
     $this->db->insert('order_status', $dataDelivered); 


     $this->response(["Transcation" => "Success" , "Txn_id" => $Txnid], REST_Controller::HTTP_OK);      
      
    }
    public function deletefromOrder_delete($orderID){
        $orderID = $this->uri->segment(4);
        $delete = $this->orders->delete($orderID);
        $this->response('Deleted', REST_Controller::HTTP_OK);
    }
    public function Slotselection_post($orderID=0,$timeselect=""){
         
         $orderID =  strip_tags($this->post('orderID')) ;
         $timeselect =  strip_tags($this->post('timeselect')) ;
         $select_date=  strip_tags($this->post('select_date')) ;
         $explode = explode("-", $timeselect);
         $start=$explode[0];
         $end=$explode[1]; 

         $this->db->select('*');
         $this->db->from('slots_timing'); 
         $multiClause = array('start' => $start, 'end' => $end );
         $this->db->where(  $multiClause ); 
         $querys = $this->db->get(); 
         $datas = $querys->result_array();
         $ifavailable = $datas[0]['id'];

        $this->db->select('*');
        $this->db->from('orders_transaction');
        $multiw = array('order_date' => $select_date, 'slot_details' =>$timeselect );
        $this->db->where(  $multiw ); 
        $existingorder = $this->db->get()->num_rows(); 

         $this->db->select('take_ord');
         $this->db->from('order_timing'); 
         $this->db->where('id',  '1');
         $query10 = $this->db->get(); 
         $datas10 = $query10->result_array();
         $take_ord = $datas10[0]['take_ord'];
        

         if( $ifavailable < 0 || $existingorder > $take_ord){
         echo '[]';
         }else{
         $this->response(["SlotDetails" => $datas ], REST_Controller::HTTP_OK);   
         }



     }
     public function SlotListing_get($orderID=0,$timeselect=""){
                $this->db->select(' * ');
                $this->db->from('slots_timing'); 
                $this->db->order_by('start', 'Asc');  
                $queryd = $this->db->get(); 
                
                $dataslot = $queryd->result();
                $this->response(["Slotlist" => $dataslot , "date_select" => date("Y-m-d") ], REST_Controller::HTTP_OK);


     }
     public function MinOrder_get($id= "1" ){
                $this->db->select(' * ');
                $this->db->from('settings'); 
                $this->db->where('id',  '1');
                $this->db->order_by('id', 'Asc');  
                $queryd = $this->db->get(); 
                
                $datass = $queryd->result();
                $this->response(  $datass  , REST_Controller::HTTP_OK);


     }
     public function ReferalCodefind_get($used_refferal_code= "", $user_id = "0" ){
                $this->db->select('used_refferal_code');
                $this->db->from('orders_transaction'); 
                $multiClause = array('used_refferal_code' => $used_refferal_code, 'user_id' => $user_id );
                $this->db->where(  $multiClause ); 
                $this->db->order_by('id', 'Asc');  
                $queryd = $this->db->get(); 
                
                $datass = $queryd->result();
                $this->response(  $datass  , REST_Controller::HTTP_OK);


     }
     public function AutoSlot_get($date){
         $this->db->select('slot_date,slot_details');
         $this->db->from('slot_save');
         $this->db->order_by('id', 'desc');  
         $query10 = $this->db->get(); 
         $datalast = $query10->result_array();
         $slot_date = $datalast[0]['slot_date'];
         if($slot_date < $date ){
           $slot_date = $date;
         }
         $slot_details = $datalast[0]['slot_details'];
         $slot_detail = explode('-', $slot_details);
         $start =  $slot_detail[0];
         $end =  $slot_detail[1];
         $this->db->select('*');
         $this->db->from('slots_timing'); 
         $multiClause = array('start' => $start, 'end' => $end );
         $this->db->where(  $multiClause ); 
         $querys = $this->db->get(); 
         $datas = $querys->result_array();


        $this->db->select('order_id');
        $this->db->from('orders_transaction');
        $multiw = array('order_date' => $slot_date, 'slot_details' => $slot_details);
        $this->db->where(  $multiw ); 
        $existingorder = $this->db->get()->num_rows(); 

         $this->db->select('take_ord');
         $this->db->from('order_timing'); 
         $this->db->where('id',  '1');
         $query10 = $this->db->get(); 
         $datas10 = $query10->result_array();
         $take_ord = $datas10[0]['take_ord'];
        

         if($existingorder > $take_ord){

         $this->db->select('*');
         $this->db->from('slots_timing');  
         $this->db->where( 'id >' ,  $datas[0]['id'] ); 
         $this->db->limit(1, 0);
         $querys = $this->db->get(); 
         $datas  = $querys->result_array();


         $this->db->select('order_id');
         $this->db->from('orders_transaction');
         $multiw = array('order_date' => $slot_date, 'slot_details' =>  $datas[0]['start'].'-'.$datas[0]['end']);
         $this->db->where(  $multiw ); 
         $existingorder = $this->db->get()->num_rows(); 

         if($existingorder > $take_ord){
         $this->db->select('*');
         $this->db->from('slots_timing');  
         $this->db->where( 'id >' ,  $datas[0]['id'] ); 
         $this->db->limit(1, 0);
         $querys = $this->db->get(); 
         $datas  = $querys->result_array();


         }
        
         }


          $this->response( ["slot" => $datas , "order_date" => $slot_date ]  , REST_Controller::HTTP_OK);
     }
     public function WalletPayment_post($user_id = "", $amount = "0.00" ){

       $user_id =  strip_tags($this->post('user_id')) ;
       $amount =  strip_tags($this->post('amount')) ; 
       $txn_id =  strip_tags($this->post('txn_id')) ; 

        $this->db->select('balance');
        $this->db->from('wallet'); 
        $where = array(
          'user_id' => $user_id 
        );
        $this->db->where($where); 
        $queryu = $this->db->get(); 
        $wal_bal = $queryu->row()->balance;
        if( $wal_bal==""){ $wal_bal = "0";
        $data = [
            
            'user_id' => $user_id,
            'balance' =>  $amount
        ]; 
        
        $this->db->insert('wallet', $data); 
          } 
          else{
        $data = [
            'balance' => ( $amount+$wal_bal),
        ];
        $this->db->where('user_id', $user_id);
        $this->db->update('wallet', $data);
        }


       $datac = [
            
            'user_id' => $user_id,
            'notes' => 'Price added to wallet',
            'debit' => '',
            'txn_id' => $txn_id,
            'credit' => $amount
        ]; 
        
        $this->db->insert('transaction', $datac);
        $this->response( ["txn_id" => $txn_id ,"user_id" => $user_id , "txn_date" => date("Y-m-d H:i:s") ] , REST_Controller::HTTP_OK); 
     }

     public function OrderReturnRequest_post(){

       $user_id =  strip_tags($this->post('user_id')) ;
       $amount =  strip_tags($this->post('amount')) ; 
       $cart_id =  strip_tags($this->post('cart_id')) ; 
       $product_id = strip_tags($this->post('product_id')) ; 
       $variation_name = strip_tags($this->post('variation_name')) ; 
       $qty = strip_tags($this->post('qty')) ; 
       $order_id = strip_tags($this->post('order_id')) ; 
       $notes = strip_tags($this->post('notes')) ; 
       $img =    strip_tags($this->post('photo')) ;  
       $request_date =  date("Y-m-d") ;
       if($img!="")  {
           $pimg = $img;
           /*
        $pimg = uniqid() . '.png';
	    $img = str_replace('data:image/png;base64,', '', $img);
	    $img = str_replace(' ', '+', $img);
	    $data = base64_decode($img);
	    $file = './uploads/products/' . $pimg;
	    $success = file_put_contents($file, $data);
	    */
	    }else{
	    $pimg =  '';	
	    }
	    $return_inv = "RETURN-".time();

	    $datac = [
            
            'user_id' => $user_id, 
            'photo' => $pimg,
            'cart_id' => $cart_id,
            'amount' => $amount,
            'product_id' => $product_id,
            'variation_name' => $variation_name,
            'qty' => $qty,  
            'notes' => $notes,
            'request_date' => $request_date,
            'order_id' => $order_id,
            'return_inv' => $return_inv
        ]; 
        
        $this->db->insert('order_return', $datac);
        $insert_id = $this->db->insert_id(); 
        if($insert_id > 0){ 
        	 $datacart = [
            'status' =>  '3' 
        ];
        $this->db->where('cart_id',  $cart_id );
        $this->db->update('cart', $datacart);

        $this->response( ["return_inv" => $return_inv ,"user_id" => $user_id , "amount" => $amount ] , REST_Controller::HTTP_OK);
        }else{
        echo '[]';
        } 
	       


     }
     public function SaveError_post(){
     	 $this->input->raw_input_stream;
         $input_data = json_decode($this->input->raw_input_stream, true); 
         $user_id =  $input_data[0]['user_id'];
         $response =  $input_data[0]['response'];
         $errordata =  $input_data[0]['errordata'];
         $date_time = date("Y-m-d H:i:s");
          $datac = [ 
            'user_id' => $user_id, 
            'response' => $response,
            'errordata' => $errordata,
            'date_time' => $date_time 
        ];  
        
         $this->db->insert('error_report', $datac);
         $insert_id = $this->db->insert_id(); 
        if($insert_id > 0){ 

        $this->response( ["error_insert" => $insert_id  ] , REST_Controller::HTTP_OK);
        }else{
        echo '[]';
        } 
       


     }

     public function OrderCancel_get($orderID,$Cancel_by){
     	$orderID = $this->uri->segment(4);
        $Cancel_by = $this->uri->segment(5);

        $orderItems = $this->orders->getRows($orderID);

       $citem=0;
           foreach(explode(',',$orderItems[0]['cart_id']) as $val){
            $CartId = $val;

           $datacart = [
            'status' =>  '2' 
        ];
        $this->db->where('cart_id',  $CartId );
        $this->db->update('cart', $datacart);
        }

        $orderData = array(
                    'status' => 'Cancel', 
                    'cancel_by' => $Cancel_by ,
                    'cancel_date' => date("Y-m-d")  

         );
        $this->orders->update($orderData,$orderID); 

        $response_arr[] = ['order_id' => $orderID , 'status' => 'Cancel'];
      
         $this->response($response_arr, REST_Controller::HTTP_OK);
     }
}