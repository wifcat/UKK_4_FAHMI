<?php
    include_once '../Controllers/C_User.php';
    include_once 'HEADER.php';
    include '../Config/adminOnly.php';
?>

<div class="row mb-4">
    <div class="col-12">
        <div class="p-4 rounded-4 shadow-sm text-white d-flex align-items-center justify-content-between" style="background: linear-gradient(135deg, #1f2937, #111827);">
            <div>
                <h3 class="fw-bold mb-1">KELOLA TRANSAKSI</h3>
                <p class="mb-0 opacity-75">Kelola data transaksi peminjaman dan pengembalian buku.</p>
            </div>
            <div class="d-none d-md-block">
                <i class="fas fa-exchange-alt fa-3x opacity-25"></i>
            </div>
        </div>
    </div>
</div>

<div class="col-12 col-md-4">
    <div class="card border-0 shadow-sm rounded-4 p-3 card-hover transition-all">
        <div class="d-flex align-items-center gap-3">
            <div class="bg-primary bg-opacity-10 p-3 rounded-3">
                <i class="fas fa-exchange-alt fa-2x text-primary"></i>
            </div>
            <div>
                <h6 class="text-muted mb-0 small uppercase fw-bold">Total Pinjaman</h6>
                <h3 class="fw-bold mb-0">total</h3>
            </div>
        </div>
    </div>
</div> <br>

<?php include_once 'FOOTER.php'; ?>