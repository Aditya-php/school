<!--<div class="slider inner-slide">
<div class="inner-banner">
	<img src="<?= base_url() ?>frontend_assets/img/inner-baner.jpg" class="img-responsive">
</div>
    <?= $this->load->view('elements/search_form') ?>
    </div>

<div class="clearfix"></div>-->

<div class="withou_search">
	<div class="container">
	<div class="row">
    	<div class="col-md-12">
		<div class="border_bottom">
		<div class="row">
            <div class="col-md-8  col-sm-6 col-xs-6  text-left">
                <h2 class="inner-heading"> Service List </h2>
            </div>  
            <div class="col-md-2  col-sm-6 col-xs-6  text-right">
            	 <div class="new_article">
                    
                </div> 
            </div>
        	<div class="col-md-2 text-right">
                <ul class="page-breadcrumb breadcrumb">
								<?php foreach ($breadcum as $b_key => $b_val) {
								if ($b_key != '') {
								?>
								<li class=""> <a href="<?= base_url() . $b_key ?>"><?= $b_val ?></a> </li>
								<?php } else if ($b_key == '') { ?>
								<li class="active"> <?= $b_val ?> </li>
								<?php } } ?>
                    <!--<li class=""> <a ""="" healthdirectory="" localhost="" http:="" href="/">Home</a> </li>
                    <li class="active">Events</li>-->
                </ul>
            </div>
		<div class="clearfix"></div>
		</div>
		
	</div>
		
		</div>
	</div>
</div>
</div>


<div class="pad-50">

<!--<div class="container">
	<div class="row">	
    	<div class="col-md-10">
			<h2 class="inner_sub_heading"> Article Name </h2>
		</div>  
        
    </div>
</div>-->
<div class="container">
<div class="row">
        <div class="col-md-12" id="errorMsg">
             <?php
              if($this->session->flashdata('account_create')) 
                {
			 ?>
			<div class="alert bg-success display-show"><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i><strong>Error!</strong> <?php echo $this->session->flashdata('account_create');?> </div>
			 <?php  	
			   }
             ?>
            </div>



	<?php  if(!empty($result))
			      {
					  foreach($result as $result1)
					  {
						  $result1->id = ID_encode($result1->id);
						  @$src_img1 = "";
							if(@$result1->service_image!='')
							{
								if(file_exists('assets/service_image/'.@$result1->service_image))
								{
							       $src_img1	= base_url()."assets/service_image/".''.@$result1->service_image;
								}
								else
								{
								   $src_img1    = base_url()."assets/article_image/".'default.jpg';
								}
							}
							else
							{
							   $src_img1    = base_url()."assets/article_image/".'default.jpg';
							} 
						  
			?>
    	  <div class="article_list">
            <div class="col-md-2 col-sm-2 col-xs-12">
                <div class="img-thumbnail">
                    <img class="img-responsive" src="<?= $src_img1 ?>">
                </div>
            </div>
			
            <div class="col-md-10 col-sm-10  col-xs-12">
                <div class="details">	
                    <div class="top_bar">
                        <a href="<?= base_url() ?>site/service/view/<?php echo $result1->id;?>"><span class="name"> <?php echo ucfirst($result1->business_name);?> </span></a>
                       
                        <div class="rating">
                    	<?php 
								@$rating = get_overall_rating($result1->id);
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
                      $state_name = get_state_city('tbl_state',$result1->state_id)->state;
					  $city_name  = get_state_city('tbl_cities',$result1->city_id)->Name; 
                    ?>						
                    <div class="add"> <i class="fa fa-map-marker" aria-hidden="true"> </i>  <a class="small"> <?php echo $state_name.' , '.$city_name.' , '.ucwords($result1->location);?></a> | <i aria-hidden="true" class="fa fa-envelope-o"></i>  <a class="small"><?php echo $result1->contact_email;?> </a> | <i class="fa fa-mobile" aria-hidden="true"></i> <a class="small"> <?php echo $result1->business_phone;?></a> <!--| <i aria-hidden="true" class="fa fa-link"></i> <a class="small"> <?php echo $result1->website;?></a>--></div>
					
                    <p> <?php echo (strlen($result1->description)>=120)?substr($result1->description,0,300).'......':$result1->description;?><a class="readmore" href="<?= base_url() ?>site/service/view/<?php echo $result1->id;?>"> Read more <i class="fa fa-angle-double-right" aria-hidden="true"></i> </a></p>
                </div>
            </div>
			<div class="clearfix"></div>          
        </div>
        <?php 
					}
			    }
				else
				{
					echo "No Data Available.";
				}
			?>
                                     
        <div class="clearfix"></div>
        <div class="col-md-12">
                <div class="text-center">
				
        <div id="sample_2_paginate" class="dataTables_paginate paging_simple_numbers">
		<ul class="pagination"><?php echo  $this->pagination->create_links() ;?></ul></div>
                                                </div>
           </div>
    </div>
</div>
    
</div>

