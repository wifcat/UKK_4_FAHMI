<?php
    include_once '../Controllers/C_Buku.php';
    include_once 'HEADER.php';
?>
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
    <br>
    <div class="bg-white rounded-4 shadow-sm p-4">
		
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-semibold mb-0">Daftar Buku</h5>
            <a href="V_AddBuku.php" class="btn btn-success btn-sm">
                <i class="fas fa-plus me-1"></i> Tambah
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="text-secondary small text-uppercase">
                    <tr>
                        <th scope="col" class="ps-3">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Kategori</th>
                        <th scope="col" class="text-center">Stok</th>
                        <th scope="col" class="text-end pe-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach($bukus as $data){
                    ?>
                        <tr>
                            <td class="ps-3 text-muted">
                                <?= $no++ ?>
                            </td>
                            <td class="fw-medium">
                                <?= $data->judul ?>
                            </td>
                            <td>
                                <span class="text-muted small"><?= $data->kategori ?></span>
                            </td>
                            <td class="text-center">
                                <span class="badge rounded-pill bg-success bg-opacity-10 text-success border border-success border-opacity-25">
                                    <?= $data->stok ?>
                                </span>
                            </td>
                            <td class="text-end pe-3">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="V_UpdateBuku.php?aksi=update&id=<?=$data->id ?>" class="btn btn-sm btn-light border text-primary" title="Update">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="../Controllers/C_Buku.php?aksi=hapus&id=<?= $data->id ?>" class="btn btn-sm btn-light border text-danger" onclick="return confirm('Hapus buku <?= $data->judul ?>?')" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php include_once 'FOOTER.php'; ?>
