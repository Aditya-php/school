// check all checkbox........................
function check_all(thisref,class_name)
{
    if(thisref.checked == true){
            $('.'+class_name).prop("checked",true);
    }
    else {
           $('.'+class_name).prop("checked",false);
    }
}
//check all checkbox close.....................

//  Delete multiple records................
function delete_multiple(class_name,curr_url)
{
   var all_ids=[];
    	$('.'+class_name+':checked').each(function(i){
		all_ids[i] = $(this).val();									 
	});
    if(all_ids.length>=1){
         var conf=confirm('Are you sure you want to delete');
         if(conf){
        		$.ajax({
					url:curr_url,
					type: "POST",
					data: '&id='+all_ids,
					success: function(res) {
						if(res == 1){
						  alert('Records deleted successfully!!');
						}
                        else if(res == 2){
						  alert('Records deleted successfully,but some records can not be deleted as they are in process!!');
						}
                        else{
                          alert('Some database error,try again!!');
                        }
                        location.reload();
						}
					});
       }
    }else{
        alert("Select at least one record");
        return false;
    } 
}
//  Delete multiple records close................

//  Export multiple records................
function export_multiple(class_name)
{
   var all_ids=[];
    	$('.'+class_name+':checked').each(function(i){
		all_ids[i] = $(this).val();									 
	});
    if(all_ids.length>=1){
       
					$("#export_form").submit();
      
    }else{
        alert("Select at least one record to export");
        return false;
    } 
}
//  Export multiple records close................

// Number validation................
function isNumberKey(evt)//For no to be entered only no on keypress
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=45) return false;
return true;
}
// Number validation close................
