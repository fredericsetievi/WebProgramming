<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .navbar {
            background-color: var(--yellow);
            height: 50px;
            width: 100%;
            position: fixed;
            top: 0;
        }

        .navbar-content {
            width: 100%;
        }

        .navbar-title {
            width: 50%;
            padding: 0.5rem;
            margin-left: 20px;
        }

        .navbar-buttons {
            display: flex;
            justify-content: flex-end;
            width: 50%;
        }

        .navbar-buttons-left {
            width: 60%;
            padding: 0.5rem;
            margin-left: 20px;
            display: flex;
        }

        .navbar-buttons-left a {
            margin-left: 50px;
        }

        .navbar-buttons-right {
            width: 40%;
            padding: 0.5rem;
            margin-left: 20px;
        }
    </style>
</head>

<body class="home-body">
    <div class="navbar">
        <div class="navbar-content">
            <div class="navbar-title">
                <h3>Aplikasi Pengelolaan Keuangan</h3>
            </div>
            <div class="navbar-buttons">
                <div class="navbar-buttons-left">
                    <a href="./home.php" style="text-decoration: underline;">Home</a>
                    <a href="./profile.php">Profile</a>
                </div>
                <div class="navbar-buttons-right">
                    <a href="./logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <div class="home-content">
        <?php
        session_start();
        if (!isset($_SESSION['username'])) {
            echo "<div>Anda belum login, Silahkan login terlebih dahulu! <br></div>";
            echo "<div><a href='./login.php'>
                <input type='button' value='Login' style='background-color: lightskyblue;'>
            </a></div>";
        } else {
            echo "<p>Halo <b>" . $_SESSION['namaDepan'] . " " . $_SESSION['namaTengah'] . " " . $_SESSION['namaBelakang'] . " </b>, Selamat Datang di Aplikasi Pengelolaan Keuangan</p>";
        }
        ?>
    </div>
</body>

</html>