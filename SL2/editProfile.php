<?php
include("config.php");

session_start();

$str_query = "SELECT * FROM user WHERE username = '" . $_SESSION['username'] . "'";
$query = mysqli_query($connection, $str_query);
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
            display: flex;
            justify-content: space-between;
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

        .title {
            margin-top: 100px;
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
                    <a href="./profile.php">Profile</a>
                    <a href="./editProfile.php" style="text-decoration: underline;">Edit Profile</a>
                </div>
                <div class="navbar-buttons-right">
                    <a href="./logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (!isset($_SESSION['username'])) : {
            echo "<div class='content'>";
            echo "Anda belum login, Silahkan login terlebih dahulu <br>";
            echo "<a href='./login.php'>
                <input type='button' value='Login' style='background-color: lightskyblue;'>
            </a>";
            echo "</div>";
        }
    ?>

    <?php else : ?>
        <!-- <div class="content"> -->
        <div class="title">
            <h3>Edit Profil Pribadi</h3>
        </div>
        <div class="content">
            <form action="./editProfileProcess.php" method="post" enctype="multipart/form-data">
                <!-- untuk upload foto pakai => enctype="multipart/form-data" -->
                <table>
                    <tr>
                        <td><label for="namaDepan">Nama Depan</label></td>
                        <td><input type="text" name="namaDepan" value="<?php echo $row['namaDepan']; ?>" readonly></td>
                        <td><label for="namaTengah">Nama Tengah</label></td>
                        <td><input type="text" name="namaTengah" value="<?php echo $row['namaTengah']; ?>"></td>
                        <td><label for="namaBelakang">Nama Belakang</label></td>
                        <td><input type="text" name="namaBelakang" value="<?php echo $row['namaBelakang']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="tempatLahir">Tempat Lahir</label></td>
                        <td><input type="text" name="tempatLahir" value="<?php echo $row['tempatLahir']; ?>"></td>
                        <td><label for="tglLahir">Tanggal Lahir</label></td>
                        <td><input type="date" name="tglLahir" value="<?php echo $row['tglLahir']; ?>"></td>
                        <td><label for="nik">NIK</label></td>
                        <td><input type="number" name="nik" value="<?php echo $row['nik']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="wargaNegara">Warga Negara</label></td>
                        <td><input type="text" name="wargaNegara" value="<?php echo $row['wargaNegara']; ?>"></td>
                        <td><label for="email">Email</label></td>
                        <td><input type="email" name="email" value="<?php echo $row['email']; ?>"></td>
                        <td><label for=" noHp">No Hp</label></td>
                        <td><input type="number" name="noHp" value="<?php echo $row['noHp']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="alamat">Alamat</label></td>
                        <td><textarea name="alamat" cols="20" rows="5"><?php echo $row['alamat']; ?></textarea></td>
                        <td><label for="kodePos">Kode Pos</label></td>
                        <td><input type="number" name="kodePos" value="<?php echo $row['kodePos']; ?>"></td>
                        <td><label for="fotoProfil">Foto Profil</label></td>
                        <td>Update foto profil<br><input type="file" name="fotoProfil" accept="image/*" value="<?php echo $row['fotoProfil']; ?>"></td>
                    </tr>
                    <tr class="buttons">
                        <td colspan="5">&nbsp;</td>
                        <td>
                            <input type="submit" value="Edit" name="submit" class=" " style="background-color: lightgreen; border: 2px solid black;">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    <?php endif; ?>
</body>

</html>