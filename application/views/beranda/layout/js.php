<script src="<?php echo base_url() ?>aceadmin/assets/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>aceadmin/assets/js/jquery.fractionslider.js"></script>
<script src="<?php echo base_url() ?>aceadmin/assets/js/backtoTop.js"></script>
<script>
  $(window).load(function() {
    $('.slider').fractionSlider({
      'fullWidth': true,
      'controls': true,
      'responsive': true,
      'dimensions': "1920,450",
      'timeout': 5000,
      'increase': true,
      'pauseOnHover': true,
      'slideEndAnimation': false,
      'autoChange': true
    });
  });
</script>