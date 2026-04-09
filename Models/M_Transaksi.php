<?php

include_once 'M_Connect.php';

class M_Transaksi{
    public function SHOW_TRANSAKSI($id = null)
    {
        $conn = new M_Connect();
        $sql = "SELECT 
                    transaksi.*, 
                    users.username, 
                    buku.judul, 
                    buku.kategori 
                FROM transaksi
                JOIN users ON transaksi.id_user = users.id
                JOIN buku ON transaksi.id_buku = buku.id";
        // biar menampilkan transaksi user tertentu aja kalau $id dikasih nilai, kalo gak ya tampil semua
        if($id != null){
            $sql .= " WHERE transaksi.id_user = '$id'"; 
        }
        // Urutkan dari transaksi berdasarkan user
        $sql .= " ORDER BY transaksi.id DESC";
        $post = mysqli_query($conn->connect, $sql);
        $result = []; 

        if($post->num_rows > 0){
            while ($data = mysqli_fetch_object($post)){
                $result[] = $data;
            }
        }
        return $result;
    }
    public function COUNT_TRANSAKSI($id_user = null)
    {
        $conn = new M_Connect();
        $sql = "SELECT COUNT(*) as total FROM transaksi WHERE status IN ('tunggu', 'dipinjam')";

        // Jika id_user diisi, tambahkan filter WHERE
        if ($id_user !== null) {
            $sql .= " AND id_user = '$id_user'";
        }

        $post = mysqli_query($conn->connect, $sql);
        $data = mysqli_fetch_object($post);

        return $data;
    }
    public function SHOW_TRANSAKSI_BY_ID($id)
    {
        $conn = new M_Connect();
        $sql = "SELECT * FROM transaksi WHERE id = $id";
        $post = mysqli_query($conn->connect, $sql);

        return mysqli_fetch_object($post);
    }

    public function ADD_PINJAM($id_user, $id_buku) 
    {
        $conn = new M_Connect();
        $tgl_pinjam = date('Y-m-d');

        // Kita tidak langsung kurangi stok di sini, 
        // karena stok baru berkurang saat buku benar-benar diambil/di-acc Admin.
        $sql_transaksi = "INSERT INTO transaksi (id_user, id_buku, tgl_pinjam, status) VALUES ('$id_user', '$id_buku', '$tgl_pinjam', 'tunggu')"; // Status awal: tunggu
        
        return mysqli_query($conn->connect, $sql_transaksi);
    }

    public function DELETE_TRANSAKSI($id){
        $conn = new M_Connect();
        // masukin data ke tabel transaksi:
        $sql = "DELETE FROM transaksi WHERE id = $id";
        
        mysqli_query($conn->connect, $sql);
        header("location:../Views/V_Transaksi.php");
    }

    public function ACC_PINJAMAN($id_transaksi)
    {
        $conn = new M_Connect();
        mysqli_begin_transaction($conn->connect);

        try {
            // 1. Ambil id_buku
            $res = mysqli_query($conn->connect, "SELECT id_buku FROM transaksi WHERE id = '$id_transaksi'");
            $data = mysqli_fetch_object($res);
            $id_buku = $data->id_buku;

            // 2. Cek stok buku fisik masih ada atau gak
            $cek_stok = mysqli_query($conn->connect, "SELECT stok FROM buku WHERE id = '$id_buku'");
            $b = mysqli_fetch_object($cek_stok);

            if($b->stok > 0) {
                // 3. Update status jadi 'diambil' (atau 'dipinjam')
                mysqli_query($conn->connect, "UPDATE transaksi SET status = 'dipinjam' WHERE id = '$id_transaksi'");
                // 4. Baru kurangi stok di sini
                mysqli_query($conn->connect, "UPDATE buku SET stok = stok - 1 WHERE id = '$id_buku'");
                
                mysqli_commit($conn->connect);
                return true;
            } else {
                return false; // Stok tiba-tiba habis
            }
        } catch (Exception $e) {
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