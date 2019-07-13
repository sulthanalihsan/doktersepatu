          <!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title;?></h1>
    <p class="mb-4"></a></p>

<?php 
$subtotal=0; 

// $id_ongkir = $data_detail_pesanan['id_ongkir'];
// $ongkir= $data_ongkir[$id_ongkir]['tarif_ongkir'];

// $id_metode_bayar = $data_detail_pesanan['id_metode_bayar'];
// $metode_bayar = $data_metode_bayar[$id_metode_bayar-1]['nama_metode'];

// echo json_encode($data_detail_pesanan);
// echo json_encode($data_detail_pesanan_tb);
// $key_pesan = array_keys($data_pesanan_tb);

// exit;
?>

    <div class="row">
        <div class="col-6">

            <div class="card shadow mb-4">
                <div class="card-header py-3 text-center bg-primary text-white">
                    <h6 class="m-0 font-weight-bold text-default">Pesanan</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Id Pesanan</th><td><?= $data_pesanan_tb['id_pesanan'];?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td class="text-white">
                                    <span class="badge <?= ($data_pesanan_tb['id_status']==1)?"badge-warning":"badge-success"; ?>">
                                        <?= $this->ambil_data->data_tb_lain($data_status,$data_pesanan_tb['id_status'],'nama_status');?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Waktu Pemesanan</th><td><?= $convert_tanggal->getStr($data_pesanan_tb['waktu_pesan']);?></td>
                            </tr>
                            <tr>
                                <th>Metode Pembayaran</th>
                                <td><?= $this->ambil_data->data_tb_lain($data_metode_bayar,$data_pesanan_tb['id_metode_bayar'],'nama_metode');?></td>
                            </tr>
                            <tr>
                                <th>No. Handphone</th><td><?= $data_pesanan_tb['nohp_pemesan'];?></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <th colspan=2 class="bg-gray-700 text-white">Keterangan Pesanan</th>
                            </tr>
                            <tr>
                                <th>Alamat Jemput</th><td><?= $data_pesanan_tb['alamat_pesanan'];?></td>
                            </tr>
                            <tr>
                                <th>Waktu Jemput</th><td><?= $convert_tanggal->getStr($data_pesanan_tb['waktu_jemput']);?></td>
                            </tr>
                            <tr>
                                <th>Waktu Antar</th><td><?= ($data_pesanan_tb['waktu_antar']==null)?"-":$convert_tanggal->getStr($data_pesanan_tb['waktu_antar']);?></td>
                            </tr>
                            <tr>    
                                <th></th>
                                <td>
                                    <button class="btn btn-primary edit-pesanan" id="<?= $data_pesanan_tb['id_pesanan'];?>">Update Pesanan</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        
        <div class="col-6">

            <div class="card shadow mb-4">
                <div class="card-header py-3 text-center bg-primary text-white">
                    <h6 class="m-0 font-weight-bold text-default">Detail Pesanan</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jasa & Jenis Sepatu</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i=1; $subtotal=0; $total=0; $id_jasa="";
                            // echo json_encode($data_jumlah_jasa);
                            foreach ($data_jumlah_jasa as $jumlah_jasa):
                                $id_jasa=$this->ambil_data->data_tb_lain($data_detail_jasa_tb,$jumlah_jasa['id_detail_jasa'],'id_jasa');
                            ?>
                            <tr>
                                <td><?= $i;?></td>
                                <td>
                                    <b><?= $this->ambil_data->data_tb_lain($data_jasa,$id_jasa,'nama_jasa')."<br>";?></b>
                                    <?= $this->ambil_data->data_tb_lain($data_detail_jasa_tb,$jumlah_jasa['id_detail_jasa'],'nama_detail_jasa')."<br>";?>
                                    <b><i>
                                    <?php
                                        $tarif = $this->ambil_data->data_tb_lain($data_detail_jasa_tb,$jumlah_jasa['id_detail_jasa'],'tarif');
                                        echo $this->format_uang->rupiah_aja($tarif);
                                    ?>
                                    </i></b>
                                </td>
                                <td>
                                    <?php
                                        $jumlah_jasa = $jumlah_jasa['jumlah'];
                                        echo $jumlah_jasa." pairs";
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    $subtotal += $tarif*$jumlah_jasa;
                                    echo $this->format_uang->rupiah_aja($tarif*$jumlah_jasa);
                                    ?>
                                </td>
                            </tr>
                            <?php 
                            $i++; endforeach;
                            ?>
                            <tr>
                                <th colspan=2 class="text-right">Subtotal</th>
                                <th colspan=2 class="text-right"><?= $this->format_uang->rupiah_aja($subtotal);?></th>
                            </tr>
                            <tr class="">
                                <td colspan=2 class="text-right">Ongkir</td>
                                <td colspan=2 class="text-right">
                                    <?php 
                                    $ongkir = $this->ambil_data->data_tb_lain($data_ongkir,$data_pesanan_tb['id_ongkir'],'tarif_ongkir');
                                    echo $this->format_uang->rupiah_aja($ongkir);
                                    ?>
                                </td>
                            </tr>
                            <tr class="text-gray-800">
                                <th colspan=2 class="text-right">Total</th>
                                <th>&nbsp;</th>
                                <th class="bg-gray-400  text-right"><?= $this->format_uang->rupiah_aja($ongkir+$subtotal);?></th>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>     <!-- row -->
    <div class="row">

        <div class="col-12">

        <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
            <a href="#status-sepatu" class="d-block card-header py-3 text-center bg-primary text-white" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="status-sepatu">
                <h6 class="m-0 font-weight-bold ">Status Sepatu</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="status-sepatu" style="">
                <div class="card-body">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Status</th>
                                <th scope="col">Jasa</th>
                                <th scope="col">Jenis Sepatu</th>
                                <th scope="col">Merek Sepatu</th>
                                <th scope="col">Foto Sebelum</th>
                                <th scope="col">Foto Sesudah</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <?php $i=1; foreach ($data_detail_pesanan_tb as $detail_pesanan_tb):
                                    $id_jasa=$this->ambil_data->data_tb_lain($data_detail_jasa_tb,$detail_pesanan_tb['id_detail_jasa'],'id_jasa');
                                    $foto_ssdh=""; $foto_sblm="";
                                    if($detail_pesanan_tb['foto_sblm'] == "-"){
                                        $foto_sblm ="nothing.png";
                                    }else{
                                        $foto_sblm =$detail_pesanan_tb['foto_sblm'];
                                    }
                                    if($detail_pesanan_tb['foto_ssdh'] == "-"){
                                        $foto_ssdh ="nothing.png";
                                    }else{
                                        $foto_ssdh =$detail_pesanan_tb['foto_ssdh'];
                                    }
                        
                        ?>
                            <tr>
                                <td><?= $i;?></td>
                                <td class="text-white">
                                    <span class="badge
                                        <?php switch ($detail_pesanan_tb['id_status']) {
                                            case '1':
                                                echo "badge-warning";
                                                break;
                                            case '2':
                                                echo "badge-success";
                                                break;
                                            case '3':
                                                echo "badge-primary";
                                                break;
                                            default:
                                                echo "badge-primary";
                                                break;
                                        }?>">
                                        <?= $this->ambil_data->data_tb_lain($data_status,$detail_pesanan_tb['id_status'],'nama_status');?>
                                    </span>
                                </td>
                                <td><?= $data_jasa[$id_jasa-1]['nama_jasa']?></td>
                                <td><?= $this->ambil_data->data_tb_lain($data_detail_jasa_tb,$detail_pesanan_tb['id_detail_jasa'],'nama_detail_jasa');?></td>
                                <td><?= $detail_pesanan_tb['merek_spt'];?></td>
                                <td><img width="100" src="<?= base_url('uploads/foto-before-after/').$foto_sblm;?>"></td>
                                <td><img width="100" src="<?= base_url('uploads/foto-before-after/').$foto_ssdh;?>"></td>
                                <td>
                                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                        <div class="btn-group mr-2" role="group" aria-label="Second group">
                                            <a class="btn btn-secondar btn-primary btn-circle btn-md view-detail-sepatu" id="<?= $detail_pesanan_tb['id_detail_pesanan'];?>"  href="#">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            
                                            <a class="btn btn-secondar btn-warning btn-circle btn-md edit-sepatu" id="<?= $detail_pesanan_tb['id_detail_pesanan'];?>"  href="#"
                                                data-id_detail_pesanan="<?= $detail_pesanan_tb['id_detail_pesanan'];?>"
                                                data-id_status="<?= $detail_pesanan_tb['id_status'];?>"
                                                data-merek_spt="<?= $detail_pesanan_tb['merek_spt'];?>"
                                                data-warna_spt="<?= $detail_pesanan_tb['warna_spt'];?>"
                                                data-size_spt="<?= $detail_pesanan_tb['size_spt'];?>"
                                                data-ket_lain="<?= $detail_pesanan_tb['ket_lain'];?>">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php $i++; endforeach;?>
                        <tbody>

                        </tbody>
                    </table>
                    <?= json_encode($detail_pesanan_tb);?>
                </div>
            </div>
        </div>

        </div>
        
    </div>     <!-- row -->


    

</div> <!-- /.container-fluid -->



<div class="modal fade" id="detail_sepatu">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Detail Sepatu</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="row">
                <div class="col-8">
                    <table class="table table-borderless table-hover">
                        <tbody>
                            <tr>
                                <th>Merek Sepatu</th><td class="merek_spt"></td>
                            </tr>
                            <tr>
                                <th>Warna Sepatu</th><td class="warna_spt"></td>
                            </tr>
                            <tr>
                                <th>Size Sepatu</th><td class="size_spt"></td>
                            </tr>
                            <tr>
                                <th>Keterangan Lain</th><td class="ket_lain"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-4">
                    <div class="bg-gradient-warning text-white text-center">
                        Foto Sepatu Before
                    </div>
                    <div class="foto_sblm"></div>
                    <div class="bg-gradient-success text-white text-center">
                        Foto Sepatu After
                    </div>
                    <div class="foto_ssdh"></div>
                </div>
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

        </div>
    </div>
</div>

<div class="modal fade" id="edit_sepatu">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Status Sepatu</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <?= form_open_multipart('admin/pesanan/edit_sepatu/','class=form-edit');?>
                <input type="hidden" name="id_detail_pesanan" id="id_detail_pesanan">
                    <div class="form-group row">
                        <label for="id_status" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <select name="id_status" class="form-control" id="id_status">
                                <option value=1>Pending</option>
                                <option value=2>Proses</option>
                                <option value=3>Selesai</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="merek_spt" class="col-sm-4 col-form-label">Merek Sepatu</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="merek_spt" id="merek_spt" placeholder="Merek Sepatu Pelanggan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="warna_spt" class="col-sm-4 col-form-label">Warna Sepatu</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="warna_spt" id="warna_spt" placeholder="Warna Sepatu Pelanggan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="size_spt" class="col-sm-4 col-form-label">Size Sepatu</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="size_spt" id="size_spt" placeholder="Size Sepatu Pelanggan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ket_lain" class="col-sm-4 col-form-label">Ket Lain</label>
                        <div class="col-sm-8">
                            <textarea name="ket_lain" class="form-control" id="ket_lain" placeholder="Keterangan Lain"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="foto_sblm" class="col-sm-4 col-form-label">Foto Sebelum</label>
                            <div class="col-sm-8 foto_sblm">
                                <!-- <img src="<?= base_url();?>uploads/foto-before-after/nothing.png" width='100'> -->
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="foto_sblm" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <input type="file" name="foto_sblm" class="form-control " id="foto_sblm">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="foto_ssdh" class="col-sm-4 col-form-label">Foto Sesudah</label>
                            <div class="col-sm-8 foto_ssdh">
                                <!-- <img src="<?= base_url();?>uploads/foto-before-after/nothing.png" width='100'> -->
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="foto_ssdh" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <input type="file" name="foto_ssdh" class="form-control " id="foto_ssdh">
                            </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="hidden" name='submit'>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                <?= form_close();?>  

            </div> <!-- body card -->


            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="edit_pesanan">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Status Pesanan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <?= form_open_multipart('','class=form-edit-pesanan');?>
                <input type="hidden" name="id_pesanan" id="id_pesanan">
                    <div class="form-group row">
                        <label for="id_status" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <select name="id_status" class="form-control" id="id_status">
                                <option value=1>Pending</option>
                                <option value=2>Proses</option>
                                <option value=3>Selesai</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="waktu_antar" class="col-sm-4 col-form-label">Waktu Antar</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control date form_datetime" name="waktu_antar" id="waktu_antar" readonly>
                            <p style="cursor: pointer;" onclick="document.getElementById('waktu_antar').value='';">Reset</p>
                        </div>
                    </div>
                    <input type="hidden" name="submit" />
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                <?= form_close();?>  

            </div> <!-- body card -->


            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>





<?php

function data_detail_jasa($id){
    $ci = get_instance();
    $data = $ci->m_pelanggan->ambil_data_where($id);

    // echo json_encode($data);
    return $data;
}
?>
