<?php
    include_once '../Controllers/C_Buku.php';
    include_once 'HEADER.php';
	include_once '../Config/adminOnly.php';
?>

<form action="../Controllers/C_Buku.php?aksi=update" method="post">
    <div class="bg-white rounded-4 shadow-sm p-4">
	    <h5 class="text-center">Update Buku</h5>
	    <br>
		<input type="number" name="id" class="form-control" value="<?=$bukus->id?>"hidden>
		<input type="text" name="judul" placeholder="Nama Buku" value="<?=$bukus->judul?>" class="form-control"> <br>
		<select id="kategori" name="kategori" class="form-control">
			<!-- dikasih foreach biar simpel dan gak ribet, panggil $kategoris dari M_Buku.php -->
			<option value="">Pilih kategori</option>
			<?php foreach($kategoris as $k){ ?>
        		<option value="<?= $k ?>" <?= ($bukus->kategori == $k) ? 'selected' : '' ?>>
            		<?= $k ?>
        		</option>
    		<?php }?>
		</select> <br>
		<input type="number" name="stok" placeholder="Stok" class="form-control" value="<?=$bukus->stok?>"> <br>
		<button type="submit" class="btn btn-success" name="update" value="kirim">Simpan</button>
    </div>
</form>
<?php include_once 'FOOTER.php'; ?>