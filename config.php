<?php
// ===========================================
// Konfigurasi Database
// VULNERABLE - HANYA UNTUK DEMO EDUKASI
// ===========================================

$host = 'localhost';
$dbname = 'demo_sqli';
$username = 'root';
$password = '';

// Koneksi menggunakan mysqli (tanpa prepared statements = VULNERABLE)
$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
