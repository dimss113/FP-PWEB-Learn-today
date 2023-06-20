<?php

$server = "localhost";
$user = "id20934520_root";
$password = "Learn-today123";
$nama_database = "id20934520_fppweb";

$db = mysqli_connect($server, $user, $password, $nama_database);

if (!$db) {
  die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>