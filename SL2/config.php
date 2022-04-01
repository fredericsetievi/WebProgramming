<?php

$server = "localhost";
$username = "root";
$password = "";
$db_name = "sl2";

$connection = mysqli_connect($server, $username, $password, $db_name);

if (!$connection) {
    throw new Exception("Koneksi gagal: " . mysqli_connect_error());
} else {
    // echo "Koneksi berhasil";
}
