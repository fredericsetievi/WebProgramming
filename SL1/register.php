<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="register-body">
    <div class="title">
        <h3>Register</h3>
    </div>
    <div class="content">
        <form action="./register.php" method="post" enctype="multipart/form-data">
            <!-- untuk upload foto pakai => enctype="multipart/form-data" -->
            <table>
                <tr>
                    <td><label for="namaDepan">Nama Depan</label></td>
                    <td><input type="text" name="namaDepan" value="<?php if (isset($_POST['namaDepan'])) echo $_POST['namaDepan'] ?>" autofocus></td>
                    <td><label for="namaTengah">Nama Tengah</label></td>
                    <td><input type="text" name="namaTengah" value="<?php if (isset($_POST['namaBelakang'])) echo $_POST['namaTengah'] ?>"></td>
                    <td><label for="namaBelakang">Nama Belakang</label></td>
                    <td><input type="text" name="namaBelakang" value="<?php if (isset($_POST['namaBelakang'])) echo $_POST['namaBelakang'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="tempatLahir">Tempat Lahir</label></td>
                    <td><input type="text" name="tempatLahir" value="<?php if (isset($_POST['tempatLahir'])) echo $_POST['tempatLahir'] ?>"></td>
                    <td><label for="tglLahir">Tanggal Lahir</label></td>
                    <td><input type="date" name="tglLahir" value="<?php if (isset($_POST['tglLahir'])) echo $_POST['tglLahir'] ?>"></td>
                    <td><label for="nik">NIK</label></td>
                    <td><input type="number" name="nik" value="<?php if (isset($_POST['nik'])) echo $_POST['nik'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="wargaNegara">Warga Negara</label></td>
                    <td><input type="text" name="wargaNegara" value="<?php if (isset($_POST['wargaNegara'])) echo $_POST['wargaNegara'] ?>"></td>
                    <td><label for="email">Email</label></td>
                    <td><input type="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email'] ?>"></td>
                    <td><label for="noHp">No Hp</label></td>
                    <td><input type="number" name="noHp" value="<?php if (isset($_POST['noHp'])) echo $_POST['noHp'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="alamat">Alamat</label></td>
                    <td><textarea name="alamat" cols="20" rows="5"><?php if (isset($_POST['alamat'])) echo $_POST['alamat'] ?></textarea></td>
                    <td><label for="kodePos">Kode Pos</label></td>
                    <td><input type="number" name="kodePos" value="<?php if (isset($_POST['kodePos'])) echo $_POST['kodePos'] ?>"></td>
                    <td><label for="fotoProfil">Foto Profil</label></td>
                    <td>Silahkan Pilih Foto<br><input type="file" name="fotoProfil" accept="image/*"></td>
                </tr>
                <tr>
                    <td><label for="username">Username</label></td>
                    <td><input type="text" name="username" value="<?php if (isset($_POST['username'])) echo $_POST['username'] ?>"></td>
                    <td><label for="password1">Password 1</label></td>
                    <td><input type="password" name="password1" value="<?php if (isset($_POST['password1'])) echo $_POST['password1'] ?>"></td>
                    <td><label for="password2">Password 2</label></td>
                    <td><input type="password" name="password2" value="<?php if (isset($_POST['password2'])) echo $_POST['password2'] ?>"></td>
                </tr>
                <tr class="buttons">
                    <td colspan="4">&nbsp;</td>
                    <td>
                        <a href="./welcome.php">
                            <input type="button" value="Kembali" class="button" style="background-color: orange; border: 2px solid black;">
                        </a>
                    </td>
                    <td>
                        <input type="submit" value="Register" name="submit" class=" " style="background-color: lightgreen; border: 2px solid black;">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>



<?php
session_start();

if (isset($_POST['submit'])) {

    $errorMsg = "";

    if ($_POST['namaDepan'] == null) {
        $errorMsg = $errorMsg . "Nama Depan tidak boleh kosong <br>";
    } else {
        if (!preg_match("/^[a-zA-z]*$/", $_POST['namaDepan'])) {
            $errorMsg .= "Nama Depan hanya boleh huruf! <br>";
        }
    }

    if ($_POST['namaTengah'] == null) {
        $errorMsg = $errorMsg . "Nama Tengah tidak boleh kosong <br>";
    } else {
        if (!preg_match("/^[a-zA-z]*$/", $_POST['namaTengah'])) {
            $errorMsg .= "Nama Tengah hanya boleh huruf! <br>";
        }
    }

    if ($_POST['namaBelakang'] == null) {
        $errorMsg = $errorMsg . "Nama Belakang tidak boleh kosong <br>";
    } else {
        if (!preg_match("/^[a-zA-z]*$/", $_POST['namaBelakang'])) {
            $errorMsg .= "Nama Belakang hanya boleh huruf! <br>";
        }
    }

    if ($_POST['tempatLahir'] == null) {
        $errorMsg = $errorMsg . "Tempat Lahir tidak boleh kosong <br>";
    } else {
        if (!preg_match("/^[a-zA-z]*$/", $_POST['tempatLahir'])) {
            $errorMsg .= "Tempat Lahir hanya boleh huruf! <br>";
        }
    }

    if ($_POST['tglLahir'] == null) {
        $errorMsg = $errorMsg . "Tgl Lahir tidak boleh kosong <br>";
    }

    if ($_POST['nik'] == null) {
        $errorMsg = $errorMsg . "NIK tidak boleh kosong <br>";
    } else {
        if (!preg_match("/^[0-9]{16}$/", $_POST['nik'])) {
            $errorMsg .= "NIK hanya boleh terdiri dari 16 digit angka! <br>";
        }
    }

    if ($_POST['wargaNegara'] == null) {
        $errorMsg = $errorMsg . "Warga Negara tidak boleh kosong <br>";
    } else {
        if (!preg_match("/^[a-zA-z]*$/", $_POST['wargaNegara'])) {
            $errorMsg .= "Warga Negara hanya boleh huruf! <br>";
        }
    }

    if ($_POST['email'] == null) {
        $errorMsg = $errorMsg . "Email tidak boleh kosong <br>";
    }

    if ($_POST['noHp'] == null) {
        $errorMsg = $errorMsg . "No Hp tidak boleh kosong <br>";
    } else {
        if (!preg_match("/^[0-9]{10,12}$/", $_POST['noHp'])) {
            $errorMsg .= "No Hp hanya boleh terdiri dari minimal 10 dan maximal 12 digit angka! <br>";
        }
    }

    if ($_POST['alamat'] == null) {
        $errorMsg = $errorMsg . "Alamat tidak boleh kosong <br>";
    }

    if ($_POST['kodePos'] == null) {
        $errorMsg = $errorMsg . "Kode Pos tidak boleh kosong <br>";
    } else {
        if (!preg_match("/^[0-9]{5}$/", $_POST['kodePos'])) {
            $errorMsg .= "Kode Pos hanya boleh terdiri dari 5 digit angka! <br>";
        }
    }

    if ($_FILES['fotoProfil']['name'] == null) {
        $errorMsg = $errorMsg . "Foto Profil tidak boleh kosong <br>";
    }

    if ($_POST['username'] == null) {
        $errorMsg = $errorMsg . "Username tidak boleh kosong <br>";
    } else {
        if (!preg_match("/^[a-z0-9]{5,20}$/", $_POST['username'])) {
            $errorMsg .= "Username harus terdiri dari 5 sampai 20 karakter!<br>";
        }
    }

    if ($_POST['password1'] == null) {
        $errorMsg = $errorMsg . "Password1 tidak boleh kosong <br>";
    } else {
        if (!preg_match("/^[a-zA-Z0-9]{5,20}$/", $_POST['password1'])) {
            $errorMsg .= "Password1 harus terdiri dari 5 sampai 20 karakter!<br>";
        }
    }

    if ($_POST['password2'] == null) {
        $errorMsg = $errorMsg . "Password tidak boleh kosong <br>";
    } else {
        if (!preg_match("/^[a-zA-Z0-9]{5,20}$/", $_POST['password2'])) {
            $errorMsg .= "Password harus terdiri dari 5 sampai 20 karakter!<br>";
        } else if ($_POST['password1'] != $_POST['password2']) {
            $errorMsg = $errorMsg . "Password 1 dan Password 2 tidak sama! <br>";
        }
    }

    echo "<div class='errorMsg'>" . $errorMsg . "</div>";


    if ($errorMsg == "") {
        $_SESSION['namaDepan'] = $_POST['namaDepan'];
        $_SESSION['namaTengah'] = $_POST['namaTengah'];
        $_SESSION['namaBelakang'] = $_POST['namaBelakang'];
        $_SESSION['tempatLahir'] = $_POST['tempatLahir'];
        $_SESSION['tglLahir'] = $_POST['tglLahir'];
        $_SESSION['nik'] = $_POST['nik'];
        $_SESSION['wargaNegara'] = $_POST['wargaNegara'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['noHp'] = $_POST['noHp'];
        $_SESSION['alamat'] = $_POST['alamat'];
        $_SESSION['kodePos'] = $_POST['kodePos'];
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password1']; //password1 dan password2 sama

        //change directory to uploads
        $namaFile = $_FILES['fotoProfil']['name'];
        $tmpLocFile = $_FILES['fotoProfil']['tmp_name'];
        $dirUpload = "./uploadFiles/";

        $upload = move_uploaded_file($tmpLocFile, $dirUpload . $namaFile);

        $_SESSION['fotoProfil'] = $dirUpload . $namaFile;
        header("location:welcome.php");
        exit();
    }
}
