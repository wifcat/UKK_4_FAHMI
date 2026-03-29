<?php
    include_once '../Controllers/C_Transaksi.php'; 
    include_once 'HEADER.php';
    include '../Config/adminOnly.php';
?>

<div class="row mb-4">
    <div class="col-12">
        <div class="row mb-4">
            <div class="col-12">
                <div class="p-4 rounded-4 shadow-sm text-white d-flex align-items-center justify-content-between"
                    style="background: linear-gradient(135deg, #1f2937, #111827);">
                    <div>
                        <h3 class="fw-bold mb-1">KELOLA TRANSAKSI</h3>
                        <p class="mb-0 opacity-75">Manajemen transaksi peminjaman dan pengembalian buku.</p>
                    </div>
                    <div class="d-none d-md-block">
                        <i class="fas fa-exchange-alt fa-3x opacity-25"></i>
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
                        <h3 class="fw-bold">Total: <?= $totalTransaksi->total ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="px-4 py-3">Buku</th>
                        <th class="py-3">Peminjam</th>
                        <th class="py-3">Tgl Pinjam</th>
                        <th class="py-3">Tgl Kembali</th>
                        <th class="py-3">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($trans)) : ?>
                    <?php foreach ($trans as $tr) : ?>
                        <tr>
                            <td class="px-4">
                                <div class="fw-bold"><?= $tr->judul ?></div>
                                <small class="text-muted"><?= $tr->kategori ?></small>
                            </td>
                            
                            <td><?= $tr->username ?></td>
                            <td><?= date('d M Y', strtotime($tr->tgl_pinjam)) ?></td>
                            
                            <td>
                                <?= ($tr->tgl_kembali) ? date('d M Y', strtotime($tr->tgl_kembali)) : '<span class="text-muted">-</span>' ?>
                            </td>

                            <td>
                                <?php if($tr->status == 'tunggu'): ?>
                                    <span class="badge bg-warning text-dark">Menunggu Verifikasi</span>
                                <?php elseif($tr->status == 'dipinjam'): ?>
                                    <span class="badge bg-success text-white">Sedang Dipinjam</span>
                                <?php elseif($tr->status == 'kembali'): ?>
                                    <span class="badge bg-secondary">Sudah Dikembalikan</span>
                                <?php endif; ?>
                            </td>

                            <td class="px-4 text-center">
                                <?php if ($_SESSION['role'] == 'admin') : ?>
                                    <?php if ($tr->status == 'tunggu') : ?>
                                        <a href="../Controllers/C_Transaksi.php?aksi=acc&id=<?= $tr->id ?>" class="btn btn-primary btn-sm rounded-pill px-3">
                                            <i class="fas fa-check me-1"></i> Konfirmasi
                                        </a>
                                        <a href="../Controllers/C_Transaksi.php?aksi=hapus&id=<?= $tr->id ?>" class="btn btn-danger btn-sm rounded-pill px-3" onclick="return confirm('Apakah Anda yakin ingin menolak transaksi ini?')">
                                            <i class="fas fa-x me-1"></i> Tolak
                                        </a>
                                    <?php elseif ($tr->status == 'dipinjam') : ?>
                                        <a href="../Controllers/C_Transaksi.php?aksi=kembali&id=<?= $tr->id ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3" onclick="return confirm('Buku sudah diterima kembali?')">
                                            <i class="fas fa-undo me-1"></i> Kembalikan
                                        </a>
                                    <?php else : ?>
                                        <button class="btn btn-light btn-sm rounded-pill px-3" disabled>Selesai</button>
                                        <a href="../Controllers/C_Transaksi.php?aksi=hapus&id=<?= $tr->id ?>" class="btn btn-danger btn-sm rounded-pill px-3" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">
                                            <i class="fas fa-trash me-1"></i> Hapus
                                        </a>
                                    <?php endif; ?>

                                <?php else : ?>
                                    <?php if ($tr->status == 'tunggu') : ?>
                                        <small class="text-muted">Mohon tunggu admin</small>
                                    <?php elseif ($tr->status == 'dipinjam') : ?>
                                        <span class="text-success small fw-bold">Silahkan ambil buku fisik</span>
                                    <?php else : ?>
                                        <i class="fas fa-check-circle text-success"></i>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">Tidak ada data transaksi</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once 'FOOTER.php'; ?>