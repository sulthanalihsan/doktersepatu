          <!-- Begin Page Content -->
          <div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tambah Data Jasa</h1>
  <p class="mb-4"></a></p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Jasa</h6>
    </div>
    <div class="card-body">

    <?php
        echo validation_errors();
        echo form_open_multipart('admin/jasa/tambah');
    ?>
 
 <!-- <form action='#' > -->
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="id_jasa">Jenis Jasa</label>
            <select name="id_jasa" id="id_jasa`" class="form-control">
                <option value=0 selected>Pilih salah satu</option>
                <?php foreach($data_jasa as $jasa):?>
                <option value="<?= $jasa['id_jasa']?>"><?= $jasa['nama_jasa']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nama_detail_jasa">Nama Detail Jasa</label>
                <input type="text" name="nama_detail_jasa" class="form-control" id="nama_detail_jasa" placeholder="Masukan Nama Jasanya">
            </div>    
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="tarif">tarif Jasa</label>
                <input type="number" name="tarif" class="form-control" id="tarif" placeholder="Masukan Tarif">
            </div>    
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="deskripsi">Deskripsi Jasa</label>
                <input type="text" name="deskripsi" class="form-control" id="deskripsi" placeholder="Masukan Deskripsi Jasa">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="foto">Foto Jasa</label>
                    <input type="file" name="foto" class="form-control " id="foto">
            </div>
        </div>
        <button name='submit' type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->


