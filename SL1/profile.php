<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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

<body class="profile-body">
    <div class="navbar">
        <div class="navbar-content">
            <div class="navbar-title">
                <h3>Aplikasi Pengelolaan Keuangan</h3>
            </div>
            <div class="navbar-buttons">
                <div class="navbar-buttons-left">
                    <a href="./home.php">Home</a>
                    <a href="./profile.php" style="text-decoration: underline;">Profile</a>
                </div>
                <div class="navbar-buttons-right">
                    <a href="./logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="profile-content">
        <?php
        session_start();
        if (!isset($_SESSION['username'])) : {
                echo "Anda belum login, Silahkan login terlebih dahulu <br>";
                echo "<a href='./login.php'>
                <input type='button' value='Login' style='background-color: lightskyblue;'>
            </a>";
            }
        ?>

        <?php else : ?>
            <div class="title">
                <h3>Profil Pribadi</h3>
            </div>
            <table>
                <tr>
                    <td>Nama Depan</td>
                    <td class="text-form">
                        <?php echo "<b>" . $_SESSION['namaDepan'] . "</b>" ?>
                    </td>
                    <td>Nama Tengah</td>
                    <td class="text-form">
                        <?php echo "<b>" . $_SESSION['namaTengah'] . "</b>" ?>
                    </td>
                    <td>Nama Belakang</td>
                    <td class="text-form">
                        <?php echo "<b>" . $_SESSION['namaBelakang'] . "</b>" ?>
                    </td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td class="text-form">
                        <?php echo "<b>" . $_SESSION['tempatLahir'] . "</b>" ?>
                    </td>
                    <td>Tgl Lahir</td>
                    <td class="text-form">
                        <?php echo "<b>" . date("d-m-Y", strtotime($_SESSION['tglLahir'])) . "</b>" ?>
                    </td>
                    <td>NIK</td>
                    <td class="text-form">
                        <?php echo "<b>" . $_SESSION['nik'] . "</b>" ?>
                    </td>
                </tr>
                <tr>
                    <td>Warga Negara</td>
                    <td class="text-form">
                        <?php echo "<b>" . $_SESSION['wargaNegara'] . "</b>" ?>
                    </td>
                    <td>Email</td>
                    <td class="text-form">
                        <?php echo "<b>" . $_SESSION['email'] . "</b>" ?>
                    </td>
                    <td>No Hp</td>
                    <td class="text-form">
                        <?php echo "<b>" . $_SESSION['noHp'] . "</b>" ?>
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td class="text-form">
                        <?php echo "<b>" . $_SESSION['alamat'] . "</b>" ?>
                    </td>
                    <td>Kode Pos</td>
                    <td class="text-form">
                        <?php echo "<b>" . $_SESSION['kodePos'] . "</b>" ?>
                    </td>
                    <td>Foto Profil</td>
                    <td>
                        <img src="<?php echo $_SESSION['fotoProfil']; ?>" alt="foto" class="picture">
                    </td>
                </tr>
            </table>
        <?php endif; ?>
    </div>
</body>

</html>