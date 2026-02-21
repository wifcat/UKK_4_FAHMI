<?php

include_once 'M_Connect.php';

class M_Transaksi{
    public function SHOW_TRANSAKSI(){
        $conn = new M_Connect();
        $sql = "SELECT 
                transaksi.*, 
                users.username, 
                buku.judul, 
                buku.kategori 
            FROM transaksi
            JOIN users ON transaksi.id_user = users.id
            JOIN buku ON transaksi.id_buku = buku.id
            ORDER BY transaksi.id DESC";
        $post = mysqli_query($conn->connect, $sql);
        
        $result = []; // Inisialisasi array kosong biar tidak error kalau data kosong
        if($post->num_rows > 0){
            while ($data = mysqli_fetch_object($post)){
                $result[] = $data;
            }
        }
        return $result;
    }
    public function SHOW_TRANSAKSI_BY_ID($id)
    {
        $conn = new M_Connect();
        $sql = "SELECT * FROM transaksi WHERE id = $id";
        $post = mysqli_query($conn->connect, $sql);

        return mysqli_fetch_object($post);
    }

    public function ADD_PINJAM($id_user, $id_buku) {
        $conn = new M_Connect();
        $tgl_pinjam = date('Y-m-d');

        // Menggunakan transaksi SQL agar stok & data transaksi sinkron
        mysqli_begin_transaction($conn->connect);

        try {
            // 1. Insert ke tabel transaksi
            $sql_transaksi = "INSERT INTO transaksi (id_user, id_buku, tgl_pinjam, status) VALUES ('$id_user', '$id_buku', '$tgl_pinjam', 'dipinjam')";
            mysqli_query($conn->connect, $sql_transaksi);

            // 2. Kurangi stok di tabel buku
            $sql_update_stok = "UPDATE buku SET stok = stok - 1 WHERE id = '$id_buku'";
            mysqli_query($conn->connect, $sql_update_stok);

            // Jika semua ok, commit
            mysqli_commit($conn->connect);
            return true;
        } catch (Exception $e) {
            // Jika ada gagal, batalkan semua
            mysqli_rollback($conn->connect);
            return false;
        }
    }
    public function KEMBALIKAN_BUKU($id_transaksi) {
        $conn = new M_Connect();
        $tgl_kembali = date('Y-m-d');

        mysqli_begin_transaction($conn->connect);
        try {
            // 1. Cari dulu id_buku dari transaksi ini supaya tau stok mana yg ditambah
            $res = mysqli_query($conn->connect, "SELECT id_buku FROM transaksi WHERE id = '$id_transaksi'");
            $data = mysqli_fetch_object($res);
            $id_buku = $data->id_buku;

            // 2. Update status transaksi
            mysqli_query($conn->connect, "UPDATE transaksi SET tgl_kembali = '$tgl_kembali', status = 'kembali' WHERE id = '$id_transaksi'");

            // 3. Tambah stok buku
            mysqli_query($conn->connect, "UPDATE buku SET stok = stok + 1 WHERE id = '$id_buku'");

            mysqli_commit($conn->connect);
            return true;
        } catch (Exception $e) {
            mysqli_rollback($conn->connect);
            return false;
        }
    }
}