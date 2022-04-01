<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="login-body">
    <div class="content">
        <?php
        include("config.php");

        session_start();

        if (isset($_POST['submit'])) {
            $str_query = "SELECT * FROM user";
            $query = mysqli_query($connection, $str_query);
            while ($row = mysqli_fetch_array($query)) {
                if ($_POST['username'] == $row['username'] && password_verify($_POST['password'], $row['password'])) {
                    $_SESSION['namaDepan'] = $row['namaDepan'];
                    $_SESSION['namaTengah'] = $row['namaTengah'];
                    $_SESSION['namaBelakang'] = $row['namaBelakang'];
                    $_SESSION['tempatLahir'] = $row['tempatLahir'];
                    $_SESSION['tglLahir'] = $row['tglLahir'];
                    $_SESSION['nik'] = $row['nik'];
                    $_SESSION['wargaNegara'] = $row['wargaNegara'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['noHp'] = $row['noHp'];
                    $_SESSION['alamat'] = $row['alamat'];
                    $_SESSION['kodePos'] = $row['kodePos'];
                    $_SESSION['fotoProfil'] = $row['fotoProfil'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['password'] = $row['password'];
                    header("Location: ./home.php");
                    break;
                }
            }
            if (!isset($_SESSION['username'])) {
                echo "<div class='errorMsg'>" . "Username atau Password Salah" . "</div>";
                echo "<a href='./login.php'><input type='button' value='Kembali' style='background-color: orange'></a>";
            }
        }
        ?>
    </div>
</body>

</html>