-- Buat database dulu (opsional)
CREATE DATABASE IF NOT EXISTS db_film;
USE db_film;

-- Tabel Genre
CREATE TABLE IF NOT EXISTS genre (
    id_genre INT AUTO_INCREMENT PRIMARY KEY,
    nama_genre VARCHAR(100) NOT NULL
);

-- Tabel Studio
CREATE TABLE IF NOT EXISTS studio (
    id_studio INT AUTO_INCREMENT PRIMARY KEY,
    nama_studio VARCHAR(100) NOT NULL,
    lokasi VARCHAR(150) NOT NULL
);

-- Tabel Film
CREATE TABLE IF NOT EXISTS film (
    id_film INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(150) NOT NULL,
    sutradara VARCHAR(100) NOT NULL,
    tahun_rilis YEAR NOT NULL,
    id_genre INT,
    id_studio INT,
    FOREIGN KEY (id_genre) REFERENCES genre(id_genre) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (id_studio) REFERENCES studio(id_studio) ON DELETE SET NULL ON UPDATE CASCADE
);
