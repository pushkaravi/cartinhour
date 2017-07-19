<style>
.process-step .btn:focus{outline:none}
.process{display:table;width:100%;position:relative}
.process-row{display:table-row}
.process-step button[disabled]{opacity:1 !important;filter: alpha(opacity=100) !important}
.process-row:before{top:40px;bottom:0;position:absolute;content:" ";width:100%;height:1px;background-color:#ccc;z-order:0}
.process-step{display:table-cell;text-align:center;position:relative}
.process-step p{margin-top:4px}
.btn-circle{width:80px;height:80px;text-align:center;font-size:12px;border-radius:50%}
.pos_re{
	top:44;
	right:-80px;
	position: absolute;
}
	 /* multiselect css start */
 .chosen-select {
  width: 100%; }

.chosen-select-deselect {
  width: 100%; }

.chosen-container {
  display: inline-block;
  font-size: 14px;
  position: relative;
  vertical-align: middle; }
  .chosen-container .chosen-drop {
    background: #fff;
    border: 1px solid #ccc;
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
    -webkit-box-shadow: 0 8px 8px rgba(0, 0, 0, 0.25);
    box-shadow: 0 8px 8px rgba(0, 0, 0, 0.25);
    margin-top: -1px;
    position: absolute;
    top: 100%;
    left: -9000px;
    z-index: 1060; }
  .chosen-container.chosen-with-drop .chosen-drop {
    left: 0;
    right: 0; }
  .chosen-container .chosen-results {
    color: #555555;
    margin: 0 4px 4px 0;
    max-height: 240px;
    padding: 0 0 0 4px;
    position: relative;
    overflow-x: hidden;
    overflow-y: auto;
    -webkit-overflow-scrolling: touch; }
    .chosen-container .chosen-results li {
      display: none;
      line-height: 1.42857;
      list-style: none;
      margin: 0;
      padding: 5px 6px; }
      .chosen-container .chosen-results li em {
        background: #feffde;
        font-style: normal; }
      .chosen-container .chosen-results li.group-result {
        display: list-item;
        cursor: default;
        color: #999;
        font-weight: bold; }
      .chosen-container .chosen-results li.group-option {
        padding-left: 15px; }
      .chosen-container .chosen-results li.active-result {
        cursor: pointer;
        display: list-item; }
      .chosen-container .chosen-results li.highlighted {
        background-color: #337ab7;
        background-image: none;
        color: white; }
        .chosen-container .chosen-results li.highlighted em {
          background: transparent; }
      .chosen-container .chosen-results li.disabled-result {
        display: list-item;
        color: #777777; }
    .chosen-container .chosen-results .no-results {
      background: #eeeeee;
      display: list-item; }
  .chosen-container .chosen-results-scroll {
    background: white;
    margin: 0 4px;
    position: absolute;
    text-align: center;
    width: 321px;
    z-index: 1; }
    .chosen-container .chosen-results-scroll span {
      display: inline-block;
      height: 1.42857;
      text-indent: -5000px;
      width: 9px; }
  .chosen-container .chosen-results-scroll-down {
    bottom: 0; }
    .chosen-container .chosen-results-scroll-down span {
      background: url("chosen-sprite.png") no-repeat -4px -3px; }
  .chosen-container .chosen-results-scroll-up span {
    background: url("chosen-sprite.png") no-repeat -22px -3px; }

.chosen-container-single .chosen-single {
  background-color: #fff;
  -webkit-background-clip: padding-box;
  -moz-background-clip: padding;
  background-clip: padding-box;
  border: 1px solid #ccc;
  border-top-right-radius: 4px;
  border-top-left-radius: 4px;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  color: #555555;
  display: block;
  height: 34px;
  overflow: hidden;
  line-height: 34px;
  padding: 0 0 0 8px;
  position: relative;
  text-decoration: none;
  white-space: nowrap; }
  .chosen-container-single .chosen-single span {
    display: block;
    margin-right: 26px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap; }
  .chosen-container-single .chosen-single abbr {
    background: url("chosen-sprite.png") right top no-repeat;
    display: block;
    font-size: 1px;
    height: 10px;
    position: absolute;
    right: 26px;
    top: 12px;
    width: 12px; }
    .chosen-container-single .chosen-single abbr:hover {
      background-position: right -11px; }
  .chosen-container-single .chosen-single.chosen-disabled .chosen-single abbr:hover {
    background-position: right 2px; }
  .chosen-container-single .chosen-single div {
    display: block;
    height: 100%;
    position: absolute;
    top: 0;
    right: 0;
    width: 18px; }
    .chosen-container-single .chosen-single div b {
      background: url("chosen-sprite.png") no-repeat 0 7px;
      display: block;
      height: 100%;
      width: 100%; }
.chosen-container-single .chosen-default {
  color: #777777; }
.chosen-container-single .chosen-search {
  margin: 0;
  padding: 3px 4px;
  position: relative;
  white-space: nowrap;
  z-index: 1000; }
  .chosen-container-single .chosen-search input[type="text"] {
    background: url("chosen-sprite.png") no-repeat 100% -20px, #fff;
    border: 1px solid #ccc;
    border-top-right-radius: 4px;
    border-top-left-radius: 4px;
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    margin: 1px 0;
    padding: 4px 20px 4px 4px;
    width: 100%; }
.chosen-container-single .chosen-drop {
  margin-top: -1px;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
  -webkit-background-clip: padding-box;
  -moz-background-clip: padding;
  background-clip: padding-box; }

.chosen-container-single-nosearch .chosen-search input[type="text"] {
  position: absolute;
  left: -9000px; }

.chosen-container-multi .chosen-choices {
  background-color: #fff;
  border: 1px solid #ccc;
  border-top-right-radius: 4px;
  border-top-left-radius: 4px;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  cursor: text;
  height: auto !important;
  height: 1%;
  margin: 0;
  overflow: hidden;
  padding: 0;
  position: relative; }
  .chosen-container-multi .chosen-choices li {
    float: left;
    list-style: none; }
  .chosen-container-multi .chosen-choices .search-field {
    margin: 0;
    padding: 0;
    white-space: nowrap; }
    .chosen-container-multi .chosen-choices .search-field input[type="text"] {
      background: transparent !important;
      border: 0 !important;
      -webkit-box-shadow: none;
      box-shadow: none;
      color: #555555;
      height: 32px;
      margin: 0;
      padding: 4px;
      outline: 0; }
    .chosen-container-multi .chosen-choices .search-field .default {
      color: #999; }
  .chosen-container-multi .chosen-choices .search-choice {
    -webkit-background-clip: padding-box;
    -moz-background-clip: padding;
    background-clip: padding-box;
    background-color: #eeeeee;
    border: 1px solid #ccc;
    border-top-right-radius: 4px;
    border-top-left-radius: 4px;
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
    background-image: -webkit-linear-gradient(top, white 0%, #eeeeee 100%);
    background-image: -o-linear-gradient(top, white 0%, #eeeeee 100%);
    background-image: linear-gradient(to bottom, white 0%, #eeeeee 100%);
    background-repeat: repeat-x;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFFFFFFF', endColorstr='#FFEEEEEE', GradientType=0);
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    color: #333333;
    cursor: default;
    line-height: 13px;
    margin: 6px 0 3px 5px;
    padding: 3px 20px 3px 5px;
    position: relative; }
    .chosen-container-multi .chosen-choices .search-choice .search-choice-close {
      background: url("<?php echo base_url();?>assets/seller_login/images/close.png") right top no-repeat;
      display: block;
      font-size: 1px;
      height: 10px;
      position: absolute;
      right: 4px;
      top: 7px;
      width: 12px;
      cursor: pointer; }
	  .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
		border:none;
	}

 /* multiselect css end */
}
</style>
<div class="content-wrapper mar_t_con" >
	<section class="content-header">
		<div class="header-icon">
			<i class="pe-7s-note2"></i>
		</div>
		<div class="header-title">
			<form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
						<button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>  
			<h1>Listing</h1>
			<small>Add Listing</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="<?php echo base_url('seller/dashboard'); ?>"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div>
	</section>	
	<section class="content">
		<div class="col-xs-12 col-sm-12 col-md-12 m-b-20">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1" data-toggle="tab">Add Single Product</a></li>
                                <li><a href="#tab2" data-toggle="tab">Add Multipule Products</a></li>
                            </ul>
                            <!-- Tab panels -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab1">
                                    <div class="panel-body">
                                        <form>
											<div class="form-group nopaddingRight col-md-12 san-lg">
											    <label for="exampleInputEmail1">Select Category</label>
												<select class="form-control " >
												<option value="">Select 1</option>
												<option value="">Select 2</option>
												<option value="">Select 3</option>
												<option value="">Select 4</option>
												<option value="">Select 5</option>
												<option value="">Select 6</option>
											  </select>
											 
											</div>
											<div class="clear-fix"></div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Sub Category </label>
												<select class="form-control " >
												<option value="">Select 1</option>
												<option value="">Select 2</option>
												<option value="">Select 3</option>
												<option value="">Select 4</option>
												<option value="">Select 5</option>
												<option value="">Select 6</option>
												</select>
											 
											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Group</label>
												<input type="text" class="form-control " >
											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Sku code</label>
												<input type="text" class="form-control " >
											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Other Unique code</label>
												<input type="text" class="form-control " >
											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Product name</label>
												<input type="text" class="form-control " >
											</div>
											<div class="col-md-6  ">
												<div class="form-group ">
												<label>Select Category</label>

												<select id="seller_cat"   multiple class="chosen-select" tabindex="8">
												<option value="">GGSFD </option>
												<option value="">BAYAPU </option>
												<option value="">BAYAPURE </option>
												<option value="">BAYAPUREDDY </option>
												<option value="">BAYAPUREDDY </option>
												<option value="">BAYAPUREDDY </option>
												<option value="">VASU </option>
												
												</select>

												</div>
											<span id="locationmsg"></span>

											</div>
										</form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab2">
                                    <div class="panel-body">
                <div >
					<p class="pull-left"><strong>Note:</strong> &nbsp;Please Select your Category and Download sample file then filling  the data then again upload your products </p>&nbsp;&nbsp;<span class="pull-right"><a href="<?php echo base_url('uploads'); ?>/Importproduct.xlsx" >Download sample Import File</a></span>
				</div>
				<hr>
				<form id="importproducts" onsubmit="return checkvalidation();" name="importproducts" action="<?php echo base_url('seller/products/uploadproducts'); ?>" method="post" enctype="multipart/form-data" >

				 
				 <div class="row">
				 <div class="form-group nopaddingRight col-md-6 ">
                  <label for="exampleInputEmail1">Select Category</label>
				  <?php //echo '<pre>';print_r($sub_cat_data);exit;?>
				  <select class="form-control " onchange="documentid(this.value);getsubcat(this.value);"  id="category_id_import" name="category_id_import">
                    <option value="">Select Category</option>
					<?php foreach($sub_cat_data as $single_cat_data){ ?>
					<option value="<?php echo $single_cat_data['seller_category_id'].'/'.$single_cat_data['documetfile']; ?>"><?php echo $single_cat_data['category_name']; ?></option>
                   <?php }?>
                  </select>
				 </div>
				 <div class="form-group nopaddingRight col-md-6">
                  <label for="exampleInputPassword1">Select Subcategory</label>
                  <select class="form-control" onchange="hidemsg(this.value);" id="subcategory_id_import" name="subcategory_id_import">
                   </select>
				   <span id="errormsg" style="color:red"></span>
                </div>
                </div>
				 <div class="row">
				<div class="form-group nopaddingRight col-md-6">
				<label for="exampleInputPassword1">Import File</label>
				<input type="file" name="categoryes" id="categoryes" class="form-control" >
				</div>
				<div class="form-group nopaddingRight col-md-12">
				 <button type="submit" class="btn btn-primary" >Submit</button>
				</form>
				</div>
				</div>
                                    </div>
                                </div>
                            </div>
                        </div>
	</section>
</div>
  <!--main content end--> 

     <script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
  <script>
  $(function() {
	$('.chosen-select').chosen();
	$('.chosen-select-deselect').chosen({ allow_single_deselect: true });
  });
</script>




		
