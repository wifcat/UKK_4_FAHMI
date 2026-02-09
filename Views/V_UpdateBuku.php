<?php
    include_once '../Controllers/C_Buku.php';
    include_once 'HEADER.php';
?>
<form action="../Controllers/C_Buku.php?aksi=update" method="post">
    <div class="bg-white rounded-4 shadow-sm p-4">
	    <h5 class="text-center">Update Buku</h1>
	    <br>
		<input type="number" name="id" class="form-control" hidden>
	    <input type="text" name="judul" placeholder="Nama Buku" class="form-control"> <br>
		<select id="kategori" name="kategori" class="form-control">
			<option value="">Pilih Kategori</option>
			<option value="Matematika">Matematika</option>
			<option value="Bahasa Indonesia">Bahasa Indonesia</option>
			<option value="Bahasa Inggris">Bahasa Inggris</option>
			<option value="Pendidikan Agama Islam">Pendidikan Agama Islam</option>
			<option value="Bahasa Sunda">Bahasa Sunda</option>
			<option value="Sejarah">Sejarah</option>
			<option value="Pendidikan Pancasila">Pendidikan Pancasila</option>
			<option value="Wirausaha">Wirausaha</option>
			<option value="Akutansi">Akutansi</option>
		</select> <br>
		<input type="number" name="stok" placeholder="Stok" class="form-control"> <br>
		<button type="submit" class="btn btn-success">Simpan</button>
    </div>
</form>
	
<?php include_once 'FOOTER.php'; ?>