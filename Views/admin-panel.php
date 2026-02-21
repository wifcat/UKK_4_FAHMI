<?php
    include_once 'HEADER.php';
    include '../Config/adminOnly.php';
    include_once '../Controllers/C_Buku.php'; 
    include_once '../Controllers/C_User.php';
?>

    <div class="row mb-4">
        <div class="col-12">
            <div class="p-4 rounded-4 shadow-sm text-white d-flex align-items-center justify-content-between"
                style="background: linear-gradient(135deg, #1f2937, #111827);">
                <div>
                    <h3 class="fw-bold mb-1">Admin Control Panel</h3>
                    <p class="mb-0 opacity-75">Kelola sistem perpustakaan dengan kontrol penuh.</p>
                </div>
                <div class="d-none d-md-block">
                    <i class="fas fa-shield-alt fa-3x opacity-25"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-3">
                        <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                    <div>
                        <small class="text-muted fw-bold">TOTAL ANGGOTA</small>
                        <h3 class="fw-bold mb-0"><?= $totalUser->total ?></h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-success bg-opacity-10 p-3 rounded-3">
                        <i class="fas fa-book fa-2x text-success"></i>
                    </div>
                    <div>
                        <small class="text-muted fw-bold">TOTAL BUKU</small>
                        <h3 class="fw-bold mb-0"><?= $totalBuku->total ?></h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-warning bg-opacity-10 p-3 rounded-3">
                        <i class="fas fa-exchange-alt fa-2x text-warning"></i>
                    </div>
                    <div>
                        <small class="text-muted fw-bold">TRANSAKSI AKTIF</small>
                        <h3 class="fw-bold">78</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-4">
            <a href="V_User.php" class="text-decoration-none">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center hover-shadow">
                    <div class="bg-primary bg-opacity-10 p-4 rounded-3 d-inline-block mb-3">
                        <i class="fas fa-users-cog fa-3x text-primary"></i>
                    </div>
                    <h5 class="fw-bold text-dark">Kelola Anggota</h5>
                    <p class="text-muted small mb-0">Tambah, edit, dan hapus data anggota perpustakaan.</p>
                </div>
            </a>
        </div>

        <div class="col-lg-4">
            <a href="V_Buku.php" class="text-decoration-none">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center hover-shadow">
                    <div class="bg-success bg-opacity-10 p-4 rounded-3 d-inline-block mb-3">
                        <i class="fas fa-book-open fa-3x text-success"></i>
                    </div>
                    <h5 class="fw-bold text-dark">Kelola Buku</h5>
                    <p class="text-muted small mb-0">Manajemen koleksi buku perpustakaan.</p>
                </div>
            </a>
        </div>

        <div class="col-lg-4">
            <a href="V_Transaksi.php" class="text-decoration-none">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center hover-shadow">
                    <div class="bg-warning bg-opacity-10 p-4 rounded-3 d-inline-block mb-3">
                        <i class="fas fa-exchange-alt fa-3x text-warning"></i>
                    </div>
                    <h5 class="fw-bold text-dark">Kelola Transaksi</h5>
                    <p class="text-muted small mb-0">Kelola peminjaman dan pengembalian buku.</p>
                </div>
            </a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="bg-white p-4 rounded-4 shadow-sm">
                <h6 class="fw-bold mb-3">Informasi Sistem</h6>
                <div class="d-flex align-items-center">
                    <div class="bg-dark text-white p-2 rounded me-3">
                        <i class="fas fa-server"></i>
                    </div>
                    <div>
                        <small class="fw-bold">Admin Panel Version</small><br>
                        <small class="text-muted">Library System v1.0 Stable</small> <br>
                        <small class="text-muted"><a href="about-me.php" class="text-decoration-none">About Dev</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    include_once 'FOOTER.php';
?>