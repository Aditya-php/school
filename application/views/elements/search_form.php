
<div class="search">
    	<div class="container">
        	<div class="row">
            	<div class="slide-srch col-md-offset-1">
					<div class="bg-white">                	
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <select name="state"  class="state location">
                                <option value="">Choose State</option>
                                <?php foreach(@$states as $s_key  =>  $s_val){ ?>
                                <option value="<?= ID_encode($s_val->id) ?>"><?= $s_val->state ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <select name="city" id="ser_sv" class="city location">
                                <option value="">Choose City</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                       <input type="text" name="search" class="spel" placeholder="Specialities, Doctor,Clinic,Hospitals, Labs Spas" value="">
                        </div>  
                     </div>
                    <div class="btn-srch">
                    	<i aria-hidden="true" class="fa fa-search"></i>
                    </div>   
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>	
    </div>
<script>
    
	$(document).keydown(function(e)
	{
		var c = e.which;
		e.stopPropagation();
		//alert(c);// return false;
		if(c==13){
			e.preventDefault();
			$(".btn-srch").trigger("click");
		}
    });
	
	
    $(document).on("change",".state",function(){
        var state_id    =   $(this).val();
        $.ajax({ 
            type    :   'POST',
            url     :   "<?= base_url() ?>site/fetch_cities",
            data    :   "state="+state_id, 
            success :   function(data) {
                data    =   JSON.parse(data);
                if(data.status == "success")
                {
                    $('.city').html(data.citydata);
                }else{
                    
                }
            }
        });	

    });
	
    $(document).on("click",".btn-srch",function(){
        var state_id        =   $('.state').val();
        var city_id         =   $('.city').val();
        var srch_str        =   $('.spel').val();
		var search_string   =    $.trim(srch_str);
		//search_string = encodeURIComponent(search_string);
        if(state_id ==  '' || city_id   ==  '')
        {
            jAlert("Please select state and city", "Warning");
            return ;
        }else
		{
				//alert(search_string); return false;
				var letters = /^[a-zA-Z0-9 ]+$/;
				var result = letters.test(search_string);
				//alert(result);
				if(result == false)
				{
				  jAlert("Alphanumeric Value Only", "Warning");
				  $('.spel').val('');
                  return ;
				}
				else
				{
					window.location.href	=	"<?= base_url() ?>site/service/index/"+state_id+"/"+city_id+"/"+search_string;
		        //window.location.href	=	"<?= base_url() ?>site/service?state="+state_id+"&city="+city_id+"&string="+search_string;
				}
			
        }
    });
	
	
	
</script>