<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <!-- <?= json_encode($data_metode);?> -->
  <h1 class="h3 mb-2 text-gray-800"><?= $title;?></h1>
  <p class="mb-4"></a></p>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Riwayat Penggunaan Saldo Pelanggan</h6>
    </div>
    <div class="card-body">
      <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <h5 class="text-center text-gray-700">Masukkan ID Pelanggan</h5>
            <form action="#" enctype="multipart/form-data" method="post" accept-charset="utf-8">
              <div class="form-group">
                <input type="text" name="id_plg" class="form-control" value="<?= cekValueIdPlg();?>">
              </div>
              <?php if(!empty($_POST)):?>
              <div class="form-group">
                <select name="filter_bulan" id="filter_bulan" class="form-control" required onChange="process1(this)">
                  <option value="">Select Bulan</option>
                  <option value="semua">Semua Bulan</option>
                  <option value="1" <?= cekValueBulan(1); ?>>Januari</option>
                  <option value="2" <?= cekValueBulan(2); ?>>Februari</option>
                  <option value="3" <?= cekValueBulan(3); ?>>Maret</option>
                  <option value="4" <?= cekValueBulan(4); ?>>April</option>
                  <option value="5" <?= cekValueBulan(5); ?>>Mei</option>
                  <option value="6" <?= cekValueBulan(6); ?>>Juni</option>
                  <option value="7" <?= cekValueBulan(7); ?>>Juli</option>
                  <option value="8" <?= cekValueBulan(8); ?>>Agustus</option>
                  <option value="9" <?= cekValueBulan(9); ?>>September</option>
                  <option value="10" <?= cekValueBulan(10); ?>>Oktober</option>
                  <option value="11" <?= cekValueBulan(11); ?>>November</option>
                  <option value="12" <?= cekValueBulan(12); ?>>Desember</option>
                </select>
              </div>
              <div class="form-group">
                <select name="filter_tahun" id="filter_tahun" class="form-control" required>
                <option value="">Select Tahun</option>
                <option value="2019" <?= cekValueTahun(2019); ?> >2019</option>
                </select>
              </div>
              <?php endif;?>
              <div class="form-group" align="center">
                <button type="submit" name="filter" id="filter" class="btn btn-info">Filter</button>
              </div>
            </form>
          </div>
          <div class="col-md-4"></div>
        </div>
        <?php if(!empty($_POST)):?>
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Riwayat</th>
              <th>Type</th>
              <th>Nominal</th>
              <th>Saldo</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; foreach($data_riwayat_saldo as $riwayat_saldo):?>
            <tr class="<?= ($riwayat_saldo['type']=='debit')?'view-detail-deposit':'pesanan';?>" id="<?= $riwayat_saldo['id_transaksi'];?>">
              <td><?= $i;?></td>
              <td><?= $riwayat_saldo['tgl_riwayat'];?></td>
              <td>
                <span class="badge <?= ($riwayat_saldo['type']=='debit')?"badge-success":(($riwayat_saldo['type']=='kredit')?"badge-warning":" ");?>">
                  <?= $riwayat_saldo['type'];?>
                </span>
              </td>
              <td><?= $this->format_uang->rupiah_aja($riwayat_saldo['nominal']);?></td>
              <td>
              <?php
                if($riwayat_saldo['type']=='debit')
                echo $this->format_uang->rupiah_aja($riwayat_saldo['saldo_awal']+$riwayat_saldo['nominal']);
                else 
                echo $this->format_uang->rupiah_aja($riwayat_saldo['saldo_awal']-$riwayat_saldo['nominal']);
              ?>
              </td>
            </tr>
            <?php $i++; endforeach;?>
          </tbody>
        </table>
        <?php endif;?>
      </div>
  </div>


</div>
<!-- /.container-fluid -->


<div class="modal fade" id="detail_deposit">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Detail Deposit</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <div class="row">
            <table class="table table-borderless text-left">
              <tr><td>Id</td><td>:</td><td class="id_deposit"></td></tr>
              <tr><td>Waktu</td><td>:</td><td class="waktu_deposit"></td></tr>
              <tr><td>Jumlah</td><td>:</td><td class="jml_deposit">Rp. </td></tr>
              <tr><td>Kode Unik</td><td>:</td><td class="kode_unik">Rp. </td></tr>
              <tr><td>Total</td><td>:</td><td class="bg-success text-white total_deposit">Rp. </td></tr>
              <tr><td>&nbsp;</td></tr>
              <tr class="bg-info text-white"><td>Transfer ke bank</td><td>:</td><td class="id_rek_bank"></td></tr>
              <tr><td>&nbsp;</td></tr>
              </table>

            <table class="table table-borderless text-left">
              <h6 style="margin-left:10px;">Transfer Kerekening Berikut:</h6>
              <tr><td>Bank</td><td>:</td><td class="nama_bank"></td></tr>
              <tr><td>Atas Nama</td><td>:</td><td class="atas_nama_rek"></td></tr>
              <tr><td>No.Rekening</td><td>:</td><td class="no_rek"></td></tr>
            </table>
            
            <table class="table table-borderless text-left">
              <tr>
                <td>Nominal Transfer:</td>
                <td>:</td>
                <td class="bg-success text-white total_deposit">Rp. </div></td>
              </tr>
            </table>
          </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<?php
function cekValueBulan($value){
  if(!empty($_POST)){
    if(@$_POST['filter_bulan']==$value){
      return "selected";
    }else{
      return " ";
    }
  }else if(date('n')==$value){
    return "selected";
  }else{
    return " ";
  }
}

function cekValueTahun($value){
  if(!empty($_POST)){
    if(@$_POST['filter_tahun']==$value){
      return "selected";
    }else{
      return " ";
    }
  }else if(date('Y')==$value){
    return "selected";
  }else{
    return " ";
  }
}

function cekValueIdPlg(){
  if(!empty($_POST)){
    if(@$_POST['id_plg']){
      return $_POST['id_plg'];
    }else{
      return " ";
    }
  }
}

?>