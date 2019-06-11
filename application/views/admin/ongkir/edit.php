          <!-- Begin Page Content -->
          <div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tambah Data Ongkir</h1>
  <p class="mb-4"></a></p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Ongkir</h6>
    </div>
    <div class="card-body">


<?php
        echo validation_errors();
        echo form_open_multipart('admin/ongkir/edit/'.$data_ongkir['id_ongkir']);  
        echo form_hidden('id_ongkir', $data_ongkir['id_ongkir']);

        
?>

    <!-- <form action='#' > -->
    <div class="form-row">
            <div class="form-group col-md-6">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" name="kecamatan" value="<?php echo $data_ongkir['kecamatan'];?>" class="form-control" id="kecamatan" placeholder="Masukan Data Kecamatan">
            </div>    
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="tarif_ongkir">Tarif Ongkir</label>
                <input type="number" name="tarif_ongkir" value="<?php echo $data_ongkir['tarif_ongkir'];?>" class="form-control" id="tarif_ongkir" placeholder="Masukan tarif">
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


