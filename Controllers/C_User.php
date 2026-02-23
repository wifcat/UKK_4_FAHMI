<?php

include_once '../Models/M_User.php';

$user = new M_User(); // buat objek $user

// error handling untuk tambah data user ke tabel users:
// CRUD (CREATE:done), (READ:done), (UPDATE:null), (DELETE:null)
try{
    // pengkondisian, jika ada aksi atau tidak:
    // NESTED CONDITIONS!
    if(!empty($_GET['aksi'])){
        // login regis logout:
        if($_GET['aksi'] == 'register'){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = 'user'; // default user

            $user->ADD_USERS(null, $username, $password, $role);
            header("Location: ../Views/V_Login.php");
        }
        elseif($_GET['aksi'] == 'login'){
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $data = $user->LOGIN_USER($username);

            if(!$data){
                die("
                    <script>
                        alert('Username tidak ditemukan!'); 
                        window.location='../Views/V_Login.php';
                    </script>
                ");
            }

            if(password_verify($password, $data->password)){
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['id_user'] = $data->id;
                $_SESSION['user'] = $data->username;
                $_SESSION['role'] = $data->role;

                header("Location: ../Views/index.php");
                exit;
            } else {
                echo "
                <script>
                    alert('Password salah!'); 
                    window.location='../Views/V_Login.php';
                </script>";
            }
        }
        elseif($_GET['aksi'] == 'logout'){
            session_start(); // restart
            session_unset(); // Kosongkan semua variabel session
            session_destroy(); // Hancurkan session-nya
            header("Cache-Control: no-cache, must-revalidate");
            header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
            header("Location: ../Views/V_Login.php");
            exit;
        }// end
        if(!($_GET['aksi'] == 'hapus')){
            //menangkap isi inputan dari user (front-end)/ buat flags:
            if($_GET['aksi'] == 'edit'){
                $id = $_GET['id'];
                $users = $user->SHOW_USER_BY_ID($id);

                include_once '../Views/V_UpdateUser.php';
            }else{
                $id = $_POST['id'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $role = $_POST['role'];

                if($_GET['aksi'] == 'tambah'){
                    // panggil objek untuk fungsi tambah dari M_User.php dengan 4 argumen di atas:
                    $user->ADD_USERS($id, $username, $password, $role);
                }elseif($_GET['aksi'] == 'update'){
                    $user->UPDATE_USERS($id, $username, $password, $role);
                }
            }
        }else{
        	$id = $_GET['id'];
        	$user->DELETE_USERS($id);
        }
    }else{ // sebaliknya:
        $totalUser = $user->COUNT_USER();
        $users = $user->SHOW_USERS(); // panggil fungsi tampil data dari class M_User()
    }
}catch(Exception $e){
    echo $e->getMessage();
}