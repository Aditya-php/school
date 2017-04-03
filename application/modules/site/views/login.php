<!-- BEGIN LOGO -->
<div class="logo">
	<a href="index.html">
	<img src="<?= base_url() ?>assets/admin/layout3/img/logo-default.png" alt=""/>
	</a>
</div>
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="<?= base_url() ?>site/login" method="post">
		<h3 class="form-title">Login to your account</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Enter any username and password. </span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
			</div>
		</div>
		<div class="form-actions">
			<label class="checkbox">
			<input type="checkbox" name="remember" value="1"/> Remember me </label>
			<button type="submit" class="btn green-haze pull-right">
			Login <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
		
		<div class="forget-password">
			<h4><a href="javascript:;" id="forget-password">Forgot your password ?</a></h4>
			</div>
		
	</form>
        <!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="index.html" method="post">
		<h3>Forget Password ?</h3>
		<p>
			 Enter your e-mail address below to reset your password.
		</p>
		<div class="form-group">
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
			</div>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn">
			<i class="m-icon-swapleft"></i> Back </button>
			<button type="submit" class="btn green-haze pull-right">
			Submit <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 2016 &copy; Blue Star Learning.
</div>
<!-- END COPYRIGHT -->  
<script>
    $(document).on('click','#register-submit-btn',function(){
        $(this).html('<i class="fa fa-spin fa-spinner"></i>&nbsp;<?= lang('go') ?>');
        $(this).attr("disabled", true);
        var th =    $(this);
        var college_id  =   $('#college').val();
        var college_db_ref_id  =   $( "#college option:selected" ).attr('data');
        setTimeout(function(){
            if(college_id   !==  '')
            {
                var college_name  =   $( "#college option:selected" ).text();
                $.ajax({
                    type    :'POST',
                    url     :"<?=base_url()?>site/assign_college",
                    data    :csrf_name+'='+csrf_token+"&college_id="+college_id+"&college_name="+college_name+"&college_db_ref_id="+college_db_ref_id,
                    success: function(dat) {
                        dat = $.parseJSON(dat);
                        if(dat['status']    ===  'success')
                        {
                            <?php 
                                $ln  =   (@$this->session->userdata('site_language'))?@$this->session->userdata('site_language'):"english";
                            ?>
                            window.location.href    =   dat['url']+'?site_language=<?= $ln ?>';
                        }
                    }
                });
            }else{
                $('#error').html("Please select College!");
            }
            th.html('<span class="circle-icon"><i class="fa fa-circle"></i></span><?= lang('go') ?>');
            th.attr("disabled", false);
        },300);
    });
    
    $('input[name="remember"]').wrap('<div class="check-box <?php if($remember){ echo 'checkedBox';}?>"><i></i></div>');
</script>
