<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">My Profile</h1>
    
    <div class="row">
        <div class="col-lg-8">
        </div>
    </div>

    

    <div class="card mb-3 col-lg-8">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('uploads/foto-admin/').$_SESSION['foto_adm'];?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                <table>
                <tr>
                    <td class="card-title">Nama</td>
                    <td>:</td>
                    <td><p class="card-text"><?= $_SESSION['nama_adm'];?></p></td>
                </tr>
                <tr>
                    <td class="card-title">Email</td>
                    <td>:</td>
                    <td><p class="card-text"><?= $_SESSION['email_adm'];?></p></td>
                </tr>
                <tr><td><a href="<?= base_url('admin/akun/edit/').$_SESSION['id_adm'];?>" class="btn btn-primary">Edit</a></td></tr>
                </table>
                    
                    <!-- <p class="card-text"><small class="text-muted">Member since 28 April 2019</small></p> -->
                </div>
            </div>
        </div>
    </div>

</div>