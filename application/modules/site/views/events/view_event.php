<div class="clearfix"></div>
<div class="withou_search">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="border_bottom">
                <div class="row">
                    <div class="col-md-8  col-sm-6 col-xs-6  text-left">
                        <h2 class="inner-heading">  <?php echo $result->title; ?>  </h2>
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
	                   <?php  @$serv_id = get_service_id(@$result->added_by); ?>
        <div class="description">
            <h3> Description: </h3>
        
        	<p><?php echo $result->description; ?></p>
            
            <h3> Event Details :</h3>
            <p> <span class="bold"> Date : </span>  <?php echo $result->startdate; ?></p>
            <p> <span class="bold"> Venue : </span>  <?php echo $result->venue; ?></p>
            <p> <span class="bold"> Contact : </span><?php echo $result->contact_no; ?></p>
            <p> <span class="bold"> Email :</span> <a href="#"><?php echo $result->email; ?></a></p>
            <p> <span class="bold"> Website :</span> <a href="#"><?php echo $result->website; ?></a></p>
            
            <h3> About the Author </h3>
            
            <p> <span class="bold"> <i aria-hidden="true" class="fa fa-user"></i><a href="<?=base_url()?>site/service/view/<?= ID_encode(@$serv_id->id); ?>" target="_blank" > <?php @$data = get_user_name($result->added_by);  echo  ucfirst(@$data->business_name).' ('.ucfirst(@$data->first_name).' '.@$data->last_name.')';?> </a></span> </p>
         </div>
		 <div class="clearfix"></div>	
		<div class="col-md-12 text-center">
			<button type="button"  class="btn default" onclick='window.history.back()'>Back</button>
		</div>
		 
		 
    
    </div>
	
</div>
	