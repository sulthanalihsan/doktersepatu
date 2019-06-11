          <!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tambah Data Rekening</h1>
  <p class="mb-4"></a></p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Rekening</h6>
    </div>
    <div class="card-body">

    <?php
        echo validation_errors();
        echo form_open_multipart('admin/rekening/tambah');
    ?>

    <!-- <form action='#' > -->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nama_bank">Nama Bank</label>
                <input type="text" name="nama_bank" class="form-control" id="nama_bank" placeholder="Masukan data nama bank">
            </div>    
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="atas_nama_rek">Atas Nama Bank</label>
                <input type="text" name="atas_nama_rek" class="form-control" id="atas_nama_rek" placeholder="Masukan atas nama rekening">
            </div>    
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="no_rek">No Rekening</label>
                <input type="number" name="no_rek" class="form-control" id="no_rek" placeholder="Masukan tarif">
            </div>    
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="logo_bank">Logo Bank</label>
                    <input type="file" name="logo_bank" class="form-control " id="logo_bank">
            </div>
        </div>
        <button name='submit' type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->


