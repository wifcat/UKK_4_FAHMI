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
                $id_buku = $_GET['id_buku'];
                $bukus = $buku->SHOW_BUKU_BY_ID($id_buku);

                include_once '../Views/V_UpdateBuku.php';
            }else{
                $id_buku = $_POST['id_buku'];
                $judul = $_POST['judul'];
                $kategori = $_POST['kategori'];
                $stok = $_POST['stok'];

                if($_GET['aksi'] == 'tambah'){
                    // panggil fungsi create:
                    $buku->ADD_BUKU($id_buku, $judul, $kategori, $stok);
                // kirim data ke database:
                }elseif($_GET['aksi'] == 'update'){
                    // Panggil fungsi update:
                    $buku->UPDATE_BUKU($id_buku, $judul, $kategori, $stok);
                }
            }

        }else{
        	// panggil fungsi delete:
        	$id_buku = $_GET['id_buku'];
        	$buku->DELETE_BUKU($id_buku);
        }

    }else{ // panggil fungsi read:
        $bukus = $buku->SHOW_BUKU(); // panggil fungsi tampil data dari class M_User()
    }

}catch(Exception $e){
    echo $e->getMessage();
}