<?php
session_start();
//
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require('functions.php');
//cek apakah tombol sudah di tekan atau belum
if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil di tambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal di tambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tambah</title>
</head>

<body>
    <h1>Tambah Data Mahasiswa</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nrp</td>
                <td> :</td>
                <td>
                    <label for="nrp">
                        <input type="text" name="nrp" id="nrp" required>
                    </label>
                </td>
            </tr>

            <tr>
                <td>Nama</td>
                <td> :</td>
                <td>
                    <label for="nama">
                        <input type="text" name="nama" id="nama" required>
                    </label>
                </td>
            </tr>

            <tr>
                <td>Email</td>
                <td> :</td>
                <td>
                    <label for="email">
                        <input type="text" name="email" id="email" required>
                    </label>
                </td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td> :</td>
                <td>
                    <label for="jurusan">
                        <input type="text" name="jurusan" id="jurusan" required>
                    </label>
                </td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td> :</td>
                <td>
                    <label for="gambar">
                        <input type="file" name="gambar" id="gambar" required>
                    </label>
                </td>
            </tr>
        </table>
        <button type="submit" name="submit">Tambah Data</button>

    </form>
</body>

</html>