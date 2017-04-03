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
		 <?= get_flashdata() ?>
		</div>
		<div class="row">
            <div class="col-md-6 text-left">
                <h2 class="inner-heading"> Articles </h2>
            </div>  
            <div class="col-md-3 text-right">
            	 <div class="new_article">
                    <a href="<?= base_url()?>site/articles/add"> <i class="fa fa-plus" aria-hidden="true"></i> ADD NEW ARTICLE</a>
                </div> 
            </div>
        	<div class="col-md-3 text-right">
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
    	
    	    <?php 
    	      if(@$result != '')
    	      {
			  	  foreach(@$result as $obj)
			  	  {
			  	  	$src_img = "";
			  	  	if($obj->article_image!='')
			  	  	{
						$src_img	= @$img_path.''.$obj->article_image;
					}else{
						$src_img	= @$img_path.'default.jpg';
					}
					
					$obj->id	=	ID_encode($obj->id);
		      ?>
		          <div class="article_list">
		     	 	<div class="col-md-2 col-sm-2 col-xs-12">
		            	<div class="img-thumbnail-home">
		            	     
                    		<img class="img-responsive" src="<?=$src_img?>">
                		</div>
            		</div>
            		<div class="col-md-10 col-sm-10  col-xs-12">
                <div class="details">	
                    <div class="top_bar">
                      <a href="<?=base_url()?>site/articles/view/<?=$obj->id?>">  <span class="name"><?=ucfirst($obj->title)?>  </span></a>
                        <div class="rating">
                         <a href="<?=base_url()?>site/articles/edit/<?=$obj->id?>"><i class="fa fa-edit"></i></a>&nbsp; &nbsp;<a href="javascript:void(0);" data="<?=$obj->id?>" class="article-delete"> <i class="fa fa-trash"></i></a>
                        </div>
                        <div class="feedback">
                           &nbsp; 
                        </div>
                    </div>    
                    <div class="clearfix"></div>  
                     <?=$obj->cat_name?>					
                    <div class="add"><?=(strlen($obj->description)>=120)?substr($obj->description,0,280).'......':$obj->description?>  </div>
                    <p><a href="<?=base_url()?>site/articles/view/<?=$obj->id?>" class="readmore"> Read more <i class="fa fa-angle-double-right" aria-hidden="true"></i> </a></p>
                </div>
            </div>
            <div class="clearfix"></div>          
        </div>
		      <?php		  	
				  }
			  }else{
		?>
		     <div class="not_available">
		     	 	<div class="col-md-12 col-sm-2 col-xs-12">
		            	<div>
		            	 <span>Articles Not Available</span>    
                    		
                		</div>
            		</div>
            </div>
		<?php	  	
			  }
    	    ?>
        
        
        
        
                                     
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
                    success: function(dat) {//alert(dat);
                        
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

