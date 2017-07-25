<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','db_mahasiswa_its');

$koneksi = mysqli_connect(HOST,USER,PASS,DB) or die('Gagal tersambung dengan database');
?>