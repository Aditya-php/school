<style>
#vendorSubmit {
    width: 100% !important;
}
.review-clientimg{ 
    border-radius: 50%;
 border: 1px solid gray;
       width: 64px;
    height: 62px;
	    margin-left: 11px;
}
	.rel {
    position: relative;
    min-height: 385px;
    max-height: 385px;
		border:none; 
	    -webkit-box-shadow: none;
    -moz-box-shadow:none;
    box-shadow:none;
	 padding: 54px;
		background:#fff
	    
}
@-moz-document url-prefix() {
   .rel:after{
    margin-top: -11px !important;
    }
}

/*.block-text{
	border:none; 
	    -webkit-box-shadow: none;
    -moz-box-shadow:none;
    box-shadow:none;
	    padding: 54px;
}*/
.rel:after{
content: '';
 
    border-left: 4px solid transparent;
    border-right: 34px solid transparent;
    border-top: 40px solid #ffffff;
    clear: both;
    float: right;
    margin-top: 11px;
    margin-right: 22px;
    z-index: 20000;
    left: 0;
    top: 0px;
    bottom: 0px;
    right: 10px;
	
}
.block-text p{
    height: 265px;	
}

</style>
<?php //$this->load->view('elements/front/header.php'); ?>
<?php //include 'front/header.php';?>

<div class="section-1">

  <div class="container">
    <div class="row">
      <div class="col-md-12">
	  <?php echo form_open('home/search',array('method'=>'get','class'=>'form-inline form-text','id'=>'vendorForm')); ?>
        <!--<form class="form-inline form-text" action="<?php echo base_url(); ?>home/search" method="get" id="vendorSearch">-->
		          <div class="col-md-3">
            <select class="homesearch-select v_required" name="v_city" id="v_city">
              <option value="">Select City</option>
              <?php foreach($city_list as $city):?>
              <option value="<?php echo $city->id ?>"><?php echo $city->city_name ?></option>
			  <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-3">
            <select class="homesearch-select" name="v_area_id" id="v_area_id">
              <option value="">Select Area</option>
              
            </select>
          </div>

          <div class="col-md-3">
            <select class="homesearch-select" name="v_service_id" id="v_service_id">
              <option value="">Select Services</option>
              <?php foreach($services as $service): ?>
			  <option value="<?php echo $service->id; ?>"><?php echo $service->name; ?></option>
			  <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-3">
            <button type="button" class="search-button" id="vendorSubmit" onclick="vendorSubmitTest()"><span>Search</span>
             <span style="float:right !important"><i class="fa fa-search se" aria-hidden="true"></i></span></button>
          </div>
        </form>
      </div>
    </div>
  </div>
 
 
</div>
  <img class="sliderbottomimg" src="<?= base_url() ?>assets/front/images/sliderbottombanner.png">
<div class="container section-2">
 
 
  <div class="row">
    <div class="col-md-12 text-center">
      <h2>About Us</h2>
      <p>Credence child care is your own place that connects you with the right partners for your kid's needs. We facilitate<br>
        and bring to your door step,the best possible options for your kid's care and hand hold you to take the right step.</p>
    </div>
  </div>
</div>
<div class="section-3">
  <div class="container section-2 section-10">
    <div class="row">
      <div class="col-md-12 ">
        <center><h2>Our Services</h2></center>
        <div class="row">
          
            <div class="col-md-6  text-left">
              <ul class="services-ul1">
                <li><a href="">Day Care</a></li>
                <li><a href="">Pre-School</a></li>
                <li><a href="">Nanny Assistance</a></li>
                <li><a href="">Hourly Day Care on Demand</a></li>
              </ul>
            </div>
            <div class="col-md-6 ">
              <ul class="services-ul2">
                <li><a href="">Flexible and Customised Day Care</a></li>
                <li><a href="">Extra Curricular activities package</a></li>
                <li><a href="">Customised Kid's fun packages</a></li>
                <li><a href="">Customised Kid's learning and development packages</a></li>
              </ul>
            </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section-4">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2>Why Us</h2>
        <div class="row">
          <div class="col-md-3"><a href=""><img src="assets/front/images/ser_icon1.png">
            <p> Forum for detailed, structured and reliable database</p>
            </a></div>
          <div class="col-md-3"><a href=""> <img src="assets/front/images/ser_icon2.png">
            <p>Provide best filtered result as per your specific requirement</p>
            </a></div>
          <div class="col-md-3"><a href=""><img src="assets/front/images/ser_icon4.png">
            <p>Site Visit (Pick and drop)</p>
            </a></div>
          <div class="col-md-3"><a href=""> <img src="assets/front/images/ser_icon3.png">
            <p>Selection of the best Customised package.</p>
            </a></div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section-5">
  <div class="container section-2">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2>Our Aim</h2>
        <p>"One Stop Solution Platform" for your Kid's Care, Development and Education.</p>
      </div>
    </div>
  </div>
</div>


<?php //$sliced_arr = array_chunk($testimonialFetch,2,true); pr($sliced_arr);die;?>
<div class="section-6">
  <div class="container section-2">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2>Testimonials</h2>
      </div>
      <div class="carousel-reviews broun-block">
        <div class="container">
          <div class="row">
            <div id="carousel-reviews" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
			  <?php $sliced_arr = array_chunk($testimonialFetch,2,true);?>
			  	<?php $i=1; foreach($sliced_arr as $arr1){ ?>
                <div class="item <?php echo ($i==1) ? "active" : "" ?>">
					<?php foreach($arr1 as $arr2){ 
					//pr($arr2['description']);die;?>
                  <div class="col-md-6 col-sm-6">
                    <div class="  rel  ">
                      <p><?php    $arr2['description'];
					  $a =  $arr2['description'];
					    $b = mb_strimwidth($a, 0, 700);
						$c = mb_strimwidth($b, 0, 600, '...'); echo $c;
					  ?></p>
					  <div class="clear"></div> <br class="mybrs">   
                      <h3><?php  echo  $arr2['first_name']."      ".$arr2['last_name'];?>	
					 <?php if(isset($arr2['profile_image']) && !empty($arr2['profile_image']) && file_exists('assets/upload_image/'.$arr2['profile_image']))
					 { 		
                        ?>
				    <img class="review-clientimg" src="<?php echo base_url().'assets/upload_image/'.$arr2['profile_image'];?>" height="50px" width="50px" alt="">
				    <?php
					 }else{
						 ?>
						 <img class="review-clientimg" src="<?php echo base_url().'frontend_assets/img/user-placeholder.png';?>" height="50px" width="50px" />
					<?php  }?></h3>
                    </div>
                  </div>
				  <?php } ?>
                 
                </div>
				<?php $i++; } ?>
              </div>
              <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
              <img class="slidernext" src="<?= base_url() ?>assets/front/images/slideleft.png"> <!--i class="fa fa-angle-left slidernext glyphicon-chevron-left" aria-hidden="true"></i--> </a> 
              <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">  <img class="slidernext" src="<?= base_url() ?>assets/front/images/slideright.png"><!--i class="fa fa-angle-right slidernext glyphicon-chevron-left" aria-hidden="true"></i--> </a> 
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<div class="how-we-work">
  <div class="container howwework-center">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2>How we work</h2>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <div class="howwork">
          <div class="howwork-text">
            <p>1. Parents to visit the website
and mention their requirement.
Internal System to filter the 
information basis the requirement.</p>
<p>2. Parents to login the website based 
on OTP for the further filtration 
and subsequently an email 
be sent by us to parents 
registered id.</p>
          </div>
        </div>
      </div>
     <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <div class="howwork">
          <div class="howwork-text work2-p">
            <p>We will arrange for a physical visit
as per the schedule decided mutually.</p>
          </div>
        </div>
      </div>
     <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <div class="howworks">
          <div class="howwork-text work2-p">
            <p>We assist the vendor and parents in the
pre and post admission process.</p>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>


 


<div class="homelast"> <img src="assets/front/images/homelastimg.png"> </div>

<?php //include 'elements/front/footer.php';?>
<?php //$this->load->view('elements/front/footer.php'); ?>

<script>
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
				$('#vendorForm').submit();
			}
			
		}
</script>

