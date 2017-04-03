
<!DOCTYPE html >
<html>
    <head>
        <meta http-equiv="Content-Type"/>
        <title> <?= $title ?> </title>
    </head>
    <body>
        <?php $this->load->view('elements/header'); ?>
        <div class="clearfix"></div>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <?php $this->load->view('elements/left_menu'); ?>

            
            <!-- BEGIN CONTENT -->
            <?php $this->load->view($page); ?>
           
            <!-- END CONTENT -->
        </div>

        <?php $this->load->view('elements/footer'); ?>


    </body>
</html>