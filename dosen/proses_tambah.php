<?php
#1. Meng-koneksikan PHP ke MySQL
include("../koneksi.php");

#2. Mengambil Value dari Form Tambah
$nama = $_POST['nama'];
$nidn = $_POST['nidn'];
$email = $_POST['email'];
$nohp = $_POST['nohp'];
$rumpun = $_POST['rumpun'];
$nama_foto = $_FILES['foto']['name'];
$tmp_foto = $_FILES['foto']['tmp_name'];

#3. Query Insert (proses tambah data)
$query = "INSERT INTO dosen (nama,nidn,email,nohp,rumpun,foto) 
    VALUES ('$nama','$nidn','$email','$nohp','$rumpun','$nama_foto')";

move_uploaded_file($tmp_foto, "../fotodosen/$nama_foto");

$tambah = mysqli_query($koneksi, $query);

#4. Jika Berhasil triggernya apa? (optional)
if ($tambah) {
    header("location:index.php");
} else {
    echo "Data Gagal ditambah";
}
