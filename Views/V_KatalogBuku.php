<?php
    include_once '../Controllers/C_Buku.php';
    include_once 'HEADER.php';
?>
    <div class="row mb-4">
        <div class="col-12">
            <div class="p-5 rounded-4 shadow-sm text-white d-flex align-items-center justify-content-between" style="background: linear-gradient(135deg, var(--green-tea), var(--green-tea-dark));">
                <div>
                    <h2 class="fw-bold mb-2">Katalog Buku</h2>
                    <p class="mb-0 opacity-75">Pilih buku yang ingin kamu pinjam hari ini!</p>
                </div>
                <div class="d-none d-md-block">
                    <i class="fas fa-book fa-4x opacity-25"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <?php 
            if(!empty($bukus)){
                foreach ($bukus as $data){ ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm border-0 rounded-4 card-book-hover transition-all">
                    
                    <div class="card-body d-flex flex-column pt-3">
                        <span class="text-uppercase text-success fw-bold mb-1" style="font-size: 10px; letter-spacing: 1px;">
                            <?= $data->kategori ?>
                        </span>

                        <h6 class="card-title fw-bold mb-3 text-dark">
                            <?= $data->judul ?>
                        </h6>

                        <div class="mt-auto mb-3 d-flex justify-content-between align-items-center">
                            <div class="small">
                                <i class="fas fa-boxes text-muted me-1"></i>
                                <span class="text-muted">Stok: <?= $data->stok ?></span>
                            </div>
                            <?php if ($data->stok > 0) : ?>
                                <span class="badge rounded-pill bg-success bg-opacity-10 text-success small">Tersedia</span>
                            <?php else : ?>
                                <span class="badge rounded-pill bg-danger bg-opacity-10 text-danger small">Habis</span>
                            <?php endif; ?>
                        </div>

                        <a href="../Controllers/C_Transaksi.php?aksi=pinjam&id_buku=<?= $data->id ?>" class="btn <?= $data->stok > 0 ? 'btn-success' : 'btn-secondary disabled' ?> w-100 rounded-3 shadow-sm py-2">
                            <i class="fas fa-hand-holding-heart me-2"></i>Pinjam
                        </a>
                    </div>
                </div>
            </div>
        <?php }}else{
            echo '<p class="text-center text-muted">Buku sedang kosong!</p>';
        } ?>
    </div>

<?php include_once 'FOOTER.php'; ?>
