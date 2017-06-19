  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
        <div class="row">
        <div class="col-lg-12">
      <div class="row">
       <div class="col-md-7">
           <h3 class="page-header"><i class="fa fa-credit-card" aria-hidden="true"></i>Deliveryboys Locations</h3></div>
          <div class="col-md-5 pull-right">
       <!--  <form class="navbar-form" action="<?php echo base_url(); ?>admin/deliveryboy_location/search" method="post">
          <input class="form-control" placeholder="Search" name="search" type="text">
         <button class="btn btn-default" type="submit">Go!</button>
          </form> -->
            </div></div>
          <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
            <li><i class="fa fa-credit-card" aria-hidden="true"></i>Deliveryboys Locations</li>
          </ol>
        </div>
      </div>
     <div class="row">
        <div class="col-md-12">
          <section class="panel">
            <header class="panel-heading">
              <h3>Deliveryboys Locations</h3>
            </header>
            <div class="panel-body">
             <div><?php echo $this->session->flashdata('message');?></div>
            <!--   <a href="<?php echo base_url(); ?>admin/admin_users/create"  class="add_item"><button class="btn btn-primary" type="submit">Add Admin Users</button></a>-->
             <div class="clearfix"></div>
             
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                 <th>S.No</th>
                 <th>Deliveryboy Id</th>
                <th>Longitude</th>
                <th>Latitute</th>
                <th>Location</th>
                <th>Status</th>
                <th>Date & Time</th>
                <th>Delete</th>
                    </tr>
                  </thead>
                  <?php if(!empty($deliveryboy_locationdata)): ?>

              <tbody>
                <?php $count = $this->uri->segment(4, 0);

   foreach($deliveryboy_locationdata as $deliveryboy_location_data){

     $total = 0;

     ?>

                <tr>

                  <td><?= ++$count ?></td>

                
                  <td><?php  echo $deliveryboy_location_data->deliveryboy_id; ?></td>
                  <td><?php  echo $deliveryboy_location_data->longitude; ?></td>
                  <td><?php  echo $deliveryboy_location_data->latitude; ?></td>
                  <td><?php  echo $deliveryboy_location_data->location; ?></td>
             <td>     <?php  

        if($deliveryboy_location_data->status=='0' ){echo "Free";}
        elseif($deliveryboy_location_data->status=='1'){echo "Busy";}
        else{
          echo "N/A";
        }
        ?>

        </td>  
                  
                 <td><?php  echo $deliveryboy_location_data->created_at; ?></td>

                   <td>  <a href="<?php echo base_url(); ?>admin/deliveryboy_location/delete/<?php  echo $deliveryboy_location_data->deliveryboy_location_id; ?>" onclick="return checkDelete('<?php  echo $deliveryboy_location_data->deliveryboy_location_id; ?>')"><i class="fa fa-trash-o" style="font-size:18px"></i></a></td>

                
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
return confirm('Are you sure want to delete "'+id +'" payment?');
}

</script>



     