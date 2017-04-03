

function ValidateEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
    };


$(".testr").click(function()
{
				  
 var user_name = $('#user_name').val();
 var first_name = $('#first_name').val();
 var last_name = $('#last_name').val();
 var business_name = $('#business_name').val();
 var password =  $('#password').val();
 var cpassword=  $('#cpassword').val();
 var email=  $('#email').val();
 //var checkbox = $('#accept-terms').is(':checked');
 var pattern = /^\d{10}$/;
 
 var error=0;
  if(!user_name)
   {
	    $( "#user_name" ).addClass('required');
	    $("#user_name-error1").html('Please Enter Username.');
		error++;
   }
   else
   {
	    $("#user_name-error1").html('');
	   
   }
   
   if(!first_name)
   {
	    $("#first_name").addClass('required');
	    $("#first_name-error2").html('Please Enter First Name.');
		error++;
   }
   else
   {
	    $("#first_name-error2").html('');
	   
   }
   
   
   if(!email)
   {
		$("#email").addClass('required');
		$("#email-error3").html('Please Enter Valid Email Address.');
		error++;
   }
   else
   {
	   $("#email-error3").html('');
   } 
   
   if(!password)
   {
	    $("#password" ).addClass('required');
	    $("#password-error4").html('Please Enter Password.');
		error++;
   }
   else
   {
	   $("#password-error4").html('');
   }
   if(!cpassword)
   {
		$( "#cpassword" ).addClass('required');
		$("#cpassword-error5").html('Please Enter Confirm Password.');
		error++;
   }
   else
   {
	   if (password != cpassword)
		{ 
	        $("#cpassword-error5").html('New Password and Confirm Password does not match!');
			//alert('New Password and Confirm Password does not match!');	
			return false;
			
		}
		else
		{
	      $("#cpassword-error5").html('');
		}
   }
   
   if(!last_name)
   {
	    $("#last_name").addClass('required');
	    $("#last_name-error6").html('Please Enter Last Name.');
		error++;
   }
   else
   {
	    $("#last_name-error6").html('');
	   
   }
   
   if(!business_name)
   {
	    $("#business_name").addClass('required');
	    $("#business_name-error7").html('Please enter Business Name.');
		error++;
   }
   else
   {
	    $("#business_name-error7").html('');
	   
   }
    
    if(error>0)
   {
	   return false;
   }
   
	/* var value =$("#user_reg").serialize() ;
	var info = value;
     //alert(value); return false;
	$.ajax({
	url:site_url+"admin/serviceprovider/add",
	type:'post',
	data:info,
	success:function(res)
				{
					if($res)
					{
						//alert(res); return false;
						$(".test").html('<p class="success">Service Provider Created Successfully.</p>');
						window.location.href = site_url+'admin/serviceprovider';
					}
				}
	});  */
 });
 
 // function  for deleting the service provider
  function delete_func(id)
	{
		var r = confirm("Are you sure want to delete the detail");
		if (r == true) 
		{
			window.location.href= site_url+'admin/serviceprovider/delete/'+id;
		}
	}	
	
	// function for active inactive the service provider
	function active_func(id)
	{
		var r = confirm("Are you sure,You want to change this status ?");
		if (r == true) 
		{
			//var info = id;
			$.ajax({
			url: site_url+"admin/serviceprovider/active_inactive",
			type:"POST",
			data:"&id="+id,
			success:function(data){
				//alert(data);
					if(data == '1')
					{	
						$('#change_status_'+id).removeClass('label label-sm label-danger').addClass('label label-sm label-success');
						$('#change_status_'+id).html('Inactive');
						location.reload();
					}else{
						$('#change_status_'+id).removeClass('label label-sm label-success').addClass('label label-sm label-danger');
						$('#change_status_'+id).html('Active');
						location.reload();
					}
				}
			}); 
			
		}
		return false;
	}
	//-----end-----------//
	
  //------validation for edit serviceprovider-----//
	$(".testr1").click(function()
	{
					  
	 
	 var first_name = $('#first_name').val();
	 var last_name = $('#last_name').val();
	 var business_name = $('#business_name').val();
	 var error=0;
	 
	   if(!first_name)
	   {
			$("#first_name").addClass('required');
			$("#first_name-error2").html('Please Enter First Name.');
			error++;
	   }
	   else
	   {
			$("#first_name-error2").html('');
		   
	   }
	   
	    if(!last_name)
	   {
			$("#last_name").addClass('required');
			$("#last_name-error6").html('Please Enter Last Name.');
			error++;
	   }
	   else
	   {
			$("#last_name-error6").html('');
		   
	   }
	   
	   if(!business_name)
	   {
			$("#business_name").addClass('required');
			$("#business_name-error7").html('Please enter Business Name.');
			error++;
	   }
	   else
	   {
			$("#business_name-error7").html('');
		   
	   }
		
		if(error>0)
	   {
		   return false;
	   }
	   
		
	});
	
	
	
 
 