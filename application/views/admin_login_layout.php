<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?= $title ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<link rel="shortcut icon" type="image/png" href="<?= base_url() ?>assets/images/favicon.png"/>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?= base_url() ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url() ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url() ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url() ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url() ?>assets/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url() ?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?= base_url() ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url() ?>assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url() ?>assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?= base_url() ?>assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<body class="login">
<div class="menu-toggler sidebar-toggler">
</div>
<div class="logo">
	<a href="<?= base_url() ?>">
            <img src="<?= base_url() ?>assets/front/images/logo.png" alt=""/>
	</a>
</div>
<div class="content content-2">
	<?php $this->load->view($page);?>
</div>
<script src="<?= base_url() ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<!--<script src="<?= base_url() ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>-->
<script src="<?= base_url() ?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/admin/pages/scripts/login.js" type="text/javascript"></script>


<script>
jQuery(document).ready(function() {     
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Login.init();
Demo.init();
});


function refreshCaptcha(comingFrm)
{
  $.ajax({
			type : 'get',
			url : "http://localhost/lms/auth/refreshCaptcha",	//set url for sent request for generate captcha image
			async : false,
			data : '',
			success : function(res, status){ 
				if(res)
				{
					var obj = eval('('+res+')');
					
					if(parseInt(comingFrm) === 1)//for header
					{
						$('#session_datacaptcha').val(obj.word);	//set Captcha word
						$('#capImgHeader').html(obj.image+'&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:refreshCaptcha(1);"><i class="icon-refresh"></i></a>');	// set captcha image
					}
				}
			}
		});	
}
</script>
