<style>
  .star{
          color: goldenrod;
          font-size: 4.0rem;
          padding: 0 1rem; /* space out the stars */
        }
</style>
<div class="row">
        <!-- left column -->
  <div class="col-md-5">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Beri Ulasan</h3>
      </div>
      <div class="box-header">
        <!-- Alert Validation form -->
        <?php if($this->session->flashdata('success')): ?>
            <p class="alert alert-success"><?php echo $this->session->flashdata('success') ?></p>
        <?php elseif($this->session->flashdata('failed')): ?>
            <p class="alert alert-danger"><?php echo $this->session->flashdata('failed') ?></p>
        <?php endif; ?>
        
        <?php if(validation_errors()): ?>
            <ul class="alert alert-danger" style="padding-left:30px;">
                <?php echo validation_errors('<li>', '</li>') ?>
            </ul>
        <?php endif; ?>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">
        <div class="row" style="text-align:center;">
          <div class="col-md-12">
            <img class="img-circle" src="<?php echo base_url() ?>img/logo/<?php echo $laundry->logo;?>" alt="User Avatar" style="width:70px;height:70px;">
          </div>
          <div class="col-md-12">
            <h2><?php echo $laundry->nama_laundry; ?></h2>      
          </div>
        </div>
          <div class="form-group">
            <label>No. Order</label>
            <input type="text" class="form-control" value="#<?php echo $this->session->userdata('id_order'); ?>" disabled>
          </div>
          <?php echo form_open() ?>
          <div class="form-group">
            <!-- alternate codepen version https://codepen.io/mad-d/pen/aJMPWr?editors=0010 -->
            <h3>Beri Rating Laundry</h3>
            <div class="stars" data-rating="0">
                <span class="star">&nbsp;</span>
                <span class="star">&nbsp;</span>
                <span class="star">&nbsp;</span>
                <span class="star">&nbsp;</span>
                <span class="star">&nbsp;</span>
            </div>
            <input type="hidden" name="star" id="star">
          </div>
          <div class="form-group">
            <label>Komentar</label>
            <textarea type="text" class="form-control" name="komentar" placeholder="isi komentar .." required></textarea>
          </div>
          <input name="submit" type="submit" value="Submit" class="btn btn-success">
          <?php echo form_close() ?>
        </div>
      </div>
    </div>
  </div>

<script>
    
    //initial setup
    document.addEventListener('DOMContentLoaded', function(){
        let stars = document.querySelectorAll('.star');
        stars.forEach(function(star){
            star.addEventListener('click', setRating); 
        });
        
        let rating = parseInt(document.querySelector('.stars').getAttribute('data-rating'));
        let target = stars[rating - 1];
        target.dispatchEvent(new MouseEvent('click'));
    });
    function setRating(ev){
        let span = ev.currentTarget;
        let stars = document.querySelectorAll('.star');
        let match = false;
        let num = 0;
        stars.forEach(function(star, index){
            if(match){
                star.classList.remove('rated');
            }else{
                star.classList.add('rated');
            }
            //are we currently looking at the span that was clicked
            if(star === span){
                match = true;
                num = index + 1;
            }
        });
        document.querySelector('.stars').setAttribute('data-rating', num);
        document.getElementById('star').value = num;
    }
    
</script>

