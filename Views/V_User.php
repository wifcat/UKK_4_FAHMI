<?php
    include_once '../Controllers/C_User.php';
    include_once 'HEADER.php';
    include '../Config/adminOnly.php';
?>
    <div class="row mb-4">
        <div class="col-12">
            <div class="p-4 rounded-4 shadow-sm text-white d-flex align-items-center justify-content-between" style="background: linear-gradient(135deg, #1f2937, #111827);">
                <div>
                    <h3 class="fw-bold mb-1">KELOLA ANGGOTA</h3>
                    <p class="mb-0 opacity-75">Tambah, edit, dan hapus data anggota perpustakaan.</p>
                </div>
                <div class="d-none d-md-block">
                    <i class="fas fa-users fa-3x opacity-25"></i>
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
                    <h3 class="fw-bold mb-0"><?= $totalUser->total ?></h3>
                </div>
            </div>
        </div>
    </div> <br>

    <div class="bg-white rounded-4 shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-semibold mb-0">Users</h5>
            <a href="V_AddUser.php" class="btn btn-success">
                <i class="fas fa-plus me-1"></i> Tambah
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="text-secondary small text-uppercase">
                    <tr>
                        <th scope="col" class="ps-3">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Role</th>
                        <th scope="col" class="text-end pe-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(!empty($users)){
                            $no = 1;
                            foreach($users as $data){
                    ?>
                    <tr>
                        <td class="ps-3 text-muted"><?= $no++ ?></td>
                        <td class="fw-medium">
                            <?= $data->username ?>
                        </td>
                        <td>
                            <span class="badge rounded-pill bg-success bg-opacity-10">
                                <span class="text-success"><?= $data->role ?></span>
                            </span>
                        </td>
                        <td class="text-end pe-3">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="../Controllers/C_User.php?aksi=edit&id=<?= $data->id ?>" class="btn btn-sm btn-light border text-primary" title="Update">
                                 	<i class="fas fa-edit"></i>
                                 </a>
                                <a href="../Controllers/C_User.php?aksi=hapus&id=<?= $data->id ?>" class="btn btn-sm btn-light border text-danger" onclick="return confirm('Hapus user <?= $data->username ?>?')" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php }}else{
                        echo '<p class="text-center text-muted">Data tidak tersedia</p>'; 
                    }    
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php include_once 'FOOTER.php'; ?>
