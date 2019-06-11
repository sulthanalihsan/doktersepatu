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
            <label for="id_kategori">Kategori</label>
            <select name="id_kategori" id="id_kategori`" class="form-control">
                <option value=0 selected>Pilih salah satu</option>
                <?php foreach($data_kategori as $kategori):?>
                <option value="<?= $kategori['id_kategori']?>"><?= $kategori['nama_kategori']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nama_jasa">Nama Jasa</label>
                <input type="text" name="nama_jasa" class="form-control" id="nama_jasa" placeholder="Masukan Nama Jasanya">
            </div>    
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="tarif_jasa">tarif Jasa</label>
                <input type="number" name="tarif_jasa" class="form-control" id="tarif_jasa" placeholder="Masukan Tarif">
            </div>    
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="desk_jasa">Deskripsi Jasa</label>
                <input type="text" name="desk_jasa" class="form-control" id="desk_jasa" placeholder="Masukan Deskripsi Jasa">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="foto_jasa">Foto Jasa</label>
                    <input type="file" name="foto_jasa" class="form-control " id="foto_jasa">
            </div>
        </div>
        <button name='submit' type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->


