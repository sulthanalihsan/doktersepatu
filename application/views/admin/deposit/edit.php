          <!-- Begin Page Content -->
          <div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tambah Data Akun</h1>
  <p class="mb-4"></a></p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Akun</h6>
    </div>
    <div class="card-body">


<?php
        echo validation_errors();
        echo form_open_multipart('admin/akun/edit/'.$data_akun['id_adm']);  
        echo form_hidden('id_adm', $data_akun['id_adm']);

        
?>

 
    <!-- <form action='#' > -->
    <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email_adm">Email</label>
                <?php echo form_error('email_adm','<div style=color:red>', '</div>') ?>
                <input type="email" name="email_adm" value="<?php echo $data_akun['email_adm'];?>" class="form-control" id="email_adm" placeholder="Masukan Data Email">
            </div>    
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="pass_adm">Password</label>
                <?php echo form_error('pass_adm','<div style=color:red>', '</div>') ?>
                <input type="password" name="pass_adm" class="form-control" id="pass_adm" placeholder="Masukan Password">
            </div>    
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nama_adm">Nama Admin</label>
                <?php echo form_error('nama_adm','<div style=color:red>', '</div>') ?>
                <input type="text" name="nama_adm" value="<?php echo $data_akun['nama_adm'];?>" class="form-control" id="nama_adm" placeholder="Masukan Nama Admin">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="foto_adm">Foto Admin</label>
                    <input type="file" name="foto_adm" class="form-control " id="foto_adm">
            </div>
        </div>
        <button name='submit' type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

