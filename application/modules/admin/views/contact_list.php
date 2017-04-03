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
        
            <?php 
            if($this->session->flashdata('account_create')) 
                { 
          ?>
                <div class="alert bg-success display-show">
                <button class="close" data-close="alert"></button>
                <span>
                <?php
                 echo $this->session->flashdata('account_create');
                ?> 
                </span>
               </div>
  
        <?php } ?>

                    <div class="test"></div>
                    	<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
						<span style="float:left;padding-top:10px;color:white;">Contact Us Details</span>
							<!--<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>-->
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<!--<div class="btn-group">
											<button id="sample_editable_1_new" class="btn green">
											Add New <i class="fa fa-plus"></i>
											</button>
										</div>-->
									</div>
									
								</div>
							</div>
							<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
								<tr>
								    <th> ID</th>
									<th> Name</th>
									<th> Email</th>
									<th> Subject</th>
									<th> Message </th>
									
								</tr>
							</thead>
							<tbody>
							<?php if(!empty($result))
								{
									$i=1;
									foreach($result as $forresult)
									{ $forresult->id	=	ID_encode($forresult->id); ?>
								<tr>
									<td width="5%"><?php  echo $i++;?></td>
									<td width="10%"><?php  echo $forresult->name;?></td>
									<td width="10%"><?php  echo $forresult->email;?></td>
									<td width="10%"><?php echo $forresult->subject; ?></td>
									<td width="60%"> <p class="limit-content"> <?php echo substr($forresult->message,0,300); ?> </p></td>
									
								</tr>
							<?php
								   }
								}
							?> 
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT -->
                        
                            
                        </div>
                      </div>
                    
                            <!-- BEGIN PORTLET-->
                            
                            <!-- END PORTLET-->
  
              
                    