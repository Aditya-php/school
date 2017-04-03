<div class="withou_search">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="border_bottom">
                    <div class="row">
                        <div class="col-md-8  col-sm-6 col-xs-6  text-left">
                            <h2 class="inner-heading">Categories</h2>
                        </div>  
                        <div class="col-md-4  col-sm-6 col-xs-6  text-right">
                            <ul class="page-breadcrumb breadcrumb">
                                <?php
                                foreach ($breadcum as $b_key => $b_val) {
                                    if ($b_key != '') {
                                        ?>
                                        <li class=""> <a href="<?= base_url() . $b_key ?>"><?= $b_val ?></a> </li>
                                    <?php } else if ($b_key == '') { ?>
                                        <li class="active"> <?= $b_val ?> </li>
    <?php }
} ?>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div> 
<div class="container">
	
    <div class="row">
    	<div class="col-md-12">
        	<div class="ctgry-list">
            	<span>Brows by letter:</span>
                <ul>
					<style>
						.item_sel{background-color:#f36F02 !important;color:#ffffff;}
					</style>
                	<li class="<?= (@$_GET['item']	==	'a')?"item_sel":"" ?>"><a href="javascript:void(0);">a</a></li>
                    <li class="<?= (@$_GET['item']	==	'b')?"item_sel":"" ?>"><a href="javascript:void(0);">b</a></li>
                    <li class="<?= (@$_GET['item']	==	'c')?"item_sel":"" ?>"><a href="javascript:void(0);">c</a></li>
                    <li class="<?= (@$_GET['item']	==	'd')?"item_sel":"" ?>"><a href="javascript:void(0);">d</a></li>
                    <li class="<?= (@$_GET['item']	==	'e')?"item_sel":"" ?>"><a href="javascript:void(0);">e</a></li>
                    <li class="<?= (@$_GET['item']	==	'f')?"item_sel":"" ?>"><a href="javascript:void(0);">f</a></li>
                    <li class="<?= (@$_GET['item']	==	'g')?"item_sel":"" ?>"><a href="javascript:void(0);">g</a></li>
                    <li class="<?= (@$_GET['item']	==	'h')?"item_sel":"" ?>"><a href="javascript:void(0);">h</a></li>
                    <li class="<?= (@$_GET['item']	==	'i')?"item_sel":"" ?>"><a href="javascript:void(0);">i</a></li>
                    <li class="<?= (@$_GET['item']	==	'j')?"item_sel":"" ?>"><a href="javascript:void(0);">j</a></li>
                    <li class="<?= (@$_GET['item']	==	'k')?"item_sel":"" ?>"><a href="javascript:void(0);">k</a></li>
                    <li class="<?= (@$_GET['item']	==	'l')?"item_sel":"" ?>"><a href="javascript:void(0);">l</a></li>
                    <li class="<?= (@$_GET['item']	==	'm')?"item_sel":"" ?>"><a href="javascript:void(0);">m</a></li>
                    <li class="<?= (@$_GET['item']	==	'n')?"item_sel":"" ?>"><a href="javascript:void(0);">n</a></li>
                    <li class="<?= (@$_GET['item']	==	'o')?"item_sel":"" ?>"><a href="javascript:void(0);">o</a></li>
                    <li class="<?= (@$_GET['item']	==	'p')?"item_sel":"" ?>"><a href="javascript:void(0);">p</a></li>
                    <li class="<?= (@$_GET['item']	==	'q')?"item_sel":"" ?>"><a href="javascript:void(0);">q</a></li>
                    <li class="<?= (@$_GET['item']	==	'r')?"item_sel":"" ?>"><a href="javascript:void(0);">r</a></li>
                    <li class="<?= (@$_GET['item']	==	's')?"item_sel":"" ?>"><a href="javascript:void(0);">s</a></li>
                    <li class="<?= (@$_GET['item']	==	't')?"item_sel":"" ?>"><a href="javascript:void(0);">t</a></li>
                    <li class="<?= (@$_GET['item']	==	'u')?"item_sel":"" ?>"><a href="javascript:void(0);">u</a></li>
                    <li class="<?= (@$_GET['item']	==	'v')?"item_sel":"" ?>"><a href="javascript:void(0);">v</a></li>
                    <li class="<?= (@$_GET['item']	==	'w')?"item_sel":"" ?>"><a href="javascript:void(0);">w</a></li>
                    <li class="<?= (@$_GET['item']	==	'x')?"item_sel":"" ?>"><a href="javascript:void(0);">x</a></li>
                    <li class="<?= (@$_GET['item']	==	'y')?"item_sel":"" ?>"><a href="javascript:void(0);">y</a></li>
                    <li class="<?= (@$_GET['item']	==	'Z')?"item_sel":"" ?>"><a  href="javascript:void(0);">z</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
	    	<ul class="categories">
			<?php 
			      if(!empty($result))
				  {
					  foreach($result as $result1)
					  {
						$en_id	=	ID_encode($result1->id);  
						  
		    ?>  
			  <li><a href="<?= base_url() ?>site/categories/service_providers/<?php echo $en_id;?>"><?php echo $result1->title; ?></a></li>
			
			
			<?php
					  }
				  }
			
			?>
			
	       <!-- <li><a href="<?= base_url() ?>category/view">Abundance Therapy</a></li>
	        <li><a href="">Access Consciousness</a></li>
	        <li><a href="">Acupressure/Magnet Therapy</a></li>
	        <li><a href="">Acupuncture</a></li>
	        <li><a href=" ">Acutonics</a></li>
	        <li><a href="">Addiction and Recovery</a></li>
	        <li><a href="">Alexander Technique</a></li>
	        <li><a href="">Allergy Testing &amp; Treatment</a></li>
	        <li><a href="">Alternative Health</a></li>
	        <li><a href="">Alternative Medicine</a></li>
	        <li><a href="">Angel Art</a></li>
	        <li><a href="">Angel Healing</a></li>
	        <li><a href="">Angel Readings &amp; Classes</a></li>
	        <li><a href="">Angel Therapy Practitioner&reg;</a></li>
	        <li><a href="">Angel Workshops &amp; Classes</a></li>
	        <li><a href="">Angelic Counselling</a></li>
	        <li><a href="">Angelic Reiki</a></li>
	        <li><a href="">Angels</a></li>
	        <li><a href="">Animal Care</a></li>
	        <li><a href="">Animal Communication</a></li>
	        <li><a href="">Animal Healing</a></li>
	        <li><a href="">Answers</a></li>
	        <li><a href="">Anxiety &amp; Panic Attacks</a></li>
	        <li><a href="">Apitherapy</a></li>
	        <li><a href="">Aqua Detox</a></li>
	        <li><a href="">Arbah Healing</a></li>
	        <li><a href="">Arbor Essentia&reg; therapy</a></li>
	        <li><a href="">Aromatherapy &amp; Essential Oils</a></li>
	        <li><a href="">Art Therapy</a></li>
	        <li><a href=" ">Ascension</a></li>
	        <li><a href="">ASEA</a></li>
	        <li><a href=" ">Astrological Counselling</a></li>
	        <li><a href="">Astrology</a></li>
	        <li><a href="">Auditory Training</a></li>
	        <li><a href="">Aura Clearing</a></li>
	        <li><a href="">Aura Photography</a></li>
	        <li><a href="">Aura Reading</a></li>
	        <li><a href="">Auricular Acupuncture</a></li>
	        <li><a href="">Authors &amp; Books</a></li>
	        <li><a href="">Autogenics</a></li>
	        <li><a href=" ">Ayurveda</a></li>
	        <li><a href="">Baby Reflex</a></li>
	        <li><a href="">Bach Flower Therapy</a></li> -->
	        
        	<div class="clearfix"></div>
		</ul>
        </div>
    </div>
</div>
<script type="text/javascript">

	$(".ctgry-list ul li").click(function(){
		var item	=	$(this).text();
		window.location.href	=	"<?= base_url() ?>site/categories?item="+item;
		 
   });
  
  
	</script>