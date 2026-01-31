<?php
#1. Meng-koneksikan PHP ke MySQL
include("../koneksi.php");

#2. Mengambil Value dari Form Tambah
$nama_gelombang = $_POST['nama_gelombang'];
$tanggal_mulai = $_POST['tanggal_mulai'];
$tanggal_selesai = $_POST['tanggal_selesai'];
$biaya_pendaftaran = str_replace(['Rp', '.', ' '], '', $_POST['biaya_pendaftaran']);
$status = $_POST['status'];




#3. Query Insert (proses tambah data)
$query = "INSERT INTO gelombang_pendaftaran (nama_gelombang,tanggal_mulai,tanggal_selesai,biaya_pendaftaran,status) 
    VALUES ('$nama_gelombang','$tanggal_mulai','$tanggal_selesai','$biaya_pendaftaran','$status')";

$tambah = mysqli_query($koneksi, $query);

#4. Jika Berhasil triggernya apa? (optional)
if ($tambah) {
    header("location:index.php");
} else {
    echo "Data Gagal ditambah";
}
