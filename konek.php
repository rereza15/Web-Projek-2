<?php
// Mengoneksikan PHP agar terhubung ke database
$nameserver = "localhost";
$username = "root";
$password = "";
$dbname = "db_nilai"; // Pastikan nama database sesuai

// Membuat koneksi
$conn = new mysqli($nameserver, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>