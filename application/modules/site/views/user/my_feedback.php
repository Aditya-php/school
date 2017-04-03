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
            <div class="col-md-8 col-sm-6 col-xs-6  text-left">
                <h2 class="inner-heading"> Feedback </h2>
            </div>  
            <div class="col-md-2 col-sm-6 col-xs-6  text-right">
            	 
            </div>
        	<div class="col-md-2  col-sm-6 col-xs-6  text-right">
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
						  
			?>
    	  <div>
				<div class="row feedback">
                	<div class="col-md-2">
                    	<div class="profile-circle2">
						<?php 
						        $pimg = "";
								if(@$result1->profile_image !='')
								{
									$pimg     = base_url()."assets/upload_image/".''.@$result1->profile_image;
								}else
								{
									$pimg	  = base_url()."assets/admin/layout/img/".'avatar.png';
								}
							?>
							<img alt=""  src="<?= $pimg ;?>"/>
							
                        </div>
                       
                    </div>
					    
					
                    <div class="col-md-10">
							<div class="row">
								<div class="col-md-6">
								
								 
								 <span class="like"> <i aria-hidden="true" class="fa fa-eye"></i><a href="<?=base_url()?>site/service/view/<?=ID_encode($result1->manage_service_id) ?>" target="_blank">  <?php echo ucfirst(@$result1->business_name).'  ( '.$result1->first_name.' '.$result1->last_name.')'; ?> </a></span>
								</div>
								<div class="col-md-6">
									 <div class="star_rating">
                    	<?php 
								$starNumber =  explode('.',$result1->rating);
								
								$half_star  =  get_star(@$starNumber[1]); //half star for rating
								
								for($x=1;$x<=@$starNumber[0];$x++) 
								{
								   echo '<img src="'.base_url().'frontend_assets/img/star_fill.png" width="18px" />';
								}
								if($half_star)
								{
								   echo '<img src="'.base_url().'frontend_assets/img/'.$half_star.'" width="18px" />';
								}
								
								$starsLeft = floor(5 - @$result1->rating); 
								
								if ($starsLeft > 0) 
								{                       
								  for ($i = 1; $i <= $starsLeft; $i++)
								  {  
								   echo '<img src="'.base_url().'frontend_assets/img/star_blank.png" width="18px" />';     
								  }
								}
					 ?>
                    </div>
								</div>
								
							</div>
					<span class="like"> <i aria-hidden="true" class="fa fa-calendar"></i> <?php echo date('d - m - Y - h:i A',strtotime(@$result1->created_at));?></span>
                        <span class="like cmt"> <i aria-hidden="true" class="fa fa-commenting-o pull-left"></i> <p class="pull-left" style="width:95%"><?php echo $result1->message;
						//echo (strlen($result1->message)>=120)?substr($result1->message,0,280).'......':$result1->message;?></p></span>
                    </div>
                </div>
			</div>
			<div class="clearfix"></div>
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
        <div id="sample_2_paginate" class="dataTables_paginate paging_simple_numbers"><ul class="pagination"><?php echo  $this->pagination->create_links() ;?></ul></div>
                                                </div>
            </div>
    </div>
</div>
    
</div>

<script type="text/javascript">
   function del(id)
   {
		var res = confirm("Are you sure,You want to delete ?");
		if(res)
		{
		window.location.href	=	"<?= base_url() ?>site/events/event_delete/"+id;
		}
   }	 
   
 </script>  