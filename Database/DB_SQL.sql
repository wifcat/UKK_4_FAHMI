CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user'
);
CREATE TABLE buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    kategori ENUM('Matematika', 'Bahasa Indonesia', 'Bahasa Inggris', 'Pendidikan Agama Islam', 'Bahasa Sunda', 'Sejarah', 'Pendidikan Pancasila', 'Wirausaha', 'Akutansi'),
    stok INT DEFAULT 0
);
CREATE TABLE transaksi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    id_buku INT NOT NULL,
    tgl_pinjam DATE NOT NULL,
    tgl_kembali DATE DEFAULT NULL,
    status ENUM('dipinjam', 'kembali') DEFAULT 'dipinjam',
    FOREIGN KEY (id_user) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_buku) REFERENCES buku(id) ON DELETE CASCADE ON UPDATE CASCADE
);