# TP 7 DPBO 2025

## -- Janji --

Saya Khana Yusdiana NIM 2100991 mengerjakan soal TP 7 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## -- Desain Program --

![1](https://github.com/marimoo0/TP7DPBO2025C2/blob/6622a118607b117183e583d1f4749db8168f3108/Diagram.png)

Program ini adalah aplikasi CRUD data film berbasis web menggunakan PHP OOP dan MySQL. Fitur utama mencakup:

- Menampilkan daftar film lengkap dengan genre dan studio
- Menambahkan data film
- Mengedit dan menghapus data film
- Pencarian berdasarkan judul film

Struktur file:

- config.php : konfigurasi koneksi database
- Film.php, Genre.php, Studio.php : class model untuk tiap entitas
- form_film.php : tampilan form tambah/edit film
- list_film.php : tampilan daftar film
- index.php : controller utama
- db_film.sql : file setup database

## -- Penjelasan Alur --

### Menu Awal:

- Menampilkan semua data film dari tabel film
- Disertai tombol tambah, edit, hapus dan fitur pencarian

### Tambah/Edit Film:

- Form berisi input: Judul, Sutradara, Tahun Rilis, Genre (dropdown), dan Studio (dropdown)
- Data genre dan studio diambil dari tabel masing-masing
- Saat menyimpan, data akan dimasukkan/diupdate di tabel film

### Hapus Film:

- Film dapat dihapus langsung dari list menggunakan tombol hapus

### Pencarian:

- Pencarian dilakukan berdasarkan judul film

## -- Dokumentasi saat Program Dijalankan --

### Halaman List Film

![1](https://github.com/marimoo0/TP7DPBO2025C2/blob/e2db291736e3aadd258bf18ae839b065ccb0a950/SS/Screenshot_1.png)

### Search Film

![1](https://github.com/marimoo0/TP7DPBO2025C2/blob/e2db291736e3aadd258bf18ae839b065ccb0a950/SS/Screenshot_2.png)

### Form Tambah/Edit Film

![1](https://github.com/marimoo0/TP7DPBO2025C2/blob/e2db291736e3aadd258bf18ae839b065ccb0a950/SS/Screenshot_4.png)

![1](https://github.com/marimoo0/TP7DPBO2025C2/blob/e2db291736e3aadd258bf18ae839b065ccb0a950/SS/Screenshot_3.png)
