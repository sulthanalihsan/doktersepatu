<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <!-- <?= json_encode($data_metode);?> -->
  <h1 class="h3 mb-2 text-gray-800"><?= $title;?></h1>
  <p class="mb-4"></a></p>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Riwayat Penggunaan Saldo Anda</h6>
    </div>
    <div class="card-body">
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





