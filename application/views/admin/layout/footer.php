<!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>SMK Pasim &copy; <?=Date('Y')?> <a href="#">SMK Pasim</a>.</strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?=base_url(); ?>assets/auth/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url(); ?>assets/auth/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=base_url(); ?>assets/auth/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url(); ?>assets/auth/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url(); ?>assets/auth/bower_components/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?=base_url(); ?>assets/auth/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url(); ?>assets/auth/dist/js/adminlte.min.js"></script>
<script src="<?=base_url(); ?>assets/auth/dist/js/demo.js"></script>
<script src="<?=base_url(); ?>assets/auth/bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?=base_url(); ?>assets/auth/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?=base_url(); ?>assets/auth/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?=base_url(); ?>assets/auth/bower_components/sweetalert/sweetalert2.js"></script>
<script>
 CKEDITOR.replace('editor1' ,{
        filebrowserImageBrowseUrl : '<?php echo base_url('assets/auth/kcfinder');?>'
    });
</script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script type="text/javascript">
  $('#notifikasi').slideDown('slow').delay(5000).slideUp('slow');
</script>

<script>
  // tooltip demo
  $('.tooltip-demo').tooltip({
      selector: "[data-popup=tooltip]",
      container: "body"
    })
</script>

</body>
</html>