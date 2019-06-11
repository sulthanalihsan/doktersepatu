          <!-- Begin Page Content -->
          <div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tambah Data artikel</h1>
  <p class="mb-4"></a></p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data artikel</h6>
    </div>
    <div class="card-body">


<?php


        echo validation_errors();
        echo form_open_multipart('admin/artikel/edit/'.$data_artikel['id_artikel']);  
        echo form_hidden('id_artikel', $data_artikel['id_artikel']);

?>

    <!-- <form action='#' > -->
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="judul_artikel">Judul Artikel</label>
            <input type="text" name="judul_artikel" value="<?php echo $data_artikel['judul_artikel'];?>" class="form-control" id="judul_artikel" placeholder="Masukan Data Judul">
        </div>    
    </div>
    <div class="form-row">
            <div class="form-group col-md-12">
                <?php echo form_label('Isi artikel :'); ?>
                <?php echo form_error('isi_artikel','<div style=color:red>', '</div>'); ?>
                <textarea name="isi_artikel" class="ckeditor" id="ckedtor"><?=$data_artikel['isi_artikel'];?></textarea>
            </div>
        </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="foto_header">Foto Header Artikel</label>
                <input type="file" name="foto_header" class="form-control " id="foto_header">
        </div>
        <div class="form-group col-md-4">
                <img src="<?= base_url();?>uploads/foto-artikel/<?= $data_artikel['foto_header'];?>" width='150'>
            </div>
    </div>

    <button name='submit' type="submit" class="btn btn-primary">Simpan</button>
    <?php
        echo form_close();
    ?>
    <!-- </form> -->


    </div>
  </div>
</div>
<!-- /.container-fluid -->


