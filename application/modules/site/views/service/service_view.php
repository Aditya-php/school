<?php
//pr(@$result);
$user_data = $this->session->userdata('isLogin');

?>
<link rel="stylesheet" href="<?=base_url()?>frontend_assets/css/responsive-tabs.css" />

<div class="clearfix"></div>
<div class="withou_search">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="border_bottom">
                <div class="row">
                    <div class="col-md-8  col-sm-6 col-xs-6  text-left">
                        <h2 class="inner-heading">  <?=(@$category_id)?get_category_name(@$category_id):''?>  </h2>
                    </div>  
                    <div class="col-md-4  col-sm-6 col-xs-6  text-right">
                        <ul class="page-breadcrumb breadcrumb">
                            <?php foreach ($breadcum as $b_key => $b_val) {
                                if ($b_key != '') {
                                ?>
                                <li class=""> <a href="<?= base_url() . $b_key ?>"><?= $b_val ?></a> </li>
                                <?php } else if ($b_key == '') { ?>
                                <li class="active"> <?= $b_val ?> </li>
                                <?php } } ?>
                        </ul>
                    </div>
                <div class="clearfix"></div>
                </div>
            </div>
                
                </div>
            </div>
        </div>
</div>

<div class="clearfix"></div>

<div class="pad-50">
	
	<div class="container">
	<div class="row">
    	<div class="col-md-12">
			<h2 class="inner-heading"> <?=(@$result!='')?@$result->business_name:'';?> </h2>
		</div>            
	</div>
    
    <div class="row">
    	<div class="col-md-2 col-sm-2 col-xs-12">
        	<div class="img-thumbnail">
            	<img src="<?=(@$result!='' && @$result->service_image!='')?@$img_path.''.@$result->service_image:@$img_path.'default_service_image.jpg';?>" class="img-responsive" />
            </div>
        </div>
    	<div class="col-md-10 col-sm-10  col-xs-12">
        	<div class="details">	
            	<div class="top_bar">
            		<span class="name"><?=(@$result!='')?@ucfirst($result->first_name)." ".@$result->last_name:'';?> </span>
                    <div class="feedback">
					  <?php if($this->session->userdata('isLogin') == 'yes')
					       { ?>
					       <a class="fdbck fancybox" onclick="popups1(<?php echo @$result->id; ?>);" id="business_2" href="#list_business_2" data-rel="<?php echo @$result->id; ?>"> <i aria-hidden="true" class="fa fa-comment"></i>  Give feedback  </a>
						   <?php } else {?>
							<a class="fdbck fancybox1" onclick="popups();"> <i aria-hidden="true" class="fa fa-comment"></i>  Give feedback  </a>
						   <?php } ?>
					</div>	
                    <div class="rating" id="rating">
					<?php 
							$starNumber =  explode('.',$rating->rating); 
							$half_star  =  get_star(@$starNumber[1]); //half star for rating
							
							for($x=1;$x<=@$starNumber[0];$x++) 
							{
							    echo '<img src="'.base_url().'frontend_assets/img/star_fill.png" width="22px" />';
							}
							if($half_star)
							{
							    echo '<img src="'.base_url().'frontend_assets/img/'.$half_star.'" width="22px" />';
							}
							
							$starsLeft = floor(5 - $rating->rating);  
							if ($starsLeft > 0) 
							{                       
								for ($i = 1; $i <= $starsLeft; $i++)
								{  
								echo '<img src="'.base_url().'frontend_assets/img/star_blank.png" width="22px" />';     
								}
							}
					 ?>
                    </div>
					
                    <div class="feedback">
                    	<a> Feedback (<?php echo $rating->feedbacks;?>) </a>
                    </div>
				</div>    
                <div class="clearfix"></div> 
				<?php 
                      $state_name = get_state_city('tbl_state',@$result->state_id)->state;
					  $city_name  = get_state_city('tbl_cities',@$result->city_id)->Name; 
                 ?>	
                <div class="dtls">
					<div class="add"> 
                          <span class="addrs"><i aria-hidden="true" class="fa fa-envelope-o"></i>  <?=(@$result!='' && @$result->contact_email!='')?''.@$result->contact_email:'';?> 
						  </span><br />
                        <span class="addrs "><i aria-hidden="true" class="fa fa-map-marker"> </i>  <?php echo @$state_name.' , '. @$city_name.' ,' ?> <?=(@$result!='' && @$result->location!='')?''.@$result->location:'';?></span><br />
                       <span class="addrs"><i aria-hidden="true" class="fa fa-link"></i> <a href="https://www.google.co.in/" target="_blank">  <?=(@$result!='' && @$result->website!='')?''.@$result->website:'';?></a></span> 
                        
                    </div>
                    <div class="number">
                    	<?=(@$result!='' && @$result->business_phone != '')?'<i aria-hidden="true" class="fa fa-phone"></i> <span class="addrs"> <a href="tel:'.@$result->business_phone.'">'.@$result->business_phone.'</a></span>':'';?>
                        <br /> 
                         <?=(@$result!='' && @$result->contact_number!='')?'<i aria-hidden="true" class="fa fa-mobile"></i> <span class="addrs"><a href="mob:+91-'.@$result->contact_number.'">+91-'.@$result->contact_number.'</a></span>':'';?>
                    </div>
               </div>
        	</div>
        </div>
    </div>
    
    
    <div class="row">
    	<div class="col-md-12">
	    	<div class="responsive-tabs">

			<h2>Overview</h2>
			<div>
				<p><?=(@$result!='' && @$result->full_desc!='')?@$result->full_desc:'';?> </p>
                
                <div class="services_lsit">
                	<h2 class=""> Categories </h2>
                	<ul>
                	   <?php 
                	    $arr_cat	=	array();
                	   	if(@$result!=''){
                	   	      $arr_cat	=	explode(',',@$result->category_name);
                	   	      foreach($arr_cat as $category_name)
                	   	      {
					   ?>
					      <li> <?=$category_name?> </li>
					   <?php		  	
							  }							  
						 }
                	   ?>
                	   
                    </ul>
                    
                    <div class="clearfix"></div> 
                </div>
                
                
               <div class="clearfix"></div> 
			</div>

			<h2> Photo and Video</h2>
			<div>
				<div class="row">
                	<div class="col-md-4">
                    	<a id="view_large" class="fancybox"><img src="<?=(@$result!='' && @$result->service_image!='')?@$img_path.''.@$result->service_image:@$img_path.'default_service_image.jpg';?>" class="img-responsive img-thumbnail" /></a>
                    </div>
                    <div class="col-md-5 ">
                    	<a class="img-thumbnail">
                        	<iframe width="400" height="245" src="<?=(@$result!='' && @$result->service_video!='')?@$video_path.''.@$result->service_video:'https://www.youtube.com/embed/GmdXJy_IdNw';?>" frameborder="0" allowfullscreen></iframe>
                            <div class="clearfix"></div>
							
							
                        </a>
                    </div>
                </div>
			</div>
			
			<?php 
                  $feedbacks		=	0;
                  $res_feedback	=	'';
                  if(@$result!='' && @$result->id!='')
                  {
				  	 $res_feedback	=	get_service_feedback(@$result->id);
				  	

				  	 if($res_feedback['status']=="success")
				  	 {
					 	$result_feedback		=	$res_feedback['result'];
					 	$feedbacks				=	$res_feedback['feedbacks'];
					 	
					 }
				  }
            ?>
			<h2> Feedbacks (<?=$feedbacks?>)</h2>
			<div>
				<?php if(@$result_feedback!=''){
				    	  	foreach(@$result_feedback as $feedback1) 
							{
				    	  	  @$timestamp = strtotime(@$feedback1->created_at);
                              $fed_img = "";
							  $user_img = admin_profile_image(@$feedback1->user_id);
							  
			  	  				if($user_img!='')
			  	  				{
									$fed_img	= base_url()."assets/upload_image/".''.@$user_img;
								}else{
									$fed_img	= base_url()."assets/upload_image/".'user-placeholder.png';
								}							 
					?>
				<div class="row feedback">
				<div class="col-md-2">
                    	<div class="profile-circle">
						<img class="img-responsive" src="<?=$fed_img?>">
                        	<!--<i aria-hidden="true" class="fa fa-user"></i>-->
                        </div>
                        <div class="text-center">
                        	<p class="name"> <?php echo @$feedback1->name; ?> </p>
                        </div>
                    </div>
                    <div class="col-md-10">
						<div class="row">
							<div class="col-md-6">
								<span class="like"> <i aria-hidden="true" class="fa fa-calendar"></i><?php echo date('d - m - Y - h:i A',strtotime(@$feedback1->created_at));?></span>
                       <!--<span class="like"> <i aria-hidden="true" class="fa fa-eye"></i><?php //echo @$feedback1->title; ?></span>--> 
							</div>
							<div class="col-md-6">
								<p class="pull-right"> 
								<?php 
									$starNumber =  explode('.',$feedback1->rating);

									$half_star  =  get_star(@$starNumber[1]); //half star for rating

									for($x=1;$x<=@$starNumber[0];$x++) 
									{
									   echo '<img src="'.base_url().'frontend_assets/img/star_fill.png" width="15px" />';
									}
									if($half_star)
									{
									   echo '<img src="'.base_url().'frontend_assets/img/'.$half_star.'" width="15px" />';
									}

									$starsLeft = floor(5 - @$feedback1->rating); 

									if ($starsLeft > 0) 
									{                       
									  for ($i = 1; $i <= $starsLeft; $i++)
									  {  
									   echo '<img src="'.base_url().'frontend_assets/img/star_blank.png" width="15px" />';     
									  }
									}
									?>
								</p>
							</div>
						</div>
                        
                        <span class="like cmt"> <i aria-hidden="true" class="fa fa-commenting-o pull-left"></i> <p class="pull-left" style="width:95%"><?php //echo (strlen($feedback1->message)>=120)?substr($feedback1->message,0,280).'......':$feedback1->message;?><?php echo $feedback1->message; ?></p></span>
                    </div>
				</div>
				<?php } } ?>
			</div>
             <?php 
                  $events		=	0;
                  $result_events	=	'';
                  if(@$result!='' && @$result->service_provider_id!='')
                  {
				  	 $res_events	=	get_service_provider_events(@$result->service_provider_id);
				  	

				  	 if($res_events['status']=="success")
				  	 {
					 	$result_events		=	$res_events['result'];
					 	$events				=	$res_events['events'];
					 	
					 }
				  }
            ?>
           
            <h2> Events (<?=$events?>)</h2>
            <div>
				<div class="row">
				    	    <?php if($result_events!=''){
				    	  	foreach($result_events as $objv) {
				    	  		$objv->id	=	ID_encode($objv->id);
				    	  		
					?>
					          <div class="col-md-3 col-xs-12 col-sm-3">
                    			<div class="event_details">
									<div class="events">
										<div class="left-circle">
										<p> <?php echo date("d", strtotime(@$objv->startdate)); echo substr(date("F", strtotime(@$objv->startdate)),0,3)?></p>
										<span><?php echo date('h:i A',strtotime(@$objv->startdate));?></span>
										</div>
									</div>
									<div class="text-center">
										<p class="heading"> <?php echo substr(@$objv->title,0,20); ?> </p>
									</div>
                            		<div class="text-center">
                            			<p><?=(strlen($objv->description)>=100)?substr($objv->description,0,80).'......':$objv->description?> </p>
                            		</div>
                            		<div class="text-center">
                            		<a href="<?=base_url()?>site/events/view/<?=$objv->id?>" class="view_more"> View Details </a>
                            		</div>
                        		</div>
                    		</div>
					
					<?php			
							
				    ?>
				    <?php }}?>
                	
                    
                </div>
			</div>
            <?php 
                  $articles		=	0;
                  $result_article	=	'';
                  if(@$result!='' && @$result->service_provider_id!='')
                  {
				  	 $res_article	=	get_service_provider_articles(@$result->service_provider_id);
				  	
				  	 if($res_article['status']=="success")
				  	 {
					 	$result_article		=	$res_article['result'];
					 	$articles			=	$res_article['articles'];
					 	$article_img_path	=	$res_article['article_img_path'];
					 }
				  }
            ?>
            <h2> Articles (<?=$articles?>)</h2>
            <div>
				<div class="row">
				    <?php if($result_article!=''){
				    	  	foreach($result_article as $obja) {
				    	  		$obja->id	=	ID_encode($obja->id);
				    	  		$src_img = "";
			  	  				if($obja->article_image!='')
			  	  				{
									$src_img	= $article_img_path.''.$obja->article_image;
								}else{
									$src_img	= $article_img_path.'default.jpg';
								}
					?>
					          <div class="col-md-3 col-xs-12 col-sm-3">
								<div class="event_details">
                    			<div class="events">
                        			<div class="img-event">
	                        			<img class="img-responsive" src="<?=$src_img?>">
                            		</div>
									<div class="text-center">
										<p class="heading"> <?php echo substr(@$obja->title,0,20); ?> </p>
									</div>
                            		<div class="text-center">
                            			<p><?=(strlen($obja->description)>=100)?substr($obja->description,0,80).'......':substr($obja->description,0,30)?> </p>
                            		</div>
                            		<div class="text-center">
                            		<a href="<?=base_url()?>site/articles/view/<?=$obja->id?>" class="view_more"> View Details </a>
                            		</div>
                        		</div>
								</div>
                    		</div>
					
					<?php			
							
				    ?>
				    <?php }}?>
                	
                </div>
			</div>
            
            
		</div>
        </div>
    </div>




    
    
</div>

</div>

<script type="text/javascript" src="<?=base_url()?>frontend_assets/js/responsiveTabs.min.js"></script>
<script>
$(document).ready(function() {
	RESPONSIVEUI.responsiveTabs();
})



</script>
<script type="text/javascript" src="<?=base_url()?>frontend_assets/js/owl.carousel.min.js"></script>
<script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
          navigation : true, // Show next and prev buttons
          slideSpeed : 300,
          paginationSpeed : 400,
          items : 1, 
          itemsDesktop : false,
          itemsDesktopSmall : false,
          itemsTablet: false,
          itemsMobile : false
      });
    });		
	
 function popups()
{
      var user_data = '<?php echo $this->session->userdata('isLogin') ?>';
	  if(user_data == '')
	  {
		  jAlert("To Give Your Feedback.Please Login First", "Alert");
		  return false;
	  }
	  
}	
		
</script>

