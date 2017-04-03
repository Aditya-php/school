<!-- BEGIN FOOTER -->
<style>
.fa-check{display:none !important}
.fa-times{display:none !important}
</style>
<div class="page-footer">
	<div class="container text-center">
		<?= date("Y") ?> &copy; C3</div>
</div>
<div class="scroll-to-top">
	<i class="icon-arrow-up"></i>
</div>


<!--<script src="<?= base_url() ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>-->
<script src="<?= base_url() ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/global/plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>


  
    <script src="<?= base_url() ?>assets/global/plugins/flot/jquery.flot.min.js"></script>
    <script src="<?= base_url() ?>assets/global/plugins/flot/jquery.flot.resize.min.js"></script>
    <script src="<?= base_url() ?>assets/global/plugins/flot/jquery.flot.pie.min.js"></script>
    <script src="<?= base_url() ?>assets/global/plugins/flot/jquery.flot.stack.min.js"></script>
    <script src="<?= base_url() ?>assets/global/plugins/flot/jquery.flot.crosshair.min.js"></script>
    <script src="<?= base_url() ?>assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
    
    <script src="<?= base_url() ?>assets/admin/pages/scripts/charts-flotcharts.js"></script>
    
  
  <script src="<?= base_url() ?>assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>

<script src="<?= base_url() ?>assets/admin/pages/scripts/components-pickers.js"></script>

<script src="<?= base_url() ?>assets/global/plugins/moment.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/fullcalendar/fullcalendar.min.js"></script>

<script src="<?= base_url() ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/admin/pages/scripts/index3.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/admin/pages/scripts/calendar.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/pages/scripts/validate.js"></script>
<script src="<?= base_url() ?>assets/admin/pages/scripts/user_valid.js"></script>
<script src="<?= base_url() ?>assets/admin/pages/scripts/servicecreate.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js">
</script>


<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?= base_url() ?>assets/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/global/plugins/fancySelect.js"></script>
<!-- END PAGE LEVEL PLUGINS -->



<script src="<?= base_url() ?>assets/admin/pages/scripts/table-editable.js"></script>
<script>
jQuery(document).ready(function() {       
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
   TableEditable.init();
});
</script>  

<!--
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    Demo.init(); // init demo features
       //ChartsFlotcharts.init();
       //ChartsFlotcharts.initCharts();
       //ChartsFlotcharts.initPieCharts();
       //ChartsFlotcharts.initBarCharts();
    ComponentsPickers.init();
	Calendar.init();
	
});
</script>-->
<!-- END PAGE LEVEL SCRIPTS -->


<script>
			$(document).ready(function() {
				$('.menu').fancySelect().on('change', function() {
					newSection = $('#' + $(this).val())

					if (newSection.hasClass('current')) {
						return;
					}

					$('section').removeClass('current');
					newSection.addClass('current');

					$('section:not(.current)').fadeOut(300, function() {
						newSection.fadeIn(300);
					});
				});
			});
		</script>