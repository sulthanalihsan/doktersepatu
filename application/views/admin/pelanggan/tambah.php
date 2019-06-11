          <!-- Begin Page Content -->
          <div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tambah Data Pelanggan</h1>
  <p class="mb-4"></a></p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Pelanggan</h6>
    </div>
    <div class="card-body">

    <?php

        function UUID(){
            return sha1(crypt(uniqid(), random_int(1000000, 9999999)));
        }
        echo validation_errors();
        echo form_open_multipart('admin/pelanggan/tambah');
        echo form_hidden('apikey', UUID());
    ?>
 
 <!-- <form action='#' > -->
        <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="emailPelanggan">Email</label>
                    <input type="email" name="email_plg" class="form-control" id="emailPelanggan" placeholder="Email">
                </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="usernamePelanggan">Username</label>
                <input type="text" name="username_plg" class="form-control" id="usernamePelanggan" placeholder="Username">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword">Password</label>
                <input type="password" name="pass_plg" class="form-control" id="inputPassword" placeholder="Password">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="namaPelaggan">Nama</label>
                <input type="text" name="nama_plg" class="form-control" id="namaPelaggan" placeholder="Masukan nama anda">
            </div>
            <div class="form-group col-md-3">
                <label for="lhrPelanggan">Tanggal Lahir</label>
                <input type="date" name="tgllhr_plg" class="form-control" id="lhrPelanggan">
            </div>
            <div class="form-group col-md-3">
                <label for="jkPelanggan">Jenis Kelamin</label>
                <select name="jk_plg" id="jkPelanggan" class="form-control">
                    <option selected>Pilih salah satu</option>
                    <option value="L" >Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-9">
                <label for="alamatPelanggan">Alamat</label>
                <input type="text" name="alamat_plg" class="form-control" id="alamatPelanggan" placeholder="Masukan alamat anda">
            </div>
            <div class="form-group col-md-3">
                <label for="nohpPelanggan">No Hp</label>
                <input type="number" name="nohp_plg" class="form-control" id="nohpPelanggan" placeholder="Masukan no hp anda">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="fotoPelanggan">Foto profil</label>
                    <input type="file" name="foto_plg" class="form-control " id="fotoPelanggan">
            </div>
        </div>
        <button name='submit' type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <?php
        // if(isset($_POST['submit'])){
        //    echo "masuk"; 
        // }
    
    ?>
    </div>
  </div>
</div>
<!-- /.container-fluid -->


