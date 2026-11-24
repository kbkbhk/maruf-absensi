<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "absensi_sekolah"
);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>