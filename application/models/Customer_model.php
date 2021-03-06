<?php
class Customer_model extends MY_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	
	/* item qty updating purpose*/
	public function get_item_details($itemid){
		$this->db->select('products.item_quantity')->from('products');		
		$this->db->where('item_id', $itemid);
		return $this->db->get()->row_array();
	}
	public function update_tem_qty_after_purchasingorder($itemid,$qty,$sellerid){
		$sql1="UPDATE products SET item_quantity ='".$qty."' WHERE item_id = '".$itemid."' AND seller_id = '".$sellerid."' ";
       	return $this->db->query($sql1);
	}	
	
	/* item qty updating purpose*/
	/* save orders purpose*/
	public function order_list($cust_id){
		$this->db->select('order_items.*,orders.transaction_id,products.item_name,products.item_description,products.item_image')->from('order_items');
		$this->db->join('products', 'products.item_id = order_items.item_id', 'left');
		$this->db->join('orders', 'orders.order_id = order_items.order_id', 'left');
		$this->db->where('order_items.customer_id', $cust_id);
		return $this->db->get()->result_array();
	}
	public function get_order_items($order_id){
		$this->db->select('order_items.*,products.item_name,products.item_description,products.item_image')->from('order_items');
		$this->db->join('products', 'products.item_id = order_items.item_id', 'left');
		$this->db->where('order_items.order_id', $order_id);
		return $this->db->get()->result_array();
	}
	public function save_order_billing_address($data){
		$this->db->insert('billing_address', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function save_order_success($data){
		$this->db->insert('orders', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function save_order_items_list($data){
		$this->db->insert('order_items', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function save_order_item_status_list($data){
		$this->db->insert('order_status', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function after_payment_cart_item($cust_id,$pid,$id){
		$sql1="DELETE FROM cart WHERE cust_id = '".$cust_id."' AND  item_id = '".$pid."' AND id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function get_successorder_total_amount($order_id){
		$sql="SELECT SUM(total_price) as pricetotalvalue ,SUM(delivery_amount) as delivertamount FROM order_items  WHERE order_id ='".$order_id."'";
        return $this->db->query($sql)->row_array();
	}
	
	/* save orders purpose*/
	
	public function save_billing_deails($data){
		$this->db->insert('billing_address', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function get_billing_details($custid){
		$this->db->select('billing_address.*,locations.location_name')->from('billing_address');
		$this->db->join('locations', 'locations.location_id = billing_address.area', 'left');
		$this->db->where('billing_address.cust_id',$custid);
		return $this->db->get()->row_array();
	}
	public function get_profile_details($custid){
		$this->db->select('customers.*,locations.location_name')->from('customers');
		$this->db->join('locations', 'locations.location_id = customers.area', 'left');
		$this->db->where('customers.customer_id',$custid);
		return $this->db->get()->row_array();
	}
	public function update_deails($custid,$data){
		$this->db->where('customer_id', $custid);
		return $this->db->update('customers', $data);
	}
	public function get_customer_details($custid){
		$this->db->select('*')->from('customers');
		$this->db->where('customer_id',$custid);
		return $this->db->get()->row_array();
	}
	public function email_unique_check($email){
		$this->db->select('*')->from('customers');
		$this->db->where('cust_email',$email);
		return $this->db->get()->row_array();
	}
	public function email_check($email){
		$sql="SELECT * FROM customers WHERE cust_email ='".$email."'";
        return $this->db->query($sql)->row_array(); 
	}
	public function mobile_check($mobile){
		$sql="SELECT * FROM customers WHERE cust_mobile ='".$mobile."'";
        return $this->db->query($sql)->row_array(); 
	}
	public function update_sear_area($custid,$areaid){
		$sql1="UPDATE customers SET area ='".$areaid."' WHERE customer_id = '".$custid."'";
       	return $this->db->query($sql1);
	}
	public function set_password($custid,$roleid,$pass){
		$sql1="UPDATE customers SET cust_password ='".$pass."' WHERE customer_id = '".$custid."' AND role_id ='".$roleid."'";
       	return $this->db->query($sql1);
	}
	public function getcustomer_oldpassword($cusid,$roleid){
		$sql="SELECT * FROM customers WHERE customer_id ='".$cusid."' AND role_id ='".$roleid."'";
        return $this->db->query($sql)->row_array(); 
	}
	public function login_verficationcode_save($email,$cid,$vericiationcode){
		$sql1="UPDATE customers SET forgot_verification ='".$vericiationcode."' WHERE cust_email = '".$email."' AND customer_id = '".$cid."'";
       	return $this->db->query($sql1);
	}
	public function login_verficationcode_mobile_save($mobile,$cid,$vericiationcode){
		$sql1="UPDATE customers SET forgot_verification ='".$vericiationcode."' WHERE cust_mobile = '".$mobile."' AND customer_id = '".$cid."'";
       	return $this->db->query($sql1);
	}
	public function check_opt($email,$otp){
		$sql = "SELECT * FROM customers WHERE cust_email ='".$email."' AND forgot_verification ='".$otp."'";
        return $this->db->query($sql)->row_array();
	}
	public function check_opt_mobile($mobile,$otp){
		$sql = "SELECT * FROM customers WHERE cust_mobile ='".$mobile."' AND forgot_verification ='".$otp."'";
        return $this->db->query($sql)->row_array();
	}
	public function update_password_mobile($pass,$cust_id,$mobile){
		$sql1="UPDATE customers SET cust_password ='".md5($pass)."' WHERE cust_mobile = '".$mobile."' AND customer_id = '".$cust_id."'";
       	return $this->db->query($sql1);
	}
	public function update_password_remove_otp($cust_id,$data){
		$sql1="UPDATE customers SET forgot_verification ='".$data."' WHERE customer_id = '".$cust_id."'";
       	return $this->db->query($sql1);
	}
	public function update_password($pass,$cust_id,$email){
		$sql1="UPDATE customers SET cust_password ='".md5($pass)."' WHERE cust_email = '".$email."' AND customer_id = '".$cust_id."'";
       	return $this->db->query($sql1);
	}
	public function forgot_login($email){
	$sql = "SELECT * FROM customers WHERE (cust_email ='".$email."') OR (cust_mobile ='".$email."')";
	return $this->db->query($sql)->row_array();		
	}
	public function get_user($cid,$email){
		$this->db->select('*')->from('customers');		
		$this->db->where('customer_id', $cid);
		$this->db->where('cust_email', $email);
		return $this->db->get()->row_array();
	}
	public function get_customers_details($cid){
		$this->db->select('*')->from('customers');		
		$this->db->where('customer_id', $cid);
		return $this->db->get()->row_array();
	}

	public function role_ids($email){
		$this->db->select('customers.role_id')->from('customers');
		$this->db->join('roles', 'roles.role_id = customers.role_id', 'left');		
		$this->db->where('cust_email', $email);	
        return $this->db->get()->row_array();
	}
	public function inve_login_details($email,$pass,$role_id){
		$this->db->select('*')->from('customers');		
		$this->db->where('cust_email', $email);
		$this->db->where('cust_password', $pass);
		$this->db->where('role_id', $role_id);
        return $this->db->get()->row_array();
	}

	public function login_details($email,$pass){
		$sql = "SELECT * FROM customers WHERE (cust_email ='".$email."' AND cust_password='".$pass."') OR (cust_mobile ='".$email."' AND cust_password='".$pass."')";
		return $this->db->query($sql)->row_array();	
	}
	
	public function save_customer($data){
		$this->db->insert('customers', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function get_product_details($itemid){
		$this->db->select('products.*,subcategories.commission')->from('products');
		$this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id', 'left');
		$this->db->where('item_id', $itemid);
        return $this->db->get()->row_array();
	}
	public function cart_products_save($data){
		$this->db->insert('cart', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function add_whishlist($data){
		$this->db->insert('item_wishlist', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function remove_whishlist($cust_id,$item_id){
		$sql1="DELETE FROM item_wishlist WHERE cust_id = '".$cust_id."' AND  item_id = '".$item_id."'";
		return $this->db->query($sql1);
	}
	public function get_whishlist_list($cust_id){
		$this->db->select('*')->from('item_wishlist');
		$this->db->where('cust_id', $cust_id);
        return $this->db->get()->result_array();
	}

	/* location search querys */
	public function get_product_search_top_offers($location_id){
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d h:i:s A');
		$this->db->select('products.*,top_offers.*')->from('products');
		$this->db->join('top_offers', 'top_offers.item_id = products.item_id', 'left');
		$this->db->where_in('seller_location_area',$location_id);
		$this->db->where_in('area',$location_id);
		$this->db->where('admin_status','0');
		$this->db->where('top_offers.expairdate >=', $curr_date);
		$this->db->order_by('products.offer_percentage desc');
		$this->db->where('products.item_status',1);
		return $this->db->get()->result_array();
	}
	public function get_product_search_deals_day($location_id){
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d h:i:s A');
		$this->db->select('products.*,deals_ofthe_day.*')->from('products');
		$this->db->join('deals_ofthe_day', 'deals_ofthe_day.item_id = products.item_id', 'left');
		$this->db->where_in('seller_location_area',$location_id);
		$this->db->where_in('area',$location_id);
		$this->db->where('admin_status','0');
		$this->db->where('deals_ofthe_day.expairdate >=', $curr_date);
		$this->db->order_by('products.offer_percentage desc');
		$this->db->where('products.item_status',1);
		return $this->db->get()->result_array();
	}
	public function get_product_search_seaaon_sales($location_id){
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d h:i:s A');
		$this->db->select('products.*,season_sales.*')->from('products');
		$this->db->join('season_sales', 'season_sales.item_id = products.item_id', 'left');
		$this->db->where_in('seller_location_area',$location_id);
		$this->db->where_in('area',$location_id);
		$this->db->where('admin_status','0');
		$this->db->where('season_sales.expairdate >=', $curr_date);
		$this->db->order_by('products.offer_percentage desc');
		$this->db->where('products.item_status',1);
		return $this->db->get()->result_array();
	}

	public function get_product_search_tredings($location_id){

		$this->db->select('products.*')->from('products');
		$this->db->where_in('seller_location_area',$location_id);
		$this->db->where('admin_status','0');
		$this->db->order_by('products.offer_percentage desc');
		$this->db->where('products.item_status',1);
		return $this->db->get()->result_array();
	}
	public function get_product_search_offers_for_you($location_id){

		$this->db->select('products.*')->from('products');
		$this->db->where_in('seller_location_area',$location_id);
		$this->db->where('admin_status','0');
		$this->db->order_by('products.offer_percentage desc');
		$this->db->where('products.item_status',1);
		return $this->db->get()->result_array();
	}
	public function get_cart_products($cust_id){
		$this->db->select('cart.*,products.item_name,products.item_image,products.item_cost,products.offer_amount,products.offer_percentage,offer_amount,products.offer_combo_item_id,products.offer_type,products.offer_expairdate,products.offer_time')->from('cart');
		$this->db->join('products', 'products.item_id = cart.item_id', 'left');
		$this->db->where('cart.cust_id', $cust_id);
        return $this->db->get()->result_array();
	}
	public function get_cart_Items_names($cust_id){
		$this->db->select('products.item_name')->from('cart');
		$this->db->join('products', 'products.item_id = cart.item_id', 'left');
		$this->db->where('cart.cust_id', $cust_id);
        return $this->db->get()->result_array();
	}
	public function get_cart_total_amount($cust_id){
		$sql="SELECT count(item_id) as itemcount ,SUM(total_price) as pricetotalvalue ,SUM(delivery_amount) as delivertamount FROM cart  WHERE cust_id ='".$cust_id."'";
        return $this->db->query($sql)->row_array();
	}
	public function get_whishlist_products($cust_id){
		$this->db->select('item_wishlist.*,products.*')->from('item_wishlist');
		$this->db->join('products', 'products.item_id = item_wishlist.item_id', 'left');
		$this->db->where('item_wishlist.cust_id', $cust_id);
        return $this->db->get()->result_array();
	}
	public function update_cart_qty($cust_id,$pid,$data){
	
		 $this->db->where('cust_id',$cust_id);
		 $this->db->where('item_id',$pid);
    	return $this->db->update("cart",$data);
	}
	public function delete_cart_item($cust_id,$pid,$id){
		$sql1="DELETE FROM cart WHERE cust_id = '".$cust_id."' AND  item_id = '".$pid."' AND id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function delete_wishlist_item($cust_id,$wishlistid){
		$sql1="DELETE FROM item_wishlist WHERE cust_id = '".$cust_id."' AND  id = '".$wishlistid."'";
		return $this->db->query($sql1);
	}
	public function setpassword_user($custid,$pass){
		$sql1="UPDATE customers SET cust_password ='".$pass."' WHERE customer_id = '".$custid."'";
       	return $this->db->query($sql1);
	}
	public function get_order_items_lists($custid){
			$this->db->select('order_items.*')->from('order_items');
			$this->db->join('billing_address', 'billing_address.order_id = order_items.order_id', 'left');
			$this->db->join('locations', 'locations.location_id = billing_address.area', 'left');
			$this->db->where('order_items.customer_id', $custid);
			return $this->db->get()->result_array();
	}
	public function get_order_items_refund_list($order_id){
			$this->db->select('order_status.*')->from('order_status');
			$this->db->where('order_status.order_item_id', $order_id);
			return $this->db->get()->row_array();
	}
	public function get_order_items_track_list($custid){
			$this->db->select('order_items.*,products.item_name,orders.card_number,orders.discount,orders.card_number,orders.payment_mode,order_status.status_confirmation,order_status.status_packing,order_status.status_road,order_status.status_deliverd,order_status.status_refund,(order_status.create_time)AS createedattime,(order_status.update_time)AS updatetime,billing_address.name,billing_address.mobile,billing_address.emal_id,billing_address.address1,billing_address.address2,locations.location_name')->from('order_items');
			$this->db->join('products', 'products.item_id = order_items.item_id', 'left');
			$this->db->join('orders', 'orders.order_id = order_items.order_id', 'left');
			$this->db->join('order_status', 'order_status.order_item_id = order_items.order_item_id', 'left');
			$this->db->join('billing_address', 'billing_address.order_id = order_items.order_id', 'left');
			$this->db->join('locations', 'locations.location_id = billing_address.area', 'left');
			$this->db->where('order_items.customer_id', $custid);
			$this->db->order_by('order_items.order_item_id desc');
			return $this->db->get()->result_array();
	}
	public function get_order_items_list($custid,$order_id){
			$this->db->select('order_items.*,products.item_name,orders.card_number,orders.discount,orders.card_number,orders.payment_mode,order_status.status_confirmation,order_status.status_packing,order_status.status_road,order_status.status_deliverd,order_status.status_refund,(order_status.create_time)AS createedattime,(order_status.update_time)AS updatetime,billing_address.name,billing_address.mobile,billing_address.emal_id,billing_address.address1,billing_address.address2,locations.location_name')->from('order_items');
			$this->db->join('products', 'products.item_id = order_items.item_id', 'left');
			$this->db->join('orders', 'orders.order_id = order_items.order_id', 'left');
			$this->db->join('order_status', 'order_status.order_item_id = order_items.order_item_id', 'left');
			$this->db->join('billing_address', 'billing_address.order_id = order_items.order_id', 'left');
			$this->db->join('locations', 'locations.location_id = billing_address.area', 'left');
			$this->db->where('order_items.customer_id', $custid);
			$this->db->where('order_items.order_item_id', $order_id);
			return $this->db->get()->row_array();
	}
	public function update_refund_details($status_id,$data){
		$this->db->where('status_id', $status_id);
		return $this->db->update('order_status', $data);
	}
	public function update_refund_details_inorders($status_id,$data){
		$this->db->where('order_item_id', $status_id);
		return $this->db->update('order_items', $data);
	}
	public function get_color_lists($itemid){
			$this->db->select('*')->from('product_color_list');
			$this->db->where('item_id', $itemid);
			$this->db->where('status', 1);
			return $this->db->get()->result_array();
	}
	public function get_sizes_lists($itemid){
			$this->db->select('*')->from('product_size_list');
			$this->db->where('item_id', $itemid);
			$this->db->where('status', 1);
			return $this->db->get()->result_array();
	}
	public function get_product_details_for_subcats($itemid){
				$this->db->select('products.item_id,products.category_id,products.subcategory_id')->from('products');
				$this->db->where('item_id', $itemid);
				$this->db->where('item_status', 1);
				return $this->db->get()->row_array();
	}

	
	
}
?>