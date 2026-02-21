<?php
include_once '../Config/auth.php';
include_once '../Models/M_Transaksi.php';

$tran = new M_Transaksi();

try {
    if (!empty($_GET['aksi'])) {
        
        // --- AKSI PINJAM ---
        if ($_GET['aksi'] == 'pinjam') {
            $id_user = $_SESSION['id_user']; 
            $id_buku = $_GET['id_buku'];

            // Panggil fungsi tambah pinjaman (yang sudah kita buat sebelumnya)
            $simpan = $tran->ADD_PINJAM($id_user, $id_buku);

            if ($simpan) {
                echo "<script>
                    alert('Buku Berhasil Dipinjam!'); 
                    window.location='../Views/Transaksi.php';
                </script>";
            } else {
                echo "<script>alert('Gagal Pinjam! Stok Habis atau Sistem Error'); window.location='../Views/V_KatalogBuku.php';</script>";
            }
        }

        // --- AKSI KEMBALI ---
        elseif ($_GET['aksi'] == 'kembali') {
            $id_transaksi = $_GET['id'];
            
            // Nanti kita buat fungsi KEMBALIKAN_BUKU di Model
            $update = $tran->KEMBALIKAN_BUKU($id_transaksi);

            if ($update) {
                echo "
                <script>
                    alert('Buku Telah Dikembalikan!'); 
                    window.location='../Views/Transaksi.php';
                </script>";
            }
        }

    } else {
        $trans = $tran->SHOW_TRANSAKSI();
        include_once '../Views/Transaksi.php';
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}