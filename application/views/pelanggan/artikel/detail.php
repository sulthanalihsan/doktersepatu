

<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Artikel</h1>
  </div>

  <div class="row">
    <div class="col-lg-9">
      <div class="card shadow mb-4">
          <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
          </div> -->
          <div class="card-body">
            <div class="text-center">
              <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 50rem;" src="<?= base_url('uploads/foto-artikel/').$data_artikel['foto_header'];?> " alt="">
            </div>
            <h3><?= $data_artikel['judul_artikel']?></h3>
            <p style="font-style:italic;font-size:12px">Oleh: <?= $this->ambil_data->data_tb_lain($data_admin,$data_artikel['id_adm'],'nama_adm')."-".$data_artikel['tgl_artikel']?></p>
            <p class="text-justify"><?= $data_artikel['isi_artikel']?></p>
            
          </div>
        </div>
    </div>

    <div class="col-lg-3">
      <div class="list-group">
        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Artikel Terbaru</h5>
          </div>
        </div>
        <?php foreach($artikel_lain as $artikel): ?>
        <?php 
        // var_dump($artikel);?>
        <a href="<?= base_url('pelanggan/artikel/').$artikel->id_artikel;?>" class="list-group-item list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h6 class="mb-1"><b><?= $artikel->judul_artikel;?></b></h6>
          </div>
          <p class="mb-1"><?= $this->ambil_data->ambil_by_kata($artikel->isi_artikel)." . . . ."; ?></p>
        </a>
        <?php endforeach;?>
      </div>
    </div>


  </div> <!-- /.row -->
</div> <!-- /.container-fluid -->

<?php
function trim_by_words($string, $word_count = 10) {
  $string = explode(' ', $string);
  if (empty($string) == false) {
      $string = array_chunk($string, $word_count);
      $string = $string[0];
  }
  $string = implode(' ', $string);
  return $string;
}
?>