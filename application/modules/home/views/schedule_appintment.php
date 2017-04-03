 <style>
.wrapper form {
    background: transparent;
    width: auto;
    margin: 0;
    overflow: hidden;
    position: relative;
    -moz-border-radius: 0.3em;
    -webkit-border-radius: 0.3em;
    border-radius: 0.3em;
    -moz-box-shadow: 0 0 0 #000;
    -webkit-box-shadow: 0 0 0 #f3f0cf;
    box-shadow: 0 0 0 #f3f0cf;
    height: 100%;
    clear: both;
    padding-bottom: 0;
}
.vendericon-img { cursor: pointer; }
.check-box{margin-top:29px }
.vendericon-img{margin-top:-14px}
.appoin-span{    font-size: 12px;
    margin-left: 32px;
    padding-left: 20px;
  }
  .show-schedule {
    margin-left: -58px;
}
.schedule_appimgs{
    width: 90px !important;
    height: 90px;
    display: block;
    margin: 4px auto;
    border-radius: 50%;
    border: 4px solid #ccc;	
}
  form:after{
display:none;
  }  

   


 /*Manish CSS Starts*/

.radio-btn input[type="radio"], .check-box input[type="checkbox"] {
    visibility: hidden;
}
/*Custom checkbox*/
 .check-box {
    width: 30px;
    height: 30px;
    cursor: pointer;
    display: inline-block;
    margin: 2px 7px 0 15px;
    position: relative;
    overflow: hidden;
/*
    box-shadow: 0 0 1px #ccc;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    background: rgb(255, 255, 255);
    background: -moz-linear-gradient(top, rgba(255, 255, 255, 1) 0%, rgba(246, 246, 246, 1) 47%, rgba(237, 237, 237, 1) 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(255, 255, 255, 1)), color-stop(47%, rgba(246, 246, 246, 1)), color-stop(100%, rgba(237, 237, 237, 1)));
    background: -webkit-linear-gradient(top, rgba(255, 255, 255, 1) 0%, rgba(246, 246, 246, 1) 47%, rgba(237, 237, 237, 1) 100%);
    background: -o-linear-gradient(top, rgba(255, 255, 255, 1) 0%, rgba(246, 246, 246, 1) 47%, rgba(237, 237, 237, 1) 100%);
    background: -ms-linear-gradient(top, rgba(255, 255, 255, 1) 0%, rgba(246, 246, 246, 1) 47%, rgba(237, 237, 237, 1) 100%);
*/
    background: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ededed', GradientType=0);
    border: 1px solid #ccc;
	    margin-top: 30px;
}
.check-box i {
   
	background:url(../../../c3/assets/front/images/tick.png) no-repeat center center;
    position: absolute;
    left: 3px;
    bottom: -30px;
    width: 25px;
    height: 25px;
    opacity: .5;
    -webkit-transition: all 400ms ease-in-out;
    -moz-transition: all 400ms ease-in-out;
    -o-transition: all 400ms ease-in-out;
    transition: all 400ms ease-in-out;
    -webkit-transform:rotateZ(-180deg);
    -moz-transform:rotateZ(-180deg);
    -o-transform:rotateZ(-180deg);
    transform:rotateZ(-180deg);
}
.checkedBox {
/*
    -moz-box-shadow: inset 0 0 5px 1px #ccc;
    -webkit-box-shadow: inset 0 0 5px 1px #ccc;
    box-shadow: inset 0 0 5px 1px #ccc;
    border-bottom-color: #fff;
*/
}
.checkedBox i {
           bottom: 0px;
    left: 2px;
    -webkit-transform:rotateZ(0deg);
    -moz-transform:rotateZ(0deg);
    -o-transform:rotateZ(0deg);
    transform:rotateZ(0deg);
}
/*Custom radio button*/
 .radio-btn {
    width: 20px;
    height: 20px;
    display: inline-block;
    float: left;
    margin: 3px 7px 0 0;
    cursor: pointer;
    position: relative;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    border-radius: 100%;
    border: 1px solid #ccc;
    box-shadow: 0 0 1px #ccc;
    background: rgb(255, 255, 255);
    background: -moz-linear-gradient(top, rgba(255, 255, 255, 1) 0%, rgba(246, 246, 246, 1) 47%, rgba(237, 237, 237, 1) 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(255, 255, 255, 1)), color-stop(47%, rgba(246, 246, 246, 1)), color-stop(100%, rgba(237, 237, 237, 1)));
    background: -webkit-linear-gradient(top, rgba(255, 255, 255, 1) 0%, rgba(246, 246, 246, 1) 47%, rgba(237, 237, 237, 1) 100%);
    background: -o-linear-gradient(top, rgba(255, 255, 255, 1) 0%, rgba(246, 246, 246, 1) 47%, rgba(237, 237, 237, 1) 100%);
    background: -ms-linear-gradient(top, rgba(255, 255, 255, 1) 0%, rgba(246, 246, 246, 1) 47%, rgba(237, 237, 237, 1) 100%);
    background: linear-gradient(to bottom, rgba(255, 255, 255, 1) 0%, rgba(246, 246, 246, 1) 47%, rgba(237, 237, 237, 1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ededed', GradientType=0);
}
.checkedRadio {
    -moz-box-shadow: inset 0 0 5px 1px #ccc;
    -webkit-box-shadow: inset 0 0 5px 1px #ccc;
    box-shadow: inset 0 0 5px 1px #ccc;
}
.radio-btn i {
    border: 1px solid #E1E2E4;
    width: 10px;
    height: 10px;
    position: absolute;
    left: 4px;
    top: 4px;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    border-radius: 100%;
}
.checkedRadio i {
    background-color: #898A8C;
}


/*Manish CSS Ends*/ 
 
 
  
 


  
 </style>
 <div class="schedule-appintment vendor-sides12"  style="min-height:490px; background:#f3f0cf;">    
	<div class="container schedule-appintment-center">
		<div class="row wrapper">
			<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h2>My Shortlisted Vendor</h2>
			</div><?php //pr($result);die;?>
			<?php if($result){ ?>
			<?php if($this->session->flashdata('item')){ ?>
			<div class="clearfix"></div>
			<p style="color: white;background-color: green;width: 50%;margin-left: 25%;height: 50px;padding-top: 10px;text-align: center;"><?php echo $this->session->flashdata('item'); ?></p>
			<?php } ?>
			<form action="<?php echo base_url(); ?>home/schedule_appintment" method="post" id="vendorForm">
			<?php foreach($result as $vendor): ?>
			<div class="scheduleDiv">
			<div class=" col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<div class="schedule-img"> 
				<?php if($vendor->vendor_logo){ ?>
					<img  class="schedule_appimgs" src="<?php echo base_url(); ?>assets/vendor_image/<?php echo $vendor->vendor_logo; ?>"> 
				<?php } else{ ?>
					<img  class="schedule_appimgs" src="<?php echo base_url().'frontend_assets/img/user-placeholder.png';?>">	
				<?php } ?>
				</div>
				<h4 class="vender-name"><?php echo $vendor->vendor_name; ?></h4>	
			</div>
			<div class=" col-xs-12 col-sm-3 col-md-3 col-lg-3 ">
				<img  id="<?php echo ID_encode($vendor->id); ?>" class="vendericon-img" src="<?php echo base_url(); ?>frontend_assets/img/vendericons.png"> 
                <input  class="checkbox-vendor check-box"  type="checkbox" name="" value=""> <br>
				<span class=" appoin-span" style="margin-left:30px">Click to schedule appointment</span>
			</div>
			<div class=" col-xs-12 col-sm-5 col-md-5 col-lg-5">
				<div class="show-schedule">
					<div class=" col-xs-12 col-sm-3 col-md-3 col-lg-3">
						<input type ="hidden" name="vendor_id[]" value="<?php echo $vendor->id; ?>" disabled>
						<input type ="hidden" name="vendor_user_id[]" value="<?php echo $vendor->user_id; ?>" disabled>
						<button type="button" class="btn mysqldate"  id=""  style="color:#fff; background:#838383;margin-top:33px;     text-shadow: none;">Schedule</button>
					</div>
                    <div class=" col-xs-12 col-sm-5 col-md-5 col-lg-5">
                     
						<input type ="text" name="datetime[]" class="schedule-textfield datetimeInput" placeholder="Date & Time" id="" disabled readonly>
					</div>
					<div class=" col-xs-12 col-sm-4 col-md-4 col-lg-4">
						<input type ="text" name="remark[]" class="schedule-textfield" placeholder="Remark" disabled>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<hr class="hr-dote">
			</div>
			<?php endforeach; ?>
			<div class=" col-xs-12 text-center">
                <input type="image" id="appointSubmit" src="<?php echo base_url(); ?>frontend_assets/img/button.jpg" alt="Submit">
			</div>
			</form>
			<?php } else{ ?>
				<div class=" col-xs-12 text-center">
					<?php if($this->session->flashdata('item')){ ?>
					<p style="color: white;background-color: green;width: 50%;margin-left: 25%;height: 50px;padding-top: 10px;"><?php echo $this->session->flashdata('item'); ?>
					<?php } else{ ?>
					<p> No Vendor Shortlisted</p>
					<?php } ?>
			</div>
			<?php } ?>
		</div>	
	</div>	
</div>	

<script>
	$(document).ready(function(){
		$(".vendericon-img").click(function(){
			var vendor_id = $(this).attr('id');
			var wishlistCount = $("#wishlistCount").text();
			if(confirm("Do you want to remove this vendor from wishlist?")){
				$.ajax({
				url: "<?php echo base_url('home/removeToWishlist') ?>",
				method: 'POST',
				data:   {vendor_id: vendor_id},
				success: function(response){
					if(response == 1){
						$("#wishlistCount").text(parseInt(wishlistCount)-1);
						$(this).parent().parent().html()
						alert("Vendor has been removed from wish list successfully!!");
						location.reload();				
					}
					else if(response != ''){
						alert(response);
					}
					else if(response == ""){
						alert("Vendor has not been added to wish list, Please try again");	
					}
				}
				});	
			}
			
		});
		$("#appointSubmit").click(function(){
			
			var atLeastOneIsChecked = false;
			  $('.check-box').each(function () {
				if ($(this).is(':checked')) {
				  atLeastOneIsChecked = true;
				  return false;
				}
			  });
			  if(atLeastOneIsChecked){
			    var checktime = true;
				$('.requiredTime').each(function() {
					if ($(this).val() == '') {
						checktime = false;
						return false;
					}
				});
				if(checktime){
					if($("form#vendorForm").submit()){
						return true;
					} 
				}
				else{
					alert("Please select schedule date time."); 
				 return false;
				}
				
			  }
			  else{
				 alert("Please select at least one vendor."); 
				 return false;
			  }
			 
						
		});
	});
</script>
 