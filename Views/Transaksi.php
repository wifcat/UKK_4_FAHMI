<?php
    include_once '../Controllers/C_Transaksi.php'; // Ini akan otomatis menjalankan bagian 'else' di controller
    include_once 'HEADER.php';
?>

<div class="row mb-4">
    <div class="col-12">
        <div class="p-4 rounded-4 shadow-sm bg-white border-start border-success border-5">
            <h2 class="fw-bold mb-1">Riwayat Transaksi</h2>
            <p class="text-muted mb-0">Daftar buku yang kamu pinjam dan status pengembaliannya.</p>
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
                                    <?php if ($tr->status == 'dipinjam') : ?>
                                        <span class="badge rounded-pill bg-warning text-dark">Sedang Dipinjam</span>
                                    <?php else : ?>
                                        <span class="badge rounded-pill bg-success">Sudah Kembali</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 text-center">
                                    <?php if ($tr->status == 'dipinjam') : ?>
                                        <a href="../Controllers/C_Transaksi.php?aksi=kembali&id=<?= $tr->id ?>" 
                                           class="btn btn-outline-primary btn-sm rounded-pill px-3"
                                           onclick="return confirm('Apakah kamu ingin mengembalikan buku ini?')">
                                            <i class="fas fa-undo me-1"></i> Kembalikan
                                        </a>
                                    <?php else : ?>
                                        <button class="btn btn-light btn-sm rounded-pill px-3" disabled>
                                            <i class="fas fa-check me-1"></i> Selesai
                                        </button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="fas fa-history fa-3x mb-3 opacity-25"></i>
                                <p>Belum ada transaksi peminjaman.</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once 'FOOTER.php'; ?>