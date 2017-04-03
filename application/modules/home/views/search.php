<style>
.search-button2{
padding: 8px 10px;
margin-left: -8px;
}
form{
box-shadow:none;	
}
.inner-search-div {
    margin: 45px 0px 29px 0px;
    padding: 12px 8px;
}
</style>
<?php //pr($services);die;?><section>
  <div class="container">
  
    <div class="row">
	<?php echo form_open('home/search',array('method'=>'get','class'=>'form-inline college-form-text inner-search-div','id'=>'vendorFormSearch')); ?>
      <!--<div class="col-md-12">-->
        <!--<form class="form-inline college-form-text ">-->
		<div class="col-md-5">
          <div class="col-md-4">
            <!--<select class="homesearch-select" name="">
              <option value=" ">Ghaziabad</option>
              <option value=" ">Mumbai</option>
              <option value=" ">Noida</option>
              <option value=" ">Delhi</option>
            </select>-->
			<select class="homesearch-select v_required" name="v_city" id="v_city">
              <option value="">Select City</option>
              <?php foreach($city_list as $city):?>
              <option value="<?php echo $city->id ?>" <?php if($_GET['v_city'] == $city->id){ echo "selected";} ?>><?php echo $city->city_name ?></option>
			  <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-4">
            <!--<select class="homesearch-select">
              <option value=" ">Nehru Nagar</option>
              <option value=" ">Almora</option>
              <option value=" ">Gurgaon</option>
              <option value=" ">Kanpur</option>
            </select>-->
			<select class="homesearch-select" name="v_area_id" id="v_area_id">
              <option value="">Select Area</option>
			  <?php foreach($area_list as $area):?>
              <option value="<?php echo $area->id ?>" <?php if($_GET['v_area_id'] == $area->id){ echo "selected";} ?>><?php echo $area->area_name ?></option>
			  <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-4">
            <!--<select class="homesearch-select">
              <option value=" ">Day Care</option>
              <option value=" ">Web Development</option>
              <option value=" ">Web Design</option>
              <option value=" ">Seo Services</option>
            </select>-->
			<select class="homesearch-select" name="v_service_id" id="v_service_id">
              <option value="">Select Services</option>
              <?php foreach($services as $service): ?>
			  <option value="<?php echo $service->id; ?>" <?php if($_GET['v_service_id'] == $service->id){ echo "selected";} ?>><?php echo $service->name; ?></option>
			  <?php endforeach; ?>
            </select>
          </div>
		  </div>
		  <div class="col-md-7" style="padding-left:0px">
		   <div class="col-md-3">
			<select class="homesearch-select" name="budget_type" id="budget_type">
              <option value="">Select Budget Type</option>
              <option value="monthly" <?php if(isset($_GET['budget_type']) && $_GET['budget_type'] == 'monthly'){ echo "selected";} ?>>Monthly</option>
			  <option value="hourly" <?php if(isset($_GET['budget_type']) && $_GET['budget_type'] == 'hourly'){ echo "selected";} ?>>Hourly</option>
            </select>
          </div>
          <div class="col-md-3">
           <input placeholder="Min Budget" class="homesearch-select" type="text" onkeypress="return isNumberKey(event)" name="range_min" id="range_min" value="<?php echo (isset($_GET['range_min']) && !empty($_GET['range_min'])) ?  $_GET['range_min'] : ""; ?>" />
          </div>
          <div class="col-md-3">
            <input  placeholder="Max Budget" class="homesearch-select" type="text" onkeypress="return isNumberKey(event)" name="range_max" id="range_max" value="<?php echo (isset($_GET['range_max']) && !empty($_GET['range_max'])) ?  $_GET['range_max'] : ""; ?>" />
          </div>
          <div class="col-md-2">
          <?php $dis_arr=array('1','10','20','30','40'); ?>
            <select name="distance" id="distance" class="homesearch-select">
            <option value="">Distance</option>
            <?php foreach($dis_arr as $val){ ?>
              <option <?php if(isset($_GET['distance']) && !empty($_GET['distance']) && $_GET['distance'] == $val){ echo "selected";} ?> value="<?php echo $val; ?>"><?php echo $val; ?> Km</option>  
            <?php } ?> 
            
            </select>
          </div>
          <input type="hidden" id="lat" name="lat" value="<?php echo (isset($_GET['lat']) && !empty($_GET['lat']))? $_GET['lat']  : ""; ?>" />
         <input type="hidden" id="lang" name="lang" value="<?php echo (isset($_GET['lang']) && !empty($_GET['lang']))? $_GET['lang']  : ""; ?>" />  
          <div class="col-md-1">
            <button type="button" class="search-button2" id="vendorSubmit" onclick="vendorSubmitTest()"><i class="fa fa-search fa-6" aria-hidden="true"></i></button>
          </div>
		  </div>
      <!--</div>-->
	  </form>
    </div>
  </div>
</section>
<section class="vendor-sides" id="services" >
  <div class="container">
    <div class="row yellow-div  "><?php //pr($services);die;?>
	<?php if(!empty($result)){ ?>
	<?php $i = 1; foreach($result as $vendor): ?>
      <div class="col-lg-4 col-md-4 text-center wow <?php if($i == 1){ echo "slideInLeft";}else if($i == 2){ echo "fadeInUp";} else if($i == 3){ echo "slideInRight";} ?> data-wow-duration='1s' data-wow-delay='0.2s'" style="visibility: visible; animation-name: <?php if($i == 1){ echo "slideInLeft";}else if($i == 2){ echo "fadeInUp";} else if($i == 3){ echo "slideInRight";} ?>;">
        <div class="college-box service-box border-radius-8"> 
			
		  <?php if($vendor->vendor_logo!='' && !empty($vendor->vendor_logo) && file_exists('assets/vendor_image/'.$vendor->vendor_logo))
											{
											?>
											<img class="box-img" src="<?php echo base_url().'assets/vendor_image/'.$vendor->vendor_logo;?>" height="50px" width="50px" />
											<?php
											}
											else{
												?>
													 	
											<img class="box-img" src="<?php echo base_url().'frontend_assets/img/user-placeholder.png';?>" height="50px" width="50px" />	
										   <?php	} 
											?>
		  
		  
		 
          <h3><?php echo $vendor->vendor_name; ?></h3>
          <p class="text-muted text-height-fix"> 
			<?php
				$service_ids = explode(',',$vendor->service_id);
				$sercises = get_vendor_service_offered($service_ids);
				//pr($sercises);die;
				$newArr = array();
				foreach($sercises as $value){
					array_push($newArr,$value->name);
				}
				echo implode(',',$newArr);
			?>
		   </p>
          <p class="text-muted">Age Group : 
		  <?php if(isset($vendor->age_min)&& !empty($vendor->age_min))
		   {
		   ?>
			  <?php echo $vendor->age_min; ?> to <?php echo $vendor->age_max; ?> Years 
		   <?php
		   }else{
			 echo "N/A";   
		   }
		   ?></p>
         
		 <p class="text-muted">Monthly:
		   <?php if(isset($vendor->monthly_min) && !empty($vendor->monthly_min))
		   {
		    ?>
			   <i class="fa fa-inr" aria-hidden="true"></i>
               <?php echo $vendor->monthly_min; ?> - 	<i class="fa fa-inr" aria-hidden="true"></i><?php echo $vendor->monthly_max; ?>
		   <?php }
		  else{
	        echo "N/A";
            }		   
			?></p>
          <p class="text-muted">Established in:
		
		    <?php if(isset($vendor->year_of_establishment) && !empty($vendor->year_of_establishment))
		   {
		    ?>
			 
               <?php echo $vendor->year_of_establishment; ?>
		   <?php }
		  else{
	        echo "N/A";
            }		   
			?></p>
			<?php  if ($this->session->userdata('isLogin') === 'yes')
			{
		     ?>
			<a href="<?php echo base_url().'home/services/'.ID_encode($vendor->id);?>" 
			class="btn">View More</a> 
				
		  <?php
			}else{
				?>
				
				<a href="#" onclick="set_vendor_id(<?php echo ID_encode($vendor->id);?>)" data-toggle="modal" data-target="#loginmodel"  class="btn">View More</a> 
				<?php
			}
            ?>		  
		  </div>
      </div>

	  <div style="display:none;">
		<div style="display: none;"><input id="inprocess" value="0"/></div>
		<input type="hidden" class="pagenum" value="<?php echo $pageno ?>" />
		<input type="hidden" class="total-page" value="<?php echo $pages ?>" />
	  </div>
	  <?php $i++;if($i ==4 ){ $i =1;} endforeach; ?>
      <?php } else{ ?>
	  <div class="col-md-12 text-center mrgn-top-btm"> No Data Found...</div>
	  <?php } ?>
	  <div id="vendor-result"></div> 
	  <div class="clearfix text-center"></div>
	  <div id="loader_searches" style="margin-left: 50%;padding-top: 61px;"> </div> 
	  
      <!--<div class="col-md-12 text-right mrgn-top-btm"> <a href=""> <i class="fa fa-angle-double-left" aria-hidden="true"></i> Load More ......</a> </div>-->
    </div>
    
    
    
	
  </div>
  <div class="grid-div"></div>
</section>




<script>

$(window).on('beforeunload', function(){
    $(window).scrollTop(0);
});


	$(document).ready(function() { 
	
		$('#v_city').change(function(){
			var city_id = $(this).val();
			$.ajax({
				url: "<?php echo base_url() ?>home/getAreaName",
				method: 'POST',
				data:   {city_id: city_id},
				dataType: 'text',
				success: function(response){
					$('#v_area_id').html(response);
				}
			});
		});
		
	});
	// form submit
		function vendorSubmitTest(){
			var z = true;
			$('.v_error').each(function(){
				$(this).remove();
			});
			$('.v_required').each(function(){
				var val = parseInt($(this).val());
				if(isNaN(val)){
					$(this).after('<label class="v_error" style="color:red;">This field is required.</label>');
					z = false;
				}	
			});
			if(z){
				$('#vendorFormSearch').submit();
			}
			
		}
</script>

<script type="text/javascript">
	/*$(window).bind('mousewheel DOMMouseScroll keydown',function(event) {
		if(event.originalEvent.wheelDelta < 0 || event.keyCode == 40) {
			if ($(window).scrollTop() == $(document).height() - $(window).height()){
				if(($(".pagenum:last").val() <= $(".total-page:last").val()) && (parseInt($('#inprocess').val())==0)) {
				$('#inprocess').val('1');
				var pagenum = parseInt($(".pagenum:last").val()) + 1;
				getresult("<?php echo base_url(); ?>home/load_more?page="+pagenum);
			}
			}
		}
	});*/
///////////loadMoreVendors code start from here////////////
var mousewheelevt = (/Firefox/i.test(navigator.userAgent)) ? "DOMMouseScroll" : "mousewheel" //FF doesn't recognize mousewheel as of FF3.x
$(window).bind(mousewheelevt, function(event){
	loadMoreVendors();
});
$(window).keydown(function(){
  loadMoreVendors();
})
$(window).scroll(function(){
	loadMoreVendors();
})
function loadMoreVendors()
{
	if ($(window).scrollTop() == $(document).height() - $(window).height())
			{
				if(($(".pagenum:last").val() <= $(".total-page:last").val()) && (parseInt($('#inprocess').val())==0)) 
				{
				$('#inprocess').val('1');
				var pagenum = parseInt($(".pagenum:last").val()) + 1;
				getresult("<?php echo base_url(); ?>home/load_more?page="+pagenum);
				}
			}//end if
}
///////////loadMoreVendors code end over here//////////////////////	
	var city = $('#v_city').val();
	var area = $('#v_area_id').val();
	var service = $('#v_service_id').val();
	
    var lat = $('#lat').val();
	var lang = $('#lang').val();
	var distance = $('#distance').val();
    
     var r_min = $('#range_min').val();
     var r_max = $('#range_max').val();
	 var budget = $('#budget_type').val();
	function getresult(url) {
		$.ajax({
			url: url,
			type: "GET",
			data:  {v_city:city,v_area_id:area,v_service_id:service,lat:lat,lang:lang,distance:distance,range_min:r_min,range_max:r_max,budget_type:budget},
			beforeSend: function(){
				$('#loader_searches').html('<img class="loader-btn"  src="<?php echo base_url(); ?>frontend_assets/img/loader.gif" width="30" height="30" border="0" alt="">');
			},
			complete: function(){
				//$('#loader-icon').hide();
			},
			success: function(data){
				$('#loader_searches').html('<img class="loader-btn"  src="<?php echo base_url(); ?>frontend_assets/img/loader.gif" width="30" height="30" border="0" alt="">');
				setTimeout(function() {
                        $('#inprocess').val('0');
                        $("body").css("overflow", "auto");
						$('#loader_searches').html('');
						$("#vendor-result").append(data);
						
                    }, 500);
				
			},
			error: function(){} 	        
		});
	}
</script>

<script type="text/javascript">
    window.onload = initGeolocation;
     function initGeolocation()
     { 
        if( navigator.geolocation )
        {
           // Call getCurrentPosition with success and failure callbacks
           navigator.geolocation.getCurrentPosition( success, fail );
        }
        else
        {
           alert("Sorry, your browser does not support geolocation services.");
        }
     }

     function success(position)
     {
         document.getElementById('lang').value = position.coords.longitude;
         document.getElementById('lat').value = position.coords.latitude
     }

     function fail()
     {
        // Could not obtain location
     }

	 function set_vendor_id(id)
	 {
		 // alert(id); // alert(id);
		 $("#vendor_login_id").val(id);
	 }
     function isNumberKey(evt)//For no to be entered only no on keypress
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=45) return false;
return true;
}
   </script> 
   	
