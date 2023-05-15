<?php
require('Koneksi.php');
require('Model.php');

$no = 1;

// fetch data from database
$buku = new model();
$data = $buku->getBuku();

if (isset($_GET['id_buku'])) {
    $id = $_GET['id_buku'];
    $buku->deleteBuku($id);
    header('Location: Buku.php');
}

if (isset($_GET['id_buku'])) {
    $id = $_GET['id_buku'];
    $nama = $_POST['nama'];
    $nomor = $_POST['nomor'];
    $alamat = $_POST['alamat'];
    $tgl_terakhir_bayar = $_POST['tgl_terakhir_bayar'];

    $buku->editMember($id, $nama, $nomor, $alamat, $tgl_terakhir_bayar);
    header('Location: Buku.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/main.css">
    <title>Tampilan Data</title>

    <style>
        th {
            background-color: #2c302c;
            color: white;
            border-radius: 5px;
        }

        td {
            border: 1px solid black;
        }

        h1 {
            margin-top: 10px;
            margin-left: 20px;
            margin-bottom: -80px;
        }

        a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>
    <h1>Data Peminjam</h1>
    <div class="container">
        <form action="index.php" method="post">
            <button type="submit" class="custom-btn btn-6">Beranda</button>
        </form>
        <form action="FormBuku.php" method="post">
            <button type="submit">Tambah Data</button>
        </form>
        <table>
            <tr>
                <th>N0</th>
                <th>Judul Buku</th>
                <th>Penulis Buku</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($data as $baris): ?>
                <tr>
                    <td style="text-align: center;">
                        <?= $no++ ?>
                    </td>
                    <td>
                        <?= $baris['judul_buku'] ?>
                    </td>
                    <td>
                        <?= $baris['penulis'] ?>
                    </td>
                    <td>
                        <?= $baris['penerbit'] ?>
                    </td>
                    <td style="text-align: center;">
                        <?= $baris['tahun_terbit'] ?>
                    </td>
                    <td>
                        <a href="FormBuku.php?id_buku=<?= $baris['id_buku']; ?>">Edit</a>
                        <a href="Buku.php?id_buku=<?= $baris['id_buku']; ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>
</body>

</html>