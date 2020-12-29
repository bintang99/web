<!-- jQuery 3 -->
<script src="<?=base_url(); ?>assets/auth/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url(); ?>assets/auth/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?=base_url(); ?>assets/auth/plugins/iCheck/icheck.min.js"></script>
<script src="<?=base_url(); ?>assets/auth/bower_components/sweetalert/sweetalert2.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<script type="text/javascript">
  $('#notifikasi').slideDown('slow').delay(5000).slideUp('slow');
</script>
</body>
</html>
