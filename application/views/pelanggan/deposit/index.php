          <!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?= $title;?></h1>
  <p class="mb-4"></a></p>

  <div class="card shadow mb-4">
    <div class="card-body">
      
    <?php foreach ($data_deposit as $deposit):?>
      <div class="list-group">
        <a href="#" id="<?= $deposit['id_deposit'];?>" class="view-detail-deposit list-group-item list-group-item-action flex-column align-items-start bg-danger" style="color:white;margin:10px;">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><?= $this->format_uang->rupiah_aja($deposit['jml_deposit']+$deposit['kode_unik']);?></h5>
            <big>
            <span class="badge badge-warning">
              <?= "Menunggu Transfer";?>  
            </span>
            </big>
          </div>
          <!-- <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p> -->
          <small><?= $this->ambil_data->data_tb_lain($data_rekening,$deposit['id_rek_bank'],'nama_bank')." - ".$deposit['waktu_deposit'];?></small>
        </a>
      </div>
    
    <?php endforeach;?>
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
                <td>Nominal yang harus ditransfer:</td>
                <td>:</td>
                <td class="bg-success text-white total_deposit">Rp. </div></td>
              </tr>
              <tr>
                <td colspan=3 style="color:orange;">*Perhatikan transfer nominal harus sama, untuk verifikasi otomatis dari sistem</td>
              </tr>
            </table>


            <div class="tombol_batal"></div>
          </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


