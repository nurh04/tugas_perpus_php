<?php

require('controller/islogin.php');

// menambahkan class database
require('db/database.php');
$db = new Database();

$username =@$_GET['username'];

// buat query untuk mengambil data ditable
$db_query('SELECT * FROM admins WHERE username=:username');

// binding data query dengan variable
$db->bind(':username', $username);


// execute query ke database
$admin = $db->single();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scaled">
    <title>AdminLTE 3 | DataTables</title>

    <!-- Google Font; Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

    <?php
    require('template/header.php');
    ?>

   <?php
    require('template/siderbar.php');
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
       <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Admin</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active"
                  <?php
                  if ($username) {
                    echo 'Edit Admin';
                  } else {
                    echo 'Tambah Admin';
                  }
                  ?>
              </li>
           </ol>
          </div>
        </div>
       </div><!-- /. container-fluid -->
     </section>