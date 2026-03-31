<?php
    include_once 'HEADER.php';
    include_once '../Controllers/C_Transaksi.php';
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <div class="bg-success py-5 text-center position-relative">
                    <div class="bg-white d-inline-block p-2 rounded-circle shadow-sm" style="margin-bottom: -70px;">
                        <i class="fas fa-user-circle fa-5x text-success"></i>
                    </div>
                </div>

                <div class="card-body text-center pt-5 mt-3">
                    <h2 class="fw-bold mb-1">
                        <?= $_SESSION['user']; ?><span class="text-muted fs-6">#<?= $_SESSION['id_user']; ?></span>
                    </h2>
                    
                    <div class="mb-3">
                        <span class="badge rounded-pill p-2 px-3 <?= $_SESSION['role'] == 'admin' ? 'bg-success' : 'bg-primary' ?>">
                            <?= strtoupper($_SESSION['role']); ?>
                        </span>
                    </div>

                    <div class="d-grid px-4 mb-3">
                        <button class="btn btn-outline-secondary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#editForm">
                            <i class="fas fa-edit me-1"></i> Edit Akun
                        </button>
                    </div>

                    <div class="collapse px-4 mb-4" id="editForm">
                        <div class="card card-body bg-light border-0 text-start">
                            <form action="../Controllers/C_User.php?aksi=update" method="POST">
                                <input type="hidden" name="id" value="<?= $_SESSION['id_user']; ?>">
                                <input type="hidden" name="role" value="<?= $_SESSION['role']; ?>">
                                
                                <div class="mb-2">
                                    <label class="small fw-bold">Username</label>
                                    <input type="text" placeholder="Masukkan username baru" name="username" class="form-control form-control-sm" value="<?= $_SESSION['user']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="small fw-bold">Password Baru</label>
                                    <input type="password" name="password" class="form-control form-control-sm" placeholder="Masukkan Password baru">
                                </div>
                                <button type="submit" class="btn btn-success btn-sm w-100 fw-bold">Update Data</button>
                            </form>
                        </div>
                    </div>

                    <hr class="mx-4">

                    <div class="mb-4">
                        <p class="text-muted small mb-0">Transaksi saat ini</p>
                        <h4 class="fw-bold text-success"><?= isset($totalTransaksi->total) ? $totalTransaksi->total : 0; ?></h4> 
                    </div>

                    <div class="d-grid px-4 pb-3">
                        <a href="../Controllers/C_User.php?aksi=logout" class="btn btn-danger fw-bold rounded-3 py-2" onclick="return confirm('Yakin ingin keluar?');">
                            <i class="fas fa-sign-out-alt me-2"></i> Keluar
                        </a>
                    </div>
                </div>
            </div>
            <p class="text-center mt-4 text-muted small">Greentea Library &bull; v2.0</p>
        </div>
    </div>
</div>

<?php include_once 'FOOTER.php'; ?>