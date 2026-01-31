<?php
include_once("../koneksi.php");
$idedit = $_GET['id'];
$qry = "SELECT * FROM gelombang_pendaftaran WHERE id='$idedit'";
$edit = mysqli_query($koneksi, $qry);
$data = mysqli_fetch_array($edit);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gelombang Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body style="background-color:#d1e6d4">
    <?php
    include_once("../navbar.php");
    ?>

    <div class="container">
        <div class="row my-5">
            <div class="col-8 m-auto">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-header">
                        <b>FORM EDIT GELOMBANG</b>
                    </div>
                    <div class="card-body">
                        <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Gelombang ke</label>
                                <select class="form-control" name="nama_gelombang" id="">
                                    <option <?php echo $data['nama_gelombang'] == 'Gelombang 1' ? 'selected' : '' ?> value="Gelombang 1">Gelombang 1</option>
                                    <option <?php echo $data['nama_gelombang'] == 'Gelombang 2' ? 'selected' : '' ?> value="Gelombang 2">Gelombang 2</option>
                                    <option <?php echo $data['nama_gelombang'] == 'Gelombang 3' ? 'selected' : '' ?> value="Gelombang 3">Gelombang 3</option>
                                    <option <?php echo $data['nama_gelombang'] == 'Gelombang 4' ? 'selected' : '' ?> value="Gelombang 4">Gelombang 4</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Biaya Pendaftaran</label>
                                <input value="<?= $data['biaya_pendaftaran'] ?>" name="biaya_pendaftaran" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Mulai :</label>
                                <input value="<?= $data['tanggal_mulai'] ?>" name="tanggal_mulai" type="date" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Selesai :</label>
                                <input value="<?= $data['tanggal_selesai'] ?>" name="tanggal_selesai" type="date" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Status</label>
                                <select class="form-control" name="status" id="">
                                    <option <?php echo $data['status'] == 'Aktif' ? 'selected' : '' ?> value="Aktif">Aktif</option>
                                    <option <?php echo $data['status'] == 'Tidak Aktif' ? 'selected' : '' ?> value="tidak aktif">Tidak Aktif</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>