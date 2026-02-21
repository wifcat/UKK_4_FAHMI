<?php
	include_once '../Controllers/C_Buku.php'; 
    include_once '../Controllers/C_User.php';
    include_once 'HEADER.php';
?>

<div class="row mb-4">
    <div class="col-12">
        <div class="p-5 rounded-4 shadow-sm text-white d-flex align-items-center justify-content-between" style="background: linear-gradient(135deg, var(--green-tea), var(--green-tea-dark));">
            <div>
                <h2 class="fw-bold mb-2">Selamat Datang di Greentea Library!</h2>
                <p class="mb-0 opacity-75">Kelola koleksi buku dan transaksi perpustakaan dengan lebih segar dan mudah.</p>
            </div>
            <div class="d-none d-md-block">
                <i class="fas fa-leaf fa-4x opacity-25"></i>
            </div>
        </div>
    </div>
</div>

<?php include_once 'FOOTER.php'; ?>
	