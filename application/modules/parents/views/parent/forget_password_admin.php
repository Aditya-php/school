
<form action="<?= base_url() ?>auth/forget" method="post" accept-charset="utf-8" id="">
    <h3 class="form-title">Forget Password</h3>
    <?= get_flashdata(); ?>
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        <span>Enter valid Email Address</span>
    </div> 
	<input type="hidden" name="forget_type" value="spadmin"/>
    <p class="rememberme check">Enter Email Address</p>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Email Address</label>
        <input class="form-control " type="text" name="email"  placeholder="Address e-mail" name="email" />
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-success uppercase">Request New Password </button>
        <a href="<?= base_url() ?>admin/auth" class="forget-password" id="back-btn" >Login</a>          
    </div>
</form>