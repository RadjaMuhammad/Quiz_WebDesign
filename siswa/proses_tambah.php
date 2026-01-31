<?php
#1. Meng-koneksikan PHP ke MySQL
include("../koneksi.php");

#2. Mengambil Value dari Form Tambah
$nama = $_POST['nama'];
$nisn = $_POST['nisn'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$gelombang = $_POST['gelombang'];
$jurusan = $_POST['jurusans_id'];
$nama_foto = $_FILES['foto']['name'];
$tmp_foto = $_FILES['foto']['tmp_name'];

#3. Query Insert (proses tambah data)
$query = "INSERT INTO biodata (nama,nisn,tempat_lahir,tgl_lahir,alamat,email,jenis_kelamin,gelombang_id,jurusans_id,foto) 
    VALUES ('$nama','$nisn','$tempat_lahir','$tgl_lahir','$alamat','$email','$jenis_kelamin','$gelombang_id',
    '$jurusan','$nama_foto')";

move_uploaded_file($tmp_foto, "../fotosiswa/$nama_foto");

$tambah = mysqli_query($koneksi, $query);

#4. Jika Berhasil triggernya apa? (optional)
if ($tambah) {
    header("location:index.php");
} else {
    echo "Data Gagal ditambah";
}
