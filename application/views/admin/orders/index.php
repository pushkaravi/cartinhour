  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
      <div class="row">
       <div class="col-md-7">
           <h3 class="page-header"><i class="fa fa-list-ol" aria-hidden="true"></i>Orders</h3></div>
          <div class="col-md-5 pull-right">
         <form class="navbar-form" action="<?php echo base_url(); ?>admin/categories/search" method="post">
          <input class="form-control" placeholder="Search" name="search" type="text">
         <button class="btn btn-default" type="submit">Go!</button>
          </form>
            </div></div>
          <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
            <li><i class="fa fa-list-ol" aria-hidden="true"></i>Orders</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <section class="panel">
            <header class="panel-heading">
              <h3>Orders</h3>
            </header>
            <div class="panel-body"> 
            <!--  <a href="<?php //echo base_url(); ?>admin/admin_users/create"  class="add_item"><button class="btn btn-primary" type="submit">Add Admin Users</button></a>-->
             <div class="clearfix"></div>
              <div><?php echo $this->session->flashdata('message');?></div>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                 <th>S.No</th>
                <th>Order Id</th>
                <th>Product Name</th>
                <th>Delivery Date</th>
                <th>Delivery Time</th>
                <th>Customer Details</th>
                <th>Order Status</th>
                <th>Delete</th>
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

               <td class="text-center" style="color:<?php  if( $orders_data->order_status=='' || $orders_data->order_status=='0' ){echo "Red";}elseif($orders_data->order_status=='1'){echo "Blue";}elseif($orders_data->order_status=='2'){echo "Brown";}elseif($orders_data->order_status=='3'){echo "Green";}

         else{echo "Orange";} ?>;font-weight:bold">

        <?php  

        if($orders_data->order_status=='' || $orders_data->order_status=='0'){echo "Not Assigned";}
        elseif($orders_data->order_status=='1'){ ?> <a href="<?php echo base_url(); ?>admin/orders/assigned_orders"><?php echo "Assigned"; ?></a> <?php } 
         elseif($orders_data->order_status=='2'){ ?><a href="<?php echo base_url(); ?>admin/orders/inprogress_orders" style="color: Brown"><?php echo "In-Progress";  ?></a> <?php }
         elseif($orders_data->order_status=='3'){ ?> <a href="<?php echo base_url(); ?>admin/orders/delivered_orders" style="color: Green"><?php echo "Delivered";  ?></a> <?php }
        else{
          echo "N/A";
        }
        ?>

        </td>         

                   <td>  <a href="<?php echo base_url(); ?>admin/orders/delete/<?php  echo $orders_data->order_id; ?>" onclick="return checkDelete('<?php  echo $orders_data->order_id; ?>')"><i class="fa fa-trash-o" style="font-size:18px"></i></a></td>

                
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

<script language="JavaScript" type="text/javascript">

function checkDelete(id)
{
return confirm('Are you sure want to delete "'+id +'" Order?');
}

</script>



     