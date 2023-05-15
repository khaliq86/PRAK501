<?php
require('Koneksi.php');
require('Model.php');

$no = 1;

// fetch data from database
$peminjaman = new model();
$data = $peminjaman->getPeminjaman();

if (isset($_GET['id_peminjaman'])) {
    $id = $_GET['id_peminjaman'];
    $peminjaman->deletePeminjaman($id);
    header('Location: Peminjaman.php');
}

if (isset($_GET['id_peminjaman'])) {
    $id = $_GET['id_peminjaman'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];

    $peminjaman->editPeminjaman($id, $tgl_pinjam, $tgl_kembali, $id_member, $id_buku);
    header('Location: Peminjaman.php');
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
            <button type="submit">Beranda</button>
        </form>
        <form action=" FormPeminjaman.php" method="post">
            <button type="submit">Tambah Data</button>
        </form>
        <table>
            <tr>
                <th>N0</th>
                <th>ID Member</th>
                <th>ID Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($data as $baris): ?>
                <tr>
                    <td>
                        <?= $no++ ?>
                    </td>
                    <td>
                        <?= $baris['id_member'] ?>
                    </td>
                    <td>
                        <?= $baris['id_buku'] ?>
                    </td>
                    <td>
                        <?= $baris['tgl_pinjam'] ?>
                    </td>
                    <td>
                        <?= $baris['tgl_kembali'] ?>
                    </td>
                    <td>
                        <a href="FormPeminjaman.php?id_peminjaman=<?= $baris['id_peminjaman']; ?>">Edit</a>
                        <a href="Peminjaman.php?id_peminjaman=<?= $baris['id_peminjaman']; ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>
</body>

</html>