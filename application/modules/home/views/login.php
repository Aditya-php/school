  <form action="<?php //echo base_url().'home/login';?>"  method="post" id="login-form">
      <div class="popup_head">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="heading">Login</div>
      </div>
      <div class="left">
       	<input type="text" name="email" id="email" placeholder="Email" />
		<span><?php echo form_error('email') ;?></span>
		
        <input type="password" name="password" id="password" placeholder="Password"/>
		<span><?php echo form_error('password') ;?></span>
		
        <label class="forgot-line"><a href="" data-toggle="modal" data-target="#forgotmodel" onclick="forgotPwd()">Forgot Password ?</a></label>
        <input type="submit" class="btn-block" onclick = "submit_login_form()" value="Sign Up" />
        <label class="term-condition">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="">
            Don't have an account Yet? <a href="">Sign up Now</a> </label>
        </div>
        </label>
      </div>
      <div class="right"> <a href="" class="facebook"> <span><i class="fa fa-facebook" aria-hidden="true"></i></span>Login with facebook </a> <br />
        <a href="" class="google-plus"><span><i class="fa fa-google" aria-hidden="true"></i></span>Login with Google </a> <br />
        <a href="" class="in"><span><i class="fa fa-linkedin" aria-hidden="true"></i></span>Login with Linkdin </a> </div>
    </form>	