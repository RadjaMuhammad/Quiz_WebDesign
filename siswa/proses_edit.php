<?php
    #1. Meng-koneksikan PHP ke MySQL
    include("../koneksi.php");

    #2. Mengambil Value dari Form Tambah
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nama_gelombang = $_POST['nama_gelombang'];
    $jurusan = $_POST['jurusans_id'];
    $nama_foto = $_FILES['foto']['name'];
    $tmp_foto = $_FILES['foto']['tmp_name'];

    

    if($nama_foto != ""){
        $qry = "SELECT * FROM biodata WHERE id='$id'";
        $hapus_foto = mysqli_query($koneksi,$qry);
        $data = mysqli_fetch_array($hapus_foto);
        $nama_foto_hapus = $data['foto'];
        $lokasi_foto = "../fotosiswa/$nama_foto_hapus";
        if(file_exists($lokasi_foto)){
            unlink($lokasi_foto);
        }
        #3. Query Insert (proses edit data)
        $query = "UPDATE biodata SET nama='$nama', nisn='$nisn', tempat_lahir='$tempat_lahir', 
        tgl_lahir='$tgl_lahir', alamat='$alamat', email='$email', jenis_kelamin='$jenis_kelamin',gelombang_id='$gelombang',  jurusans_id='$jurusan', foto='$nama_foto' 
        WHERE id='$id'";

        #hapus foto
        // $lokasi_foto = "../fotosiswa/$nama_foto";
        // if(file_exists($lokasi_foto)){
        //     unlink($lokasi_foto);
        // }

        #tambahkan foto
        move_uploaded_file($tmp_foto,"../fotosiswa/$nama_foto");
    }else{
        #3. Query Insert (proses edit data)
        $query = "UPDATE biodata SET nama='$nama', nisn='$nisn', tempat_lahir='$tempat_lahir', 
        tgl_lahir='$tgl_lahir', alamat='$alamat', email='$email', jenis_kelamin='$jenis_kelamin',gelombang_id='$gelombang',  jurusans_id='$jurusan' 
        WHERE id='$id'";
    }

    
    $tambah = mysqli_query($koneksi,$query);

    #4. Jika Berhasil triggernya apa? (optional)
    if($tambah){
        header("location:index.php");
    }else{
        echo "Data Gagal ditambah";
    }
?>