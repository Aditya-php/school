 <div class="page-content-wrapper">
      <div class="page-content">
           <ul class="page-breadcrumb breadcrumb">
						<?php foreach($breadcum as $b_key	=>	$b_val){
							 if($b_key	!=	''){?>
								<li class=""> <a href="<?= base_url().$b_key ?>"><?= $b_val ?></a><i class="fa fa-circle"></i> </li>
							<?php  }else if($b_key	==	''){ ?>
									<li class="active"> <?= $b_val ?> </li>
						<?php	 }
						 } ?>
           </ul>
      	<?php if($this->session->flashdata('item')){ ?>
            <div class="alert bg-success display-show" id="success">
                    <button class="close" data-close="alert"></button>
                    <span>
                        <?php
                        echo $this->session->flashdata('item');
                        ?> 
                    </span>
                </div>
    			<div class="clearfix"></div>
			<?php } ?>
        <div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title">
					<h1>Dashboard <small>statistics &amp; reports</small></h1>
				</div>
				<!-- END PAGE TITLE -->
			</div>
            <div class="clearfix"></div>
            <?php //pr($presult[0]->id);?>
            
            <div class="row margin-top-10">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="dashboard-stat2">
						<div class="display">
							<div class="number">
								<h3 class="font-green-sharp"><?php if(!empty($user)) { echo @$user[0]->id; } else { } ?><small class="font-green-sharp"></small></h3>
								<small>TOTAL USERS</small>
							</div>
							<div class="icon">
								<i class="icon-user"></i>
							</div>
						</div>
						<!--<div class="progress-info">
							<div class="progress">
								<span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
								<span class="sr-only">76% progress</span>
								</span>
							</div>
							<div class="status">
								<div class="status-title">
									 in-progress
								</div>
								<div class="status-number">
									 76%
								</div>
							</div>
						</div>-->
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="dashboard-stat2">
						<div class="display">
							<div class="number">
								<h3 class="font-red-haze"><?php if(!empty($service_provider)) { echo @$service_provider[0]->id; } else { } ?></h3>
								<small>TOTAL SERVICE PROVIDER</small>
							</div>
							<div class="icon">
								<i class="icon-user"></i>
							</div>
						</div>
						<!--<div class="progress-info">
							<div class="progress">
								<span style="width: 85%;" class="progress-bar progress-bar-success blue-haze">
								<span class="sr-only">85% change</span>
								</span>
							</div>
							<div class="status">
								<div class="status-title">
									 in-progress
								</div>
								<div class="status-number">
									 85%
								</div>
							</div>
						</div>-->
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="dashboard-stat2">
						<div class="display">
							<div class="number">
								<h3 class="font-blue-sharp"><?php if(!empty($feedback)) { echo @$feedback[0]->id; } else { } ?></h3>
								<small> total feedbacks </small>
							</div>
							<div class="icon">
								<i class="icon-bubbles"></i>
							</div>
						</div>
						<!--<div class="progress-info">
							<div class="progress">
								<span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
								<span class="sr-only">45% grow</span>
								</span>
							</div>
							<div class="status">
								<div class="status-title">
									in-progress
								</div>
								<div class="status-number">
									 45%
								</div>
							</div>
						</div>-->
					</div>
				</div>
			</div>
            
            <div class="clearfix"></div>
            
            <div class="row">
            	<!--<div class="col-md-6 col-sm-12">
					<!-- BEGIN PORTLET
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption caption-md">
								<i class="icon-bar-chart theme-font-color hide"></i>
								<span class="caption-subject theme-font-color bold uppercase"> Total Summary </span>
							</div>
							
						</div>
						<div class="portlet-body">
							<div class="scroller" style="height: 350px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
								<!--<div id="pie_chart_1" class="chart"></div>
                                <div id="pie_chart" class="chart"></div>
                                
                                <img src="<?= base_url() ?>assets/admin/layout/img/customer_chart.png" class="img-responsive" />
                                
							</div>
						</div>
					</div>
					<!-- END PORTLET
				</div>-->
				<div class="col-md-12 col-sm-12">
					<!-- BEGIN PORTLET-->
					<div class="portlet light tasks-widget">
						<div class="portlet-title">
							<div class="caption caption-md">
								<i class="icon-bar-chart theme-font-color hide"></i>
								<span class="caption-subject theme-font-color bold uppercase"> Top 10 Service Providers </span>
							</div>
						</div>
						<div class="portlet-body">
							<div class="task-content">
								<div class="scroller" style="height:350px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
									<!-- START TASK LIST -->
                                    <div class="table-scrollable table-scrollable-borderless">
								<table class="table table-hover table-light">
								<thead>
                                    <tr class="uppercase">
                                        <th> S. No.</th>
                                        <th> Business Name </th>
										<th> Service Provider Name</th>
                                        <th> Ratings </th>
                                    </tr>
								</thead>
								
								<?php if(!empty($sp_result)) 
								{
									//pr($sp_result); 
									$i=1;
									foreach($sp_result as $sp_result1)
									{
										
								?>
                               
								<tr>
                                	<td width="20%"><?php echo $i++;?></td>
                                    <td width="30%"><?php echo ucfirst($sp_result1->business_name); ?></td>
									<td width="30%"> <?php echo $sp_result1->name; ?></td>
									<td> 
									    <div class="ratings"> 
                                        <?php 
                                            
											$starNumber =  explode('.',$sp_result1->total_rating);
											$half_star  =  get_star(@$starNumber[1]);
											
                                            for($x=1;$x<=@$starNumber[0];$x++) 
											{
											  echo '<img src="'.base_url().'frontend_assets/img/star_fill.png" width="25px" />';
											}
											if($half_star)
											{
											  echo '<img src="'.base_url().'frontend_assets/img/'.$half_star.'" width="25px" />';
											}
											
											$starsLeft = floor(5 - $sp_result1->total_rating);
											if ($starsLeft > 0) 
											{                       
												for ($i = 1; $i <= $starsLeft; $i++)
												{  
												   echo '<img src="'.base_url().'frontend_assets/img/star_blank.png" width="25px" />';     
												}
											}
										?>
                                      </div> 
								    </td>
								</tr>
                                <?php								
									}
									
								} ?>
								</table>
							</div>
									<!-- END START TASK LIST -->
								</div>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
				
			</div>
            
            <div class="clearfix"></div>
            
            
					<!-- END PORTLET-->
				</div>
				
			</div>
        
        
        
        
        </div>
</div>
