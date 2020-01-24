<!DOCTYPE html>
<html lang="en">

<head>
	<title>SibemTUA|<?php echo @$judul; ?></title>
	<!-- meta -->
	<?php echo @$_meta; ?>

	<!-- css bootstrap & fontawesome -->
	<?php echo @$_css; ?>
	<style type="text/css" class="init">
		div.dataTables_wrapper {

			margin: 0 auto;
		}
	</style>
	<script type="text/javascript" class="init">
		$(document).ready(function() {
			$('#dynamic-table').DataTable({
				"scrollY": 200,
				"scrollX": true
			});
		});
	</script>

	<!-- jQuery.min.js -->
	<script src="<?php echo base_url() ?>aceadmin/assets/js/ace-extra.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
</head>

<body class="no-skin">
	<!-- navbar-header -->
	<?php echo @$_nav; ?>
	</div>

	<div class="main-container ace-save-state" id="main-container">
		<script type="text/javascript">
			try {
				ace.settings.loadState('main-container')
			} catch (e) {}
		</script>
		<!-- sidebar -->
		<?php echo @$_sidebar; ?>

		<div class="main-content">
			<div class="main-content-inner">


				<div class="wrapper">
					<?php echo $_content; ?>
				</div>

			</div>
		</div><!-- /.main-content -->

		<!-- footer -->
		<?php echo @$_footer; ?>

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
	</div><!-- /.main-container -->

	<!-- basic scripts -->
	<!-- js -->
	<?php echo @$_js; ?>
</body>

</html>