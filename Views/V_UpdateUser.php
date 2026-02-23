<?php
    include_once '../Controllers/C_User.php';
    include_once 'HEADER.php';
	include '../Config/adminOnly.php';
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
	
<?php include_once 'FOOTER.php'; ?>