# UKK Paket empat Perpustakaan digital

## Fitur Utama dalam Projek
**Semua pengguna (User & Admin):**
1. Login & Registrasi:
User/Pengguna dapat melakukan registrasi dan login akun
2. Melakukan Transaksi:
User dapat meminjam buku yang tersedia di tab *Katalog*, Pengembalian harus disertakan bukti Peminjaman di tab *Transaksi & Riwayat* kepada admin perpustakaan secara tatap muka, Lalu Admin akan menyatakan Transaksi pengembalian.

**Fitur Lain (User & Admin):**
1. Logout (Dapat melakukan logout aplikasi)
2. Profil Saya (melihat profil)
3. Ubah password dan username di profil
4. Dapat melihat total Transaksi dan riwayat transaksi peminjaman buku saat ini dan melihat Username + ID User di profile.php
5. Dapat melihat inbox/pesan masuk apakah transaksi ditolak atau di-acc (tampil data)


**Admin:**
1. Login & Registrasi:
Admin juga dapat melakukan login atau Registrasi (karna layaknya sebagai semua pengguna)
2. CRUD Kelola Anggota/User:
Admin dapat mengelola User/Pengguna di tab *Admin Menu > Kelola Anggota*. Admin dapat Mengubah, Menghapus, Menambah, bahkan menampilkan semua daftar akun pengguna/user dengan termasuk berapa banyak total akun yang terdaftar di aplikasi.
3. CRUD Kelola Buku:
Admin dapat mengelola koleksi buku, baik Menambah, Mengubah, Menghapus dan menampilkan semua total buku yang ada
4. CRUD Keloka Transaksi:
Admin dapat mengelola User ketika mereka melakukan transaksi (Peminjaman) lalu Admin bisa menyetujui peminjaman tersebut dan dapat menyatakan pengembalian buku.


**Spesifikasi CRUD**
1. Tabel Users: Tambah, hapus, ubah, tampil akun user
2. Tabel Buku: Tambah, hapus, ubah, tampil buku (termasuk katalog buku)
3. Tabel Transaksi: Tambah (Pinjam Buku), ubah (ubah Status dipinjam, ditunggu, kembali), hapus (tolak/hapus riwayat transaksi dari riwayat transaksi), tampilkan (menampilkan riwayat transaksi dengan semua status yang tersedia termasuk semua users bagi admin)

### Lists akun:
**Admin**
```
Username: Administrator
Password: aqxua123
```
**User**
```
Username: aqxua
Password: aqua
```

[Projek dihost di sini](https://fahmi-perpustakaan-rpl2.xo.je)
