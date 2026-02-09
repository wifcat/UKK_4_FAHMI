<?php
	include_once '../Controllers/C_Buku.php'; 
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

<div class="row g-4 mb-4">
    <div class="col-12 col-md-4">
        <div class="card border-0 shadow-sm rounded-4 p-3 card-hover transition-all">
            <div class="d-flex align-items-center gap-3">
                <div class="bg-success bg-opacity-10 p-3 rounded-3">
                    <i class="fas fa-book fa-2x text-success"></i>
                </div>
                <div>
                	<h6 class="text-muted mb-0 small uppercase fw-bold">Total Buku</h6>
                    <h3 class="fw-bold mb-0">Total</h3> 
				</div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="card border-0 shadow-sm rounded-4 p-3 card-hover transition-all">
            <div class="d-flex align-items-center gap-3">
                <div class="bg-primary bg-opacity-10 p-3 rounded-3">
                    <i class="fas fa-users fa-2x text-primary"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0 small uppercase fw-bold">Anggota Aktif</h6>
                    <h3 class="fw-bold mb-0">Total</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="card border-0 shadow-sm rounded-4 p-3 card-hover transition-all">
            <div class="d-flex align-items-center gap-3">
                <div class="bg-warning bg-opacity-10 p-3 rounded-3">
                    <i class="fas fa-bookmark fa-2x text-warning"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0 small uppercase fw-bold">Pinjaman Aktif</h6>
                    <h3 class="fw-bold mb-0">Total</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="bg-white p-4 rounded-4 shadow-sm h-100">
            <h5 class="fw-bold mb-4">Aksi Cepat</h5>
            <div class="row g-3">
                <div class="col-6 col-md-3 text-center">
                    <a href="V_Buku.php" class="text-decoration-none text-dark">
                        <div class="p-3 rounded-4 border bg-light mb-2 hover-tea">
                            <i class="fas fa-plus-circle fa-2x text-success"></i>
                        </div>
                        <small class="fw-medium">Tambah Buku</small>
                    </a>
                </div>
                <div class="col-6 col-md-3 text-center">
                    <a href="V_Transaksi.php" class="text-decoration-none text-dark">
                        <div class="p-3 rounded-4 border bg-light mb-2 hover-tea">
                            <i class="fas fa-exchange-alt fa-2x text-primary"></i>
                        </div>
                        <small class="fw-medium">Pinjam Buku</small>
                    </a>
                </div>
                <div class="col-6 col-md-3 text-center">
                    <a href="V_User.php" class="text-decoration-none text-dark">
                        <div class="p-3 rounded-4 border bg-light mb-2 hover-tea">
                            <i class="fas fa-user-plus fa-2x text-info"></i>
                        </div>
                        <small class="fw-medium">User Baru</small>
                    </a>
                </div>
                <div class="col-6 col-md-3 text-center">
                    <a href="#" class="text-decoration-none text-dark">
                        <div class="p-3 rounded-4 border bg-light mb-2 hover-tea">
                            <i class="fas fa-file fa-2x text-danger"></i>
                        </div>
                        <small class="fw-medium">Laporan</small>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="bg-white p-4 rounded-4 shadow-sm h-100">
            <h5 class="fw-bold mb-4">Informasi Sistem</h5>
            <div class="d-flex align-items-center mb-3">
                <div class="badge bg-success p-2 me-3"><i class="fas fa-check"></i></div>
                <div>
                    <p class="mb-0 fw-medium small">Database Connected</p>
                    <small class="text-muted">Status sistem normal</small>
                </div>
            </div>
            
            <div class="d-flex align-items-center">
                <div class="badge bg-info p-2 me-3"><i class="fas fa-sync"></i></div>
                <div>
                    <p class="mb-0 fw-medium small">Versi Aplikasi</p>
                    <small class="text-muted">Greentea v2.0 (Stable)</small>
                </div>
            </div>
            
            <hr class="my-4 opacity-50">
            <div>
				<a href="about-me.php"><small> <i class="fas fa-user me-2"></i> About Dev</small></a>
			</div>
        </div>
    </div>
</div>
<?php include_once 'FOOTER.php'; ?>
	