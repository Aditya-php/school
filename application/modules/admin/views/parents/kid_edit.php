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
			$id = $val->id;
			// pr($id);//die;
		}?>
        <!--Breadcrumb End-->
								<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Edit Kid </span>
										
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<?php echo form_open(base_url().'admin/parents/kid_edit/'.ID_encode($id),array('class'=>'form-horizontal')); ?>
										
										
											
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Kid Name<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="55" id="name" name="name" placeholder="Name" value="<?php echo set_value('name',$val->name); ?>">
																<?php echo form_error('name');?>
																 
															</div>
														</div>
													</div>
													<?php $data = $val->dob;
                                                     $dateOfBirth = date("d-M-Y",strtotime($data));?>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Date Of Birth<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="55" onchange="calulate_age(this.value)" id="datepicker" name="dob" placeholder="Date Of Birth" value="<?php echo set_value('dob',$dateOfBirth); ?>">
																<?php echo form_error('dob');?>
																 
															</div>
														</div>
													</div>
												




													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Age<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="3" id="age" onpaste="return false" onKeyPress="return isNumberKey(event)" name="age" placeholder="Age" value="<?php echo set_value('age',$val->age); ?>" readonly="">
																<?php echo form_error('age');?>
																 
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Likings<span class="star">*</span> :</label>
															<div class="col-md-8">
																<textarea class="form-control"  id="liking" name="liking" placeholder="Liking" value=""><?php echo set_value('liking',$val->liking); ?></textarea>
																<?php echo form_error('liking');?>
																 
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Dislikings<span class="star">*</span> :</label>
															<div class="col-md-8">
																<textarea class="form-control"  id="disliking" name="disliking" placeholder="Disliking" value=""><?php echo set_value('disliking',$val->disliking) ; ?></textarea>
																<?php echo form_error('disliking');?>
																 
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Scared Of<span class="star">*</span> :</label>
															<div class="col-md-8">
																<textarea class="form-control"  id="scared_of" name="scared_of" placeholder="Ccared Of" value=""><?php echo set_value('scared_of',$val->scared_of); ?></textarea>
																<?php echo form_error('scared_of');?>
																 
															</div>
														</div>
													</div>
														<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Allergic To<span class="star">*</span> :</label>
															<div class="col-md-8">
																<textarea class="form-control"  id="allergic_to" name="allergic_to" placeholder="Allergic To" value=""><?php echo set_value('allergic_to',$val->allergic_to); ?></textarea>
																<?php echo form_error('allergic_to');?>
																 
															</div>
														</div>
													</div>
														<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Doctor Name<span class="star">*</span> :</label>
															<div class="col-md-8">
															<input type="text" class="form-control"  id="doctor_name" name="doctor_name" placeholder="Doctor Name" value="<?php echo set_value('doctor_name',$val->doctor_name); ?>">
																<?php echo form_error('doctor_name');?>
																 
															</div>
														</div>
													</div>
														<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Doctor Contact No.<span class="star">*</span> :</label>
															<div class="col-md-8">
																
																  <input type="text"  class="form-control"  name="doc_con_num" id="doc_con_num" maxlength="10" onpaste="return false" onKeyPress="return isNumberKey(event)" placeholder="Mobile No." value="<?php echo set_value('doc_con_num',$val->doc_con_num); ?>"/>
																<?php echo form_error('doc_con_num');?>
																 
															</div>
														</div>
													</div>
                                                 					             <div class="col-md-6">
												   <div class="form-group">
													<label class="control-label col-md-4">Status<span class="star">*</span> :</label>
													<div class="col-md-8">
													<?php $s = $data1[0]->status; ?>
														<select name="status" class="form-control">
														<option value="">Select Status</option>
														<?php 
														$sataus=array("1"=>"active","2"=>"inactive");
														foreach ($sataus as $key =>$val){  
														 ?>
														<option value="<?php echo $key; ?>"<?php echo  set_select('status',  $key, ((!empty($data1[0]->status) && ( $key == $data1[0]->status) ) ? TRUE : FALSE ));?>><?php echo $val; ?></option>
														<?php 
														} ?>
														
													</select>
													<?php echo form_error('status');?>		
													</div>
												</div>
											</div>
											
											<div class="form-actions">
												<div class="row">
															<div class="text-center col-md-12">
																<button type="submit" class="btn blue">  <i aria-hidden="true" class="fa fa-check"></i>  Submit</button>
																<button type="button" class="btn default" onclick='window.history.back()'>  <i aria-hidden="true" class="fa fa-times"></i>  Cancel</button>
														
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
                                            												</div>
											</div>

										<?php form_close();?>
										<!-- END FORM-->
									</div>
								</div>
							
		</div>
	</div>

  <?php if(isset($data1[0]->dob) && !empty($data1[0]->dob)){ ?>
    <script>
    $(document).ready(function(){
         var start_date='<?php echo (isset($data1[0]->dob) && !empty($data1[0]->dob)) ?  $data1[0]->dob : "";  ?>';
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