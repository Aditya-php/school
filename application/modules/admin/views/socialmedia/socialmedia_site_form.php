<div class="page-content-wrapper">
	<div class="page-content">
	<!--Breadcrumb Start-->
	<ul class="page-breadcrumb breadcrumb">
            <?php foreach ($breadcum as $b_key => $b_val) {
                if ($b_key != '') {
                    ?>
                    <li class=""> <a href="<?= base_url() . $b_key ?>"><?= $b_val ?></a><i class="fa fa-circle"></i> </li>
                <?php } else if ($b_key == '') { ?>
                    <li class="active"> <?= $b_val ?> </li>
                <?php }
            }
            ?>
        </ul>
       <?php
        if ($this->session->flashdata('account_create')) {
            ?>
            <div class="alert bg-success display-show" id="success">
                <button class="close" data-close="alert"></button>
                <span>
                    <?php
                    echo $this->session->flashdata('account_create');
                    ?> 
                </span>
            </div>

<?php } ?>
	<!--Breadcrumb End-->
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption">
				<i aria-hidden="true" class="fa fa-venus-mars"></i>
				<span class="caption-subject font-red-sunglo bold uppercase">Manage Social Media</span>
				<span class="caption-helper"></span>
				</div>
			</div>
			<div class="portlet-body form">
			 
			<!-- BEGIN FORM-->
        <?php echo form_open('', array('class' => 'form-horizontal')); ?>
				<div class="form-body">
                	<div class="row">
	              <?php if(isset($site_data) && !empty($site_data)){
                        foreach($site_data as $rec){ ?>
                       <div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-4"><?php echo $rec->site_name; ?> :</label>
								<div class="col-md-8">
									<input type="text" class="form-control" id="fblink" name="link_<?php echo $rec->id; ?>" placeholder="<?php echo $rec->site_name; ?> Link" value="<?php echo $rec->link //set_value('first_name',$data1[0]->first_name); ?>">
								</div>
							</div>
						</div>
                <?php }} ?>
                  	</div>
			<div class="form-actions">
			<div class="row">
						<div class="col-md-12 text-center">
						<button type="submit" class="btn blue"> Submit</button>
						<a href="<?php echo base_url().'admin/dashboard'; ?>" type="button" class="btn default"> Cancel</a>
						
				</div>
			<div class="col-md-6">
			</div>
			</div>
			</div>
			 <?php echo form_close(); ?>
            <!-- END FORM-->
		</div>
		</div>
							
		</div>
	</div>
    </div>