<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class inventory extends CI_Controller 
{	
	public function __construct() 
  {

		parent::__construct();	
		$this->load->helper(array('url','html','form'));
		$this->load->library('session','form_validation');
		$this->load->library('email');
		$this->load->model('inventory_model');
		$this->load->model('customer_model'); 
		if($this->session->userdata('userdetails'))
		{
		$logindetail=$this->session->userdata('userdetails');
		
		$data['customerdetails'] = $this->customer_model->get_profile_details($logindetail['customer_id']);
		//echo '<pre>';print_r($data);exit;
		$this->load->view('customer/inventry/header',$data);
		} 
			
 }
  public function account(){
	 
	 if($this->session->userdata('userdetails'))
	 {
		$customerdetails=$this->session->userdata('userdetails');
		$data['profile_details']= $this->customer_model->get_profile_details($customerdetails['customer_id']);

			$this->load->view('customer/inventry/sidebar');
			$this->load->view('customer/inventry/profile',$data);
			$this->load->view('customer/inventry/footer');
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	} 
	 
 }
  public function editprofile(){
	 
	 if($this->session->userdata('userdetails'))
	 {
		$customerdetails=$this->session->userdata('userdetails');
		$data['profile_details']= $this->customer_model->get_profile_details($customerdetails['customer_id']);
		$this->load->view('customer/inventry/sidebar');
		$this->load->view('customer/inventry/editprofile',$data);
		$this->load->view('customer/inventry/footer');
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login');
	} 
	 
 }
 public function updateprofilepost(){
	 
	 if($this->session->userdata('userdetails'))
	 {
		$customerdetails=$this->session->userdata('userdetails');
		$post=$this->input->post();
		
		if($post['email']!=$customerdetails['cust_email']){
			$emailcheck= $this->customer_model->email_unique_check($post['email']);
			if(count($emailcheck)>0){
				$this->session->set_flashdata('errormsg','Email id already exits.please use another Email id');
				redirect('inventory/editprofile');
			}
			
		}
		
		
		$cust_upload_file= $this->customer_model->get_profile_details($customerdetails['customer_id']);
		if($_FILES['profile']['name']!=''){
			$profilepic=$_FILES['profile']['name'];
			move_uploaded_file($_FILES['profile']['tmp_name'], "uploads/profile/" . $_FILES['profile']['name']);

			}else{
			$profilepic=$cust_upload_file['cust_propic'];
			}
		$details=array(
		'cust_firstname'=>$post['fname'],
		'cust_lastname'=>$post['lname'],
		'cust_email'=>$post['email'],
		'cust_mobile'=>$post['mobile'],
		'cust_propic'=>$profilepic,
		'address1'=>$post['address1'],
		'address2'=>$post['address2'],
		);
		//echo '<pre>';print_r($details);exit;
		$updatedetails= $this->customer_model->update_deails($customerdetails['customer_id'],$details);
		if(count($updatedetails)>0){
			$this->session->set_flashdata('success','Profile Successfully updated');
			redirect('inventory/account');
		}

		//echo '<pre>';print_r($post);exit;
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login');
	} 
	 
 }
  public function dashboard(){
  	
	 
	if($this->session->userdata('userdetails'))
	 {		
		
		$logindetail=$this->session->userdata('userdetails');
		if($logindetail['role_id']==5){
			$data['seller_details'] = $this->inventory_model->get_all_seller_details();
			//echo '<pre>';print_r($data);exit;
			$this->load->view('customer/inventry/sidebar');
			$this->load->view('customer/inventry/index',$data);
			$this->load->view('customer/inventry/footer');
		}else{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
		}
	  
	  }
	  else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	} 
  } 
  public function sellerdetails(){
  	
	 
	if($this->session->userdata('userdetails'))
	 {		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5){
				$data['seller_details'] = $this->inventory_model->get_all_seller_details();
				//echo '<pre>';print_r($data);exit;
				$this->load->view('customer/inventry/sidebar');
				$this->load->view('customer/inventry/sellerdetails',$data);
				$this->load->view('customer/inventry/footer');	
			}else{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
		}
		
	  
	  }
	  else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	} 
  }

	public function categories()
	{
		$data['category'] = $this->inventory_model->get_seller_categories();
		//echo "<pre>";print_r($data);exit;
	  	$this->load->view('customer/inventry/sidebar');
	  	$this->load->view('customer/inventry/categories',$data);
	  	$this->load->view('customer/inventry/footer');
		
	}

	public function category_wise_sellers()
	{
		$cid = base64_decode($this->uri->segment(3));
		//print_r($data);exit;
		$data['seller_category'] = $this->inventory_model->get_seller_names($cid);
		//echo "<pre>";print_r($data);exit;
	  	$this->load->view('customer/inventry/sidebar');
	  	$this->load->view('customer/inventry/category_wise_sellers',$data);
	  	$this->load->view('customer/inventry/footer');
	}

	public function seller_id_database()
	{
		$data['database_id'] = $this->inventory_model->get_seller_databaseid();
		//echo "<pre>";print_r($data);exit;
	   	$this->load->view('customer/inventry/sidebar');
	   	$this->load->view('customer/inventry/seller_databaseid',$data);
	   	$this->load->view('customer/inventry/footer');
	}


	public function seller_payments()
	{
		$data['seller_payment'] = $this->inventory_model->get_seller_payments();
		//echo "<pre>";print_r($data);exit;
	   	$this->load->view('customer/inventry/sidebar');
	   	$this->load->view('customer/inventry/seller_payments',$data);
	   	$this->load->view('customer/inventry/footer');
	}

	public function inventory_management()
	{
		$data['inventory_management'] = $this->inventory_model->get_inventory_management();
		//echo "<pre>";print_r($data);exit;
	   	$this->load->view('customer/inventry/sidebar');
	   	$this->load->view('customer/inventry/inventory_management',$data);
	   	$this->load->view('customer/inventry/footer');
	}
	public function catalog_management()
	{
		$data['catalog_management'] = $this->inventory_model->get_catalog_management();
		//echo "<pre>";print_r($data);exit;
	   	$this->load->view('customer/inventry/sidebar');
	   	$this->load->view('customer/inventry/catalog_management',$data);
	   	$this->load->view('customer/inventry/footer');
	}

	public function both()
	{
		$data['both'] = $this->inventory_model->get_both();
		//echo "<pre>";print_r($data);exit;
	   	$this->load->view('customer/inventry/sidebar');
	   	$this->load->view('customer/inventry/both',$data);
	   	$this->load->view('customer/inventry/footer');
	}


	public function home_page_banner()
	{
		$data['home_banner'] = $this->inventory_model->get_seller_banners();
		//echo "<pre>";print_r($data);exit;
	   	$this->load->view('customer/inventry/sidebar');
	   	$this->load->view('customer/inventry/home_page_banner',$data);
	   	$this->load->view('customer/inventry/footer');
	}
	public function banner_active(){
		$code = $_GET['id'];
		$arr = explode('__',$code);
		$cid = base64_decode($arr[0]);
		$status = base64_decode($arr[1]);
		if($status==1){
		$status=0;
		}else{
		$status=1;
		}
		$customerstatus= $this->inventory_model->banner_status_update($cid,$status);
		//echo "<pre>";print_r($customerstatus);exit;
		if(count($success)>0)
				{
					if($status==1){
						$this->session->set_flashdata('sucesmsg',"Banner successfully Activate");
					}else{
						$this->session->set_flashdata('sucesmsg',"Banner successfully deactivated.");
					}
					redirect('inventory/home_page_banner');
				}else{
					$this->session->set_flashdata('errormsg',"Banner successfully deactivated.");
					redirect('inventory/home_page_banner');
				}
	}
	public function top_offers()
	{
	   	$this->load->view('customer/inventry/sidebar');
	   	$this->load->view('customer/inventry/top_offers');
	   	$this->load->view('customer/inventry/footer');
	}
	public function deals_of_day()
	{
		$this->load->view('customer/inventry/header');
	   	$this->load->view('customer/inventry/sidebar');
	   	$this->load->view('customer/inventry/deals_of_day');
	   	$this->load->view('customer/inventry/footer');
	}
	public function season_sales()
	{
	   	$this->load->view('customer/inventry/sidebar');
	   	$this->load->view('customer/inventry/season_sales');
	   	$this->load->view('customer/inventry/footer');
	}
	public function others()
	{
	   	$this->load->view('customer/inventry/sidebar');
	   	$this->load->view('customer/inventry/others');
	   	$this->load->view('customer/inventry/footer');
	}

	
	
  
 

  
 




}		
?>