<?php
include_once '../Config/authck.php';
include_once '../Models/M_Transaksi.php';

use App\Authck\Auth;

Auth::guard();

$tran = new M_Transaksi();

try {
    if (!empty($_GET['aksi'])) {
        
        // AKSI PINJAM 
        if ($_GET['aksi'] == 'pinjam') {
            $id_user = $_SESSION['id_user']; 
            $id_buku = $_GET['id_buku'];
            // Panggil fungsi tambah pinjaman
            $simpan = $tran->ADD_PINJAM($id_user, $id_buku);

            if ($simpan) {
                echo "
                <script>
                    alert('Buku Berhasil Dipinjam!'); 
                    window.location='../Views/Transaksi.php';
                </script>";
            } else {
                echo "
                <script>
                    alert('Gagal Pinjam! Stok Habis atau Sistem Error'); 
                    window.location='../Views/V_KatalogBuku.php';
                </script>";
            }
        }

        // AKSI KEMBALIKAN BUKU 
        elseif ($_GET['aksi'] == 'kembali') {
            $id_transaksi = $_GET['id'];
            $update = $tran->KEMBALIKAN_BUKU($id_transaksi);

            if ($update) {
                echo "
                <script>
                    alert('Buku Telah Dikembalikan!'); 
                    window.location='../Views/V_Transaksi.php';
                </script>";
            }
        }
        // AKSI ACC PINJAMAN
        elseif ($_GET['aksi'] == 'acc') {
            $id_transaksi = $_GET['id'];
            $update = $tran->ACC_PINJAMAN($id_transaksi);

            if ($update) {
                echo "
                <script>
                    alert('Pinjaman di-ACC! Buku siap diambil user.'); 
                    window.location='../Views/V_Transaksi.php';
                </script>";
            } else {
                echo "
                <script>
                    alert('Gagal ACC! Stok buku mungkin sudah habis.'); 
                    window.location='../Views/V_Transaksi.php';
                </script>";
            }
        }elseif ($_GET['aksi'] == 'hapus') {
            $id_transaksi = $_GET['id'];
            $tran->DELETE_TRANSAKSI($id_transaksi);
        }elseif ($_GET['aksi'] == 'tolak') {
            $id_transaksi = $_GET['id'];
            $tran->TOLAK_BUKU($id_transaksi);
        }
    } else {
        $role = $_SESSION['role'];
        $id_log = $_SESSION['id_user'];
        $now = basename($_SERVER['PHP_SELF']);

        if (($now == 'V_Transaksi.php' || $now == 'admin-panel.php') && $role == 'admin') {
            $totalTransaksi = $tran->COUNT_TRANSAKSI();
            $trans = $tran->SHOW_TRANSAKSI();
            $viewMode = 'admin';
        } else {
            $totalTransaksi = $tran->COUNT_TRANSAKSI($id_log);
            $trans = $tran->SHOW_TRANSAKSI($id_log); 
            $viewMode = 'user';
        }
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}