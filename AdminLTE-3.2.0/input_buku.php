<?php

//Menambah class database
require('db/database.php');
require('controller/islogin.php');

$db = new Database();

//Mengambil data no menggunakan GET
$no = @$_GET['no'];

//Buat Query untuk melakukan UPDATE data di table
$db->query('SELECT * FROM books WHERE no_induk = :no_induk');

//Binding data query dengan variable
$db->bind(':no_induk', $no);

//Execute query ke database
$buku = $db->single();

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
                     <h1>BUKU</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">
                           <?php
                           if ($no) {
                              echo 'Edit Buku';
                           } else {
                              echo 'Tambah Buku';
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
            <form action="<?php echo (@$no ? 'controller/update_buku.php' : 'controller/save_buku.php'); ?>" method="POST" enctype="multipart/form-data">
               <div class="container-fluid">
                  <div class="row">
                     <!-- left column -->
                     <div class="col-md-3">
                        <!-- general form elements -->
                        <div class="card card-primary">
                           <div class="card-header">
                              <h3 class="card-title">Gambar</h3>
                           </div>
                           <div class="form-group mb-0">
                              <div class="input-group">
                                 <div class="custom-file m-3">
                                    <input type="file" name="image" class="custom-file-input" id="exampleInputFile" accept="image/*">
                                    <label class="custom-file-label" for="exampleInputFile">Pilih</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="col-md-9">
                        <!-- general form elements -->
                        <div class="card card-primary">
                           <div class="card-header">
                              <h3 class="card-title">
                                 <?php
                                 if ($no) {
                                    echo 'Edit Buku';
                                 } else {
                                    echo 'Tambah Buku';
                                 }
                                 ?>
                              </h3>
                           </div>
                           <!-- /.card-header -->
                           <!-- form start -->
                           <div class="card-body">
                              <div class="form-group">
                                 <label for="no_induk">No_Induk</label>
                                 <input type="text" class="form-control" name="no_induk" id="no_induk" placeholder="Masukkan No Induk" required <?= @$buku['no_induk'] ? 'readonly' : ''; ?> value="<?php echo @$buku['no_induk'] ?>">
                              </div>
                              <div class="form-group">
                                 <label for="judul">Judul</label>
                                 <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul" required value="<?php echo @$buku['judul'] ?>">
                              </div>
                              <div class="form-group">
                                 <label for="penulis">Penulis</label>
                                 <input type="text" class="form-control" name="penulis" id="penulis" placeholder="Masukkan Penulis" required value="<?php echo @$buku['penulis'] ?>">
                              </div>
                              <div class="form-group">
                                 <label for="tahun">Tahun Terbit</label>
                                 <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Masukkan Tahun Terbit" required value="<?php echo @$buku['tahun'] ?>">
                              </div>
                              <div class="form-group">
                                 <label for="penerbit">Penerbit</label>
                                 <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Masukkan Penerbit" required value="<?php echo @$buku['penerbit'] ?>">
                              </div>
                              <div class="form-group">
                                 <label for="subjek">Subject</label>
                                 <input type="text" class="form-control" name="subject" id="subject" placeholder="Masukkan Subject" required value="<?php echo @$buku['subjek'] ?>">
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