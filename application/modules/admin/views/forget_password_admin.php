
<form action="<?= base_url() ?>auth/forget" method="post" accept-charset="utf-8" id="">
    <h3 class="form-title"></h3> <span><b>Forget Your Password ? </b></span>
    <?= get_flashdata(); ?>
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
		   
        <span>Enter valid Email Address</span>
    </div> 
	<input type="hidden" name="forget_type" value="spadmin"/>
    <p class="rememberme check" style="    margin-left: 1px;">Enter your e-mail address below to reset your password</p>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Email Address</label>
        <input class="form-control " type="text" name="email"  placeholder="Email" name="email" />
    </div>
    <div class="form-actions">
	  <a href="<?= base_url() ?>admin/auth" style="padding: 10px 60px !important;" class="btn btn-success uppercase" id="back-btn" >Back</a>   
        <button type="submit" style="padding: 10px 60px !important;" class="btn btn-success uppercase">Submit</button>
             
    </div>
</form>