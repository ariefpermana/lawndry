</section>
  
<?php if($this->uri->segment(2) == 'checkout') : ?>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">

      </div>
      <strong>Copyright &copy; 2018 LawN'Dry</a>.</strong> All rights
    reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<?php else : ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <!-- <b>Version</b> 2.4.0 -->
    </div>
    <strong>Copyright &copy; 2018 LawN'Dry</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php endif; ?>
<script>
function getTotal() {
  var harga = <?php echo $order->harga; ?>;

  if("<?php echo $order->jenis_layanan; ?>" == "Kiloan")
  {
    var berat   = document.getElementById("berat").value;

    total = berat * harga;
  }else{
    var satuan   = document.getElementById("satuan").value;

    total = satuan * harga;
  }

  //set value total harga
  document.getElementById("total").value = total;
  document.getElementById("total_harga").value = total;
}
</script>

<!-- jQuery 3 -->
<script src="<?php echo base_url()?>vendors/Admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url()?>vendors/Admin/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>vendors/Admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<!-- <script src="<?php echo base_url()?>vendors/Admin/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url()?>vendors/Admin/bower_components/morris.js/morris.min.js"></script> -->
<!-- Sparkline -->
<!-- <script src="<?php echo base_url()?>vendors/Admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script> -->
<!-- jvectormap -->
<!-- <script src="<?php echo base_url()?>vendors/Admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script> -->
<!-- <script src="<?php echo base_url()?>vendors/Admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="<?php echo base_url()?>vendors/Admin/bower_components/jquery-knob/dist/jquery.knob.min.js"></script> -->
<!-- daterangepicker -->
<!-- <script src="<?php echo base_url()?>vendors/Admin/bower_components/moment/min/moment.min.js"></script> -->
<!-- <script src="<?php echo base_url()?>vendors/Admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script> -->
<!-- datepicker -->
<!-- <script src="<?php echo base_url()?>vendors/Admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> -->
<!-- Bootstrap WYSIHTML5 -->
<!-- <script src="<?php echo base_url()?>vendors/Admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script> -->
<!-- Slimscroll -->
<!-- <script src="<?php echo base_url()?>vendors/Admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> -->
<!-- FastClick -->
<!-- <script src="<?php echo base_url()?>vendors/Admin/bower_components/fastclick/lib/fastclick.js"></script> -->
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>vendors/Admin/dist/js/adminlte.min.js"></script>

<script src="<?php echo base_url()?>vendors/Admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>vendors/Admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url()?>vendors/Admin/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>vendors/Admin/dist/js/demo.js"></script>

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

<!-- function untuk delete user -->
<script> 
    function deleteUser() {
        var url="<?php echo base_url();?>";           
        
        var r=confirm("Apakah Anda Yakin untuk menghapus User ini?")
        
        if (r==true){
            window.location = url+"user/delete";
        }
        else{
            return false;
        }
    }
</script>

</body>
</html>
