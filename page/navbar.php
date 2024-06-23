<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-dI0XQPH+cyp4IV6sEzOfPPLcBd9PskAzNQwqcLEFDtZ4t1m9XQFTd7gHpQl6sJYjFAv6cvngTKRgF6M5HWpGMQ=="
        crossorigin="anonymous" />
    <style>
    body {
        font-family: 'Roboto', sans-serif;
        line-height: 1.6;
        background-color: #f7f7f7;
        color: #333;
    }

    .menu {
        background-color: #11bcb2;
        padding: 10px;
        border-bottom: 3px solid #ffaa3cf3;
    }

    .menu ul {
        list-style: none;
        display: flex;
        justify-content: space-around;
        margin: 0;
        padding: 0;
    }

    .menu ul li {
        flex-grow: 1;
        text-align: center;
    }

    .menu ul li a {
        display: block;
        padding: 15px;
        color: #fff;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .menu ul li a i {
        margin-right: 8px;
        /* Adjusted margin */
    }
    </style>
</head>

<body>

    <div class="menu">
        <ul>
            <?php
            session_start();
            if (isset($_SESSION['username'])) {
                if ($_SESSION['status'] == 'user') {
                    $user = $_SESSION['username'];
                    $title = $_SESSION['status'];

                    echo "<li><a href='?page=beranda'><i class='fas fa-home'></i> Beranda</a></li>";
                    echo "<li><a href='?page=belanja'><i class='fas fa-shopping-cart'></i>Pesanan</a></li>";
                    echo "<li><a href='?page=profil'><i class='fas fa-user'></i> Profil</a></li>";
                    echo "<li><a href='?page=tentang'><i class='fas fa-info-circle'></i> Tentang</a></li>";
                    echo "<li class='logout'><a href='page/logout.php'><i class='fas fa-sign-in-alt'></i>Keluar</a></li>";
                    echo "<li class='login'><a><b>Hey, </b>$title $user</a></li>";

                } elseif ($_SESSION['status'] == 'admin') {
                    $user = $_SESSION['username'];
                    $title = $_SESSION['status'];

                    echo "<li><a href='?page=beranda'><i class='fas fa-home'></i> Beranda</a></li>";
                    echo "<li><a href='?page=barang'>Barang</a></li>";
                    echo "<li><a href='?page=transaksi'>Transaksi</a></li>";
                    echo "<li><a href='?page=user'><i class='fas fa-users'></i> User</a></li>";
                    echo "<li><a href='?page=profilad'><i class='fas fa-user'></i> Profil</a></li>";
                    echo "<li class='logout'><a href='page/logout.php'>Keluar</a></li>";
                    echo "<li class='login'><a><b>Hey, </b>$title $user</a></li>";
                }
            } else {
                echo "<li><a href='?page=beranda'><i class='fas fa-home'></i></i> Beranda</a></li>";
                echo "<li><a href='?page=tentang'><i class='fas fa-info-circle'></i> Tentang</a></li>";
                echo "<li class='login'><a href='page/login.php'><i class='fas fa-sign-in-alt'></i> Masuk</a></li>";
            }
            ?>
        </ul>
    </div>

</body>

</html>