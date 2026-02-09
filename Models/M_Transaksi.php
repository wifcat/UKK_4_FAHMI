<?php

include_once 'M_Connect.php';

class M_Transaksi{
    public function SHOW_TRANSAKSI(){
        // buat objek dari class M_Connect
        $conn = new M_Connect();

        // Query untuk menampilkan sebuah data dari tabel transaksi:
        $sql = 'SELECT * FROM transaksi';

        $post = mysqli_query($conn->connect, $sql);
        // mengecek apakah variabel di atas ada datanya atau tidak:
        if($post->num_rows > 0){
            while ($data = mysqli_fetch_object($post)){
                $result[] = $data; // menyimpan data kedalam variabel $result menjadi bentuk objek
            }
            return $result;
        }
    }
}