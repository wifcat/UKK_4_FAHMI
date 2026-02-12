<?php
include_once 'M_Connect.php';
$kategoris = [
    "Matematika",
    "Bahasa Indonesia",
    "Bahasa Inggris",
    "Pendidikan Agama Islam",
    "Bahasa Sunda",
    "Sejarah",
    "Pendidikan Pancasila",
    "Wirausaha",
    "Akutansi"
];

class M_Buku{

    public function SHOW_BUKU()
    {
        // buat objek dari class M_Connect:
        $conn = new M_Connect();

        // Query untuk menampilkan sebuah data dari tabel buku:
        $sql = 'SELECT * FROM buku';

        $post = mysqli_query($conn->connect, $sql);
        // mengecek apakah variabel di atas ada datanya atau tidak:
        if($post->num_rows > 0){
            while ($data = mysqli_fetch_object($post)){
                $result[] = $data; // menyimpan data kedalam variabel $result menjadi bentuk objek
            }
            return $result;
        }
    }

    public function ADD_BUKU($id_buku, $judul, $kategori, $stok)
    {
	    // buat objek dari class M_Connect:
	    $conn = new M_Connect();
	    // masukin data ke tabel buku:
	    $sql = "INSERT INTO buku VALUES(null, '$judul', '$kategori', $stok)";
	    $post = mysqli_query($conn->connect, $sql);
	    
	    // buat simpel pengkondisian dimana JIKA $post berhasil:
	    if($post){
	        echo "
	        <script>
	            alert('Data berhasil ditambahkan'); 
	            window.location='../Views/V_Buku.php'
	        </script>";
	    }else{ // atau tidak:
	        echo "
	        <script>
	            alert('Gagal'); 
	            window.location='../Views/V_AddBuku.php'
	        </script>";
	    }
	}

	public function UPDATE_BUKU($id_buku, $judul, $kategori, $stok)
    {
        $conn = new M_Connect();
        $sql = "UPDATE buku SET judul = '$judul', kategori = '$kategori', stok = $stok WHERE id_buku = $id_buku";
        $post = mysqli_query($conn->connect, $sql);
        
        if($post){
            echo "
            <script>
                alert('Data berhasil dimodifikasi.'); 
                window.location='../Views/V_Buku.php'
            </script>";
        }else{
            echo "
            <script>
                alert('Gagal'); 
                window.location='../Views/V_UpdateBuku.php'
            </script>";
        }
    }

    public function DELETE_BUKU($id_buku)
    {
        $conn = new M_Connect();
        $sql = "DELETE FROM buku WHERE id_buku = $id_buku";
        
        mysqli_query($conn->connect, $sql);
        header("location:../Views/V_Buku.php");
    }

    public function SHOW_BUKU_BY_ID($id_buku)
    {
        $conn = new M_Connect();
        $sql = "SELECT * FROM buku WHERE id_buku = $id_buku";
        $post = mysqli_query($conn->connect, $sql);

        return mysqli_fetch_object($post);
    }

    public function COUNT_BUKU()
    {
        $conn = new M_Connect();
        $sql = "SELECT COUNT(*) as total FROM buku";
        $post = mysqli_query($conn->connect, $sql);
        $data = mysqli_fetch_object($post);

        return $data;
    }
}