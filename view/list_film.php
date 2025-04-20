<h2>Daftar Film</h2>

<form method="GET" action="index.php">
    <input type="text" name="search" placeholder="Cari judul film..." value="<?= $_GET['search'] ?? '' ?>">
    <button type="submit">Cari</button>
    <a href="index.php">Reset</a>
</form>

<br>
<a href="index.php?action=add">+ Tambah Film</a>
<br><br>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Judul</th>
        <th>Sutradara</th>
        <th>Tahun</th>
        <th>Genre</th>
        <th>Studio</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($films as $film): ?>
    <tr>
        <td><?= $film['judul'] ?></td>
        <td><?= $film['sutradara'] ?></td>
        <td><?= $film['tahun_rilis'] ?></td>
        <td><?= $film['nama_genre'] ?></td>
        <td><?= $film['nama_studio'] ?></td>
        <td>
            <a href="index.php?action=edit&id=<?= $film['id_film'] ?>">Edit</a> |
            <a href="index.php?action=delete&id=<?= $film['id_film'] ?>"
                onclick="return confirm('Yakin hapus film ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>