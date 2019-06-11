          <!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Checkout Pesanan</h1>
    <p class="mb-4"></a></p>

<?php 
$subtotal=0; 

$id_ongkir = $data_ket_pesanan['id_ongkir'];
$ongkir= $data_ongkir[$id_ongkir-1]['tarif_ongkir'];

$id_metode_bayar = $data_ket_pesanan['id_metode_bayar'];
$metode_bayar = $data_metode_bayar[$id_metode_bayar-1]['nama_metode'];

$key_pesan = array_keys($data_pesanan);
?>

    <div class="row">
        <div class="col-8">

            <div class="card shadow mb-4">
                <div class="card-header py-3 text-center bg-info text-white">
                    <h6 class="m-0 font-weight-bold text-default">List Pesanan</h6>
                </div>
                <div class="card-body">
                <!-- <?php var_dump($data_jasa);?> -->
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">List</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Order</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; foreach ($data_pesanan as $pesanan):?>
                            <tr>
                                <th scope="row"><?= $i;?></th>
                                <td>
                                    <?php 
                                    $data_detail_jasa = data_detail_jasa($key_pesan[$i-1]);
                                    foreach($data_detail_jasa as $detail_jasa):?>
                                    <?= "<b>".$data_jasa[$detail_jasa['id_jasa']-1]['nama_jasa']."</b>"."-".$detail_jasa['nama_detail_jasa'];?>
                                    <?php endforeach; ?>

                                </td>
                                <td><?= $this->format_uang->rupiah_aja($detail_jasa['tarif']);?></td>
                                <td><?= $pesanan." pairs";?></td>
                                <td>
                                <?php 
                                $subtotal += $detail_jasa['tarif']*$pesanan[0];
                                echo $this->format_uang->rupiah_aja($detail_jasa['tarif']*$pesanan[0]);
                                ?></td>
                            </tr>
                        <?php $i++; endforeach;?>
                        <tr class="bg-gray-300 text-gray-900">
                            <th scope="row" colspan=3 class="text-center">Subtotal</th>
                            <th colspan=3 class="text-right"><?= $this->format_uang->rupiah($subtotal);?></th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        
        <div class="col-4">

            <div class="card shadow mb-4">
                <div class="card-header py-3 text-center bg-info text-white">
                    <h6 class="m-0 font-weight-bold text-default">Review Pesanan</h6>
                </div>
                <div class="card-body">
                <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Subtotal</th><th><?= $this->format_uang->rupiah_aja($subtotal);?></th>
                            </tr>
                            <tr>
                                <th>Ongkir</th><th><?= $this->format_uang->rupiah_aja($ongkir);?></th>
                            </tr>
                            <tr class="bg-gray-300 text-gray-900">
                                <th>Total</th><th><?= $this->format_uang->rupiah_aja($subtotal+$ongkir);?></th>
                            </tr>
                            <tr>
                                <th>Metode Bayar</th><th><?= $metode_bayar;?></th>
                            </tr>
                            <?php
                                if($id_metode_bayar==1): //jika metode bayarnya potong saldo
                            ?>
                            <tr >
                                <th class="bg-gray-700 text-white text-center">Saldo Anda</th>
                                <th class="bg-gray-300 text-gray-900 text-center">Tagihan</th>
                            </tr>
                            <tr>
                                <th class="bg-gray-700 text-white text-center"><?= $this->format_uang->rupiah_aja($data_plg['saldo_plg']);?></th>
                                <th class="bg-gray-300 text-gray-900 text-center"><?= $this->format_uang->rupiah_aja($subtotal+$ongkir);?></th>
                            </tr>
                            <?php endif;?>
                        </tbody>
                </table>
                <?php 
                    if($id_metode_bayar==1){ //jika metode bayarnya potong saldo
                        if($data_plg['saldo_plg']<$subtotal+$ongkir){ //jika saldo lebih kecil dari pada total
                            ?>
                                <p style="color:red;">*Maaf saldo anda tidak mencukupi silahkan deposit saldo terlebih dahulu</p>
                                <a href="<?= base_url('pelanggan/pesanan/tambah');?>" class="btn bg-gradient-warning text-white btn-block" onclick="return confirm('Apakah ingin mengedit pesanan?');">Edit Pesanan</a>
                                <a href="<?= base_url('pelanggan/deposit/tambah');?>" class="btn btn-danger btn-block">Deposit Saldo</a>
                            <?php
                        }else{
                            ?>
                                <p style="color:blue;">*Saldo anda akan dipotong sebesar total tagihan</p>
                                <a href="<?= base_url('pelanggan/pesanan/tambah');?>" class="btn bg-gradient-warning text-white btn-block" onclick="return confirm('Apakah ingin mengedit pesanan?');">Edit Pesanan</a>
                                <a href="<?= base_url('pelanggan/pesanan/tambah_action');?>" class="btn bg-gradient-success text-white btn-block" onclick="return confirm('Apakah anda yakin? Saldo anda akan dipotong sebesar <?= $this->format_uang->rupiah_aja($subtotal+$ongkir);?>');">Lanjutkan</a>
                            <?php
                        }
                    }else{
                        ?>
                            <p style="color:blue;">*Pembayaran dilakukan dengan COD</p>
                            <a href="<?= base_url('pelanggan/pesanan/tambah');?>" class="btn bg-gradient-warning text-white btn-block" onclick="return confirm('Apakah ingin mengedit pesanan?');">Edit Pesanan</a>
                            <a href="<?= base_url('pelanggan/pesanan/tambah_action');?>" class="btn bg-gradient-success text-white btn-block" onclick="return confirm('Pembayaran sebesar <?= $this->format_uang->rupiah_aja($subtotal+$ongkir);?> dilakukan saat COD');" >Lanjutkan</a>
                        <?php
                    }
                
                ?>

                </div>
            </div>
        </div>

    </div>


    

</div>
<!-- /.container-fluid -->

<?php

function data_detail_jasa($id){
    $ci = get_instance();
    $data = $ci->m_pelanggan->ambil_data_where('detail_jasa','id_detail_jasa',$id);

    // echo json_encode($data);
    return $data;
}
?>
