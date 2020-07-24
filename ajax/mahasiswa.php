<?php
require '../functions.php';
$keyword = $_GET["keyword"];
$query = query("SELECT * FROM mahasiswa 
                WHERE nama LIKE '%$keyword%'
                      nrp LIKE '%$keyword%'
                      email LIKE '%$keyword%'
                      jurusan LIKE '%$keyword%'");
$mahasiswa = query($query);
?>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($mahasiswa as $row) : ?>
        <tr align="center">
            <td><?= $i++; ?></td>
            <td>
                <a href="ubah.php?id=<?= $row['id']; ?>">Ubah</a>
                <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('yakin');">Hapus</a>
            </td>
            <td><img src="img/<?= $row['gambar']; ?>" width="50"></td>
            <td><?= $row['nrp']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['jurusan']; ?></td>
        </tr>

    <?php endforeach; ?>
</table>