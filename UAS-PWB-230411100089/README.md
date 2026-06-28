# UAS Pemrograman Web - Sistem Inventaris Barang Sederhana

## Informasi Mahasiswa
* **Nama:** [Isi Nama Anda]
* **NIM:** [Isi NIM Anda]
* **Judul Aplikasi:** Sistem Inventaris Barang Gudang Sederhana
* **Deskripsi Singkat:** Aplikasi web berbasis Native PHP & MySQL untuk mendata dan memantau stok serta harga aset operasional kantor atau gudang.

## Fitur Aplikasi (CRUD)
1. **Create:** Menambah data barang baru lengkap dengan validasi form.
2. **Read:** Menampilkan daftar seluruh barang lengkap dengan fitur warning otomatis jika stok kritis (≤ 3).
3. **Update:** Mengubah detail data barang yang sudah ada.
4. **Delete:** Menghapus data barang dengan konfirmasi prompt pengaman.

## Struktur Database
* **Nama Database:** `inventaris_db`
* **Nama Tabel:** `barang`
* **Kolom Tabel:**
  * `id` (INT, Primary Key, Auto Increment)
  * `nama_barang` (VARCHAR 100)
  * `kategori` (VARCHAR 50)
  * `stok` (INT)
  * `harga` (INT)
  * `keterangan` (TEXT)

## Cara Menjalankan Aplikasi
1. Clone repositori ini ke dalam direktori server lokal Anda (misal: `htdocs` untuk XAMPP).
2. Nyalakan panel kontrol XAMPP (Apache dan MySQL).
3. Buka browser, masuk ke `http://localhost/phpmyadmin/`.
4. Buat database baru bernama `inventaris_db`.
5. Import file `database.sql` ke dalam database tersebut.
6. Akses aplikasi melalui browser di tautan: `http://localhost/UAS-PWEB-[NIM-ANDA]/`.

## Penggunaan GenAI Statement
Proyek ini dikembangkan dengan asistensi AI (Gemini) untuk penyusunan template boiler-plate kode bersih, arsitektur file terstruktur, serta optimasi sanitasi input formulir PHP.