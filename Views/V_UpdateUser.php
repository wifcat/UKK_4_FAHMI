<?php
    include_once '../Controllers/C_User.php';
    include_once 'HEADER.php';
	include_once '../Config/authck.php';
    use App\Authck\Auth;

    Auth::adminOnly();
?>
<form action="../Controllers/C_User.php?aksi=update" method="post">
    <div class="bg-white rounded-4 shadow-sm p-4">
	    <h5 class="text-center">Update User</h5>
	    <br>
		<input type="number" name="id" class="form-control" value="<?=$users->id?>"hidden>
		<input type="text" name="username" placeholder="Nama User" value="<?=$users->username?>" class="form-control"> <br>
		<select name="role" class="form-control">
			<option value="">Pilih Role</option>
			<?php foreach($roles as $r){?>
				<option value="<?= $r ?>" <?=$users->role == $r ? 'selected' : '' ?>>
					<?= $r ?>
				</option>
			<?php } ?>
		</select> <br>
		<button type="submit" class="btn btn-success" name="update" value="kirim">Simpan</button>
    </div>
</form>

<div class="text-center mt-4">
    <a href="../Views/V_User.php" class="btn btn-link text-success text-decoration-none fw-medium">
        <i class="fas fa-arrow-left me-2"></i> Kembali
    </a>
</div>
	
<?php include_once 'FOOTER.php'; ?>