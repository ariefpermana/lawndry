     <script>
      function getBiaya() {
        var layanan   = document.getElementById("layanan").value;

        //get harga
        <?php foreach ($biaya as $key => $value) { ?>

          if(layanan == '<?php echo $key; ?>')
          {
            var biaya = <?php echo $value ;?>;
          }

          if(layanan == 0)
          {
            var biaya = '';
          }
        <?php } ?>

        //get nama layanan
        <?php if(!empty($kiloan)) { ?>
         <?php foreach ($kiloan as $data => $values) { ?>
            if('<?php echo $values['id']; ?>' == layanan)
            {
              var name = '<?php echo $values['nama_layanan'] ;?>';
            }

          <?php } ?>
        <?php } ?>

        <?php if(!empty($satuan)) { ?>
          <?php foreach ($satuan as $data => $values) { ?>
            if('<?php echo $values['id']; ?>' == layanan)
            {
              var name = '<?php echo $values['nama_layanan'] ;?>';
            }

          <?php } ?>
        <?php } ?>

        //set value harga and nama layanan
        document.getElementById("total").value = biaya;
        document.getElementById("biaya").value = biaya;
        document.getElementById("nama_layanan").value = name;
      }

      function getBerat() {
        var jumlah   = document.getElementById("satuan").value;

        if(jumlah <= 5)
        {
          document.getElementById("estberat").value = 1;
          document.getElementById("berat").value = 1; 
        }else if(jumlah <= 10)
        {
          document.getElementById("estberat").value = 2;
          document.getElementById("berat").value = 2; 
        }else if(jumlah <= 15)
        {
          document.getElementById("estberat").value = 3;
          document.getElementById("berat").value = 3; 
        }else if(jumlah <= 20)
        {
          document.getElementById("estberat").value = 4;
          document.getElementById("berat").value = 4; 
        }else if(jumlah <= 25)
        {
          document.getElementById("estberat").value = 5;
          document.getElementById("berat").value = 5; 
        }else if(jumlah <= 30)
        {
          document.getElementById("estberat").value = 6;
          document.getElementById("berat").value = 6; 
        }else{
          document.getElementById("estberat").value = "Maaf Jumlah Pakaian Melebihi Batas Yang Ditentukan!";
        }

      }
    </script>
    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url(); ?>vendors/startbootstrap/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>vendors/startbootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>vendors/startbootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="<?php echo base_url(); ?>vendors/startbootstrap/js/jqBootstrapValidation.js"></script>
    <script src="<?php echo base_url(); ?>vendors/startbootstrap/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo base_url(); ?>vendors/startbootstrap/js/agency.min.js"></script>

  </body>

</html>
