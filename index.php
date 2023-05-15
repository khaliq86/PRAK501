<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/main.css">
    <title>Beranda</title>
</head>

<body>
    <div>
        <h1>Halaman Beranda Peminjaman Buku</h1>
        <form action="" method="post">
            <table>
                <tr>
                    <td>
                        <button type="submit" name="tambah-data-member">Tambah Data Member</button>
                    </td>
                    <td>
                        <button type="submit" name="tambah-data-buku">Tambah Data Buku</button>
                    </td>
                    <td>
                        <button type="submit" name="tambah-data-peminjaman">Tambah Data Peminjaman</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php
    if (isset($_POST['tambah-data-member'])) {
        header("Location: FormMember.php");
    }
    if (isset($_POST['tambah-data-buku'])) {
        header("Location: FormBuku.php");
    }
    if (isset($_POST['tambah-data-peminjaman'])) {
        header("Location: FormPeminjaman.php");
    }
    ?>
</body>

</html>