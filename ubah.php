<?php
session_start();
//
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require('functions.php');

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id= $id")[0];

//cek apakah tombol sudah di tekan atau belum
if (isset($_POST["submit"])) {
    //cek apakah data berhasil di ubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil di ubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "GAGAL";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Ubah</title>
</head>

<body>
    <h1>Ubah Data Mahasiswa</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <table>
            <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
            <input type="hidden" name="gambarlama" value="<?= $mhs["gambar"]; ?>">
            <tr>
                <td>Nrp</td>
                <td> :</td>
                <td>
                    <label for="nrp">
                        <input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"]; ?>">
                    </label>
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td> :</td>
                <td>
                    <label for="nama">
                        <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
                    </label>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td> :</td>
                <td>
                    <label for="email">
                        <input type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>">
                    </label>
                </td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td> :</td>
                <td>
                    <label for="jurusan">
                        <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
                    </label>
                </td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td> :</td>
                <td>
                    <label for="gambar">
                        <img src="img/<?= $mhs['gambar']; ?>" width="40">
                        <input type="file" name="gambar" id="gambar">
                    </label>
                </td>
            </tr>
        </table>
        <button type=" submit" name="submit">Ubah Data</button>
    </form>
</body>

</html>