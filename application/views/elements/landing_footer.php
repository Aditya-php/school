
<footer>
	<div class="light-dark">
	<div class="container">
		<div class="row">
        	<div class="col-md-3 col-sm-3 col-xs-12">
                    <?php $address   =   static_page_content('4'); ?>
            	<h4> Address </h4>
                <p><?= $address->content ?></p>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
            	<h4>Services</h4>
				<ul>
				<?php @$services = get_latest_services();
				      if(!empty($services))
					  {
						  foreach(@$services as $forservices)
						  {
							 $forservices->id = ID_encode(@$forservices->id); 
				 ?>
                	   <li><a href="<?=base_url()?>site/service/view/<?=$forservices->id?>"><?php echo @$forservices->title; ?></a></li>
                       
				<?php    }
					  }
				?>
                </ul>
            </div>
           <div class="col-md-3 col-sm-3 col-xs-12">
            	<h4>Site Links</h4>
                <ul>
                	<li><a href="<?= base_url() ?>site">Home</a></li>
                    <li><a href="<?= base_url() ?>site/pages/view?id=<?php echo ID_encode(1) ;?>">About Us</a></li>
                    <li><a href="<?= base_url() ?>site/categories">Categories</a></li>
                 </ul>
            </div>
           <div class="col-md-3 col-sm-3 col-xs-12">
            	<h4>Site Links</h4>
               <ul>
                	<li><a href="<?= base_url() ?>site/categories">Services</a></li>
                    <li><a href="<?= base_url() ?>site/events">Events</a></li>
                    <li><a href="<?= base_url() ?>site/pages/contactus?id=<?php echo ID_encode(4) ;?>">Contact Us</a></li>
                </ul>
            </div>
        	
        </div>
	</div>
    </div>
    <div class="dark-bg">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-6 col-md-12 col-sm-6">
                	<p> Copyright <?= date("Y") ?> @ directory.com</p>
                </div>
                <div class="col-md-6 col-md-12 col-sm-6">
                    <?php  @$social_media1 = social_media_link(); 
                        @$ids1 = array('0' => 1,'1' =>2,'2' => 3,'3' => 4,'4'=>5,'5'=>6,'6'=>7,'7'=>8,'8'=>9);		
                    ?>
                    <ul class="fsocial">
                        <?php if(in_array(@$ids1[0],@$social_media1)) { ?>
                            <li><a href=""><i aria-hidden="true" class="fa fa-facebook"></i></a></li>
                        <?php }if(in_array(@$ids1[1],@$social_media1)) { ?>
                            <li><a href=""><i aria-hidden="true" class="fa fa-twitter"></i></a></li>
                        <?php }if(in_array(@$ids1[2],@$social_media1)) { ?>
						    <li><a href=""><i aria-hidden="true" class="fa fa-linkedin"></i></a></li>
                         <?php }if(in_array(@$ids1[3],@$social_media1)) { ?>
                            <li><a href=""><i aria-hidden="true" class="fa fa-youtube"></i></a></li>
                        <?php }if(in_array(@$ids1[4],@$social_media1)) { ?>
                            <li><a href=""><i aria-hidden="true" class="fa fa-google-plus"></i></a></li>
                        <?php } if(in_array(@$ids1[5],@$social_media1)) { ?>
                            <li><a href=""><i aria-hidden="true" class="fa fa-pinterest"></i></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
/*
var __slice = [].slice;

(function($, window) {
  var Starrr;

  Starrr = (function() {
    Starrr.prototype.defaults = {
      rating: void 0,
      numStars: 5,
      change: function(e, value) {}
    };

    function Starrr($el, options) {
      var i, _, _ref,
        _this = this;

      this.options = $.extend({}, this.defaults, options);
      this.$el = $el;
      _ref = this.defaults;
      for (i in _ref) {
        _ = _ref[i];
        if (this.$el.data(i) != null) {
          this.options[i] = this.$el.data(i);
        }
      }
      this.createStars();
      this.syncRating();
      this.$el.on('mouseover.starrr', 'span', function(e) {
        return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('mouseout.starrr', function() {
        return _this.syncRating();
      });
      this.$el.on('click.starrr', 'span', function(e) {
        return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('starrr:change', this.options.change);
    }

    Starrr.prototype.createStars = function() {
      var _i, _ref, _results;

      _results = [];
      for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
        _results.push(this.$el.append("<span class='fa .fa-star-o'></span>"));
      }
      return _results;
    };

    Starrr.prototype.setRating = function(rating) {
      if (this.options.rating === rating) {
        rating = void 0;
      }
      this.options.rating = rating;
      this.syncRating();
      return this.$el.trigger('starrr:change', rating);
    };

    Starrr.prototype.syncRating = function(rating) {
      var i, _i, _j, _ref;

      rating || (rating = this.options.rating);
      if (rating) {
        for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
          this.$el.find('span').eq(i).removeClass('fa-star-o').addClass('fa-star');
        }
      }
      if (rating && rating < 5) {
        for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
          this.$el.find('span').eq(i).removeClass('fa-star').addClass('fa-star-o');
        }
      }
      if (!rating) {
        return this.$el.find('span').removeClass('fa-star').addClass('fa-star-o');
      }
    };

    return Starrr;

  })();
  return $.fn.extend({
    starrr: function() {
      var args, option;

      option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
      return this.each(function() {
        var data;

        data = $(this).data('star-rating');
        if (!data) {
          $(this).data('star-rating', (data = new Starrr($(this), option)));
        }
        if (typeof option === 'string') {
          return data[option].apply(data, args);
        }
      });
    }
  });
})(window.jQuery, window);

$(function() {
  return $(".starrr").starrr();
});

$( document ).ready(function() {
      
  $('#stars').on('starrr:change', function(e, value){
    $('#count').html(value);
  });
  
  $('#stars-existing').on('starrr:change', function(e, value){
    $('#count-existing').html(value);
  });
});*/
</script>
<script src="<?= base_url() ?>assets/jquery-alert-dialogs/js/jquery.alerts.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>assets/jquery-alert-dialogs/css/jquery.alerts.css">
<!--<script type="text/javascript" src="<?= base_url() ?>frontend_assets/js/jquery_min.js"></script>-->
<script type="text/javascript" src="<?= base_url() ?>frontend_assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>frontend_assets/js/wow.min.js"></script>
<script>new WOW().init();</script>
<script type="text/javascript" src="<?= base_url() ?>frontend_assets/js/my_function.js"></script>
<script type="text/javascript" src="<?= base_url() ?>frontend_assets/js/jquery.fancybox.js"></script>
<script type="text/javascript" src="<?= base_url() ?>frontend_assets/js/jquery.fancybox.pack.js"></script>

