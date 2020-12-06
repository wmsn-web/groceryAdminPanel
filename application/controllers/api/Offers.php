<?php  
require APPPATH . 'libraries/REST_Controller.php';
     
class Offers extends REST_Controller {
    
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
       $this->load->model('offerslist');
    }
    public function index_options() {
        return $this->response(NULL, REST_Controller::HTTP_OK);
    }


    public function allOfferList_get($offerID=0)
	{
        //echo $userID;
        $offersItems = $this->offerslist->getRows($offerID);
        //if($wishlistItems>0){
            $this->response($offersItems, REST_Controller::HTTP_OK);
        // } else {
        //     $this->response('Empty', REST_Controller::HTTP_OK); 
        // }
    }
  public function  Offersingle_get($offerID=0)
    {
         
        $offersItems = $this->offerslist->getSingleRows($offerID);
         $this->response($offersItems, REST_Controller::HTTP_OK);
        
    }
    
    
    
    public function deletefromoffers_delete($offersID){
        $offersID = $this->uri->segment(4);
        $delete = $this->offerslist->delete($offersID);
        $this->response('Deleted', REST_Controller::HTTP_OK);
    }
}