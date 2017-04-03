<div class="withou_search">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="border_bottom">
                    <div class="row">
                        <div class="col-md-8 col-sm-6 col-xs-6 text-left">
                            <h2 class="inner-heading">
                            <?php
                             /*if($result != '')
		                     {
			                        foreach($result as $obj1)
			                        {
			                        	 echo $obj1->category_name;
			                        	 break;
			                        }
			                  } */ 
			                  
			                  echo get_category_name(@$category_id);
			                  $category_id1	=	ID_encode(@$category_id);
			                     
                            ?>
                            </h2>
                        </div>  
                        <div class="col-md-4  col-sm-6 col-xs-6  text-right">
                            <ul class="page-breadcrumb breadcrumb">
                                <?php
                                foreach ($breadcum as $b_key => $b_val) {
                                    if ($b_key != '') {
                                        ?>
                                        <li class=""> <a href="<?= base_url() . $b_key ?>"><?= $b_val ?></a> </li>
                                    <?php } else if ($b_key == '') { ?>
                                        <li class="active"> <?= $b_val ?> </li>
    <?php }
} ?>
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
	<?php 
	      //pr($result);die;
	      if($result != '')
		  {
			  foreach($result as $obj)
			  {
			  	$src_img	=	"";
			  	if(empty($obj->service_image))
			  	{
					$src_img	=	@$img_path."default_service_image.jpg";
				}else{
					$src_img	=	@$img_path."".$obj->service_image;
				}
			  	$obj->service_id	=	ID_encode($obj->service_id);
	 ?>
	 <div class="row">
    	<div class="col-md-12">
			<h2 class="inner-heading">  </h2>
		</div>            
	</div>
	
	
	<div class="row">
    	<div class="col-md-2 col-sm-2 col-xs-12">
    	 
        	<div class="img-thumbnail">
            	<img src="<?=$src_img?>" class="img-responsive" />
            </div>
        </div>
    	<div class="col-md-10 col-sm-10  col-xs-12">
        	<div class="details">	
            	<div class="top_bar">
            		<span class="name"><a href="<?=base_url()?>site/service/view/<?=$obj->service_id.'/'.$category_id1?>" class="readmore"> <?php echo ucfirst($obj->business_name); ?></a> </span>
                    <div class="rating">
                    	<?php 
								@$rating = get_overall_rating($obj->service_id);
								//print_r(@$rating['rating']); die;
								@$starNumber =  explode('.',@$rating['rating']);
								
								$half_star  =  get_star(@$starNumber[1]); //half star for rating
								
								for($x=1;$x<=@$starNumber[0];$x++) 
								{
								   echo '<img src="'.base_url().'frontend_assets/img/star_fill.png" width="22px" />';
								}
								if($half_star)
								{
								   echo '<img src="'.base_url().'frontend_assets/img/'.$half_star.'" width="22px" />';
								}
								
								$starsLeft = floor(5 - @$rating['rating']); 
								
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
                    	<a> Feedback (<?php echo $rating['feedbacks']; ?>) </a>
                    </div>
				</div>    
                <div class="clearfix"></div>  
                <?php 
                      $state_name = get_state_city('tbl_state',@$obj->state_id)->state;
					  $city_name  = get_state_city('tbl_cities',@$obj->city_id)->Name; 
                 ?>				
				<!--<div class="add"> <i aria-hidden="true" class="fa fa-map-marker"> </i>  <a class="small"> New Delhi, India. </a> | <i aria-hidden="true" class="fa fa-mobile"></i> <a class="small"> +91 - 1234567890 </a> | <i aria-hidden="true" class="fa fa-phone"></i> <a class="small"> 011 - 12345678</a></div>-->
                <div class="add"><i class="fa fa-map-marker" aria-hidden="true"> </i>  <a class="small"><?php echo $state_name.' , '.$city_name.' , '.ucwords($obj->location);?></a> | <i aria-hidden="true" class="fa fa-envelope-o"></i>  <a class="small"><?=($obj->contact_email!='')?$obj->contact_email:'';?>  </a> | <i aria-hidden="true" class="fa fa-mobile"></i> <a class="small">  <?=($obj->business_phone!='')?'+91 -'.$obj->business_phone:'';?> </a></div>
                <p><?=(strlen($obj->description)>=70)?substr($obj->description,0,300).'...':$obj->description?><a class="readmore" href="<?=base_url()?>site/service/view/<?=$obj->service_id.'/'.$category_id1?>"> Read more <i aria-hidden="true" class="fa fa-angle-double-right"></i> </a></p>
        	</div>
        </div>
    </div>
    <div class="clearfix divider"></div>
	 
	 <?php
			  }
		  
	}
	?>
	
    
    

   
    
</div>

</div>