<?php
session_start();



$db = new PDO("mysql:host=localhost;dbname=pengaduan_masyarakat", 'root', '');
$query = $db->query("SELECT * FROM pengaduan");

//     if(! isset($_SESSION["id_pengaduan"])){
//     header("location:login.php");
//  }
?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Tanggapan</title>
</head>
<style>
    body {
        background-image: url("pixelart.jpg");
        background-size: cover;
    }
</style>

<body>
    <?php
    $db = new PDO("mysql:host=localhost;dbname=pengaduan_masyarakat", 'root', '');
    // $query = $db->query("SELECT pengaduan.id_pengaduan,pengaduan.tgl_pengaduan,pengaduan.nik,pengaduan.isi_laporan,pengaduan.foto,pengaduan.status,tanggapan.id_petugas,tanggapan.tanggapan FROM pengaduan INNER JOIN tanggapan ON pengaduan.id_pengaduan = tanggapan.id_pengaduan");
    $query = $db->query('SELECT * FROM pengaduan')

    ?>

    <div class="container-sm">

        <h1 class="text-black text-center">Laporan</h1>
        <table border="1" cellpadding="10" cellspacing="0" class="table table-bordered border-secondary bg-white text-center">
            <thead class="bg-secondary text-white">
                <th>Id</th>
                <th>Tanggal</th>
                <th>Nik</th>
                <th>Isi Laporan</th>
                <th>Foto</th>
                <th>Status</th>
                <th>TANGGAPAN</th>
            </thead>

            <tbody>
                <?php while ($data = $query->fetch()) : ?>
                    <tr>
                        <td><?= $data['id_pengaduan'] ?></td>
                        <td><?= $data['tgl_pengaduan'] ?></td>
                        <td><?= $data['nik'] ?></td>
                        <td><?= $data['isi_laporan'] ?></td>
                        <td><img src="<?= './foto/' . $data['foto'] ?>" width="100px"></td>
                        <td><?= $data['status'] ?></td>
                        <TD>

                        <a href="tambah6.php?id_pengaduan=<?= $data['id_pengaduan'] ?> " class="btn btn-danger"><i class="bi bi-envelope"></i></a>
                        </TD>


                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>
        <a href="index2.php " class="btn btn-danger"><i class="bi bi-house-fill"></i></a>
        <a href="tanggapan.php" class="btn btn-secondary">Tambah</a>

    </div>


    <h2 class="text-center">TANGGAPAN</h2>
    <div class="container">
        <?php
        $query = $db->query("SELECT * FROM tanggapan INNER JOIN pengaduan ON pengaduan.id_pengaduan = tanggapan.id_pengaduan INNER JOIN petugas ON petugas.id_petugas = tanggapan.id_petugas;");
        $datas = $query->fetchAll();
        // var_dump($data);
        // die();

        ?>
        <table border="1" cellpadding="10" cellspacing="0" class="table table-bordered border-secondary bg-white text-center">
            <thead class="bg-secondary text-white">
                <th>Id</th>
                <th>Pengaduan</th>
                <th>Tanggal Tanggapan</th>
                <th>Tanggapan</th>
                <th>Petugas</th>
            </thead>

            <tbody>
                <?php foreach ($datas as $data) : ?>
                    <tr>
                        <td><?= $data['id_tanggapan'] ?></td>
                        <td><?= $data['isi_laporan'] ?></td>
                        <td><?= $data['tgl_tanggapan'] ?></td>
                        <td><?= $data['tanggapan'] ?></td>
                        <td><?= $data['nama_petugas'] ?></td>


                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    </hr>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>