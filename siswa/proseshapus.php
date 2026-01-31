<?php 
    #1. koneksi database
    include_once("../koneksi.php");

    #2. ID hapus
    $idhapus = $_GET['id'];


    $query = "SELECT * from biodata Where id='$idhapus'";
    $hapus_foto = mysqli_query($koneksi,$query);
    $data = mysqli_fetch_array(result: $hapus_foto);
    $nama_foto = $data['foto'];
    $lokasi_foto = "../fotosiswa/$nama_foto";

    if (file_exists(filename: $lokasi_foto)) {
        unlink(filename:$lokasi_foto);
    }

    #3. menulis query
    $qry = "DELETE FROM biodata WHERE id='$idhapus'";

    #4. menjalan query
    $hapus = mysqli_query($koneksi,$qry);

    #5. mengalihkan halaman
    header("location:index.php");
?>