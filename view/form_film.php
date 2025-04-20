<?php
// Default value jika sedang edit
$id = $filmData['id_film'] ?? '';
$judul = $filmData['judul'] ?? '';
$sutradara = $filmData['sutradara'] ?? '';
$tahun = $filmData['tahun_rilis'] ?? '';
$id_genre = $filmData['id_genre'] ?? '';
$id_studio = $filmData['id_studio'] ?? '';
?>

<h2><?= $id ? "Edit" : "Tambah" ?> Film</h2>
<form method="POST" action="index.php">
    <input type="hidden" name="id_film" value="<?= $id ?>">

    <label>Judul:</label><br>
    <input type="text" name="judul" value="<?= $judul ?>" required><br><br>

    <label>Sutradara:</label><br>
    <input type="text" name="sutradara" value="<?= $sutradara ?>" required><br><br>

    <label>Tahun Rilis:</label><br>
    <input type="number" name="tahun_rilis" value="<?= $tahun ?>" min="1900" max="<?= date("Y") ?>" required><br><br>

    <label>Genre:</label><br>
    <select name="id_genre" required>
        <option value="">-- Pilih Genre --</option>
        <?php foreach ($genres as $g): ?>
        <option value="<?= $g['id_genre'] ?>" <?= $g['id_genre'] == $id_genre ? 'selected' : '' ?>>
            <?= $g['nama_genre'] ?>
        </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Studio:</label><br>
    <select name="id_studio" required>
        <option value="">-- Pilih Studio --</option>
        <?php foreach ($studios as $s): ?>
        <option value="<?= $s['id_studio'] ?>" <?= $s['id_studio'] == $id_studio ? 'selected' : '' ?>>
            <?= $s['nama_studio'] ?>
        </option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit" name="<?= $id ? 'update' : 'create' ?>">Simpan</button>
</form>