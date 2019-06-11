<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dokter Sepatu</title>

  <link href="<?php echo base_url();?>assets/css/AdminLTE.css" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Custom fonts for this template-->
  <link href="<?= base_url();?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url();?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">




  <script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>

  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.0.0/css/bootstrap-switch-button.min.css" rel="stylesheet">  
  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.0.0/js/bootstrap-switch-button.min.js"></script>
  
    <!-- <script src="//cdn.ckeditor.com/4.11.4/full/ckeditor.js"></script> -->
    
  <!-- DATE TIME PICKER-->
  <link href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">


  <style>
    .check
    {
        opacity:0.3;
      color:#996;
    }
    .box{
        margin-bottom:5px;
    }
    .table-hover tr {
        cursor: pointer;
    }
  </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
<?php include 'menu.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['email_plg'];?></span>
                <img class="img-profile rounded-circle" src="<?= base_url('uploads/foto-plg/').$_SESSION['foto_plg'];?> ">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('pelanggan/akun/');?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        <?php $this->load->view($content); ?>

    </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2019</span>
            </div>
            </div>
        </footer>
        <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?= base_url();?>login/logout">Logout</a>
            </div>
        </div>
        </div>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url();?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url();?>assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url();?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url();?>assets/js/demo/chart-pie-demo.js"></script>

        <!-- Page level plugins -->
    <script src="<?php echo base_url();?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url();?>assets/js/demo/datatables-demo.js"></script>

    <!-- DATE TIME PICKER -->
    <script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/locale/bootstrap-datetimepicker.id.js"></script>


    <script>
        $("#modal-std").modal("show");

        $(document).keypress(function(e) {
          if ($("#modal-std").modal("show") && (e.keycode == 13 || e.which == 13)) {
            // alert("Enter is pressed");
            $('#close-modal').click();
          }
        });


        $(document).on('click', '.view-detail-deposit', function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        const formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 2
        })
        $.ajax({
            type: "get",
            url: "<?php echo site_url('pelanggan/deposit/data_json/'); ?>"+id,
            dataType: "JSON",
            success: function(data){
            $.each(data, function (key, value) {
                $('.id_deposit').append('<span class="data_deposit">'+data[key].id_deposit+'</span>');
                $('.waktu_deposit').append('<span class="data_deposit">'+data[key].waktu_deposit+'</span>');
                $('.jml_deposit').append('<span class="data_deposit">'+formatRupiah(data[key].jml_deposit,'Rp. ')+'</span>');
                $('.kode_unik').append('<span class="data_deposit">'+data[key].kode_unik+'</span>');
                $('.total_deposit').append('<span class="data_deposit">'+formatRupiah(+data[key].jml_deposit + +data[key].kode_unik)+'</span>');
                $('.id_rek_bank').append('<span class="data_deposit">'+data[key].nama_bank+'</span>');
                $('.nama_bank').append('<span class="data_deposit">'+data[key].nama_bank+'</span>');
                $('.atas_nama_rek').append('<span class="data_deposit">'+data[key].atas_nama_rek+'</span>');
                $('.no_rek').append('<span class="data_deposit">'+data[key].no_rek+'</span>');
               
               
                $('.tombol_batal').append('<a class="data_deposit btn btn-danger" href="deposit/hapus/'+data[key].id_deposit+'" class="btn btn-danger btn-icon-split" onclick = "return confirm_delete();"> <span class="icon text-white-50"> <i class="fas fa-trash"></i> </span> <span class="text">Batalkan</span></a>');
                
            });
            }
        });
        $('#detail_deposit').modal('show');
        });
        
        $('#detail_deposit').on('hidden.bs.modal', function () {
        $('.data_deposit').remove();
        });

        $(document).on('click', '.view-detail-artikel', function(e){
          e.preventDefault();
          var id = $(this).attr('id');
          $.ajax({
              type: "get",
              url: "<?php echo site_url('admin/artikel/get_data_artikel_by_id/'); ?>"+id,
              dataType: "JSON",
              success: function(data){
              $.each(data, function (key, value) {
                  $('.judul_artikel').append(data[key].isi_artikel);
                  // alert(data[key].judul_artikel);
              });
              }
          });
          $('#detail_artikel').modal('show');
        });

        //modal detail sepatu
        $(document).on('click', '.view-detail-sepatu', function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var foto_sblm ="";
        var foto_ssdh="";
        $.ajax({
            type: "get",
            url: "<?php echo site_url('pelanggan/pesanan/data_json/'); ?>"+id,
            dataType: "JSON",
            success: function(data){
            $.each(data, function (key, value) {
                if(data[key].foto_sblm == '-'){
                  foto_sblm = "nothing.png";
                }else{
                  foto_sblm = data[key].foto_sblm;
                }
                if(data[key].foto_ssdh == '-'){
                  foto_ssdh = "nothing.png";
                }else{
                  foto_ssdh = data[key].foto_ssdh;
                }

                $('.merek_spt').append('<span class="data_detail_sepatu">'+data[key].merek_spt+'</span>');
                $('.warna_spt').append('<span class="data_detail_sepatu">'+data[key].warna_spt+'</span>');
                $('.size_spt').append('<span class="data_detail_sepatu">'+data[key].size_spt+'</span>');
                $('.ket_lain').append('<span class="data_detail_sepatu">'+data[key].ket_lain+'</span>');
               
                $('.foto_sblm').append('<img class="data_detail_sepatu img-fluid" src="<?= base_url();?>uploads/foto-before-after/'+foto_sblm+'">');
                $('.foto_ssdh').append('<img class="data_detail_sepatu img-fluid" src="<?= base_url();?>uploads/foto-before-after/'+foto_ssdh+'">');
            });
            }
        });
        $('#detail_sepatu').modal('show');
        });

        $('#detail_sepatu').on('hidden.bs.modal', function () {
        $('.data_detail_sepatu').remove();
        });

     
    function confirm_delete() {
      return confirm('Apakah anda yakin?');
    }

    function ik(val){
    document.getElementById('isian').value = val;  
    }

    function formatRupiah(angka){
      var	number_string = angka.toString(),
      sisa 	= number_string.length % 3,
      rupiah 	= number_string.substr(0, sisa),
      ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
        
      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      return rupiah;
    }

    $(document).ready(function(e){

        $('.img-check').click(function(e) {
          $('.img-check').not(this).removeClass('check')
          .siblings('input').prop('checked',false);
        $(this).addClass('check')
              .siblings('input').prop('checked',true);
      });
        
    });

    $(document).ready(function(){

    var quantitiy=0;
   $('.quantity-right-plus').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
            
            $('#quantity').val(quantity + 1);

          
            // Increment
        
    });

     $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
      
            // Increment
            if(quantity>0){
            $('#quantity').val(quantity - 1);
            }
    });
    
    });


    var nilai = 0;
    function buttonClickInc(i) {
      
      var value = parseInt(document.getElementById('input-'+i).value, 10);
      value = isNaN(value) ? 0 : value;
      value++;
      document.getElementById('input-'+i).value = value;
      // document.getElementById('input-'+i).value = ++1;
    }

    function buttonClickDec(i) {
      var value = parseInt(document.getElementById('input-'+i).value, 10);
      value = isNaN(value) ? 0 : value;
      value < 1 ? value = 1 : '';
      value--;
      document.getElementById('input-'+i).value = value;
      // if(document.getElementById('input-'+i).value!=0)
      // document.getElementById('input-'+i).value = --1;
    }

    $(".pesanan").click(function(event){ 
        var id = $(this).attr('id');
        window.location.href  = "<?= base_url('pelanggan/pesanan/detail/')?>"+id; 
        event.preventDefault();
    });

    $(".form_datetime").datetimepicker({
      format: "dd MM yyyy hh:ii:ss",
      autoclose: true,
      todayBtn: true,
      pickerPosition: "top-right",
      startDate: new Date(),
      language: 'id',
      });



    </script>

</body>

</html>