<?php

require('db/database.php');
require('controller/islogin.php');

$db =  new Database();

$db->query('SELECT * FROM loans l
INNER  JOIN books b ON l.no_induk = b.no_induk
INNER  JOIN customers c ON l.id_cus = c.id_cus
WHERE l.end_date IS NULL');

$hasil = $db->get();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>AdminLTE 3 | DataTables</title>

   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
   <!-- DataTables -->
   <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
   <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1>Data Pinjam Customers</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Customers</li>
                     </ol>
                  </div>
               </div>
            </div><!-- /.container-fluid -->
         </section>

         <!-- Main content -->
         <section class="content">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header">
                           <h3 class="card-title">Data Pinjam Customers</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                           <table id="example2" class="table table-bordered table-hover">
                              <thead>
                                 <tr>
                                    <th>ID</th>
                                    <th>No Induk</th>
                                    <th>Judul</th>
                                    <th>ID Customer</th>
                                    <th>Nama Customer</th>
                                    <th>Dipinjam Sejak</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 foreach ($hasil as $row) {
                                 ?>
                                    <tr>
                                       <td><?= $row['id'] ?></td>
                                       <td><?= $row['no_induk'] ?></td>
                                       <td><?= $row['judul'] ?></td>
                                       <td><?= $row['id_cus'] ?></td>
                                       <td><?= $row['nama'] ?></td>
                                       <td><?= $row['start_date'] ?></td>
                                       <td>
                                          <div class="btn_group">
                                             <a href="input_peminjaman.php?id=<?php echo $row['id'] ?>">
                                                <i class='fas fa-edit fa-2x' style='color: #dddddd;' onmouseover="this.style.color='#000'" onmouseout="this.style.color='#dddddd'"></i>
                                             </a>

                                             <a href="controller/delete_loans.php?id=<?php echo $row['id'] ?>">
                                                <i class='fas fa-trash-alt fa-2x mx-3 fas fa-backward fa-lg' style='color: #dddddd;' onmouseover="this.style.color='#ff0000'" onmouseout="this.style.color='#dddddd'"></i>
                                             </a>

                                             <a href="input_kembali.php?id=<?php echo $row['id'] ?>">
                                                <i class='fas fa-backward fa-2x' style='color: #dddddd;' onmouseover="this.style.color='#ffcc00'" onmouseout="this.style.color='#dddddd'"></i>
                                             </a>
                                          </div>

                                       </td>
                                    </tr>
                                 <?php
                                 }
                                 ?>
                              </tbody>
                           </table>
                        </div>
                        <!-- /.card-body -->
                     </div>
                     <!-- /.card -->
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
               </div>
               <!-- /.container-fluid -->
         </section>
      </div>



      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
         <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
   </div>
   <!-- ./wrapper -->

   <?php
   require('template/footer.php');
   ?>

   <!-- jQuery -->
   <script src="plugins/jquery/jquery.min.js"></script>
   <!-- Bootstrap 4 -->
   <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- DataTables  & Plugins -->
   <script src="plugins/datatables/jquery.dataTables.min.js"></script>
   <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
   <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
   <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
   <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
   <script src="plugins/jszip/jszip.min.js"></script>
   <script src="plugins/pdfmake/pdfmake.min.js"></script>
   <script src="plugins/pdfmake/vfs_fonts.js"></script>
   <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
   <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
   <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
   <!-- AdminLTE App -->
   <script src="dist/js/adminlte.min.js"></script>
   <!-- AdminLTE for demo purposes -->
   <script src="dist/js/demo.js"></script>
   <!-- Page specific script -->
   <script>
      $(function() {
         $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
         }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
         $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
         });
      });
   </script>
</body>

</html>