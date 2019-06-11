          <!-- Begin Page Content -->
          <div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?= $title;?></h1>
  <p class="mb-4"></a></p>

  <div class="card">
    <div class="card-body">
    
    <?= form_open('pelanggan/deposit/simpan');?>

      <div class="row">
          <div class="col-xl-12">
            <h6>Pilihan Bank Untuk Pembayaran:</h6>
            <?php echo form_error('id_rek_bank','<div style=color:red>', '</div>') ?>
          </div>
      </div> <!-- /.row  --> 
      
      <div class="row">
        <?php foreach($data_rekening as $rekening):?>
        <div class="col-xl-4 col-md-6">         
            <label class="btn btn-info">
              <img src="<?= base_url('uploads/logo-bank/'.$rekening['logo_bank'])?>" alt="..." class=" img-thumbnail img-check">
                <input type="radio" name="id_rek_bank" value="<?= $rekening['id_rek_bank']?>" class="d-none" autocomplete="off">
            </label>
        </div>
        <?php endforeach;?>
      </div>

      <div class="row">
            <div class="col-xl-12">
              <h6>Isi Nominal Saldo:</h6>
            </div>
        </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="form-group">
            <?= form_error('jml_deposit','<div style="color:red">','</div>');?>
              <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-info" style="color:white">Rp</span>
                </div>
                <input type="text" name="jml_deposit" id='isian' readonly class="form-control bg-light border-0 small" placeholder="Pilih Nominal Dibawah" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-info" type="submit" onclick = "return confirm('Apakah anda yakin datanya sudah benar?');">
                    <i class="fas fa-fw fa-plus-circle"></i>
                  </button>
                </div>
              </div>
          </div>

        </div>
      </div>  <!-- /.row  --> 



      <?= form_hidden('submit','yes');?>
      <?= form_close();?>


      <div class="row">
          <div class="col-xl-12">
            <h6>Pilihan Nominal:</h6>
          </div>
      </div>
      <!-- <input id='add' type='button' onclick='ik(this.value);'  value='1'> -->
      <!-- <input type='text' id='one' class='fld'> -->

      <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <button  style="text-decoration:none" class="btn btn-link" onclick='ik(this.value);'  value='20000'>
              <div class="card-body">
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 20.000</div>
              </div>
            </button>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <button href="#" style="text-decoration:none" class="btn btn-link" onclick='ik(this.value);'  value='50000'>
              <div class="card-body">
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 50.000</div>
              </div>
            </button>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <button href="#" style="text-decoration:none" class="btn btn-link" onclick='ik(this.value);'  value='75000'>
              <div class="card-body">
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 75.000</div>
              </div>
            </button>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <button href="#" style="text-decoration:none" class="btn btn-link" onclick='ik(this.value);'  value='100000'>
              <div class="card-body">
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 100.000</div>
              </div>
            </button>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <button href="#" style="text-decoration:none" class="btn btn-link" onclick='ik(this.value);'  value='120000'>
              <div class="card-body">
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 120.000</div>
              </div>
            </button>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <button href="#" style="text-decoration:none" class="btn btn-link" onclick='ik(this.value);'  value='150000'>
              <div class="card-body">
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 150.000</div>
              </div>
            </button>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <button href="#" style="text-decoration:none" class="btn btn-link" onclick='ik(this.value);'  value='175000'>
              <div class="card-body">
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 175.000</div>
              </div>
            </button>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <button href="#" style="text-decoration:none" class="btn btn-link" onclick='ik(this.value);'  value='200000'>
              <div class="card-body">
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 200.000</div>
              </div>
            </button>
          </div>
        </div>
      </div> <!-- /.row  --> 



    </div>
  </div>
</div>
<!-- /.container-fluid -->

