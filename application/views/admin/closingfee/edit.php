 <!--main content start-->  <section id="main-content">    <section class="wrapper">      <div class="row">        <div class="col-lg-12">          <h3 class="page-header"><i class="fa fa-users" aria-hidden="true"></i>Edit Closing Fee</h3>         <ol class="breadcrumb">            <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>category/dashboard">Home</a></li>            <li><i class="fa fa-users" aria-hidden="true"></i>Closing Fee</li>           <!-- <li><i class="fa fa-square-o"></i>Starters</li>-->          </ol>        </div>      </div>      <div class="row">        <div class="col-lg-12">          <section class="panel">            <header class="panel-heading"> Edit Closing Fee </header>            <div class="panel-body">             <form action="<?php echo base_url(); ?>admin/closingfee/update/<?php echo $this->uri->segment(4); ?>" method="post">               <div class="form-group nopaddingRight col-md-6">                  <label for="exampleInputEmail1">Product Price</label>                  <input type="text" name="product_price" id="product_price" value="<?php if(isset($closingdata->product_price)) { echo $closingdata->product_price; } else { echo set_value('product_price'); }?>" class="form-control col-md-7 col-xs-12">                      <span style="color:red"> <?php echo form_error('product_price'); ?> </span>                </div>								<div class="form-group nopaddingRight col-md-6">                  <label for="exampleInputEmail1">Closing Fee</label>                  <input type="text" name="closing_fee" id="closing_fee" value="<?php if(isset($closingdata->closing_fee)) { echo $closingdata->closing_fee; } else { echo set_value('closing_fee'); }?>" class="form-control col-md-7 col-xs-12">                      <span style="color:red"> <?php echo form_error('closing_fee'); ?> </span>                </div>               <div class="clearfix"></div>                <button type="submit" class="btn btn-primary">Submit</button>                <button type="submit" class="btn btn-danger" onclick="window.location='<?php echo base_url(); ?>admin/closingfee';return false;">Cancel</button>              </form>            </div>          </section>        </div>      </div>      <!-- page start-->       <!-- page end-->     </section>  </section>  <!--main content end--> 