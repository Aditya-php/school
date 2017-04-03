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
                <h2 class="inner-heading"><?php echo $title; ?> </h2>
            </div>  
            <div class="col-md-2  col-sm-6 col-xs-6  text-right">
            	 <div class="new_article">
				 
				    <?php if(@$button_title == "Edit") { ?>
                    <a href="<?= base_url()?>site/service/edit/<?php echo ID_encode($result->id); ?>"> <i class="fa fa-plus" aria-hidden="true"></i> EDIT SERVICE</a>
				    <?php } else { ?>
				    <a href="<?= base_url()?>site/service/add"> <i class="fa fa-plus" aria-hidden="true"></i> ADD SERVICE</a>
					<?php } ?>
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
              if($this->session->flashdata('success')) 
                {
			 ?>
			<div class="alert bg-success display-show"><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i><strong>Success!</strong> <?php echo $this->session->flashdata('success');?> </div>
			 <?php  	
			   }
             ?>
            </div>
		 
		 <?php 
			   @$src_img1 = "";
			   if(!empty($result))
			   {
					$result->id = ID_encode($result->id);
					
					if(@$result->service_image!='')
					{
						if(file_exists('assets/service_image/'.@$result->service_image))
						{
						  $src_img1	= base_url()."assets/service_image/".''.@$result->service_image;
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
			  <a href="<?=base_url()?>site/service/view/<?=$result->id?>">
			  <div class="article_list">
							<div class="col-md-3 col-sm-3 col-xs-12">
							<div class="img-thumbnail">
									<img class="img-responsive" src="<?=@$src_img1?>">
								</div>
							 </div>
							<div class="col-md-9 col-sm-9  col-xs-12">
						<div class="details">	
							<div class="top_bar">
							    <span class="name"><?=ucfirst(get_user_name(@$result->service_provider_id)->business_name);?></span>
							</div>    
							<div class="clearfix"></div> 
							<?php 
							      $state_name = get_state_city('tbl_state',@$result->state_id)->state;
							      $city_name  = get_state_city('tbl_cities',@$result->city_id)->Name; 
                             ?>
                            <div class="add"><i class="fa fa-map-marker" aria-hidden="true"> </i>  <a class="small"><?php echo $state_name.' , '.$city_name.' , '.ucwords($result->location);?></a> | <i aria-hidden="true" class="fa fa-envelope-o"></i>  <a class="small"><?=($result->contact_email!='')?$result->contact_email:'';?>  </a> | <i aria-hidden="true" class="fa fa-mobile"></i> <a class="small">  <?=($result->business_phone!='')?'+91-'.$result->business_phone:'';?> </a></div>							
							<div class="add"><?=(strlen(@$result->description)>=120)?substr(@$result->description,0,500).'......':@$result->description?>  </div>
						  </div>
					</div>
					<div class="clearfix"></div>          
			  </div>
			  </a>
		  <?php
			   } else { ?>
			  <div class="article_list">
		     	 	<div class="col-md-12 col-sm-2 col-xs-12">
		            	<div>
		            	 <span style="color: red">Service Not Available</span>    
                    		
                		</div>
            		</div>
             </div>
			   <?php  } ?>
		                
        <div class="clearfix"></div>
        <div class="col-md-12">
                <div class="text-center">
               <div id="sample_2_paginate" class="dataTables_paginate paging_simple_numbers">
               
               <ul class="pagination"><?=@$links?>
               <!--<li id="sample_2_previous" tabindex="0" aria-controls="sample_2" class="paginate_button previous disabled">
               <a href="#"><i class="fa fa-angle-left"></i></a></li>
               <li tabindex="0" aria-controls="sample_2" class="paginate_button active"><a href="#">1</a></li>
               <li tabindex="0" aria-controls="sample_2" class="paginate_button "><a href="#">2</a></li>
               <li tabindex="0" aria-controls="sample_2" class="paginate_button "><a href="#">3</a></li>
               <li tabindex="0" aria-controls="sample_2" class="paginate_button "><a href="#">4</a></li>
               <li tabindex="0" aria-controls="sample_2" class="paginate_button "><a href="#">5</a></li>
               <li id="sample_2_next" tabindex="0" aria-controls="sample_2" class="paginate_button next">
               <a href="#"><i class="fa fa-angle-right"></i></a></li>-->
               </ul>
               </div>
           
         
            </div>
    </div>
    </div>
</div>
</div>
<script>

$(document).on('click','.article-delete',function(){
    
    
	var id	=	 $(this).attr('data');
    jConfirm("Are you sure, want to delete article", "", function(r) {
    if(r)
    {
    	$.ajax({
                    type    :'POST',
                    url     :"<?=base_url()?>site/articles/delete_article/",
                   data : { id :id},
                    success: function(dat) {alert(dat);
                        
                        if(dat == 'success')
                        {
                          	
                            window.location.href="<?=base_url()?>site/articles/my_articles";
		    			    return;	
                        }else if(dat == 'error'){
							window.location.href="<?=base_url()?>site/articles/my_articles";
		    			   	
		    				return;
						}
                    }
                
                
        });
        
        }
       });
    });
    	
	
</script>

