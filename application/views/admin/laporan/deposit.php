          <!-- Begin Page Content -->
  <div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?=$title;?></h1>
  <p class="mb-4"></a></p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        <span><?=$card_header?></span>
      </h6>
    </div>
    <div class="card-body">
      <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <h5 class="text-center text-gray-700">Pilih Filter Laporan Deposit</h5>
            <form action="#" enctype="multipart/form-data" method="post" accept-charset="utf-8">
              <div class="form-group">
                <select name="filter_bulan" id="filter_bulan" class="form-control" required onChange="process1(this)">
                  <option value="semua">Semua Bulan</option>
                  <option value="1" <?=cekValueBulan(1);?>>Januari</option>
                  <option value="2" <?=cekValueBulan(2);?>>Februari</option>
                  <option value="3" <?=cekValueBulan(3);?>>Maret</option>
                  <option value="4" <?=cekValueBulan(4);?>>April</option>
                  <option value="5" <?=cekValueBulan(5);?>>Mei</option>
                  <option value="6" <?=cekValueBulan(6);?>>Juni</option>
                  <option value="7" <?=cekValueBulan(7);?>>Juli</option>
                  <option value="8" <?=cekValueBulan(8);?>>Agustus</option>
                  <option value="9" <?=cekValueBulan(9);?>>September</option>
                  <option value="10" <?=cekValueBulan(10);?>>Oktober</option>
                  <option value="11" <?=cekValueBulan(11);?>>November</option>
                  <option value="12" <?=cekValueBulan(12);?>>Desember</option>
                </select>
              </div>
              <div class="form-group">
                <select name="filter_tahun" id="filter_tahun" class="form-control" required>
                <option value="">Select Tahun</option>
                <option value="2019" <?=cekValueTahun(2019);?> >2019</option>
                </select>
              </div>
              <div class="form-group" align="center">
                <button type="submit" name="filter" id="filter" class="btn btn-info">Filter</button>
              </div>
            </form>
          </div>
          <div class="col-md-4"></div>
        </div>
        <?php if (!empty($_POST)): ?>
        <?=form_open_multipart('admin/laporan/print_deposit', 'target=_blank');?>
        <?=form_hidden('filter_bulan', $_POST['filter_bulan']);?>
        <?=form_hidden('filter_tahun', $_POST['filter_tahun']);?>
        <?=form_button(['name' => 'submit', 'class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm', 'type' => 'submit', 'content' => '<i class="fas fa-download fa-sm text-white-50"></i> Print Laporan']);?>
        <?=form_close();?>
        <?php endif;?>
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="<?=(!empty($_POST)) ? " " : "dataTable";?>" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Pelanggan</th>
                <th>Waktu Deposit</th>
                <th>Jumlah Deposit</th>
                <th>Kode Unik</th>
                <th>Jumlah</th>
                <th>Status</th>
                <!-- <th>Aksi</th> -->
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Pelanggan</th>
                <th>Waktu Deposit</th>
                <th>Jumlah Deposit</th>
                <th>Kode Unik</th>
                <th>Jumlah</th>
                <th>Status</th>
                <!-- <th>Aksi</th> -->
              </tr>
            </tfoot>
            <tbody>

            <?php foreach ($data_deposit as $deposit): ?>
              <tr class="view-detail-deposit" id="<?=$deposit['id_deposit'];?>">
                <td><?=$deposit['id_deposit'];?></td>
                <td><?=$deposit['id_plg'] . '-' . $this->ambil_data->data_tb_lain($data_plg, cariDataPlg($deposit['id_plg'], $data_plg) + 1, 'nama_plg');?></td>
                <td><?=$deposit['waktu_deposit'];?></td>
                <td><?=$this->format_uang->rupiah($deposit['jml_deposit']);?></td>
                <td><?=$deposit['kode_unik'];?></td>
                <td><?=($this->format_uang->rupiah($deposit['jml_deposit'] + $deposit['kode_unik']));?></td>
                <td>
                    <span class="badge badge-<?=($deposit['id_status'] == 1) ? "warning" : "success";?>">
                      <?=$this->ambil_data->data_tb_lain($data_status, $deposit['id_status'], 'nama_status');?>
                    </span>
                </td>
              </tr>
            <?php endforeach;?>
            </tbody>
          </table>
        </div>
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
function cekValueBulan($value)
{
    if (!empty($_POST)) {
        if ($_POST['filter_bulan'] == $value) {
            return "selected";
        } else {
            return " ";
        }
    } else if (date('n') == $value) {
        return "selected";
    } else {
        return " ";
    }
}

function cekValueTahun($value)
{
    if (!empty($_POST)) {
        if ($_POST['filter_tahun'] == $value) {
            return "selected";
        } else {
            return " ";
        }
    } else if (date('Y') == $value) {
        return "selected";
    } else {
        return " ";
    }
}

function cariDataPlg($id_plg, $data_plg)
{
    $index;
    for ($i = 0; $i < sizeof($data_plg); $i++) {
        if ($id_plg == $data_plg[$i]["id_plg"]) {
            $index = $i;
        }
    }
    return $index;
}

?>