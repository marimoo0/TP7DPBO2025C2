<?php
// Load config & class
require_once 'config/config.php';
require_once 'class/Film.php';
require_once 'class/Genre.php';
require_once 'class/Studio.php';

// Init koneksi
$database = new Database();
$db = $database->getConnection();

// Init class
$filmObj = new Film($db);
$genreObj = new Genre($db);
$studioObj = new Studio($db);

// Ambil data genre dan studio untuk dropdown
$genres = $genreObj->getAll()->fetchAll(PDO::FETCH_ASSOC);
$studios = $studioObj->getAll()->fetchAll(PDO::FETCH_ASSOC);

// Handle action dari URL
$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? '';

// CRUD logic
if (isset($_POST['create'])) {
    $filmObj->insert(
        $_POST['judul'],
        $_POST['sutradara'],
        $_POST['tahun_rilis'],
        $_POST['id_genre'],
        $_POST['id_studio']
    );
    header("Location: index.php");
    exit;
}

if (isset($_POST['update'])) {
    $filmObj->update(
        $_POST['id_film'],
        $_POST['judul'],
        $_POST['sutradara'],
        $_POST['tahun_rilis'],
        $_POST['id_genre'],
        $_POST['id_studio']
    );
    header("Location: index.php");
    exit;
}

if ($action == 'delete' && $id) {
    $filmObj->delete($id);
    header("Location: index.php");
    exit;
}

if ($action == 'edit' && $id) {
    $filmData = $filmObj->findById($id);

    if ($filmData) {
        include 'view/form_film.php';
    } else {
        echo "Data tidak ditemukan.";
    }
    exit;
}

if ($action == 'add') {
    include 'view/form_film.php';
    exit;
}

// Handle pencarian
$search = $_GET['search'] ?? '';
if ($search) {
    $films = $filmObj->search($search)->fetchAll(PDO::FETCH_ASSOC);
} else {
    $films = $filmObj->getAll()->fetchAll(PDO::FETCH_ASSOC);
}

// Tampilkan list
include 'view/list_film.php';