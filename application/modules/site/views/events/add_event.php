
<link rel="stylesheet"  href="<?= base_url()?>frontend_assets/css/jquery.datetimepicker.css" />

<div class="withou_search">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="border_bottom">
                <div class="row">
                    <div class="col-md-8  col-sm-6 col-xs-6 text-left">
                        <h2 class="inner-heading"> 
                            <?php if(uri_segment(3) ==  'add'){ ?>
                                New Event 
                            <?php }else if(uri_segment(3) ==  'edit'){ ?>
                                Edit Event 
                            <?php }?>
                        </h2>
                    </div>  
                    <div class="col-md-4  col-sm-6 col-xs-6  text-right">
                        <ul class="page-breadcrumb breadcrumb">
                            <?php  foreach ($breadcum as $b_key => $b_val) {
                                    if ($b_key != '') {
                                    ?>
                                    <li class=""> <a href="<?= base_url() . $b_key ?>"><?= $b_val ?></a> </li>
                                    <?php } else if ($b_key == '') { ?>
                                    <li class="active"> <?= $b_val ?> </li>
                                    <?php } } ?>
                        </ul>
                    </div>
                <div class="clearfix"></div>
                </div>
            </div>
                
                </div>
            </div>
        </div>
</div>

<div class="clearfix"></div>

<div class="pad-50">
	<div class="container">
        <div class="row add_article">
		<!-- BEGIN FORM-->
		<form action="" class="form-horizontal"  method="post">
            <div class="col-md-5 col-md-offset-4">
                <div class="text-center">
	            	<h2 style="color:#2d2d29">
                            <?php if(uri_segment(3) ==  'add'){ ?>
                                Add New Event 
                            <?php }else if(uri_segment(3) ==  'edit'){ ?>
                                Edit Event 
                            <?php }?>
                        </h2>
                    <img src="<?= base_url() ?>frontend_assets/img/line.png">
                </div>
                <div class="form-group">
				    <?php $event_type = get_event_type();  
					     // print_r($event_type); die;
					?>
                	<label> Select Event Type : </label>
					<?php echo form_dropdown('event_type_id',$event_type,@$result->event_type_id,'class="form-control"  id="event_type_id" ');
						echo form_error('event_type_id');
						?>
                    </select>
					<span id="error1" style="color:red;"></span>
				</div>
                
                <div class="form-group">
                	<label> Title : </label>
					<input type="text" id="title" name="title"  placeholder="Title" 
					value="<?php if(@$_POST['title']){ echo @$_POST['title'];}else if(@$result!='' && @$result->title!=''){echo @$result->title;}else{echo '';}?>" class="form-control">
					<span id="error2" style="color:red;"></span>
					<?php echo form_error('title');?>
				</div>
                <div class="form-group">
                	<label>  Description : </label>
					<textarea class="form-control" id="description" name="description" placeholder="Write Description Here" ><?php if(@$_POST['description']){ echo @$_POST['description'];}else if(@$result!='' && @$result->description!=''){echo @$result->description;}else{echo '';}?></textarea>
					<span id="error3" style="color:red;"></span>
					<?php echo form_error('description');?>
					
				</div>
				 <div class="form-group">
                	<label>  Start Date&Time : </label>
					<input type="text" id="startdate" name="startdate" value="<?php if(@$_POST['startdate']){ echo @$_POST['startdate'];}else if(@$result!='' && @$result->startdate!=''){echo @$result->startdate;}else{echo '';}?>"  placeholder="Start Date & Time" class="form-control datetimepicker2" readonly>
					<span id="error4" style="color:red;"></span>
					<?php echo form_error('startdate');?>
					
				</div>
				<div class="form-group">
                	<label> End Date&Time : </label>
					<input type="text" id="enddate" name="enddate" value="<?php if(@$_POST['enddate']){ echo @$_POST['enddate'];}else if(@$result!='' && @$result->enddate!=''){echo @$result->enddate;}else{echo '';}?>" placeholder="End Date & Time" class="form-control datetimepicker2" readonly>
					<span id="error5" style="color:red;"></span>
					<?php echo form_error('enddate');?>
					
				</div>
				<div class="form-group">
                	<label> Event Venue : </label>
					<input type="text" id="venue" name="venue" value="<?php if(@$_POST['venue']){ echo @$_POST['venue'];}else if(@$result!='' && @$result->venue!=''){echo @$result->venue;}else{echo '';}?>"  placeholder="Event venue" class="form-control">
					<span id="error6" style="color:red;"></span>
					<?php echo form_error('venue');?>
					
				</div>
				<div class="form-group">
                	<label> Price : </label>
					<input type="text" id="price" name="price"  value="<?php if(@$_POST['price']){ echo @$_POST['price'];}else if(@$result!='' && @$result->price!=''){echo @$result->price;}else{echo '';}?>" placeholder="Price" class="form-control">
					<span id="error7" style="color:red;"></span>
					<?php echo form_error('price');?>
					
				</div>
				<div class="form-group">
                	<label> Contact Number: </label>
					<input type="text" id="contact_no" name="contact_no"  value="<?php if(@$_POST['contact_no']){ echo @$_POST['contact_no'];}else if(@$result!='' && @$result->contact_no!=''){echo @$result->contact_no;}else{echo '';}?>" placeholder="Contact Number" class="form-control">
					<span id="error8" style="color:red;"></span>
					<?php echo form_error('contact_no');?>
					
				</div>
				<div class="form-group">
                	<label> Email: </label>
					<input type="text" id="email_id" name="email_id" value="<?php if(@$_POST['email_id']){ echo @$_POST['email_id'];}else if(@$result!='' && @$result->email!=''){echo @$result->email;}else{echo '';}?>"  placeholder="Email" class="form-control">
					<span id="error9" style="color:red;"></span>
					<?php echo form_error('email_id');?>
					
				</div>
				<div class="form-group">
                	<label> Website: </label>
					<input type="text" id="website" name="website" value="<?php if(@$_POST['website']){ echo @$_POST['website'];}else if(@$result!='' && @$result->website!=''){echo @$result->website;}else{echo '';}?>" placeholder="Website" class="form-control">
					<span id="error-1" style="color:red;"></span>
					<?php echo form_error('website');?>
					
				</div>
               
               <div class="text-center divider">
               		<button type="submit" class="btn btn-md  btn-warning eve_front"> <i class="fa fa-floppy-o" aria-hidden="true"></i> Save  </button>
					&nbsp;&nbsp;<button type="button" class="btn btn-md  btn-warning" onclick="history.go(-1);">Go Back</button>
               </div>
                
            </div>
			</form>
			<!---- form end----->
             <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>
<script type="text/javascript" src="<?= base_url()?>frontend_assets/js/jquery.datetimepicker.full.js" ></script>
<script type="text/javascript">
 // for date & time picker 
	$('.datetimepicker2').datetimepicker({
		beforeShowDay: nonWorkingDates,
		dateFormat: 'yyyy/mm/dd',
		minDate : 0,
		allowTimes: ['09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00']
	});
	
	 function nonWorkingDates(date)
	{
		var day = date.getDay(), Sunday = 0, Monday = 1, Tuesday = 2, Wednesday = 3, Thursday = 4, Friday = 5, Saturday = 6;
		var closedDays = '';
		for (var i = 0; i < closedDays.length; i++) 
		{
				if (day == closedDays[i][0]) {
					return [false];
				}
		}
		return [true];
	} 
	
	function open_schedule_cal()
	{
		$(".datetimepicker2").trigger('focus');
	}
	
	$('.datetimepicker2').on('change', function()
	{
		$('.xdsoft_datetimepicker').hide();
	});
	// end
	

   //***** check email *****//
     function ValidateEmail(email_id) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email_id);
    };
    
 
 //form validation
 
  $(".eve_front").click(function()
 {
				  
	 var event_type_id    = $('#event_type_id').val();
	 var title            = $('#title').val();
	 var description      = $('#description').val();
	 var startdate        = $('#startdate').val();
	 var enddate          = $('#enddate').val();
	 var venue            = $('#venue').val();
	 var price            = $('#price').val();
	 var contact_no       = $('#contact_no').val();
	 var email_id         = $('#email_id').val();
	 var website          = $('#website').val();
	// var pattern = /^\d{10}$/;/^[0-9]+$/;
	 var numbers = /^[0-9]+$/; 
	//alert(email_id); 
	 
	 var error=0;
	  if(!event_type_id)
	   {
			$("#event_type_id").addClass('required');
			$("#error1").html('Please Select Event Type.');
			error++;
	   }
	   else
	   {
			$("#error1").html('');
		   
	   }
	   
	   if(!title)
	   {
			$("#title").addClass('required');
			$("#error2").html('Please Enter Title.');
			error++;
	   }
	   else
	   {
			$("#error2").html('');
		   
	   }
	   
	   if(!description)
	   {
			$("#description").addClass('required');
			$("#error3").html('Please Enter Description.');
			error++;
	   }
	   else
	   {
			$("#error3").html('');
		   
	   }
	   
	   if(!startdate)
	   {
			$("#startdate").addClass('required');
			$("#error4").html('Please Select startdate.');
			error++;
	   }
	   else
	   {
			$("#error4").html('');
		   
	   }
	   
	   if(!enddate)
	   {
			$("#enddate").addClass('required');
			$("#error5").html('Please Select enddate.');
			error++;
	   }
	   else
	   {
			if ((Date.parse(startdate) >= Date.parse(enddate)))
			{ 
				$("#error5").html('End date should be greater than Start date!');
				$('#enddate').val('');
				return false;
				
			}
			else
			{
			  $("#error5").html('');
			}
		   
	   }
	   
	   if(!venue)
	   {
			$("#venue").addClass('required');
			$("#error6").html('Please Enter Venue.');
			error++;
	   }
	   else
	   {
			$("#error6").html('');
		   
	   }
	   
	   if(!price)
	   {
			$("#price").addClass('required');
			$("#error7").html('Please Enter Price.');
			error++;
	   }
	   else
	   {
			if (!numbers.test(price))
			{ 
		        $("#error7").html('Enter Numbers only');
				$("#price").val('');
				return false;
				
			}
			else
			{
			  $("#error7").html('');
			}
		   
	   }
	   
	   if(!contact_no)
	   {
			$("#contact_no").addClass('required');
			$("#error8").html('Please Enter Contact no.');
			error++;
	   }
	   else
	   {
			$("#error8").html('');
			/* if (!pattern.test(contact_no))
			{ 
				$("#error8").html('Please enter only numbers and length must be 10 digits');
				$("#contact_no").val('');
				return false;
				
			} 
			else
			{
			  $("#error8").html('');
			}*/
		   
	   }
	   
		if(!ValidateEmail(email_id))
		{
			$("#email_id").addClass('required');
			$("#error9").html('Please Enter Valid Email Address.');
		    error++;
		}
		else
		{
		    $("#error9").html('');
		}
	
	   if(!website)
	   {
			$("#website" ).addClass('required');
			$("#error-1").html('Please Enter Website.');
			error++;
	   }
	   else
	   {
		   $("#error-1").html('');
	   }
	 // alert(error) ;
	   if(error>0)
	   {
		   return false;
	   }
   
 });
	
</script>

