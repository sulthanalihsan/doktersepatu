          <!-- Begin Page Content -->

<?php
    $data_temp="asd";
    if(isset($pesanan_temp)){
        $data_temp =  1;
        $pesanan_temp['waktu_jemput'] = $convert->getStr($pesanan_temp['waktu_jemput']);
        echo json_encode($pesanan_temp);
        // exit;
        // $data['pesanan_temp'] = $_SESSION['data_post'];
    }
?>

<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Pesan Jasa</h1>
  <p class="mb-4"></a></p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" style="margin-bottom:0;">Pilih Jasa yang Anda Inginkan</h6>
    </div>

    <?= form_open('pelanggan/pesanan/checkout');?>
    <div class="card-body">

        <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
            <a href="#perawatan" class="d-block card-header py-3 bg-primary" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="perawatan">
                <h6 class="m-0 font-weight-bold text-white">Perawatan</h6>
            </a>


            
            <!-- Card Content - Collapse -->
            <div class="collapse" id="perawatan" style="">
                <div class="card-body">

                    <!-- accordion -->
                    <div class="accordion" id="accordionExample">

                        <?php foreach($data_jasa_perawatan as $jasa_perawatan):?>
                        <div class="card">
                            <div class="card-header" id="heading-<?= $jasa_perawatan['id_jasa'];?>">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-<?= $jasa_perawatan['id_jasa'];?>" aria-expanded="true" aria-controls="collapse-<?= $jasa_perawatan['id_jasa'];?>">
                                    <?= $jasa_perawatan['nama_jasa'];?>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse-<?= $jasa_perawatan['id_jasa'];?>" class="collapse" aria-labelledby="heading-<?= $jasa_perawatan['id_jasa'];?>" >
                                <div class="card-body">
                                    <ul class="list-group">

                                <?php
                                $data_detail_jasa = data_detail_jasa($jasa_perawatan['id_jasa']);  
                                foreach($data_detail_jasa as $detail_jasa):?>
                                
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <h5 style="margin-bottom:0;"><?= $detail_jasa['nama_detail_jasa']?></h5>
                                            <div class="row">
                                                <div class="col-5 my-auto">
                                                    <h6 class="" style="margin-bottom:0;"><?= $this->format_uang->rupiah($detail_jasa['tarif']);?></h6>
                                                </div>
                                                <div class="col-7">
                                                    <span>
                                                        <div class="form-group" style="margin-bottom:0;">
                                                            <?= form_error('jml_deposit','<div style="color:red">','</div>');?>
                                                            <div class="input-group input-group-md">
                                                                <div class="input-group-prepend">
                                                                <button type="button" class="btn btn-danger" onclick="buttonClickDec(<?= $detail_jasa['id_detail_jasa']?>)">
                                                                    <i class="fas fa-fw fa-minus-circle"></i>
                                                                </button>
                                                                </div>
                                                                <input type="number" value="<?= fill_value(@$pesanan_temp,$detail_jasa['id_detail_jasa']);?>" id="input-<?= $detail_jasa['id_detail_jasa']?>" name="<?= $detail_jasa['id_detail_jasa']?>" class="form-control input-number" value="0" min="0" max="100">
                                                                <div class="input-group-append">
                                                                    <button type="button" class="btn btn-success" onclick="buttonClickInc(<?= $detail_jasa['id_detail_jasa']?>)">
                                                                        <i class="fas fa-fw fa-plus-circle"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    
                                <?php endforeach;?>
                                    </ul>
                                </div> <!-- /card-body -->
                            </div> <!-- /collapse -->
                        </div> <!-- /card -->
                        <?php endforeach;?>
                        
                    </div>
                    <!-- /accordion -->

                </div>
            </div>
        </div>


        <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
            <a href="#reparasi" class="d-block card-header py-3 bg-primary" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="reparasi">
                <h6 class="m-0 font-weight-bold text-white">Reparasi</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse" id="reparasi" style="">
                <div class="card-body">

                    <!-- accordion -->
                    <div class="accordion" id="accordionExample">

                        <?php foreach($data_jasa_reparasi as $jasa_reparasi):?>
                        <div class="card">
                            <div class="card-header" id="heading-<?= $jasa_reparasi['id_jasa'];?>">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-<?= $jasa_reparasi['id_jasa'];?>" aria-expanded="true" aria-controls="collapse-<?= $jasa_reparasi['id_jasa'];?>">
                                    <?= $jasa_reparasi['nama_jasa'];?>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse-<?= $jasa_reparasi['id_jasa'];?>" class="collapse" aria-labelledby="heading-<?= $jasa_reparasi['id_jasa'];?>" >
                                <div class="card-body">
                                    <ul class="list-group">
                                <?php
                                $data_detail_jasa = data_detail_jasa($jasa_reparasi['id_jasa']);  
                                foreach($data_detail_jasa as $detail_jasa):?>
                                                                        
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <h5 style="margin-bottom:0;"><?= $detail_jasa['nama_detail_jasa']?></h5>
                                            <div class="row">
                                                <div class="col-5 my-auto">
                                                    <h6 class="" style="margin-bottom:0;"><?= $this->format_uang->rupiah($detail_jasa['tarif']);?></h6>
                                                </div>
                                                <div class="col-7">
                                                    <span>
                                                        <div class="form-group" style="margin-bottom:0;">
                                                            <?= form_error('jml_deposit','<div style="color:red">','</div>');?>
                                                            <div class="input-group input-group-md">
                                                                <div class="input-group-prepend">
                                                                <button type="button" class="btn btn-danger" onclick="buttonClickDec(<?= $detail_jasa['id_detail_jasa']?>)">
                                                                    <i class="fas fa-fw fa-minus-circle"></i>
                                                                </button>
                                                                </div>
                                                                <input type="number" value="<?= fill_value(@$pesanan_temp,$detail_jasa['id_detail_jasa']);?>" id="input-<?= $detail_jasa['id_detail_jasa']?>" name="<?= $detail_jasa['id_detail_jasa']?>" class="form-control input-number" value="0" min="0" max="100">
                                                                <div class="input-group-append">
                                                                    <button type="button" class="btn btn-success" onclick="buttonClickInc(<?= $detail_jasa['id_detail_jasa']?>)">
                                                                        <i class="fas fa-fw fa-plus-circle"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    
                                    <?php endforeach;?>
                                    </ul>
                                </div> <!-- /card-body -->
                            </div> <!-- /collapse -->
                        </div> <!-- /card -->
                        <?php endforeach;?>
                        
                    </div>
                    <!-- /accordion -->

                </div>
            </div>
        </div>
        

        


    </div>            
    

  </div>


  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Keterangan Pesanan</h6>
    </div>
    <div class="card-body">
        <div class="row">
          <div class="col-12">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="waktu_jemput">Waktu Jemput</label>
                        <!-- <input type="text" class="form-control date form_datetime" name="waktu_antar" id="waktu_antar" readonly> -->
                        <input type="text" value="<?= fill_value(@$pesanan_temp,"waktu_jemput",'ket');?>" name="waktu_jemput" class="form-control date form_datetime" id="waktu_jemput" placeholder="Waktu Jempu" readonly required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="alamat_pesanan">Alamat Pesanan</label>
                        <textarea required type="text" name="alamat_pesanan" class="form-control" id="alamat_pesanan" placeholder="Masukkan alamat anda"><?= fill_value(@$pesanan_temp,"alamat_pesanan",'ket');?></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="id_ongkir">Kecamatan</label>
                        <select name="id_ongkir" id="id_ongkir" class="form-control" required>
                        <option value="0">-PILIH KECAMATAN-</option>
                        <?php foreach($data_ongkir as $ongkir):?>
                            <option <?= (fill_value(@$pesanan_temp,"id_ongkir",'ket')==$ongkir['id_ongkir'])?"selected":""; ?> value="<?= $ongkir['id_ongkir'];?>"> <?= $ongkir['kecamatan'];?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nohp_pemesan">No Hp</label>
                        <input type="number" value="<?= fill_value(@$pesanan_temp,"nohp_pemesan",'ket');?>" name="nohp_pemesan" class="form-control" id="nohp_pemesan" placeholder="Masukan no hp anda" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="catatan_pesanan">Catatan Pesanan</label>
                        <textarea type="text" name="catatan_pesanan" class="form-control" id="catatan_pesanan" placeholder="Masukkan Catatan Pesanan Anda Bila Ada"><?= fill_value(@$pesanan_temp,"catatan_pesanan",'ket');?></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12" style="margin-bottom:0px;">
                        <label>Metode Pembayaran</label>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="btn btn-info">
                            <img src="<?= base_url('uploads/foto-metode-bayar/potong-saldo.png')?>" title="Potong Saldo Deposit" alt="anu" class=" img-thumbnail img-check <?= (fill_value(@$pesanan_temp,"id_metode_bayar")==1)?"check":""; ?>" width="250">
                            <input type="radio" name="id_metode_bayar" value="1" class="d-none" autocomplete="off" <?= (fill_value(@$pesanan_temp,"id_metode_bayar")==1)?"checked":""; ?>>
                        </label>
                        <label class="btn btn-info">
                            <img src="<?= base_url('uploads/foto-metode-bayar/cod.png')?>" title="Cash On Delivery" alt="anu" class=" img-thumbnail img-check <?= (fill_value(@$pesanan_temp,"id_metode_bayar")==2)?"check":""; ?>" width="250">
                            <input type="radio" name="id_metode_bayar" value="2" class="d-none" autocomplete="off" <?= (fill_value(@$pesanan_temp,"id_metode_bayar")==2)?"checked":""; ?>>
                        </label>
                    </div>
                </div>

                <div class="row m-0">
                    <div class="col-md-8">
                        
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-icon-split btn-lg btn-block" type="submit" onclick = "return confirm('Apakah anda yakin datanya sudah benar?');">
                            <span class="text">PESAN SEKARANG</span>
                        </button>
                    </div>       
                    <?= form_hidden('submit','yes');?>
                    <?= form_close();?>
                </div>
            

            </div>
        </div> <!-- row -->

    </div>
</div>


</div>
<!-- /.container-fluid -->

<?php

function data_detail_jasa($id){
    $ci = get_instance();
    $data = $ci->m_pelanggan->ambil_data_where('detail_jasa','id_jasa',$id);

    return $data;
}

function fill_value($data,$name,$identity=null){
    if(isset($data[$name])){
        return $data[$name];
    }else{
        if($identity=='ket')
        return null;
        else
        return 0;
    }
}

?>
