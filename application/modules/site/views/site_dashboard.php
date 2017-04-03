<div class="clearfix"></div>

<div class="slider">
<div id="top_slider" class="owl-carousel owl-theme">
	<div class="item"><img src="<?= base_url() ?>frontend_assets/img/banner_2.jpg" class="img-responsive"></div>
	<div class="item"><img src="<?= base_url() ?>frontend_assets/img/banner_3.jpg" class="img-responsive"></div>
	<div class="item"><img src="<?= base_url() ?>frontend_assets/img/banner.jpg" class="img-responsive"></div>
</div>
    <?= $this->load->view('elements/search_form'); ?>
</div>

<div class="clearfix"></div>

<div class="theeofone">
	<div class="container">
    	<div class="row">
		    
        	<div class="col-md-4 col-sm-4 col-xs-12 text-center wow fadeInDown animated" data-wow-duration="800ms" data-wow-delay="800ms">
			<?php $heading1 = get_heading_content('5'); ?>
            		<i aria-hidden="true" class="fa fa-medkit" ></i>
                    <h2><?php echo $heading1->title; ?></h2>
                    <p><?php echo substr($heading1->content,0,120); ?></p>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 text-center wow fadeInDown animated" data-wow-duration="1100ms" data-wow-delay="1100ms">
			<?php $heading2 = get_heading_content('6'); ?>
            	<i aria-hidden="true" class="fa fa-user-md"></i>
                <h2><?php echo $heading2->title; ?></h2>
                <p><?php echo substr($heading2->content,0,120); ?></p>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 text-center wow fadeInDown animated" data-wow-duration="1400ms" data-wow-delay="1400ms">
			<?php $heading3 = get_heading_content('7'); ?>
            	<i aria-hidden="true" class="fa fa-ambulance"></i>
                <h2><?php echo $heading3->title; ?></h2>
                <p><?php echo substr($heading3->content,0,120); ?></p>
            </div>
    	</div>
	</div>
</div>

<div class="clearfix"></div>

<div class="feature">
	<div class="container">
    	<div class="row">
            <div class="text-center">
                <h1>Featured Articles</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            </div>
            <div class="cleafix"></div>
			<?php  if(!empty($article))
				  {
					  
					foreach(@$article as $forarticle)
					{
						$img = "";
						if(@$forarticle->article_image!='')
						{
							if(file_exists('assets/article_image/'.@$forarticle->article_image))
							{
							  $img     	= base_url()."assets/article_image/".''.@$forarticle->article_image;
							}
							else
						   {
							  $img	    = base_url()."assets/article_image/".'default.jpg';
						   }
						}
						else
						   {
							  $img	    = base_url()."assets/article_image/".'default.jpg';
						   }
						@$forarticle->id = ID_encode(@$forarticle->id);
						//print_r($img); die;
			?>	
			
            <a href="<?= base_url() ?>site/articles/view/<?php echo @$forarticle->id;?>"> 	
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<div class="white-shadow">
                	<div class="left-img">
                    	<img src="<?php echo $img ?>" class="img-responsive" alt="" />
                    </div>
                    <div class="right-text">
                    	<span><?php echo ucfirst (substr(@$forarticle->title,0,45)); ?></span>
                        <p><?php echo (strlen(@$forarticle->description)>=120)?substr(@$forarticle->description,0,125).'...':$forarticle->description;?></p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
			</a>
			<?php 
					}
				  }
				  else
				  {
					echo "No Articles Available";  
				  }
			 ?>
          </div>
            <div class="text-center view_all">
            	<a href="<?= base_url() ?>site/articles">View All Featured Article..</a>
            </div>
        </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="business">
	<div class="container">
    	<div class="row">
        	<div class="text-center">
            	<h1>Recently added Businesses</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            </div>
			<?php  if(!empty($services))
				  {
					  
					foreach(@$services as $forservices)
					{
						$img1 = "";
						if(@$forservices->service_image!='')
						{
							if(file_exists('assets/service_image/'.@$forservices->service_image))
							{
							  $img1    	= base_url()."assets/service_image/".''.@$forservices->service_image;
							}
							else
						   {
							$img1	    = base_url()."assets/article_image/".'default.jpg';
						   }
						}else
						{
							$img1	    = base_url()."assets/article_image/".'default.jpg';
						}
						@$forservices->id = ID_encode(@$forservices->id);
						//print_r($img); die;
			?>	
			<a href="<?=base_url()?>site/service/view/<?=$forservices->id?>">
        	<div class="col-md-4 col-sm-4 col-xs-12">
            	<div class="facialist">
                	<div class="img">
                	<img src="<?php echo $img1 ?>" class="img-responsive"  alt="Naturl Facialist" />
                    </div>
                    <div class="clearfix"></div>
                    <div class="icon">
                    	<img src="<?= base_url() ?>frontend_assets/img/business_icon.png" >
                    </div>
                    <div class="clearfix"></div>
                    <div class="text-center">
                        <h3><?php echo $forservices->title; ?></h3>
                        <p><?php echo (strlen($forservices->description)>=120)?substr($forservices->description,0,90).'......':$forservices->description;?></p>
                        <span> <i class="fa fa-mobile" aria-hidden="true"></i> <?php echo '+91 - '.$forservices->business_phone; ?> </span>
                    </div>
            	</div>
            </div>
			</a>
		    <?php 
		            } 
		        }    ?>
           </div>
	</div>
    <div class="clearfix"></div>
</div>

<div class="clearfix"></div>



<!--<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=1050479985020185";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-page" data-href="https://www.facebook.com/Magazine.Branza/" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Magazine.Branza/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Magazine.Branza/">‎ברנז&#039;ה מגזין באר שבע והנגב‎</a></blockquote></div>




<!-- Load Facebook SDK for JavaScript -->
<!--<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div class="fb-comment-embed"
   data-href="https://www.facebook.com/photo.php?fbid=10205951013008636&set=a.1621800359098.70778.1659122811&type=3&theater"
   data-width="500"></div>
<iframe src="https://www.facebook.com/plugins/post.php?href=https://www.facebook.com/AnkitRajput7/posts/10205951013208641?comment_id=10205952138996785&width=500" width="500" height="502" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=1512272249070669";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="10"></div>

-->

<div class="events">
	<div class="container">
		<div class="row">
        	<div class="text-center">
            	<h1>Upcoming Events</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            </div>
            <div class="clearfix"></div>
            <?php  if(!empty($events))
				  {
					foreach(@$events as $forevents)
					{
						@$timestamp = strtotime(@$forevents->startdate);
						$forevents->id = ID_encode($forevents->id);
			?>	
            <a href="<?= base_url() ?>site/events/view/<?php echo $forevents->id;?>"> 			
			<div class="col-md-6 col-sm-6 col-xs-12">
            	<div class="event-bg">
                    <div class="left-circle">
                        <p> <?php echo date("d", @$timestamp); echo substr(date("F", @$timestamp),0,3)?></p>
                    </div>
                    <div class="right-desc">
					<p class="title"><?php echo ucfirst(substr(@$forevents->title,0,45)); ?></p>
					 <p><?php echo (strlen(@$forevents->description)>=120)?substr(@$forevents->description,0,119).'...':@$forevents->description;?></p>
                        <span>  <?php echo date('D  j F Y  h:i A',strtotime(@$forevents->startdate));?> </span>
                    </div>
                    <div class="clearfix"></div>	
				</div>                    
            </div>
			</a>
             <?php		
			        }
				  }
                  else
				  {
					echo "No Events Available";  
				  }
 			 ?>
		</div>
		 <div class="text-center view_all">
            	<a href="<?= base_url() ?>site/events">View All Events..</a>
            </div>
	</div>
</div>

<div class="clearfix"></div>
