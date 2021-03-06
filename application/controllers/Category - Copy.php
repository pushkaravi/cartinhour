<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_Controller.php');
class Category extends Front_Controller 
{	
	public function __construct() 
  {

		parent::__construct();	
			$this->load->helper(array('url','html','form'));
			$this->load->library('session');
			$this->load->model('category_model'); 
			
 }
 
 public function categorywiseearch(){
	$removesearch= $this->category_model->get_all_previous_search_fields();
	foreach ($removesearch as $list){
		$this->category_model->delete_privous_searchdata($list['id']);
	} 
	$post=$this->input->post();
	echo '<pre>';print_r($post);exit;
	$ip=$this->input->ip_address();
	if(isset($post['products']['cusine']) && count($post['products']['cusine'])>0){
		foreach($post['products']['cusine'] as $list){
				$data8=array(
				'Ip_address'=>$ip,
				'category_id'=>base64_decode($post['categoryid']),
				'cusine'=>$list,
				'mini_amount'=>isset($post['min_amount']) ? $post['min_amount']:'',
				'max_amount'=>isset($post['max_amount']) ? $post['max_amount']:'',
				'status'=>isset($post['products']['availability']) ? $post['products']['availability']:'',

				);
				//echo '<pre>';print_r($data);
			$brand8= $this->category_model->save_searchdata($data8);
			}
	}
	if(isset($post['products']['res']) && count($post['products']['res'])>0){
		foreach($post['products']['res'] as $list){
				$data8=array(
				'Ip_address'=>$ip,
				'category_id'=>base64_decode($post['categoryid']),
				'restraent'=>$list,
				'mini_amount'=>isset($post['min_amount']) ? $post['min_amount']:'',
				'max_amount'=>isset($post['max_amount']) ? $post['max_amount']:'',
				'status'=>isset($post['products']['availability']) ? $post['products']['availability']:'',

				);
				//echo '<pre>';print_r($data);
			$brand8= $this->category_model->save_searchdata($data8);
			}
	}
	if(isset($post['products']['offers']) && count($post['products']['offers'])>0){
		foreach($post['products']['offers'] as $list){
				$data7=array(
				'Ip_address'=>$ip,
				'category_id'=>base64_decode($post['categoryid']),
				'offers'=>$list,
				'mini_amount'=>isset($post['min_amount']) ? $post['min_amount']:'',
				'max_amount'=>isset($post['max_amount']) ? $post['max_amount']:'',
				'status'=>isset($post['products']['availability']) ? $post['products']['availability']:'',

				);
			$brand7= $this->category_model->save_searchdata($data7);
			}
	}
	if(isset($post['products']['brand']) && count($post['products']['brand'])>0){
		foreach($post['products']['brand'] as $list){
				$data6=array(
				'Ip_address'=>$ip,
				'category_id'=>base64_decode($post['categoryid']),
				'brand'=>$list,
				'mini_amount'=>isset($post['min_amount']) ? $post['min_amount']:'',
				'max_amount'=>isset($post['max_amount']) ? $post['max_amount']:'',
				'status'=>isset($post['products']['availability']) ? $post['products']['availability']:'',

				);
			$brand6= $this->category_model->save_searchdata($data6);
			}
	}
	if(isset($post['products']['discount']) && count($post['products']['discount'])>0){
		foreach($post['products']['discount'] as $list){
				$data5=array(
				'Ip_address'=>$ip,
				'category_id'=>base64_decode($post['categoryid']),
				'discount'=>$list,
				'mini_amount'=>isset($post['min_amount']) ? $post['min_amount']:'',
				'max_amount'=>isset($post['max_amount']) ? $post['max_amount']:'',
				'status'=>isset($post['products']['availability']) ? $post['products']['availability']:'',

				);
			$brand5= $this->category_model->save_searchdata($data5);
			}
	}
	if(isset($post['products']['discount']) && count($post['products']['discount'])>0){
		foreach($post['products']['discount'] as $list){
				$data4=array(
				'Ip_address'=>$ip,
				'category_id'=>base64_decode($post['categoryid']),
				'discount'=>$list,
				'mini_amount'=>isset($post['min_amount']) ? $post['min_amount']:'',
				'max_amount'=>isset($post['max_amount']) ? $post['max_amount']:'',
				'status'=>isset($post['products']['availability']) ? $post['products']['availability']:'',

				);
			$brand4= $this->category_model->save_searchdata($data4);
			}
	}
	if(isset($post['products']['size']) && count($post['products']['size'])>0){
		foreach($post['products']['size'] as $list){
				$data3=array(
				'Ip_address'=>$ip,
				'category_id'=>base64_decode($post['categoryid']),
				'size'=>$list,
				'mini_amount'=>isset($post['min_amount']) ? $post['min_amount']:'',
				'max_amount'=>isset($post['max_amount']) ? $post['max_amount']:'',
				'status'=>isset($post['products']['availability']) ? $post['products']['availability']:'',
				);
			$brand3= $this->category_model->save_searchdata($data3);
			}
	}
	if(isset($post['products']['color']) && count($post['products']['color'])>0){
		foreach($post['products']['color'] as $list){
				$data2=array(
				'Ip_address'=>$ip,
				'category_id'=>base64_decode($post['categoryid']),
				'color'=>$list,
				'mini_amount'=>isset($post['min_amount']) ? $post['min_amount']:'',
				'max_amount'=>isset($post['max_amount']) ? $post['max_amount']:'',
				'status'=>isset($post['products']['availability']) ? $post['products']['availability']:'',
				);
			$brand2= $this->category_model->save_searchdata($data2);
			}
	}
	
	$data1=array(
	'Ip_address'=>$ip,
	'category_id'=>base64_decode($post['categoryid']),
	'mini_amount'=>isset($post['min_amount']) ? $post['min_amount']:'',
	'max_amount'=>isset($post['max_amount']) ? $post['max_amount']:'',
	'status'=>isset($post['products']['availability']) ? $post['products']['availability']:'',
	'create'=>date('Y-m-d H:i:s'),
	);
	//echo '<pre>';print_r($data1);
	//exit;
	$brand1= $this->category_model->save_searchdata($data1);
	if(count($brand1)>0){
		redirect('category/filtersearch');
		
	}
		
	
	

}
function filtersearch(){

	$data=array();
	$data['subcategory_list']= $this->category_model->get_all_subcategory_list();
	$subcategory_porduct_list= $this->category_model->get_search_all_subcategory_products();
	$catid= $this->category_model->get_search_all_category_id();
	//echo '<pre>';print_r($subcategory_porduct_list);exit;
		foreach ($catid as $lists){
		$categoryid=$lists['category_id'];
		}
		foreach ($catid as $lists){
		$categoryid=$lists['category_id'];
		}
		foreach ($subcategory_porduct_list as $lists){
				foreach ($lists as $li){
						$idslist[]=$li['item_id'];
						$products[]=$li;
					}
		}
	$result = array_unique($idslist);
	//echo '<pre>';print_r($result);exit;
	foreach ($result as $pids){
		$products_list[]=$this->category_model->get_product_details($pids);

	}
	
	$data['subcategory_porduct_list']=$products_list;
	$data['previousdata']= $this->category_model->get_all_previous_search_fields();
	$caterory_id=$categoryid;
	$data['category_id']=$categoryid;
		
	if($caterory_id==18){
		$data['cusine_list']= $this->category_model->get_all_cusine_list($caterory_id);
		$data['myrestaurant']= $this->category_model->get_all_myrestaurant_list($caterory_id);
		$data['price_list']= $this->category_model->get_all_price_list($caterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);

		$data['minimum_price'] = reset($data['price_list']);
		$data['maximum_price'] = end($data['price_list']);

		
	}else if($caterory_id==21){
		$data['brand_list']= $this->category_model->get_all_brand_list($caterory_id);
		$data['price_list']= $this->category_model->get_all_price_list($caterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list($caterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$data['offer_list']= $this->category_model->get_all_offer_list($caterory_id);
		$data['minimum_price'] = reset($data['price_list']);
		$data['maximum_price'] = end($data['price_list']);
	}else if($caterory_id==20){
		$data['brand_list']= $this->category_model->get_all_brand_list($caterory_id);
		$data['price_list']= $this->category_model->get_all_price_list($caterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list($caterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$data['offer_list']= $this->category_model->get_all_offer_list($caterory_id);
		$data['color_list']= $this->category_model->get_all_color_list($caterory_id);
		$data['minimum_price'] = reset($data['price_list']);
		$data['maximum_price'] = end($data['price_list']);
	}else if($caterory_id==19){
		$data['brand_list']= $this->category_model->get_all_brand_list($caterory_id);
		$data['price_list']= $this->category_model->get_all_price_list($caterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list($caterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$data['offer_list']= $this->category_model->get_all_offer_list($caterory_id);
		$data['color_list']= $this->category_model->get_all_color_list($caterory_id);
		$data['sizes_list']= $this->category_model->get_all_size_list($caterory_id);
		$data['minimum_price'] = reset($data['price_list']);
		$data['maximum_price'] = end($data['price_list']);
	}
	$data['category_name']= $this->category_model->get_category_name($caterory_id);

	//echo '<pre>';print_r($data);exit;
	$this->template->write_view('content', 'customer/filters_search',$data);
	$this->template->render();
	

}	
 public function categorywiseproductslist(){
	 
	$post=$this->input->post();
	$data['subcategory_porduct_list']= $this->category_model->get_all_subcategory_products_list($post['subcategoryid']);
	//echo '<pre>';print_r($data);exit;
	$this->load->view('customer/subcategorywiseproducts',$data);
	//echo '<pre>';print_r($data);exit;
} 
 public function subcategoryview(){
	 
	$removesearch= $this->category_model->get_all_previous_search_fields();
	foreach ($removesearch as $list){
		$this->category_model->delete_privous_searchdata($list['id']);
	}
	$caterory_id=base64_decode($this->uri->segment(3));
	$data['subcategory_list']= $this->category_model->get_all_subcategory($caterory_id);
	$data['category_name']= $this->category_model->get_category_name($caterory_id);
	$data['subcategory_porduct_list']= $this->category_model->get_all_subcategory_product($caterory_id);
	$data['category_id']=$this->uri->segment(3);
	if($caterory_id==18){
		$data['cusine_list']= $this->category_model->get_all_cusine_list($caterory_id);
		$data['myrestaurant']= $this->category_model->get_all_myrestaurant_list($caterory_id);
		$data['price_list']= $this->category_model->get_all_price_list($caterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);

		$data['minimum_price'] = reset($data['price_list']);
		$data['maximum_price'] = end($data['price_list']);
		
	}else if($caterory_id==21){
		$data['brand_list']= $this->category_model->get_all_brand_list($caterory_id);
		$data['price_list']= $this->category_model->get_all_price_list($caterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list($caterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$data['offer_list']= $this->category_model->get_all_offer_list($caterory_id);
		$data['minimum_price'] = reset($data['price_list']);
		$data['maximum_price'] = end($data['price_list']);
		
	}else if($caterory_id==20){
		$data['brand_list']= $this->category_model->get_all_brand_list($caterory_id);
		$data['price_list']= $this->category_model->get_all_price_list($caterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list($caterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$data['offer_list']= $this->category_model->get_all_offer_list($caterory_id);
		$data['color_list']= $this->category_model->get_all_color_list($caterory_id);
		$data['minimum_price'] = reset($data['price_list']);
		$data['maximum_price'] = end($data['price_list']);
		
	}else if($caterory_id==19){
		$data['brand_list']= $this->category_model->get_all_brand_list($caterory_id);
		$data['price_list']= $this->category_model->get_all_price_list($caterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list($caterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$data['offer_list']= $this->category_model->get_all_offer_list($caterory_id);
		$data['color_list']= $this->category_model->get_all_color_list($caterory_id);
		$data['sizes_list']= $this->category_model->get_all_size_list($caterory_id);
		$data['minimum_price'] = reset($data['price_list']);
		$data['maximum_price'] = end($data['price_list']);
	}
	//echo '<pre>';print_r($data);exit;
	$this->template->write_view('content', 'customer/subcategoryview',$data);
	$this->template->render();
	
 }
 public function view(){
	 
	$caterory_id=base64_decode($this->uri->segment(3));
	$data['category_list']= $this->category_model->get_all_products($caterory_id);
	//echo $this->db->last_query();exit;
	$data['category_name']= $this->category_model->get_category($caterory_id);
	$data['stock']= $this->category_model->get_product_stock($caterory_id);
	//echo '<pre>';print_r($data);exit;
	$this->template->write_view('content', 'customer/categoryproducts', $data);
	$this->template->render();
	
 }
 public function views(){
	 
	$caterory_id=base64_decode($this->uri->segment(3));
	$data['category_list']= $this->category_model->get_list_products($caterory_id);
	$data['listcategory']= $this->category_model->get_list_categories($caterory_id);
	//echo $this->db->last_query();exit;
//echo '<pre>';print_r($data);exit;
	$this->template->write_view('content', 'customer/categoryview', $data);
	$this->template->render();
	
 }
 public function categorysearch(){
	 

	$post = $this->input->post();
	//echo '<pre>';print_r($post);exit;
	$stack = $post['sub_cat_id'];
	$uniqueid=array(0,1);
	  array_push($stack, $uniqueid);
	//$this->session->set_userdata('sessiontag',$stack);
	$this->session->set_userdata('billingaddress',$stack); 
	$dd=$this->session->userdata('billingaddress')	;
	echo '<pre>';print_r($dd);exit;
	
	array_push($stack, "0");
	print_r($stack);
	exit;

	
 }
  
 public function productview(){

	 
	$pid=base64_decode($this->uri->segment(3));

	//echo '<pre>';print_r($pid);exit;
	$data['products_list']= $this->category_model->get_products($pid);
	$data['products_reviews']= $this->category_model->get_products_reviews($pid);
	//echo '<pre>';print_r($data);exit;
	$this->template->write_view('content', 'customer/productview', $data);
	$this->template->render();
	//echo '<pre>';print_r($data);exit;
 }

 public function productreview(){
	 
	$post=$this->input->post();
	//echo '<pre>';print_r($post);exit;
	$details=array(
	'item_id'=>$post['product_id'],
	'name'=>$post['name'],
	'email'=>$post['email'],
	'review_content'=>$post['review'],
	);
	$savereview= $this->category_model->save_review($details);
	if(count($savereview)>0){
		$this->session->set_flashdata('success',"review Successfully Submitted");
		redirect('category/productview/'.base64_encode($post['product_id']));	
	}else{
		$this->session->set_flashdata('error',"Error will occured!");
		redirect('category/productview/'.base64_encode($post['product_id']));	
	}

	//echo '<pre>';print_r($data);exit;
 }

 
 public function productscompare()
 {

 	$pid=base64_decode($this->uri->segment(3));
 	$category_ld =base64_decode($this->uri->segment(4));
 	//print_r($category_ld);exit;
	$data['compore_products']= $this->category_model->get_products($pid);
	$data['item']=$this->category_model->getsubitemdata($category_ld);
	$this->template->write_view('content', 'customer/compare',$data);
	$this->template->render();
	
 }


	public function compare_items_list()
	{
		$items=$this->input->post('item_id');
		$category =$this->input->post('category_id');
		//print_r($category_ld);exit;
		$data['compare_one']=$this->category_model->getcompare_item_details($items);
		$data['items']=$this->category_model->getsubitemdata($category);
		//print_r($data);exit;
		$this->load->view('customer/compareone',$data);

	}
	public function compare_items_list_two()
	{
		$items=$this->input->post('item_id');
		$data['compare_two']=$this->category_model->getcompare_item_details($items);
		//print_r($data);exit;
		$this->load->view('customer/comparetwo',$data);
  		

	}	
}
?>