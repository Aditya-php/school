<div class="withou_search">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="border_bottom">
                    <div class="row">
                        <div class="col-md-8  col-sm-6 col-xs-6  text-left">
                            <h2 class="inner-heading">Reset Password</h2>
                        </div>  
                        <div class="col-md-4  col-sm-6 col-xs-6  text-right">
                            <ul class="page-breadcrumb breadcrumb">
                                <?php
                                foreach ($breadcum as $b_key => $b_val) {
                                    if ($b_key != '') {
                                        ?>
                                        <li class=""> <a href="<?= base_url() . $b_key ?>"><?= $b_val ?></a> </li>
                                    <?php } else if ($b_key == '') { ?>
                                        <li class="active"> <?= $b_val ?> </li>
                                    <?php }
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div> 
<div class="page-container pad-50">
    <div class="container-fluid margin-top-110">
        <div class="row">
            <div class="container ">
                <div class="about-dashed"><?= get_flashdata() ?></div>
            </div>
            <div class="grid gray arrow-mid padding-bottom-50">
                <div class="container">  
                    
                    <div class="row">
                        <div class="col-md-5 col-md-offset-4">
                        <div class="login-bg ">
                            <div class="text-center col-md-11 margin-bottom-20">
                                <h2>Reset Passwords</h2>
                                <img src="<?= base_url() ?>frontend_assets/img/line.png">
                            </div>    
                            <div class="row">
                                <div class="col-md-11">
                                    <!-- BEGIN FORM-->
                                    <?php echo form_open('', array('class' => 'login-form bs-example-form', 'id' => 'resetForm')); ?>
                                    <div class="input-group "> 
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input class="form-control" placeholder="Password" name="password" id="password" value="" aria-describedby="sizing-addon1" type="password" required>
                                    </div>
                                    <div class="input-group"> 
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input class="form-control" placeholder=" New Password" name="new_password" id="new_password" value="" aria-describedby="sizing-addon1" type="password" required>
                                    </div>
                                    <div class="input-group "> 
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input class="form-control" placeholder="Confirm Password" name="confirm_password" id="confirm_password" value="" aria-describedby="sizing-addon1" type="password" required>
                                    </div>
                                    
                                        <div class="row">
                                            
                                            <div class="col-md-12">
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-warning">Change Password</button>
                                                </div>

                                            </div>
                                        </div>
                                   
<?php echo form_close(); ?>
                                </div>
                                <div class="col-md-4"><div class="login-bg-right">&nbsp;</div></div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>   

    </div>

</div>
<!-- END PAGE CONTAINER -->