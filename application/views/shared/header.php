<!--wrapper start here -->

<div class="sidebar_right" >
			
			<ul style="padding:0 ">
			
			<?php  foreach($catitemdata as $catitem_data )  {  
			?>
				<li class="spin btn-group show-on-hover">
					<a  class=" dropdown-toggle" data-toggle="dropdown">
						<span  class="circ_icon glyphicon glyphicon-blackboard rot "></span>
						<span class="menu_tit"><?php echo $catitem_data->category_name; ?></span>
					</a>
					<ul class="dropdown-menu " role="menu">
						<div class="row">
							
								<?php 
								foreach($catitem_data->docs as $subcategory){
									//echo '<pre>';print_r($subcategory);exit;
									?>
									<div class="col-md-3">
											<ul class="list_cat">
												<li><a href="<?php echo base_url('category/view/'.base64_encode($subcategory->subcategory_id)); ?>" style="color:#666;"><?php echo $subcategory->subcategory_name; ?></a></li>
													<?php 
													foreach($subcategory->docs12 as $item_data){?>
													<li><a href="<?php echo base_url('category/productview/'.base64_encode($item_data->item_id)); ?>"><?php echo $item_data->item_name; ?></a></li>
													<?php } ?>
											</ul>
							
									</div>
								<?php } ?>
							
							
						
						</div>
						
					</ul>
				</li><div class="clearfix"></div>
			
				<?php }?>
			</ul>
</div>
<div class="wrapper"> 
  <!--header part start here -->
  <div class="jain_container">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="top-navbar">
    <div class="container">
      <div class=" row">
        <div class="social-media col-sm-4"> Stay connected:
          <ul>
            <li><a href="#" class=""><span class=""><i class="fa fa-facebook-square" aria-hidden="true"></i></span></a></li>
            <li><a href="#" class=""><span class=""><i class="fa fa-google-plus-square" aria-hidden="true"></i></span></a></li>
            <li><a href="#" class=""><span class=""><i class="fa fa-twitter-square" aria-hidden="true"></i></span></a></li>
            <li><a href="#" class=""><span class=""><i class="fa fa-pinterest-square" aria-hidden="true"></i></span></a></li>
          </ul>
        </div>
        <div class="user-link col-sm-8"> <a class="tel" href="tel:+201234567891"><span class="glyphicon glyphicon-earphone">&nbsp;</span>+123456789</a> <a class="" href="mailto:support@resalatheme.com"><i><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;</i>support@cartinhour.com</a>
          
        </div>
      </div>
    </div>
  </div>
      <div class="container1 container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <i class="icon-menu"></i> Menu </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>"> <img src="<?php echo base_url(); ?>assets/home/images/logo.png" /></a> </div>
        <div class="col-md-6">
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="row">
            <div class="col-md-12"> <form class="form-horizontal form-horizontal_x">
                  <div class=" smallsearch">
                    <div class="cart_search">
                      <input id="" onkeyup="searchfunction(this.value);" class="flipkart-navbar-input col-xs-11"  placeholder="Search for Products, Brands and more" autocomplete="off" spellcheck="false">
                      <button class="flipkart-navbar-button col-xs-1 pull-right"> <i class="fa fa-search font_si" aria-hidden="true"></i></button>
                    </div>
					<div style="display:none;" class="search_fun" id="addingdropdown"></div>
					
                  </div>
                </form>
              </div>
			
            </div>
          </div>
        </div>
		  <div class="medias list_ad">
		  
		  <?php if($this->session->userdata('userdetails')){ ?>
		  <span class="medias user_log">
				<a ><i class="glyphicon glyphicon-user" aria-hidden="true"></i>
				</a>
						
			</span>
			<div id="user_sow" style="display:none;">
							<ul class="log_list" >
								<span class="top_fix_niv glyphicon glyphicon-triangle-top"></span>
								<li class="font_list"><a href="<?php echo base_url('customer/account');?>">  <span >My Account</span> </a></li>
								<li class="font_list"><a href="<?php echo base_url('customer/cart');?>">  <span >My Cart</span> </a></li>
								<li class="font_list"><a href="<?php echo base_url('customer/wishlist');?>">  <span >My Wishlist</span> </a></li>
								<li class="font_list"><a href="<?php echo base_url('customer/changepassword');?>">  <span >Change Password</span> </a></li>
								<li class="font_list"><a href="<?php echo base_url('customer/logout');?>">  <span >Logout</span> </a></li>
							</ul>
			</div>
		  <?php }else{ ?>
			<span class="medias user_log text-center">
			<a href="<?php echo base_url('customer'); ?>" ><i class="" aria-hidden="true">
			</i><img src="<?php echo base_url(); ?>assets/home/images/userr.png" />
			<p>Sign in/login</p></a>
			</span>
		  <?php } ?>
			
			<span class="medias text-center"><a href="javascript:void(0)" onclick="searchpop();" id="opensearch" data-toggle="modal"  data-target="#locationsearchpopup"  ><i class="" aria-hidden="true" data-toggle="tooltip" title="Location" ><img src="<?php echo base_url(); ?>assets/home/images/location.png" /></i>
				<p>Location</p></a>
			</span></a></span>
			
			<?php if($this->session->userdata('userdetails')){ ?>
			<span class="medias"><a href="<?php echo base_url('customer/cart');?>"><i class="glyphicon glyphicon-shopping-cart " aria-hidden="true"></i></a>&nbsp;<sup class="sup">
			<?php if(count($cartitemcount)>0){ ?>
				<?php echo count($cartitemcount); ?>
				</sup>
				<div class="sprinkle"></div>
			<?php } ?>
			
			</span>
			<?php } else{ ?>
			<span class="medias text-center"><a href="<?php echo base_url('customer');?>"><i class="" aria-hidden="true"><img src="<?php echo base_url(); ?>assets/home/images/cart.png" /></i>
				<p >Cart</p></a>
			</span>
			</a>&nbsp;<sup class="sup"></sup></span>
			<?php } ?>
			<span class="medias text-center"><a href=""><i class="" aria-hidden="true"><img src="<?php echo base_url(); ?>assets/home/images/track.png" /></i>
				<p>Track</p></a>
			</span>
		 </div>
	</div>
	  <div class="top-navbar1">
    <div class="container">
      <div class=" row">
		  <ul class="navbar_1"><li><span style="color:#555">Qucik Jump to </span></li>
			<li><a href="">Grocery</a></li>
			<li><a href="">Food</a></li>
			<li><a href="">Fashion</a></li>
			<li><a href="">Electronics</a></li>
			<li><a href="">Grocery</a></li>
			<li><a href="">Food</a></li>
			<li><a href="">Fashion</a></li>
			<li><a href="">Electronics</a></li>
			<li><a href="">Grocery</a></li>
			<li><a href="">Food</a></li>
			<li><a href="">Fashion</a></li>
			
		  </ul>
	  </div>
	 
    </nav>
	
	 
	
	
	<!-- Login popup start here -->
	
	<!-- Modal -->
<div class="modal animated  zoomIn" id="sin_log" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="md-content">
    <div id="log_sign"> 
      
      <!-- Nav tabs -->
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#login" aria-controls="home" role="tab" data-toggle="tab"> <i class="fa fa-lock" aria-hidden="true"></i> Login</a></li>
        <li role="presentation"><a href="#signup" aria-controls="profile" role="tab" data-toggle="tab"> <i class="fa fa-user" aria-hidden="true"></i> Sign Up</a></li>
      </ul>
      
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="login">
		 <div id="login-response" style="font-size:100%;"></div>
          <form id="login-form" method="post">
            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="text" class="form-control" name="login_email" id="login_email">
			  <span class="all_errors"><p id="NameErr1" class="Error_msge"></p></span>
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <label class="pull-right" id="frgt_pass"><a href="#" class="pull-right" style="text-decoration: none;"><i class="icon-question-sign"></i>&nbsp; <i class="fa fa-question-circle" aria-hidden="true"></i> Forgot Password ?</a> </label>
              <input type="password" class="form-control" name="login_password" id="login_password">
			  <span class="all_errors"><p id="PasswordErr5" class="Error_msge"></p></span>
            </div>
            <!--<div class="checkbox">
              <label>
                <input type="checkbox">
                Remember me</label>
            </div>-->
            <button type="submit" class="btn btn-danger cls pull-left" id="login_submit" name="submit">SIGN IN</button>
          </form>
        </div>
        <div role="tabpanel" class="tab-pane" id="signup">
		<div id="signup-response" style="font-size:100%;"></div>
          <form method="post" id="register-form">
            <div class="form-group">
              <label for="user name">User Name:</label>
              <input type="text" name="user_name" id="user_name" class="form-control">
			  <span class="all_errors"><p id="NameErr" class="Error_msge"></p></span>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="user_email" id="user_email">
			  <span class="all_errors"><p id="EmailErr" class="Error_msge"></p></span>
            </div>
			 <div class="form-group">
              <label for="phone">Phone No:</label>
              <input type="text" class="form-control" name="user_phone" id="user_phone">
			  <span class="all_errors"><p id="PhoneErr" class="Error_msge"></p></span>
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" name="user_password" id="user_password">
			  <span class="all_errors"><p id="PassErr1" class="Error_msge"></p></span>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" id="chkterms2">
                By signing up I agree to terms & conditions</label>
				<span class="all_errors"><p id="TermsErr" class="Error_msge"></p></span>
            </div>
            <button type="submit" class="btn btn-danger cls pull-left" id="register_submit" name="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <div id="show_pass" style="display: none;">
      
	  <button class="md-close pull-right miy" style="margin-bottom: 15px;">Close me!</button>
      Forgot Your Password ?
	  <div id="lost-response" style="font-size:100%;"></div>
	  <form method="post" id="lost-form">
      <div class="form-group">
        <input type="password" class="form-control" name="lost_email" id="lost_email" placeholder="Please Enter Your Email Here">
      </div>
      <button type="submit" class="btn btn-danger cls pull-left" id="lost_submit">Submit</button>
	  </form>
      <label id="show_login" class="pull-right lgo"><i class="fa fa-user-plus"></i> Login</label>
    </div>
  </div> 	
  </div>
</div>
	
	<!-- end popup start here -->   
	
	
	<!-- Login popup start here -->
<div class="md-modal md-effect-8" id="modal-8">
  <div class="md-content">
    <div id="log_sign"> 
      
      <!-- Nav tabs -->
      <button class="md-close pull-right miy">Close me!</button>
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#login" aria-controls="home" role="tab" data-toggle="tab"> <i class="fa fa-lock" aria-hidden="true"></i> Login</a></li>
        <li role="presentation"><a href="#signup" aria-controls="profile" role="tab" data-toggle="tab"> <i class="fa fa-user" aria-hidden="true"></i> Sign Up</a></li>
      </ul>
      
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="login">
		 <div id="login-response" style="font-size:100%;"></div>
          <form id="login-form" method="post">
            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="text" class="form-control" name="login_email" id="login_email">
			  <span class="all_errors"><p id="NameErr1" class="Error_msge"></p></span>
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <label class="pull-right" id="frgt_pass"><a href="#" class="pull-right" style="text-decoration: none;"><i class="icon-question-sign"></i>&nbsp; <i class="fa fa-question-circle" aria-hidden="true"></i> Forgot Password ?</a> </label>
              <input type="password" class="form-control" name="login_password" id="login_password">
			  <span class="all_errors"><p id="PasswordErr5" class="Error_msge"></p></span>
            </div>
            <!--<div class="checkbox">
              <label>
                <input type="checkbox">
                Remember me</label>
            </div>-->
            <button type="submit" class="btn btn-danger cls pull-left" id="login_submit" name="submit">SIGN IN</button>
          </form>
        </div>
        <div role="tabpanel" class="tab-pane" id="signup">
		<div id="signup-response" style="font-size:100%;"></div>
          <form method="post" id="register-form">
            <div class="form-group">
              <label for="user name">User Name:</label>
              <input type="text" name="user_name" id="user_name" class="form-control">
			  <span class="all_errors"><p id="NameErr" class="Error_msge"></p></span>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="user_email" id="user_email">
			  <span class="all_errors"><p id="EmailErr" class="Error_msge"></p></span>
            </div>
			 <div class="form-group">
              <label for="phone">Phone No:</label>
              <input type="text" class="form-control" name="user_phone" id="user_phone">
			  <span class="all_errors"><p id="PhoneErr" class="Error_msge"></p></span>
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" name="user_password" id="user_password">
			  <span class="all_errors"><p id="PassErr1" class="Error_msge"></p></span>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" id="chkterms2">
                By signing up I agree to terms & conditions</label>
				<span class="all_errors"><p id="TermsErr" class="Error_msge"></p></span>
            </div>
            <button type="submit" class="btn btn-danger cls pull-left" id="register_submit" name="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <div id="show_pass" style="display: none;">
      
	  <button class="md-close pull-right miy" style="margin-bottom: 15px;">Close me!</button>
      Forgot Your Password ?
	  <div id="lost-response" style="font-size:100%;"></div>
	  <form method="post" id="lost-form">
      <div class="form-group">
        <input type="password" class="form-control" name="lost_email" id="lost_email" placeholder="Please Enter Your Email Here">
      </div>
      <button type="submit" class="btn btn-danger cls pull-left" id="lost_submit">Submit</button>
	  </form>
      <label id="show_login" class="pull-right lgo"><i class="fa fa-user-plus"></i> Login</label>
    </div>
  </div>
</div>

<div class="md-overlay"></div>
<a href="javascript:void(0)"  style="text-decoration:none;" id="opensearch" data-toggle="modal"  data-target="#locationsearchpopup">
</a>
<div class="modal fade" id="locationsearchpopup" role="dialog">
    <div class="modal-dialog">
		<div class="modal-content">
        <div class="modal-header">
          <button type="button" id="hidebutton" class="close" data-dismiss="modal">&times;</button>
       </div>
        <div class="newsletter-form" style="padding:0px 20px 15px 20px;">
          <h3>Select Your Delivery Location</h3>
			<div class="input-box">
				<select name="location_name" id="location_name" class="validate-select sel_are">
				<option value="">Select Area </option>
				<?php foreach($locationdata as $location_data) {?>
				<?php if($this->session->userdata('location_area')== $location_data['location_id']){ ?>
						<option value="<?php echo $location_data['location_id']; ?>" selected><?php echo $location_data['location_name']; ?></option>
				<?php }else{ ?>
						<option value="<?php echo $location_data['location_id']; ?>"><?php echo $location_data['location_name']; ?></option>
				<?php } } ?>
				</select>
				<div style="display:none;" class="alert alert-danger alert-dismissible" id="address1errormsg"></div>

            <button type="button" onclick="searchlocationpopup();" id="location_submit" class="button subscribe" name="location_submit"><span>SUBMIT</span></button>
          </div>
          <!--input-box--> 
        </div>
      </div>
	</div>
  </div>
 

<!-- the overlay element --> 

<script src="<?php echo base_url(); ?>assets/home/js/classie.js"></script> 
<script src="<?php echo base_url(); ?>assets/home/js/modalEffects.js"></script> 
<script type="text/javascript">

function searchlocationpopup(){
	 jQuery('#address1errormsg').show();
	
		 var area=jQuery('#location_name').val();
		 if(area==''){
				jQuery('#address1errormsg').html('Please Select Area');
				return false;
		 }
		jQuery('#address1errormsg').html(''); 
		jQuery('#address1errormsg').hide();
		$("#location_seacrh_result").empty();
		jQuery.ajax({
				url: "<?php echo site_url('home/search_location_offers');?>",
				type: 'post',
				data: {
					form_key : window.FORM_KEY,
					address1: jQuery("#address1").val(),
					area: jQuery("#location_name").val(),
					},
				dataType: 'html',
				success: function (data) {
					//$('#locationsearchpopup').hide('');
					$('#hidebutton').click();
					$("#location_seacrh").hide();
					$("#location_seacrh_result").show();
					$("#location_seacrh_result").append(data);

				}
			});

 }
function searchfunction(val){
	$('#addingdropdown').hide();
	$('#addingdropdown').empty();
	var length=val.length;
	if(length >2){
	
		jQuery.ajax({
			url: "<?php echo site_url('home/search_functionality');?>",
			type: 'post',
			data: {
				form_key : window.FORM_KEY,
				searchvalue: val,
				},
			dataType: 'html',
			success: function (data) {
			$('#addingdropdown').show();
			$("#addingdropdown").append(data);	


			}
		});
		
	}
	
}



 
    $(document).ready(function(){
      $('#frgt_pass').click(function(){
          $('#log_sign').hide();
          $('#show_pass').show();

      });
       $('.md-close').click(function(){
            $('#modal-8').hide();
            $('.md-overlay').hide();
          });
       $('#show_login').click(function(){
          $('#log_sign').show();
          $('#show_pass').hide();
       })
    });
  </script> 

<!-- Login popup end here -->
<script>
function registershow(){
	
$("#modal-8").show();	
} 
</script>
	

<script type="text/javascript" language="javascript">
      $(document).ready(function(){
    $('#register_submit').click(function(e){
    e.preventDefault();
 
    //if ($('#chkterms2').is(':checked')) {
    var user_name = $("#user_name").val();
    var user_email= $("#user_email").val();
	var user_phone = $("#user_phone").val();
    var user_password = $("#user_password").val();
	var terms_conditions = $('#chkterms2').is(':checked');
     
    
    var letters = /^[0-9a-zA-Z]+$/; 
    var number = /^\d{10}$/;
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var name=/^[^-\s][a-zA-Z0-9_\s-]+$/;
    var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    
    if (user_name == "")
    {
    $("#NameErr").html("Enter Your Name ").css("color", "red");
    $("#user_name").focus();
    return false;
    }
    else{
      if(user_name!="" && user_name.match(letters)) 
      {
        $("#NameErr").html("");
      }
      else{
        
        $("#NameErr").html("Name Accepts Alphanumeric Only");
        $("#user_name").focus();
        return false;
        }
    }
    
    
    if (user_email == "")
    {
    $("#EmailErr").html("Enter Your Email ID ").css("color", "red");
    $("#user_email").focus();
    return false;
    }
    else{
      if(user_email!="" && user_email.match(mailformat)) 
      {
        $("#EmailErr").html("");
      }
      else{
        
        $("#EmailErr").html("Invalid Email Format");
        $("#user_email").focus();
        return false;
        }
      
    }
	
	
	
	if (user_phone == "")
    {
    $("#PhoneErr").html("Enter Your Phone Number").css("color", "red");
    $("#user_phone").focus();
    return false;
    }
    else{
      if(user_phone!="" && user_phone.match(number)) 
      {
        $("#PhoneErr").html("");
      }
      else{
        
        $("#PhoneErr").html("Invalid Phone Number");
        $("#user_phone").focus();
        return false;
        }
      
    }
    
   
    /************************************************************************/
      if(user_password==""){
      $("#PassErr1").html("Enter Your Password ").css("color", "red");
      $("#user_password").focus();
      return false; 
      }
      else{
      if(user_password!="" && user_password.match(strongRegex)) 
      {
      $("#PassErr1").html("");
      }
      else{
      $("#PassErr1").html("Password minimum length is 8 characters and should contain letters (One Letter in Caps), symbols, numbers");
      $("#user_password").focus();
      return false;
      } 
      }
	  if (terms_conditions == "")
		{
		$("#TermsErr").html("Please Accept Terms & Conditions").css("color", "red");
		return false;
		}
		else{
			$("#TermsErr").html("");
		}
  
    $.ajax({
    type: "POST",
    url: '<?php echo base_url() ?>Home/signup',
    data: {user_name:user_name,user_email:user_email,user_phone:user_phone,user_password:user_password},
    success:function(data)
    {
      //alert(data);
    if(data == 1)
    {
      
    $("#signup-response").html("You are Successfully Registered! Please Login to Continue. ").css("color", "green");
    $('#register-form')[0].reset();
    }

    else if(data == 2){
    
    $("#EmailErr").html("The Mail Id you gave is already registered, Please try again.").css("color", "red");
    $("#user_email").val("");
    $('#register-form')[0].reset();
    
    }
    else
    {
    $("#signup-response").html("Oops! Error.  Please try again later").css("color", "red");
    
    $('#register-form')[0].reset();

    }
    
    },
    error:function()
    {
    //alert('fail');
    $("#signup-response").html("Please try again later for signup").css("color", "red");

    $('#register-form')[0].reset();
    }
    });
    });
    
    });
  

		$(document).ready(function(){
		$("#login_submit").click(function(e){
		e.preventDefault();
		
		var user_email= $("#login_email").val();
		var user_password = $("#login_password").val();
		if (user_email == "")
    {
    $("#NameErr1").html("Enter Email").css("color", "red");
    $("#login_email").focus();
    return false;
    }
    else{
      $("#NameErr1").html("");
    }
	if (user_password == "")
    {
    $("#PasswordErr5").html("Enter Password").css("color", "red");
    $("#login_password").focus();
    return false;
    }
    else{
      $("#PasswordErr5").html("");
    }
		$.ajax({
		type: "POST",
		url: '<?php echo base_url() ?>Home/login',
		data: {user_email:user_email,user_password:user_password},
		success:function(data)
		{
		if(data == 1)
		{
			location.reload();
		}
		else{
		
		$("#login-response").html("Invalid User Name or Password").css("color", "red");
		$('#login-form')[0].reset();	
		}
		},
		error:function()
		{
		//$("#signupsuccess").html("Oops! Error.  Please try again later!!!");
		}
		});
		
		});
		});

$(document).ready(function(){
    $(".user_log").click(function(){
        $("#user_sow").toggle();
    });
});
</script>
