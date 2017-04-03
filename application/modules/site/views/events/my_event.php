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
                <h2 class="inner-heading"> Events </h2>
            </div>  
            <div class="col-md-2  col-sm-6 col-xs-6  text-right">
            	 <div class="new_article">
                    <a href="<?= base_url()?>site/events/add"> <i class="fa fa-plus" aria-hidden="true"></i> ADD NEW EVENTS</a>
                </div> 
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
			<div class="alert bg-success display-show"><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i> <?php echo $this->session->flashdata('account_create');?> </div>
			 <?php  	
			   }
             ?>
            </div> 
	
	
	
	<?php  if(!empty($result))
			      {
					  foreach($result as $result1)
					  {
						  @$timestamp = strtotime(@$result1->startdate);
						  $result1->id = ID_encode($result1->id);
			?>
    	  <div class="article_list">
            <div class="col-md-2 col-sm-2 col-xs-12">
                <div class="img-thumbnail-home">
                    <!--<img class="img-responsive" src="<?= base_url()?>frontend_assets/img/natural_facialist.jpg">-->
					<div class="events">
						<div class="left-circle">
							<p> <?php echo date("d", @$timestamp); echo substr(date("F", @$timestamp),0,3)?></p>
						</div>
					</div>
                </div>
            </div>
			
            <div class="col-md-10 col-sm-10  col-xs-12">
                <div class="details">	
                    <div class="top_bar">
                        <span class="name"> <?php echo $result1->title;?> </span>
                        <div class="rating">
                            <a></a>
                        </div>
                        <div class="feedback">
                            <a title="Edit" class="btn btn-primary btn-xs" href="<?= base_url() ?>site/events/edit/<?php echo $result1->id;?>"><i class="fa fa-edit"></i></a>&nbsp;
							<a title="Delete" class="btn btn-warning btn-xs" onclick="return del(<?php echo $result1->id;?>);" href="#"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>    
                    <div class="clearfix"></div>    
                     <?php echo @$result1->event_type;?>					
                    <!--<div class="add"> <i class="fa fa-map-marker" aria-hidden="true"> </i>  <a class="small"> <?php// echo $result1->venue;?></a> | <i class="fa fa-mobile" aria-hidden="true"></i> <a class="small"> <?php// echo $result1->contact_no;?></a> | <i aria-hidden="true" class="fa fa-link"></i> <a class="small"> <?php // echo $result1->website;?></a></div>-->
                    <p> <?php echo (strlen($result1->description)>=120)?substr($result1->description,0,280).'......':$result1->description;?><a class="readmore" href="<?= base_url() ?>site/events/view/<?php echo $result1->id;?>"> Read more <i class="fa fa-angle-double-right" aria-hidden="true"></i> </a></p>
					
					<p class="date_time"> <?php echo date('D , j F Y   h:i A',strtotime(@$result1->startdate));?> </p>
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
                    	<ul class="pagination"><?php echo  $this->pagination->create_links() ;?></ul>
                    </div>
                </div>
            </div>
    </div>
</div>
    
</div>

<script type="text/javascript">
   function del(id)
   {
		var res = confirm("Are you sure,You want to Delete ?");
		if(res)
		{
		window.location.href	=	"<?= base_url() ?>site/events/event_delete/"+id;
		}
   }	 
   
 </script>  