<div class="clearfix"></div>
<div class="withou_search">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="border_bottom">
                <div class="row">
                    <div class="col-md-8 col-sm-6 col-xs-6 text-left">
                        <h2 class="inner-heading">  Articles  </h2>
                    </div>  
                    <div class="col-md-4 col-sm-6 col-xs-6 text-right">
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
                <h2 class="inner-heading"> <?=@$result->title?> </h2>
            </div>            
        </div>
        
        <div class="description">
            <h3> Description: </h3>
        
        	<p><?php
        	        @$serv_id = get_service_id(@$result->user_id);
					@$serv_id->id = ID_encode(@$serv_id->id);
					
					$src_img = "";
			  	  	if(@$result->article_image!='')
			  	  	{
						$src_img	= @$img_path.''.@$result->article_image;
					}else{
						$src_img	= @$img_path.'default.jpg';
					}
        	   ?>
        	 <img src="<?=$src_img?>" class="img-responsive img-thumbnail" align="right" height="260" width="350">
            
            <p><?=@$result->description?> </p>
            <h3> Category: </h3>
            <p><?=@$result->cat_name?> </p>
            <h3> About the Author </h3>
            
            <p> <span class="bold"> <i aria-hidden="true" class="fa fa-user"></i> <a href="<?=base_url()?>site/service/view/<?= @$serv_id->id; ?>" target="_blank" ><?=ucfirst(@$result->business_name)?> (<?= ucwords(@$result->auther)?>)  </a> </span> </p>
            <p> </p>   
        </div>
    
    </div>
    <div class="col-md-12 text-center">
			<button type="button" class="btn default" onclick="window.history.back()">Back</button>
	</div>
    <div class="clearfix"></div>
</div>

