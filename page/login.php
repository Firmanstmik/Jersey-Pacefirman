<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/loginstyle.css">
    <!-- code by Firman Maulana -->
</head>

<body>
    <div class="login">
        <h2 class="login-header">LOGIN</h2>
        <form class="login-container" action="login.php" method="post">

            <?php

      include "../lib/koneksi.php";
      session_start();
      // code by Firman Maulana
      if (isset($_POST['submit'])) {
        $user = $_POST['username'];
        $pwd = $_POST['password'];
        // code by Firman Maulana
        $pdo = $conn->prepare("SELECT * FROM tbl_users WHERE username=:a AND password=:b");
        $pdo->execute(array(':a' => $user, ':b' => $pwd));
        $count = $pdo->rowcount();
        $row = $pdo->fetch(PDO::FETCH_OBJ);
        // code by Firman Maulana
        if ($count == 0) {
          echo "<center><a class='tombol-merah'>Login Gagal</a></center>";
        } else {
          // code by Firman Maulana
          $_SESSION['username'] = $user;
          $_SESSION['password'] = $pwd;
          $_SESSION['status'] = $row->title;
          echo "<center><a class='tombol-biru'>Login Berhasil</a></center>";
          echo "<meta http-equiv='refresh' content='1;
                url=../index.php'>";
        }
      }
      // code by Firman Maulana
      ?>

            <p>
                <input type="text" name="username" placeholder="Username" required>
            </p>
            <p>
                <input type="password" name="password" placeholder="Password" required>
            </p>
            <p>
                <input type="submit" name="submit" value="Masuk">
            </p>
            <p align="center"><a href="../index.php">kembali</a></p>
            <p>Belum punya akun ? <a href="daftar.php" class="tombol-biru">Yuk Daftar</a></p>
            <br>

        </form>

    </div>
</body>

</html>