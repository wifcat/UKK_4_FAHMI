<?php
include_once 'HEADER.php';
include_once '../Controllers/C_Transaksi.php';

$transaksi = new M_Transaksi();

// Ambil ID Buku dari URL
$id_buku = $_GET['id_buku'];

// Ambil ID User dari Session (pastikan saat login kamu simpan id user di $_SESSION['id_user'])
$id_user = $_SESSION['id_user']; 

if($transaksi->ADD_PINJAM($id_user, $id_buku)) {
    echo "<script>alert('Berhasil Pinjam!'); window.location='Transaksi.php';</script>";
} else {
    echo "<script>alert('Gagal Pinjam, Stok mungkin habis atau sistem error'); window.location='V_KatalogBuku.php';</script>";
}