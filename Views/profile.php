<?php
    include_once 'HEADER.php';
    include_once '../Controllers/C_Transaksi.php';
?>

<style>
    .profile-card {
        background: #ffffff;
        border: none;
        border-radius: 20px;
        transition: all 0.3s ease;
    }
    .profile-header {
        background: linear-gradient(135deg, #5B9A68 0%, #388E3C 100%);
        height: 120px;
        border-radius: 20px 20px 0 0;
    }
    .profile-avatar {
        width: 120px;
        height: 120px;
        margin-top: -60px;
        background: #fff;
        padding: 5px;
        border-radius: 50%;
        display: inline-block;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    .avatar-placeholder {
        width: 100%;
        height: 100%;
        background: #F1F8E9;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #5B9A68;
        font-size: 3rem;
    }
    .badge-role {
        padding: 8px 20px;
        border-radius: 50px;
        font-weight: 500;
        letter-spacing: 1px;
        text-transform: uppercase;
        font-size: 0.75rem;
    }
    .btn-logout {
        border-radius: 12px;
        padding: 12px 30px;
        font-weight: 600;
        transition: 0.3s;
        border: none;
        background: #ff4757;
        color: white;
    }
    .btn-logout:hover {
        background: #ff6b81;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 71, 87, 0.3);
        color: white;
    }
    .stats-box {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 15px;
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card profile-card shadow-lg border-0">
                <div class="profile-header"></div>
                <div class="card-body text-center pt-0">
                    <div class="profile-avatar mb-3">
                        <div class="avatar-placeholder">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    
                    <h2 class="fw-bold mb-1" style="color: #2d3436;">
                        <?= $_SESSION['user']; ?><span class="fw-bold">#<?= $_SESSION['id_user']; ?></span>
                    </h2>
                    
                    <div class="mb-4">
                        <?php if($_SESSION['role'] == 'admin'): ?>
                            <span class="badge bg-success badge-role">Administrator</span>
                        <?php else: ?>
                            <span class="badge bg-primary badge-role">Member</span>
                        <?php endif; ?>
                    </div>

                    <div class="d-grid px-4 pb-3">
                        <h6 class="text-muted mb-1">Transaksi saat ini</h6>
                        <h4 class="fw-bold mb-0"><?php if(isset($totalTransaksi->total)) echo $totalTransaksi->total; else echo 0; ?></h4> 
                    </div>

                    <div class="d-grid px-4 pb-3">
                        <a href="../Controllers/C_User.php?aksi=logout" class="btn btn-logout">
                            <i class="fas fa-sign-out-alt me-2"></i> Keluar dari Aplikasi
                        </a>
                    </div>
                </div>
            </div>
            <p class="text-center mt-4 text-muted small">
                Greentea Library System &bull; Versi 2.0
            </p>
        </div>
    </div>
</div>

<?php include_once 'FOOTER.php'; ?>