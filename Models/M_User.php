<?php

include_once 'M_Connect.php';
$roles = ['Admin', 'User'];
class M_User{
    public function SHOW_USERS(){
        // buat objek dari class M_Connect:
        $conn = new M_Connect();
        // Query untuk menampilkan sebuah data dari tabel users:
        $sql = "SELECT * FROM users";
        $post = mysqli_query($conn->connect, $sql);
        // mengecek apakah variabel di atas ada datanya atau tidak:
        if($post->num_rows > 0){
            while ($data = mysqli_fetch_object($post)){
                $result[] = $data; // menyimpan data kedalam variabel $result menjadi bentuk objek
            }
            return $result;
        }
    }
    public function ADD_USERS($id_user, $username, $password, $role){
        // buat objek dari class M_Connect:
        $conn = new M_Connect();
        // masukin data ke tabel users:
        $sql = "INSERT INTO users VALUES(null, '$username', '$password', '$role')";
        $post = mysqli_query($conn->connect, $sql);
        
        // buat simpel pengkondisian dimana JIKA $post berhasil:
        if($post){
            echo "
            <script>
                alert('Data berhasil ditambahkan'); 
                window.location='../Views/V_User.php'
            </script>";
        }else{ // atau tidak:
            echo "
            <script>
                alert('Gagal'); 
                window.location='../Views/V_AddUser.php'
            </script>";
        }
    }
    public function UPDATE_USERS($id_user, $username, $password, $role){
        $conn = new M_Connect();
        // masukin data ke tabel users:
        $sql = "UPDATE users SET username = '$username', password = '$password', role = '$role' WHERE id_user = $id_user";
        $post = mysqli_query($conn->connect, $sql);
        
        if($post){
            echo "
            <script>
                alert('Data berhasil dimodifikasi.'); 
                window.location='../Views/V_User.php'
            </script>";
        }else{ // atau tidak:
            echo "
            <script>
                alert('Gagal'); 
                window.location='../Views/V_AddUser.php'
            </script>";
        }
        
    }
    public function SHOW_USER_BY_ID($id_user)
    {
        $conn = new M_Connect();
        $sql = "SELECT * FROM users WHERE id_user = $id_user";
        $post = mysqli_query($conn->connect, $sql);

        return mysqli_fetch_object($post);
    }
    public function DELETE_USERS($id_user){
        $conn = new M_Connect();
        // masukin data ke tabel users:
        $sql = "DELETE FROM users WHERE id_user = $id_user";
        
        mysqli_query($conn->connect, $sql);
        header("location:../Views/V_User.php");
    }
}