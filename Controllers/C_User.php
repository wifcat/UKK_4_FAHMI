<?php

include_once '../Models/M_User.php';

$user = new M_User(); // buat objek $user

// error handling untuk tambah data user ke tabel users:
// CRUD (CREATE:done), (READ:done), (UPDATE:null), (DELETE:null)
try{
    // pengkondisian, jika ada aksi atau tidak:
    // NESTED CONDITIONS!
    if(!empty($_GET['aksi'])){
        if(!($_GET['aksi'] == 'hapus')){
            //menangkap isi inputan dari user (front-end)/ buat flags:
            $id = $_POST['id_user'];
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $role = $_POST['role'];

            if($_GET['aksi'] == 'tambah'){
                // panggil objek untuk fungsi tambah dari M_User.php dengan 4 argumen di atas:
                $user->ADD_USERS($id, $username, $password, $role);
            }elseif($_GET['aksi'] == 'update'){
            	$user->UPDATE_USERS($id, $username, $password, $role);
            }
        }else{
        	$id = $_GET['id'];
        	$user->DELETE_USERS($id);
        }
    }else{ // sebaliknya:
        $users = $user->SHOW_USERS(); // panggil fungsi tampil data dari class M_User()
    }
}catch(Exception $e){
    echo $e->getMessage();
}