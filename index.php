<?php
session_start();
require('functions.php');
//
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


// pagination
// konfigurasi
// $jumlahDataPerhalaman = 3;
// $jumlahData = count(query("SELECT * FROM mahasiswa"));
// $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
// // operatot ternary
// $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
// $awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;



// ambil data dari tabel mahasiswa / query data mahasiswa
//LIMIT $awalData, $jumlahDataPerhalaman  ini di letakkan setelah mahasiswa//
$mahasiswa = query("SELECT * FROM mahasiswa ");

// tombol cari di tekan
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body align="center">
    <h1>Daftar Mahasiswa</h1>
    <a href="logout.php">Logout</a> &nbsp;&nbsp;
    <a href="tambah.php">Tambah Data</a>
    <br><br>



    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="masukkan pencarian keywords.." autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari!</button>
        <br><br>
    </form>


    <div id="container">
        <table border="1" cellpadding="10" cellspacing="0" align="center">
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
    </div>

    <script src="js/script.js">

    </script>
</body>

</html>