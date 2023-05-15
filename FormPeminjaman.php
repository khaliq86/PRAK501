<?php
require("Koneksi.php");
include_once("Model.php");

$buku = new model();
$data = $buku->getBuku();

$member = new model();
$nilai = $member->getMember();

if (isset($_GET['id_peminjaman'])) {
    $id = $_GET['id_peminjaman'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/main.css">
    <title>Form Tambah Peminjaman</title>
</head>

<body>
    <div>
        <?php
        if (isset($_GET['id_peminjaman'])) {
            echo "<h1>Edit Data Peminjaman</h1>";
        } else {
            echo "<h1>Tambah Data Peminjaman</h1>";
        } ?>
        <form action="" method="post">
            <table>
                <tr>
                    <td class="text-align-left">
                        <label for="tgl_pinjam">Tanggal Peminjaman</label>
                    </td>
                    <td>
                        <input type="date" name="tgl_pinjam" id="tgl_pinjam" style="width: 100%;">
                    </td>
                </tr>
                <tr>
                    <td class="text-align-left"> <label for="tgl_kembali">Tanggal Pengembalian</label></td>
                    <td><input type="date" name="tgl_kembali" id="tgl_kembali" style="width: 100%;"></td>
                </tr>
                <tr>
                    <td class="text-align-left">
                        <label for="id_member">Pilih Member</label>
                    </td>
                    <td>
                        <select name="id_member" id="id_member" style="width: 100%;">
                            <option value=""> --pilih member-- </option>
                            <?php
                            foreach ($nilai as $row) {
                                echo "<option value=" . $row['id_member'] . ">" . $row['id_member'] . " - " . $row['nama_member'] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="text-align-left">
                        <label for="id_buku">Pilih Buku</label>
                    </td>
                    <td>
                        <select name="id_buku" id="id_buku" style="width: 100%">
                            <option value=""> --pilih buku-- </option>
                            <?php
                            foreach ($data as $baris) {
                                echo "<option value=" . $baris['id_buku'] . ">" . $baris['id_buku'] . " - " . $baris['judul_buku'] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        if (isset($_GET['id_peminjaman'])) {
                            echo "<button type=\"submit\" name=\"update\">Update</button>";
                        } else {
                            echo "<button type=\"submit\" name=\"submit\">Tambah</button>";
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php
    if (isset($_POST['submit']) && isset($_POST['tgl_pinjam']) && isset($_POST['tgl_kembali']) && isset($_POST['id_member']) && isset($_POST['id_buku'])) {
        $id_member = $_POST['id_member'];
        $id_buku = $_POST['id_buku'];
        $tgl_pinjam = $_POST['tgl_pinjam'];
        $tgl_kembali = $_POST['tgl_kembali'];

        $peminjaman = new model();
        $hasil = $peminjaman->setPeminjaman($tgl_pinjam, $tgl_kembali, $id_member, $id_buku);

        if ($hasil) {
            header("Location: Peminjaman.php");
        } else {
            echo "data gagal ditambahkan";
        }
    }

    if (isset($_POST['update']) && isset($_POST['tgl_pinjam']) && isset($_POST['tgl_kembali']) && isset($_POST['id_member']) && isset($_POST['id_buku'])) {
        $id_member = $_POST['id_member'];
        $id_buku = $_POST['id_buku'];
        $tgl_pinjam = $_POST['tgl_pinjam'];
        $tgl_kembali = $_POST['tgl_kembali'];

        $peminjaman = new model();
        $hasil = $peminjaman->editPeminjaman($id, $tgl_pinjam, $tgl_kembali, $id_member, $id_buku);

        if ($hasil) {
            header("Location: Peminjaman.php");
        } else {
            echo "data gagal diperbarui";
        }
    }
    ?>
</body>

</html>