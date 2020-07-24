<?php
session_start();
require('functions.php');
// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id= $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username 
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] =  true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
    // cek username
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;
            // cek remember
            if (isset($_POST['remember'])) {
                // buat cookie
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username'], time() + 60));
            }
            header("Location: index.php");
            exit;
        }
    }
    $error = true;
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
        <h2>Login Here</h2>
    </center>
    <?php if (isset($error)) : ?>
        <p style="color:white; font-style:italic;" align="center">Username / Password salah!</p>
    <?php endif; ?>
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
            <br>
            <div align="center">
                <button type="submit" name="login" class="tombol">Login</button>
            </div>
            <label for="remember">Remember me</label>
            <input type="checkbox" name="remember" id="remember" />

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