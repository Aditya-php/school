<div class="withou_search">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="border_bottom">
                    <div class="row">
                        <div class="col-md-8  col-sm-6 col-xs-6  text-left">
                            <h2 class="inner-heading"><?php echo $result->title; ?></h2>
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
<div class="clearfix"></div>
<div class="slider inner-slide">
    <div class="pad-50">	     
        <div class="container">
            <div class="row">
                <?php echo $result->content; ?>
            </div>
        </div>
    </div>
</div>