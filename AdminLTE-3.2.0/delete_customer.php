<?php

// menambahkan class database
require('../db/database.php');
$db = new Database();

// mengambil data id_cus menggunakan GET
$username = $_GET['id_cus'];

// buat query untuk melakukan penghapusan data di table
$db->query('DELETE FROM customer WHERE id_cus=:id_cus');

// binding data query dengan variable
$db->bind(':id_cus', $id_cus);

// execute query ke database
$db->execute();

// kembalikan ke halaman data_customer.php
header("Location: ../data_admin.php");