<?php
#1. Meng-koneksikan PHP ke MySQL
include("../koneksi.php");

#2. Mengambil Value dari Form Tambah
$id = $_POST['id'];
$nama_gelombang = $_POST['nama_gelombang'];
$tanggal_mulai = $_POST['tanggal_mulai'];
$tanggal_selesai = $_POST['tanggal_selesai'];
$biaya_pendaftaran = str_replace(['Rp', '.', ' '], '', $_POST['biaya_pendaftaran']);
$status = $_POST['status'];




#3. Query Update (proses edit data)
$query = "UPDATE gelombang_pendaftaran SET nama_gelombang='$nama_gelombang',
                                            tanggal_selesai='$tanggal_selesai', 
                                            tanggal_selesai='$tanggal_selesai',
                                            biaya_pendaftaran='$biaya_pendaftaran', 
                                            status='$status'
    WHERE id='$id'";

$tambah = mysqli_query($koneksi, $query);

#4. Jika Berhasil triggernya apa? (optional)
if ($tambah) {
    header("location:index.php");
} else {
    echo "Data Gagal ditambah";
}
