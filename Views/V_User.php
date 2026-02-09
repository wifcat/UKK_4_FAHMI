<?php
    include_once '../Controllers/C_User.php';
    include_once 'HEADER.php';
?>
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
                                <a href="V_UpdateUser.php?aksi=update&id=<?=$data->id ?>" class="btn btn-sm btn-light border text-primary" title="Update">
                                 	<i class="fas fa-edit"></i>
                                 </a>
                                <a href="../Controllers/C_User.php?aksi=hapus&id=<?= $data->id ?>" 
                                   class="btn btn-sm btn-light border text-danger" 
                                   onclick="return confirm('Hapus buku <?= $data->username ?>')" 
                                   title="Delete">
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
