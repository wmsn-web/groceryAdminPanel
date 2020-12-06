<?php
class Brands extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("AdminModel");
		if(!$this->session->userdata("UserAdmin"))
		{
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			return redirect("admin_panel/AdminLogin?refer=$actual_link");
		
		}
	}

	public function index()
	{
		$brandData = $this->AdminModel->brandData();
		$this->load->view("admin/brands",["brnd"=>$brandData]);
	}

	public function addBrand()
	{
		$brand = $this->input->post("brand");
		$dir_name ='./uploads/brand';
				if (!is_dir($dir_name)) {
				mkdir($dir_name);
			}
        	
	        	
	        	$config['upload_path']          = './uploads/brand/';
                $config['max_size'] = '*';
				$config['allowed_types'] = 'png|jpg|PNG|JPG|jpeg|JPEG|gif|GIF'; # add video extenstion on here
				$config['remove_spaces'] = TRUE;
				$fileName = mt_rand(0000000, 9999999);
				$config['file_name'] = $fileName;
                
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('brandImg'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        //print_r($error);
                        $this->session->set_flashdata("FL","Maximum size issue!");
                        
                }
                else
                {
                        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
						$file_name = $upload_data['file_name'];
						$brand = $this->input->post("brand");
						$insrtBrand = $this->AdminModel->insBrand($brand,$file_name);
						
				}
		
		if($insrtBrand == "success")
		{
			$this->session->set_flashdata("Feed","Brand Name Successfully Added.");
			return redirect("admin_panel/Brands");
		}
		else
		{
			$this->session->set_flashdata("Feed","Brand Name Alresdy Exists.");
			return redirect("admin_panel/Brands");
		}
	}

	public function delbrand($id)
	{
		$this->db->where("brand_id",$id);
		$this->db->delete("brands");
		$this->session->set_flashdata("Feed","Brand Deleted.");
			return redirect("admin_panel/Brands");
	}

	public function getBrandById()
	{
		$brand_id = $this->input->post("brand_id");
		$this->db->where("brand_id",$brand_id);
		$getbrnd = $this->db->get("brands");
		if($getbrnd->num_rows()==0)
		{
			$data = array();
		}
		else
		{
			$key = $getbrnd->row();
			
				$data = array
							(
								"brand_id"=>$key->brand_id,
								"brand"=>$key->brand,
								"image"=>$key->image
							);
			
		}

		echo json_encode($data);
	}

	public function UpdateBrand()
	{
		$brand = $this->input->post("brand");
		$brand_id = $this->input->post("brand_id");
		$dir_name ='./uploads/brand';
				if (!is_dir($dir_name)) {
				mkdir($dir_name);
			}
        	
	        	
	        	$config['upload_path']          = './uploads/brand/';
                $config['max_size'] = '*';
				$config['allowed_types'] = 'png|jpg|PNG|JPG|jpeg|JPEG|gif|GIF'; # add video extenstion on here
				$config['remove_spaces'] = TRUE;
				$fileName = mt_rand(0000000, 9999999);
				$config['file_name'] = $fileName;
                
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('brandImg'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        //print_r($error);
                        $this->session->set_flashdata("FL","Maximum size issue!");
                        $this->db->where("brand_id",$brand_id);
                        $this->db->update("brands",["brand"=>$brand]);
                        $this->session->set_flashdata("Feed","Brand Name Changed.");
                        return redirect("admin_panel/Brands");
                        
                }
                else
                {
                        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
						$file_name = $upload_data['file_name'];
						$brand = $this->input->post("brand");
						$this->db->where("brand_id",$brand_id);
						$this->db->update("brands",["brand"=>$brand,"image"=>$file_name]);
						$this->session->set_flashdata("Feed","Brand Name and Image Changed.");
						return redirect("admin_panel/Brands");
						
				}
	}
}
