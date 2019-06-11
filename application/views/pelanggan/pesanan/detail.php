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
                <div class="card-header py-3 text-center bg-info text-white">
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
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        
        <div class="col-6">

            <div class="card shadow mb-4">
                <div class="card-header py-3 text-center bg-info text-white">
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
            <a href="#status-sepatu" class="d-block card-header py-3 text-center bg-info text-white" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="status-sepatu">
                <h6 class="m-0 font-weight-bold ">Status Sepatu</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="status-sepatu" style="">
                <div class="card-body">
                    <table class="table table-borderless table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Status</th>
                                <th scope="col">Jasa</th>
                                <th scope="col">Jenis Sepatu</th>
                                <th scope="col">Merek Sepatu</th>
                                <th scope="col">Foto Sebelum</th>
                                <th scope="col">Foto Sesudah</th>
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
                            <tr class="view-detail-sepatu" id="<?= $detail_pesanan_tb['id_detail_pesanan'];?>">
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
                            </tr>
                        <?php $i++; endforeach;?>
                        <tbody>

                        </tbody>
                    </table>
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





<?php

function data_detail_jasa($id){
    $ci = get_instance();
    $data = $ci->m_pelanggan->ambil_data_where('detail_jasa','id_detail_jasa',$id);

    // echo json_encode($data);
    return $data;
}
?>
