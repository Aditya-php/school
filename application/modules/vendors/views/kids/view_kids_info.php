<script>var currentUrl= '<?php echo base_url() ;?>';</script>
<div class="page-content-wrapper">
		<div class="page-content">
        
        <!--Breadcrumb Start-->
        
         <!--<ul class="page-breadcrumb breadcrumb">
						<?php// foreach($breadcum as $b_key	=>	$b_val){
							 //if($b_key	!=	''){?>
								<li class=""> <a href="<?= base_url().$b_key ?>"><?= $b_val ?></a><i class="fa fa-circle"></i> </li>
							<?php  //}else if($b_key	==	''){ ?>
									<li class="active"> <?= $b_val ?> </li>
						<?php	 //}
						// } ?>
                    </ul>-->
		
		<?php $data1 ;
		
		foreach($data1 as $val){
			// pr($val);
			$id = $val->kid;
			// pr($id);//die;
		}?>
        <!--Breadcrumb End-->
								<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">View Kid Information</span>
										
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form class='form-horizontal'>
										
										
											
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Kid name</label>
															<div class="col-md-8">
																<input readonly type="text" class="form-control" maxlength="55" id="name" name="name" placeholder="name" value="<?php if(!empty($val) && !empty($val->kname))echo $val->kname; ?>">
																 
															</div>
														</div>
													</div>
													<?php 
													if(!empty($val) && !empty($val->kdob))
													{
													$date = $val->kdob; //pr($date);
													$date1 =  date("d-M-Y",strtotime($date));//pr($date1);die;
													}
													?>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Date of birth</label>
															<div class="col-md-8">
																<input type="text" readonly class="form-control" maxlength="55" id="datepicker" onchange="calulate_age(this.value)" name="dob" placeholder="dob" value="<?php if(!empty($date)) echo $date; ?>">
																 
															</div>
														</div>
													</div>
												




													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Age</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="3" id="age" onpaste="return false" onKeyPress="return isNumberKey(event)" name="age" placeholder="age" value="<?php if(!empty($val) && !empty($val->kage))echo $val->kage ?>" readonly="" />
																 
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Likings</label>
															<div class="col-md-8">
																<textarea readonly class="form-control"  id="liking" name="liking" placeholder="liking" value=""><?php if(!empty($val) && !empty($val->kliking))echo  $val->kliking; ?></textarea>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Dislikings</label>
															<div class="col-md-8">
																<textarea readonly class="form-control"  id="disliking" name="disliking" placeholder="disliking" value=""><?php if(!empty($val) && !empty($val->kdisliking))echo  $val->kdisliking ; ?></textarea>
																 
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Scared of</label>
															<div class="col-md-8">
																<textarea readonly class="form-control"  id="scared_of" name="scared_of" placeholder="scared of" value=""><?php if(!empty($val) && !empty($val->kscared_of))echo $val->kscared_of; ?></textarea>
															</div>
														</div>
													</div>
														<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Allergic to</label>
															<div class="col-md-8">
																<textarea readonly class="form-control"  id="allergic_to" name="allergic_to" placeholder="allergic to" value=""><?php if(!empty($val) && !empty($val->kallergic_to))echo $val->kallergic_to; ?></textarea>
																 
															</div>
														</div>
													</div>
														<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Doctor Name</label>
															<div class="col-md-8">
															<input readonly type="text" class="form-control"  id="doctor_name" name="doctor_name" placeholder="doctor" value="<?php if(!empty($val) && !empty($val->kdoctor_name)) echo $val->kdoctor_name; ?>">
																 
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Doctor Contact Number</label>
															<div class="col-md-8">
																
																  <input readonly type="text"  class="form-control"  name="doc_con_num" id="doc_con_num" maxlength="10" onpaste="return false" onKeyPress="return isNumberKey(event)" placeholder="Mobile No." value="<?php if(!empty($val) && !empty($val->kdoc_con_num))echo $val->kdoc_con_num; ?>"/>
																 
															</div>
														</div>
													</div>
                                                   <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Father Name</label>
															<div class="col-md-8">
																
																  <input readonly type="text"  class="form-control" value="<?php if(!empty($val) && !empty($val->father_name))echo $val->father_name;?>"/>
																 
															</div>
														</div>
													</div>
                                                   <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Job Description and Compnay name</label>
															<div class="col-md-8">
																
																  <input readonly type="text"  class="form-control" value="<?php if(!empty($val) && !empty($val->father_job_desc))echo $val->father_job_desc;?>"/>
																 
															</div>
														</div>
													</div>
                                                   <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Father contact no.</label>
															<div class="col-md-8">
																
																  <input readonly type="text"  class="form-control"value="<?php if(!empty($val) && !empty($val->father_contact))echo $val->father_contact;?>"/>
																 
															</div>
														</div>
													</div>
                                                   <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Mother Name</label>
															<div class="col-md-8">
																
																  <input readonly type="text"  class="form-control" value="<?php if(!empty($val) && !empty($val->mother_name))echo $val->mother_name;?>"/>
																 
															</div>
														</div>
													</div>
                                                
                                                   <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Job Description and Compnay name</label>
															<div class="col-md-8">
																
																  <input readonly type="text"  class="form-control" value="<?php if(!empty($val) && !empty($val->mother_job_desc)) echo $val->mother_job_desc;?>"/>
																 
															</div>
														</div>
													</div>
                                                   <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Mother contact no.</label>
															<div class="col-md-8">
																
																  <input readonly type="text"  class="form-control" value="<?php if(!empty($val) && !empty($val->mother_contact)) echo $val->mother_contact;?>"/>
																 
															</div>
														</div>
													</div>
                                                   <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Emergency number</label>
															<div class="col-md-8">
																
																  <input readonly type="text"  class="form-control" value="<?php if(!empty($val) && !empty($val->emergency_no)) echo $val->emergency_no;?>"/>
																 
															</div>
														</div>
													</div>


													
											<div class="form-actions">
												<div class="row">
															<div class="text-center col-md-12">
																<a href="<?php echo base_url().'vendors/kids/listing'; ?>" class="btn default" ><i aria-hidden="true" class="fa fa-times"></i> Cancel</a>
														
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
                                            												</div>
											</div>

										</form>
										<!-- END FORM-->
									</div>
								</div>
							
		<!---/div>
	</div-->
	
 <?php if(isset($data1[0]->kdob) && !empty($data1[0]->kdob)){ ?>
    <script>
	$(document).ready(function(){
         var start_date='<?php echo (isset($data1[0]->kdob) && !empty($data1[0]->kdob)) ?  $data1[0]->kdob : "";  ?>';
         var end_date = '<?php echo date('Y-m-d'); ?>';
         if(start_date!='' && end_date!='')
         {
              var start=new Date(start_date);
              var end=new Date(end_date);
              calculate_duration(start,end);
         }
     });
    </script>
   <?php }  ?>
		<script type="text/javascript">
 $(function(){
	  // alert();
   $( "#datepicker" ).datepicker({
              minDate: "",endDate: '+0d', maxDate: "",format: 'dd-M-yyyy', yearRange: "2010:", changeMonth: true, changeYear: true,
        });  
		
  });
  function calulate_age(curr_date){
    if(curr_date!=''){
         var correctDate = curr_date.split('-');
		 var newcurr_date = correctDate[0] +' '+ correctDate[1] +' '+ correctDate[2];
		 
         var start=new Date(newcurr_date);
         var end=new Date();
         calculate_duration(start,end);
    }
  }
  function calculate_duration(start,end)
  {
        var difdt = new Date(end - start);
        var year=(difdt.toISOString().slice(0, 4) - 1970);
        var month=difdt.getMonth();
        var days=difdt.getDate();
        var msg='';
        if(year>0){
            msg= msg+" "+ year + " Year";
        }
        if(month>0){
            msg= msg+" "+ month + " Month";
        }
        if(days>0){
            msg = msg+" "+ days+ " Day"; 
        }
        if(msg!='')
        {
           $("#age").val(msg);    
        }
  }
  
    
  </script>
   
		
  