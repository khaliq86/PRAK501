<?php

require "koneksi.php";

class model
{

    //FUNCTION MEMBERS
    public function getMember() //getMember berfungsi untuk mengambil semua data dari tabel member
    {
        $sql = "SELECT * from member";
        $result = mysqli_query($GLOBALS['koneksi'], $sql);
        return $result;
    }

    public function deleteMember($id) //deleteMember berfunsi menghapus data pada baris sesuai dengan id
    {
        $sql = "DELETE from member WHERE id_member='$id'";
        $result = mysqli_query($GLOBALS['koneksi'], $sql);
        return $result;
    }

    public function setMember($nama, $nomor, $alamat, $tgl_terakhir_bayar) //setMember berfungsi untuk memasukkan data dari inputan ke database
    {
        $sql = "INSERT INTO member (nama_member, nomor_member, alamat, tgl_terakhir_bayar) VALUES ('$nama', '$nomor', '$alamat','$tgl_terakhir_bayar')";
        $result = mysqli_query($GLOBALS['koneksi'], $sql);
        return $result;
    }

    public function editMember($id, $nama, $nomor, $alamat, $tgl_terakhir_bayar) //editMember berfunsi untuk mengubah data yang ada didatabase berdasarkan id
    {
        $sql = "UPDATE member SET nama_member = '$nama', nomor_member = '$nomor', alamat = '$alamat', tgl_terakhir_bayar = '$tgl_terakhir_bayar' WHERE id_member = '$id'";
        $result = mysqli_query($GLOBALS['koneksi'], $sql);
        return $result;
    }

    public function getMemberById($id) //getMemberById berfungsi untuk memilih seluruh data dari member berdasarkan id
    {
        $sql = "SELECT * FROM member WHERE id_member = '$id'";
        $result = mysqli_query($GLOBALS['koneksi'], $sql);
        return $result;
    }

    //FUNCTION BUKU
    public function getBuku() //getBuku berfungsi untuk mengambil semua data dari tabel member
    {
        $sql = "SELECT * from buku";
        $result = mysqli_query($GLOBALS['koneksi'], $sql);
        return $result;
    }

    public function deleteBuku($id) //deleteBuku berfungsi untuk menghapus baris berdasarkan id
    {
        $sql = "DELETE from buku where id_buku='$id'";
        $result = mysqli_query($GLOBALS['koneksi'], $sql);
        return $result;
    }

    public function setBuku($judul, $penulis, $penerbit, $tahun_terbit) //setBuku berfungsi untuk memasukkan inputan user ke dalam database
    {
        $sql = "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES ('$judul', '$penulis','$penerbit', '$tahun_terbit')";
        $result = mysqli_query($GLOBALS['koneksi'], $sql);
        return $result;
    }

    public function editBuku($id, $judul, $penulis, $penerbit, $tahun_terbit) //editBuku berfunsi untuk mengedit data dari tabel buku berdasarkan id
    {
        $sql = "UPDATE buku SET judul_buku = '$judul', penulis = '$penulis', penerbit = '$penerbit', tahun_terbit = '$tahun_terbit' WHERE id_buku = '$id'";
        $result = mysqli_query($GLOBALS['koneksi'], $sql);
        return $result;
    }

    public function getBukuById($id) //getBukuById berfungsi untuk mengambil data dari database berdasarkan id
    {
        $sql = "SELECT * FROM buku WHERE id_buki = '$id'";
        $result = mysqli_query($GLOBALS['koneksi'], $sql);
        return $result;
    }

    //FUNCTION PEMINJAMAN
    public function getPeminjaman() //getPeminjaman berfungsi untuk mengambil semua data dari tabel peminjaman
    {
        $sql = "SELECT * FROM peminjaman";
        $result = mysqli_query($GLOBALS['koneksi'], $sql);
        return $result;
    }

    public function deletePeminjaman($id) //deletePeminjaman berfungsi untuk menghapus baris data berdasarkan id
    {
        $sql = "DELETE FROM peminjaman WHERE id_peminjaman = '$id'";
        $result = mysqli_query($GLOBALS['koneksi'], $sql);
        return $result;
    }

    public function setPeminjaman($tgl_pinjam, $tgl_kembali, $id_member, $id_buku) //setPeminjaman berfungsu untuk memasukkan inputan user ke dalam database
    {
        $sql = "INSERT INTO peminjaman (tgl_pinjam, tgl_kembali, id_member, id_buku) VALUES ('$tgl_pinjam', '$tgl_kembali','$id_member','$id_buku')";
        $result = mysqli_query($GLOBALS['koneksi'], $sql);
        return $result;
    }

    public function editPeminjaman($id, $tgl_pinjam, $tgl_kembali, $id_member, $id_buku) //editPeminjaman berfunsi untuk mengedit database berdasarkan id
    {
        $sql = "UPDATE peminjaman SET tgl_pinjam = '$tgl_pinjam', tgl_kembali = '$tgl_kembali', id_member = '$id_member', id_buku = '$id_buku' WHERE id_peminjaman = '$id'";
        $result = mysqli_query($GLOBALS['koneksi'], $sql);
        return $result;
    }

    public function getPeminjamanByID($id) //getPeminjamanById berfungsi untuk mengambil data dari tabel peminjaman berdasarkan id
    {
        $sql = "SELECT * FROM peminjaman WHERE id_peminjaman = '$id'";
        $result = mysqli_query($GLOBALS['koneksi'], $sql);
        return $result;
    }
}
?>