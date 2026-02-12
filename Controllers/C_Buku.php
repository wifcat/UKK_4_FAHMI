<?php

include_once '../Models/M_Buku.php';

$buku = new M_Buku(); //buat objek
// error handling untuk tambah data user ke tabel users:
// CRUD (CREATE:done), (READ:done), (UPDATE:null), (DELETE:null)
try{
    // pengkondisian, jika ada aksi atau tidak:
    // NESTED CONDITIONS!
    if(!empty($_GET['aksi'])){

        if(!($_GET['aksi'] == 'hapus')){
            //menangkap isi inputan dari user (front-end)/ buat flags:
            // menangkap data dari form:
            if($_GET['aksi'] == 'edit'){
                $id = $_GET['id'];
                $bukus = $buku->SHOW_BUKU_BY_ID($id);

                include_once '../Views/V_UpdateBuku.php';
            }else{
                $id = $_POST['id'];
                $judul = $_POST['judul'];
                $kategori = $_POST['kategori'];
                $stok = $_POST['stok'];

                if($_GET['aksi'] == 'tambah'){
                    // panggil fungsi create:
                    $buku->ADD_BUKU($id, $judul, $kategori, $stok);
                // kirim data ke database:
                }elseif($_GET['aksi'] == 'update'){
                    // Panggil fungsi update:
                    $buku->UPDATE_BUKU($id, $judul, $kategori, $stok);
                }
            }

        }else{
        	// panggil fungsi delete:
        	$id = $_GET['id'];
        	$buku->DELETE_BUKU($id);
        }

    }else{ // panggil fungsi read:
        $totalBuku = $buku->COUNT_BUKU();
        $bukus = $buku->SHOW_BUKU(); // panggil fungsi tampil data dari class M_User()
    }

}catch(Exception $e){
    echo $e->getMessage();
}