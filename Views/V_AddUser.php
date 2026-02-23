<?php
    include_once '../Controllers/C_User.php';
    include_once 'HEADER.php';
    include '../Config/adminOnly.php';
?>

<form action="../Controllers/C_User.php?aksi=tambah" method="post">
    <div class="bg-white rounded-4 shadow-sm p-4">
	    <h5 class="text-center">Tambah User</h1>
	    <br>
        <input type="number" name="id" class="form-control" hidden>
	    <input type="text" name="username" placeholder="Username" class="form-control" required> <br>
		<input type="password" name="password" placeholder="Password" class="form-control" required> <br>
        <input type="text" name="role" placeholder="Role" class="form-control" value="user" hidden>
		<button type="submit" class="btn btn-success" name="tambah" value="kirim">Tambah</button>
    </div>
</form>

<div class="text-center mt-4">
    <a href="V_User.php" class="btn btn-link text-success text-decoration-none fw-medium">
        <i class="fas fa-arrow-left me-2"></i> Kembali
    </a>
</div>

<?php include_once 'FOOTER.php'; ?>