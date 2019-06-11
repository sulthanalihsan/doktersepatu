

<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Artikel</h1>
  </div>

  <div class="row">
    <?php foreach ($data_artikel as $artikel): ?>
    <div class="col-lg-4">
      <div class="card" style="margin-bottom: 2rem;">
        <img class="card-img-top" src="<?= base_url('uploads/foto-artikel/').$artikel['foto_header'];?> " alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?= $artikel['judul_artikel']?></h5>
          <p class="card-text"><?= ambil_kata($artikel['isi_artikel']).".....";?></p>
          <a href="<?= base_url('pelanggan/artikel/').$artikel['id_artikel'];?>" class="btn btn-primary">Selengkapnya</a>
        </div>
      </div>
    </div>

  <?php endforeach;?>


  <?php
  // var_dump($data_artikel);
  function ambil_kata($sentence){
    return implode(' ', array_slice(explode(' ', $sentence), 0, 10));
  }
  ?>


  </div> <!-- /.row -->
</div> <!-- /.container-fluid -->