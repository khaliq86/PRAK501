<?php
require("Koneksi.php");
include_once("Model.php");

if (isset($_GET['id_member'])) {
    $id = $_GET['id_member'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/main.css">
    <title>Form Tambah Member</title>
</head>

<body>
    <div>
        <?php
        if (isset($_GET['id_member'])) {
            echo "<h1>Edit Data Member</h1>";
        } else {
            echo "<h1>Tambah Data Member</h1>";
        } ?>
        <form action="" method="post">
            <table>
                <tr>
                    <td class="text-align-left">
                        <label for="nama_member">Nama</label>
                    </td>
                    <td>
                        <input type="text" name="nama_member" id="nama_member">
                    </td>
                </tr>
                <tr>
                    <td class="text-align-left"> <label for="nomor_member">Nomor</label></td>
                    <td><input type="text" name="nomor_member" id="nomor_member"></td>
                </tr>
                <tr>
                    <td class="text-align-left"><label for="alamat">Alamat</label></td>
                    <td><input type="text" name="alamat" id="alamat"></td>
                </tr>
                <tr>
                    <td class="text-align-left"><label for="tgl_terakhir_bayar">Tanggal Terakhir Bayar</label></td>
                    <td><input type="date" name="tgl_terakhir_bayar" id="tgl_terakhir_bayar" style="width: 98%"></td>
                </tr>
                <tr>
                    <td>
                        <?php
                        if (isset($_GET['id_member'])) {
                            echo " <button type=\"submit\" name=\"update\">Update</button>";
                        } else {
                            echo " <button type=\"submit\" name=\"submit\">Tambah</button>";
                        } ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php
    if (isset($_POST['submit']) && isset($_POST['nama_member']) && isset($_POST['nomor_member']) && isset($_POST['alamat']) && isset($_POST['tgl_terakhir_bayar'])) {
        $nama = $_POST['nama_member'];
        $nomor = $_POST['nomor_member'];
        $alamat = $_POST['alamat'];
        $tgl_terakhir_bayar = $_POST['tgl_terakhir_bayar'];
        $member = new model();
        $hasil = $member->setMember($nama, $nomor, $alamat, $tgl_terakhir_bayar);

        if ($hasil) {
            header("Location: Member.php");
        } else {
            echo "data gagal ditambahkan";
        }
    }

    if (isset($_POST['update']) && isset($_POST['nama_member']) && isset($_POST['nomor_member']) && isset($_POST['alamat']) && isset($_POST['tgl_terakhir_bayar'])) {
        $nama = $_POST['nama_member'];
        $nomor = $_POST['nomor_member'];
        $alamat = $_POST['alamat'];
        $tgl_terakhir_bayar = $_POST['tgl_terakhir_bayar'];
        $member = new model();
        $hasil = $member->editMember($id, $nama, $nomor, $alamat, $tgl_terakhir_bayar);

        if ($hasil) {
            header("Location: Member.php");
        } else {
            echo "data gagal ditambahkan";
        }
    }
    ?>
</body>

</html>