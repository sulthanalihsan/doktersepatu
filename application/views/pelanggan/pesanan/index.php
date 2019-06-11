          <!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  
  <h1 class="h3 mb-2 text-gray-800"><?= $title;?></h1>
  <p class="mb-4"></a></p>

  <div class="card shadow mb-4">
  
    <div class="card-body">
      <?php ?>
    <?php foreach ($data_pesanan as $pesanan):?>
 
      <div class="list-group">
        <a href="<?= base_url('pelanggan/pesanan/detail/').$pesanan['id_pesanan']?>" class="list-group-item list-group-item-action flex-column align-items-start bg-success" style="color:white;margin:10px;">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><?= $pesanan['id_pesanan'];?></h5>
            <big>
            <span class="badge badge-warning">
              <?= $this->ambil_data->data_tb_lain($data_status,$pesanan['id_status'],'nama_status');?>  
            </span>
            </big>
          </div>
          <!-- <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p> -->
          <small>Tanggal Pesan: <?= $pesanan['waktu_pesan'];?></small>
        </a>
      </div>
    
    <?php endforeach;?>
    </div>
  </div>
</div>
<!-- /.container-fluid -->


