  <!--main content start-->
   <div class="col-md-9">
  <section id="main-content">
    <section class="wrapper">
      
      <div class="row">
        <div class="col-md-12">
          <section class="panel">
            <header class="panel-heading">
              <h3>Delivered Orders</h3>
            </header>
            <div class="panel-body"> 
            <!--  <a href="<?php //echo base_url(); ?>seller_admin/seller_admin_users/create"  class="add_item"><button class="btn btn-primary" type="submit">Add seller_admin Users</button></a>-->
             <div class="clearfix"></div>
              <div><?php echo $this->session->flashdata('message');?></div>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                 <th>S.No</th>
                 <th>Order Id</th>
                  <th>Seller Name</th>
                <th>Product Id</th>
                 <th>Deliveryboy Name</th>
                <th>Product Name</th>
                <th>Delivery Date</th>
                <th>Delivery Time</th>
                <th>Customer Details</th>
               <th>Pick Date&Time</th>
                <th>Delivered Date&Time</th>
                <th>Payment Mode</th>

                    </tr>
                  </thead>
                  <?php if(!empty($ordersdata)): ?>

              <tbody>
                <?php $count = $this->uri->segment(4, 0);

   foreach($ordersdata as $orders_data){
     ?>

                <tr>
                  <td><?= ++$count ?></td>
                   <td><?php  echo $orders_data->order_id; ?></td>
                   <td><?php  echo $orders_data->seller_name; ?></td>
                  <td><?php  echo $orders_data->item_id; ?></td>
                  <td><?php 
                      if(isset($orders_data->deliveryboy_id) && $orders_data->deliveryboy_id!=0 &&  $orders_data->deliveryboy_id!='')
                      {
                                $this->db->select('deliveryboy_name');
                                $this->db->where('deliveryboy_id',$orders_data->deliveryboy_id);
                      $query =  $this->db->from('deliveryboy')->get();

                      if($query->num_rows() > 0)
                       {
                              $ret = $query->row();
                              if(isset($ret->deliveryboy_name) && $ret->deliveryboy_name!='')
                              {
                           echo  $ret->deliveryboy_name; 
                         }else
                         {
                          echo '--';
                         }
}else
                         {
                          echo '--';
                         } 
}else
                         {
                          echo '--';
                         } ?></td>
                  <td><?php  echo $orders_data->product_name; ?></td>
                 <td><?php  echo $orders_data->delivery_date; ?></td>
                  <td><?php  echo $orders_data->delivery_time; ?></td>

                   <td><table class="table table-bordered qtytable">
                    <tbody>
                      <tr>
                        <th>Name</th>
                        <td><?php  echo $orders_data->customer_name; ?></td>
                      </tr>
                      <tr>
                        <th>Mobile</th>
                        <td><?php  echo $orders_data->customer_phone; ?></td>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <td><?php  echo $orders_data->customer_email; ?></td>
                      </tr>
                      <tr>
                        <th>Address</th>
                        <td><?php  echo $orders_data->customer_address; ?></td>
                      </tr>
                    </tbody>
                  </table></td>
                <td><?php  echo $orders_data->pickup_time; ?></td>
                 <td><?php  echo $orders_data->delivered_time; ?></td>
                  <td><?php  echo $orders_data->payment_mode; ?></td>
                </tr>

                <?php } ?>

              </tbody>

              <?php else: ?>

              <center>

                <strong>No Records Found</strong>

              </center>

              <?php endif; ?>
                </table>
                <center><?= $this->pagination->create_links(); ?></center>
              </div>
            </div>
          </section>
        </div>
      </div>
      <!-- page start--> 
      <!-- page end--> 
    </section>
  </section>
  <!--main content end--> 
  </div>
  </div>
  </div>
  </div>