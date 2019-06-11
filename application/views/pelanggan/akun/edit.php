    <!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title;?></h1>
    <p class="mb-4"></a></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form <?= $title;?></h6>
        </div>
    <div class="card-body">


<?php
        echo validation_errors();
        echo form_open_multipart('pelanggan/akun/edit/'.$data_plg['id_plg']);  
        echo form_hidden('id_plg', $data_plg['id_plg']);

        
?>

<!-- <form action='#' > -->
        <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="emailPelanggan">Email</label>
                    <input type="email" value="<?php echo $data_plg['email_plg'];?>" name="email_plg" class="form-control" id="emailPelanggan" placeholder="Email">
                </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="usernamePelanggan">Username</label>
                <input type="text" value="<?php echo $data_plg['username_plg'];?>" name="username_plg" class="form-control" id="usernamePelanggan" placeholder="Username">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="namaPelaggan">Nama</label>
                <input type="text" value="<?php echo $data_plg['nama_plg'];?>" name="nama_plg" class="form-control" id="namaPelaggan" placeholder="Masukan nama anda">
            </div>
            <div class="form-group col-md-3">
                <label for="lhrPelanggan">Tanggal Lahir</label>
                <input type="date" value="<?php echo $data_plg['tgllhr_plg'];?>" name="tgllhr_plg" class="form-control" id="lhrPelanggan">
            </div>
            <div class="form-group col-md-3">
                <label for="jkPelanggan">Jenis Kelamin</label>
                <select name="jk_plg" id="jkPelanggan" class="form-control">
                    <option selected>Pilih salah satu</option>
                    <option <?php echo ($data_plg['jk_plg']=='L')? 'selected':' '  ?> value="L" >Laki-laki</option>
                    <option <?php echo ($data_plg['jk_plg']=='P')? 'selected':' '  ?> value="P">Perempuan</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-9">
                <label for="alamatPelanggan">Alamat</label>
                <input type="text" value="<?php echo $data_plg['alamat_plg'];?>" name="alamat_plg" class="form-control" id="alamatPelanggan" placeholder="Masukan alamat anda">
            </div>
            <div class="form-group col-md-3">
                <label for="nohpPelanggan">No Hp</label>
                <input type="number" value="<?php echo $data_plg['nohp_plg'];?>" name="nohp_plg" class="form-control" id="nohpPelanggan" placeholder="Masukan no hp anda">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="fotoPelanggan">Foto profil</label>
                <input type="file" name="foto_plg" class="form-control " id="fotoPelanggan">
            </div>
            <div class="form-group col-md-4">
                <img src="<?= base_url();?>uploads/foto-plg/<?= $data_plg['foto_plg'];?>" width='100'>
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


