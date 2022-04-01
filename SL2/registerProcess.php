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
    <div class="content">
        <?php
        include("config.php");

        // session_start();

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
                if (!preg_match("/^[a-zA-z ]*$/", $_POST['tempatLahir'])) {
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
                } else {
                    $str_query = "SELECT * FROM user";
                    $query = mysqli_query($connection, $str_query);
                    while ($row = mysqli_fetch_array($query)) {
                        if ($row['nik'] == $_POST['nik']) {
                            $errorMsg .= "NIK sudah terdaftar! Silahkan menggunakan NIK yang lain! <br>";
                            break;
                        }
                    }
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
                    $errorMsg .= "Username harus terdiri dari 5 sampai 20 karakter! <br>";
                } else {
                    $str_query = "SELECT * FROM user";
                    $query = mysqli_query($connection, $str_query);
                    while ($row = mysqli_fetch_array($query)) {
                        if ($row['username'] == $_POST['username']) {
                            $errorMsg .= "Username sudah terdaftar! Silahkan pilih username lain! <br>";
                        }
                    }
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

            if ($errorMsg != "") {
                echo "<div class='errorMsg'>" . $errorMsg . "</div>";
                echo "<a href='./register.php'><input type='button' value='Kembali' style='background-color: orange'></a>";
            } else {
                //change directory to uploads
                $namaFile = $_FILES['fotoProfil']['name'];
                $tmpLocFile = $_FILES['fotoProfil']['tmp_name'];
                $dirUpload = "./uploadFiles/";

                $upload = move_uploaded_file($tmpLocFile, $dirUpload . $namaFile);
                $fileFotoProfil = $dirUpload . $namaFile;

                //encrypt password
                $encryptPassword = password_hash($_POST['password1'], PASSWORD_DEFAULT);

                $str_query = "INSERT INTO user (namaDepan, namaTengah, namaBelakang, tempatLahir, tglLahir, nik, wargaNegara, email, noHp, alamat, kodePos, fotoProfil, username, password) VALUES ('" . $_POST['namaDepan'] . "', '" . $_POST['namaTengah'] . "', '" . $_POST['namaBelakang'] . "', '" . $_POST['tempatLahir'] . "', '" . $_POST['tglLahir'] . "', '" . $_POST['nik'] . "', '" . $_POST['wargaNegara'] . "', '" . $_POST['email'] . "', '" . $_POST['noHp'] . "', '" . $_POST['alamat'] . "', '" . $_POST['kodePos'] . "', '$fileFotoProfil', '" . $_POST['username'] . "', '$encryptPassword')";

                $query = mysqli_query($connection, $str_query);

                if ($query) {
                    echo "<script>alert('Berhasil Registrasi');</script>";
                    echo "<script>window.location='welcome.php';</script>";
                } else {
                    echo "<script>alert('Gagal Registrasi. Silahkan Ulang Registrasi!');</script>";
                    echo "<script>window.location='register.php';</script>";
                }
            }
        }
        ?>
    </div>
</body>
