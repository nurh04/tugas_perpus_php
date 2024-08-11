<?php

//Menambah class database
require('db/database.php');
require('controller/islogin.php');

$db = new Database();

//Mengambil data no menggunakan GET
$id_cus = @$_GET['id_cus'];

//Buat Query untuk melakukan UPDATE data di table
$db->query('SELECT * FROM customers WHERE id_cus=:id_cus');

//Binding data query dengan variable
$db->bind(':id_cus', $id_cus);

//Execute query ke database
$customer = $db->single();

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>AdminLTE 3 | General Form Elements</title>

   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini dark-mode">
   <div class="wrapper">

      <?php
      require('template/header.php');
      ?>

      <?php
      require('template/sidebar.php');
      ?>

      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1>Customer</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">
                           <?php
                           if ($id_cus) {
                              echo 'Edit Customer';
                           } else {
                              echo 'Tambah Customer';
                           }
                           ?>
                        </li>
                     </ol>
                  </div>
               </div>
            </div><!-- /.container-fluid -->
         </section>

         <!-- Main content -->
         <section class="content">
            <form action="<?php echo (@$id_cus ? 'controller/update_customer.php' : 'controller/save_customer.php'); ?>" method="POST">
               <div class="container-fluid">
                  <div class="row">

                     <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                           <div class="card-header">
                              <h3 class="card-title">
                                 <?php
                                 if ($id_cus) {
                                    echo 'Edit Customer';
                                 } else {
                                    echo 'Tambah Customer';
                                 }
                                 ?>
                              </h3>
                           </div>
                           <!-- /.card-header -->
                           <!-- form start -->
                           <div class="card-body">
                              <div class="form-group">
                                 <label for="id_cus">ID</label>
                                 <input type="text" class="form-control" name="id_cus" id="id_cus" placeholder="Masukkan No ID" required <?= @$customer['id_cus'] ? 'readonly' : ''; ?> value="<?php echo @$customer['id_cus'] ?>">
                              </div>
                              <div class="form-group">
                                 <label for="nama">Nama</label>
                                 <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" required value="<?php echo @$customer['nama'] ?>">
                              </div>
                              <div class="form-group">
                                 <label for="alamat">Alamat</label>
                                 <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat" required value="<?php echo @$customer['alamat'] ?>">
                              </div>
                              <div class="form-group">
                                 <label for="telp">Telephone</label>
                                 <input type="text" class="form-control" name="telp" id="telp" placeholder="Masukkan Nomor Telephone" required value="<?php echo @$customer['telp'] ?>">
                              </div>
                              <div class="form-group">
                                 <label for="jk">Jenis Kelamin</label>
                                 <input type="text" class="form-control" name="jk" id="jk" placeholder="Masukkan Jenis Kelamin" required value="<?php echo @$customer['jk'] ?>">
                              </div>

                           </div>
                           <!-- /.card-body -->

                           <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                           </div>
                        </div>
                        <!-- /.card -->
                        <!-- /.card-body -->
                     </div>
                     <!-- /.card -->
                  </div>
                  <!--/.col (right) -->
               </div>
               <!-- /.row -->
            </form>
         </section>
      </div>

      <?php
      require('template/footer.php');
      ?>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
         <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
   </div>
   <!-- ./wrapper -->

   <!-- jQuery -->
   <script src="plugins/jquery/jquery.min.js"></script>
   <!-- Bootstrap 4 -->
   <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- bs-custom-file-input -->
   <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
   <!-- AdminLTE App -->
   <script src="dist/js/adminlte.min.js"></script>
   <!-- AdminLTE for demo purposes -->
   <script src="dist/js/demo.js"></script>
   <!-- Page specific script -->
   <script>
      $(function() {
         bsCustomFileInput.init();
      });
   </script>
</body>

</html>