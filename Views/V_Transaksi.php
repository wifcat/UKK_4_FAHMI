<?php
    include_once '../Controllers/C_Transaksi.php'; 
    include_once 'HEADER.php';
    include_once '../Config/authck.php';
    use App\Authck\Auth;

    Auth::adminOnly();
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
                        <th class="py-3">Tanggal Pinjam</th>
                        <th class="py-3">Tanggal Kembali</th>
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
                                <?php elseif($tr->status == 'tolak'): ?>
                                    <span class="badge bg-danger">Transaksi Ditolak</span>
                                <?php endif; ?>
                            </td>

                            <td class="px-4 text-center">
                                <div class="d-flex justify-content-center gap-1"> <?php if ($_SESSION['role'] == 'admin') : ?>
                                        
                                        <?php if ($tr->status == 'tunggu') : ?>
                                            <div class="btn-group shadow-sm" role="group">
                                                <a href="../Controllers/C_Transaksi.php?aksi=acc&id=<?= $tr->id ?>" class="btn btn-primary btn-sm px-3">
                                                    <i class="fas fa-check"></i> <span class="d-none d-md-inline">Konfirmasi</span>
                                                </a>
                                                <a href="../Controllers/C_Transaksi.php?aksi=tolak&id=<?= $tr->id ?>" class="btn btn-danger btn-sm px-3" onclick="return confirm('Apakah Anda yakin?')">
                                                    <i class="fas fa-times"></i> <span class="d-none d-md-inline">Tolak</span>
                                                </a>
                                            </div>

                                        <?php elseif ($tr->status == 'dipinjam') : ?>
                                            <a href="../Controllers/C_Transaksi.php?aksi=kembali&id=<?= $tr->id ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3" onclick="return confirm('Buku sudah diterima kembali?')">
                                                <i class="fas fa-undo me-1"></i> Kembalikan
                                            </a>

                                        <?php elseif ($tr->status == 'tolak') : ?>
                                            <div class="btn-group shadow-sm" role="group">
                                                <button class="btn btn-light btn-sm disabled border">
                                                    <?= ($tr->status == 'tolak') ? 'Ditolak' : 'Selesai' ?>
                                                </button>
                                                <a href="../Controllers/C_Transaksi.php?aksi=hapus&id=<?= $tr->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus transaksi ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        <?php else : ?>
                                            <a href="../Controllers/C_Transaksi.php?aksi=hapus&id=<?= $tr->id ?>" class="btn btn-danger btn-sm rounded-pill px-3" onclick="return confirm('Hapus transaksi ini?')">
                                                <i class="fas fa-trash"></i> hapus
                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
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