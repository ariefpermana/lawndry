<style>
  .checked {
      color: #ffd400;
  }
</style>

<div class="content-wrapper">
<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- The time line -->
        <ul class="timeline">
          <!-- timeline item -->
          <?php if(!empty($review)) : foreach($review as $key => $value) : ?>
          <li>
            <div class="timeline-item">
              <span class="time"><i class="fa fa-calendar"></i> <?php $date = date_create($value->tanggal_komentar); echo date_format($date,'d M Y'); ?></span>

              <h3 class="timeline-header"><a><?php echo $value->nama_pelanggan; ?></a> 
              <?php for($i=0; $i < $value->nilai; $i++) { ?>
                <span class="fa fa-star checked"></span>
              <?php } 
              $star = 5 - intval($value->nilai);
              
              for($i=0; $i < $star; $i++) { ?>
                <span class="fa fa-star"></span>
            <?php } ?>
              </h3>

              <div class="timeline-body">
              <?php echo $value->komentar; ?>
              </div>
            </div>
          </li>
        <?php endforeach; else : ?>
          <li>
            <div class="timeline-item">
              <div class="timeline-body" style="text-align:center;">
              -- No Review Available --
              </div>
            </div>
          </li>
        <?php endif; ?>
        </ul>
      </div>
    </div>
  </section>
</div>