

function ValidateEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
    };


 $("#app_user").validate({
    ignore: [],
	  rules: 
		{
		  first_name: 
			{
				required: true
               
			},
            last_name:
			{
                required: true
            },
            user_name: 
			{
                required: true
            },
            
            email: 
			{
				required:true,
				//email: true,
            },
			password:
			{
				required:true,
			},
            cpassword: 
			{
                    required:true,
					equalTo: "#password",
            }

		},
		messages: 
		{
		  
				first_name: 
				{
					required: "Please Enter the First Name."
					
				},
				last_name:
				{
						required: "Please enter Last Name."
				},
				user_name:
				{
						required: "Please Enter the Username."
				},
				email:
				{
				required: "Please Enter Email Id.",
				//email:"Please Enter the valid email.",
				//remote:"This Email Id Exist"
				} ,
				password:
				{
						required: "Please Enter the Password."
				},
				cpassword: 
				{
						required: "Please Enter the Confirm Password.",
						equalTo: "Confirm field Not match with password."
				},
        }
	}); 
	
	
 
 // function  for deleting the user
  function delete_user(id)
	{
		var r = confirm("Are you sure want to delete the detail");
		if (r == true) 
		{
			window.location.href= site_url+'admin/user/delete/'+id;
		}
	}	
	
	// function for active inactive the User
	function active_func_user(id)
	{
		var r = confirm("Are you sure,You want to change this status ?");
		if (r == true) 
		{
			//var info = id;
			$.ajax({
			url: site_url+"admin/user/active_inactive",
			type:"POST",
			data:"&id="+id,
			success:function(data){
				//alert(data);
					if(data == '1')
					{
						$('#change_status_'+id).removeClass('label label-sm label-danger').addClass('label label-sm label-success');
						$('#change_status_'+id).html('Inactive');
						location.reload();
					}
					else
					{
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
	
  //------validation for edit user-----//
	$("#app_user_edit").validate({
    ignore: [],
	  rules: 
		{
		  first_name: 
			{
				required: true
               
			},
            last_name:
			{
                required: true
            },
        },
		messages: 
		{
		  
				first_name: 
				{
					required: "Please Enter the First Name."
					
				},
				last_name:
				{
						required: "Please enter Last Name."
				}
		 }
	}); 
	
	//category validation
	
	 //------validation for Add category-----//
	$("#cat_add").validate({
    ignore: [],
	  rules: 
		{
		  title: 
			{
				required: true
               
			},
           
        },
		messages: 
		{
		  
				title: 
				{
					required: "Please Enter the Title."
					
				},
				
		 }
	}); 
	
	
	//------validation for edit Category-----//
	 $("#cat_edit").validate({
    ignore: [],
	  rules: 
		{
		  title: 
			{
				required: true
               
			},
            
        },
		messages: 
		{
		  
				title: 
				{
					required: "Please Enter the Title."
					
				},
				
		 }
	});  
	
	// function  for deleting the category
  function delete_category(id)
	{
		var r = confirm("Are you sure want to delete the detail");
		if (r == true) 
		{
			window.location.href= site_url+'admin/category/delete/'+id;
		}
	}	
	
	// function for active inactive the category
	function category_active(id)
	{
		var r = confirm("Are you sure,You want to change this status ?");
		if (r == true) 
		{
			//var info = id;
			$.ajax({
			url: site_url+"admin/category/active_inactive",
			type:"POST",
			data:"&id="+id,
			success:function(data){
				//alert(data);
					if(data == '1')
					{
						$('#change_cat_'+id).removeClass('label label-sm label-success').addClass('label label-sm label-danger');
						$('#change_cat_'+id).html('Inactive');
						location.reload();
					}
					else
					{	
						$('#change_cat_'+id).removeClass('label label-sm label-success').addClass('label label-sm label-danger');
						$('#change_cat_'+id).html('Active');
						location.reload();
					}
				}
			}); 
			
		}
		return false;
	}
 
 // validation for statuc pages
 
  $("#ck_u").validate({
	  ignore: [],
     rules: 
		{
		   content:
			{
                required: true
            },
			title:
			{
				required: true
			},
        },
		messages: 
		{
		  content:
				{
				 required: "Please enter the Description."
				},
		 title:
				{
				 required: "Please enter the Title."
				}
		 }
	});  
	
// code for reset password

	
//************ function  for article category master add, edit, delete ,active/inactive*****************//

 //add validation
	$("#art_cat").validate({
	  ignore: [],
     rules: 
		{
		   title:
			{
                required: true
            },
			
        },
		messages: 
		{
		  title:
				{
				 required: "Please Enter The Title."
				},
		  
		 }
	});
	

 	
 // editing validation

	$("#art_cat_edit").validate({
	  ignore: [],
     rules: 
		{
		   title:
			{
                required: true
            },
			
        },
		messages: 
		{
		  title:
				{
				 required: "Please Enter The Title."
				},
		  
		 }
	});	
	
   //delete article category	
 
	  function delete_article_cat(id)
		{
			var r = confirm("Are you sure want to delete the detail");
			if (r == true) 
			{
				window.location.href= site_url+'admin/article_category/delete/'+id;
			}
		}	
	
   //active inactive article category
		function article_cat_active(id)
		{
			var r = confirm("Are you sure,You want to change this status ?");
			if (r == true) 
			{
				//var info = id;
				$.ajax({
				url: site_url+"admin/article_category/active_inactive",
				type:"POST",
				data:"&id="+id,
				success:function(data){
					//alert(data);
						if(data == '1')
						{
						   $('#change_cat_'+id).removeClass('label label-sm label-danger').addClass('label label-sm label-success');
						 
						  $('#change_cat_'+id).html('Inactive');
						  location.reload();
						}
						else
						{
							$('#change_cat_'+id).removeClass('label label-sm label-success').addClass('label label-sm label-danger');
							
						    $('#change_cat_'+id).html('Active');
							location.reload();
						}
					}
				}); 
				
			}
			return false;
		}
		
 
  /////************* Function For Event Type Add, Edit, Delete , act/inact *******************/////  
		
	//add validation
	$("#event_ad").validate({
	  ignore: [],
     rules: 
		{
		   event_type:
			{
                required: true
            },
			
        },
		messages: 
		{
		  event_type:
				{
				 required: "Please Enter The Event Type."
				},
		 
		 }
	});
	
 	
 // editing validation

	$("#event_edt").validate({
	  ignore: [],
     rules: 
		{
		   event_type:
			{
                required: true
            },
			
        },
		messages: 
		{
		  event_type:
				{
				 required: "Please Enter The Event Type."
				},
		  
		 }
	});
	
	
   //delete event	
 
	  function delete_event(id)
		{
			var r = confirm("Are you sure want to delete the detail");
			if (r == true) 
			{
				window.location.href= site_url+'admin/event/delete/'+id;
			}
		}	
	
    //active inactive Event
		function event_active(id)
		{
			var r = confirm("Are you sure,You want to change this status ?");
			if (r == true) 
			{
				//var info = id;
				$.ajax({
				url: site_url+"admin/event/active_inactive",
				type:"POST",
				data:"&id="+id,
				success:function(data){
					//alert(data);
						if(data == '1')
						{
						  $('#change_cat_'+id).removeClass('label label-sm label-danger').addClass('label label-sm label-success');
						  
						  $('#change_cat_'+id).html('Inactive');
						  location.reload();
						}
						else
						{
						   $('#change_cat_'+id).removeClass('label label-sm label-success').addClass('label label-sm label-danger');
						   
						  $('#change_cat_'+id).html('Active');
						  location.reload();
						}
					}
				}); 
				
			}
			return false;
		}	
		
	//edit feedback
  $("#fed_edt").validate({
	  ignore: [],
     rules: 
		{
		   message:
			{
                required: true
            }
		},
		messages: 
		{
		  message:
				{
				 required: "Please Enter The message."
				}
		 }
	});	
	
	