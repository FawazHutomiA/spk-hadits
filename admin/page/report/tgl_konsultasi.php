<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <form method="POST" action="page/report/cetak_konsultasi.php" target="_blank">
      <div class="panel panel-default">
        <div class="panel-heading"><strong>LAPORAN DATA KONSULTASI</strong></div>
          <div class="panel-body">
            <div class="form-group">
              <label>Tanggal Awal</label>
              <input class="form-control" type="date" name="tglawal" value="<?php echo date('Y-m-d'); ?>">
            </div>   
            <div class="form-group">
              <label>Tanggal Akhir</label>
              <input class="form-control" type="date" name="tglakhir" value="<?php echo date('Y-m-d'); ?>">
            </div>        
            <input class="btn btn-primary" type="submit" name="preview" value="Preview" >
          </div>
      </div>
    </form>
  </div>
</div>