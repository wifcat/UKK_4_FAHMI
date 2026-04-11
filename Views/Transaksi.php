<?php
    include_once '../Controllers/C_Transaksi.php'; 
    include_once 'HEADER.php';
    // include_once '../Controllers/C_User.php'
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
                        <th class="py-3">Tanggal Pinjam</th>
                        <th class="py-3">Tanggal Kembali</th>
                        <th class="py-3">Status</th>
                        <th class="px-4 py-3 text-center">Info</th>
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
                                <?php elseif($tr->status == 'tolak'): ?>
                                    <span class="badge bg-danger">Transaksi Ditolak</span>
                                <?php endif; ?>
                            </td>

                            <td class="px-4 text-center">
                                <?php if ($tr->status == 'tunggu') : ?>
                                    <small class="text-muted">Mohon tunggu konfirmasi Admin</small>
                                <?php elseif ($tr->status == 'dipinjam') : ?>
                                    <div class="text-success small fw-bold">
                                        <i class="fas fa-store me-1"></i> Silahkan ambil buku fisik di Perpustakaan
                                    </div>
                                <?php elseif($tr->status == 'tolak') : ?>
                                    <span class="text-muted small">
                                        <i class="fas fa-times-circle text-danger me-1"></i> Transaksi Ditolak
                                    </span>
                                <?php else : ?>
                                    <span class="text-muted small">
                                        <i class="fas fa-check-circle text-success me-1"></i> Transaksi Selesai
                                    </span>
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