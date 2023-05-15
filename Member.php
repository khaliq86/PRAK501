<?php
require('Koneksi.php');
require('Model.php');

// fetch data from database
$member = new model();
$data = $member->getMember();

$no = 1;

if (isset($_GET['id_member'])) {
    $id = $_GET['id_member'];
    $member->deleteMember($id);
    header('Location: Member.php');
}

if (isset($_GET['id_member'])) {
    $id = $_GET['id_member'];
    $nama = $_POST['nama'];
    $nomor = $_POST['nomor'];
    $alamat = $_POST['alamat'];
    $tgl_terakhir_bayar = $_POST['tgl_terakhir_bayar'];

    $member->editMember($id, $nama, $nomor, $alamat, $tgl_terakhir_bayar);
    header('Location: Member.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/main.css">
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
    </style>
    <title>Tampilan Data</title>
</head>

<body>
    <h1>Data Peminjam</h1>
    <div class="container">

        <form action="index.php" method="post">
            <button type="submit">Beranda</button>
        </form>
        <form action="FormMember.php" method="post">
            <button type="submit">Tambah Data</button>
        </form>
        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nomor</th>
                <th>Alamat</th>
                <th>Tanggal Mendaftar</th>
                <th>Tanggal Terakhir Bayar</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($data as $baris): ?>
                <tr>
                    <td>
                        <?= $no++ ?>
                    </td>
                    <td>
                        <?= $baris['nama_member'] ?>
                    </td>
                    <td>
                        <?= $baris['nomor_member'] ?>
                    </td>
                    <td>
                        <?= $baris['alamat'] ?>
                    </td>
                    <td>
                        <?= $baris['tgl_mendaftar'] ?>
                    </td>
                    <td>
                        <?= $baris['tgl_terakhir_bayar'] ?>
                    </td>
                    <td>
                        <a href="FormMember.php?id_member=<?= $baris['id_member']; ?>">Edit</a>&nbsp;
                        <a href="member.php?id_member=<?= $baris['id_member']; ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>
</body>

</html>