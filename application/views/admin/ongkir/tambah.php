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
        echo form_open_multipart('admin/ongkir/tambah');
    ?>

    <!-- <form action='#' > -->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" name="kecamatan" class="form-control" id="kecamatan" placeholder="Masukan Data Kecamatan">
            </div>    
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="tarif_ongkir">Tarif Ongkir</label>
                <input type="number" name="tarif_ongkir" class="form-control" id="tarif_ongkir" placeholder="Masukan tarif">
            </div>    
        </div>
        <button name='submit' type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->


