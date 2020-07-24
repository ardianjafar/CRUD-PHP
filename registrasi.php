<?php
require('functions.php');

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil di tambahkan');
              </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <br />
    <br />
    <center>
        <h2>Register Here</h2>
    </center>
    <div class="login">
        <br />
        <form action="" method="post" onSubmit="return validasi()">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required autocomplete="off" />
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required autocomplete="off" />
            </div>
            <div>
                <label for="password2">Konfirmasi Password</label>
                <input type="password" name="password2" id="password2" required autocomplete="off" />
            </div>
            <div align="center">
                <button type="submit" name="register" class="tombol">Register</button>
            </div>
        </form>
    </div>
</body>
<script type="text/javascript">
    function validasi() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        if (username != "" && password != "") {
            return true;
        } else {
            alert('Username dan Password harus di isi !');
            return false;
        }
    }
</script>

</html>