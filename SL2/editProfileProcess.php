<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="profile-body">
    <div class="content">
        <?php
        include("config.php");

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
                } else if ($_POST['nik'] != $_SESSION['nik']) {
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

            //fotoProfil can be not changed

            if ($errorMsg != "") {
                echo "<div class='errorMsg'>" . $errorMsg . "</div>";
                echo "<a href='./editProfile.php'><input type='button' value='Kembali' style='background-color: orange'></a>";
            } else {
                if ($_FILES['fotoProfil']['name'] != null) {
                    //delete former image
                    // unlink($_SESSION['fotoProfil']);

                    //change directory to uploads
                    $namaFile = $_FILES['fotoProfil']['name'];
                    $tmpLocFile = $_FILES['fotoProfil']['tmp_name'];
                    $dirUpload = "./uploadFiles/";

                    $upload = move_uploaded_file($tmpLocFile, $dirUpload . $namaFile);
                    $fileFotoProfil = $dirUpload . $namaFile;
                    $_SESSION['fotoProfil'] = $fileFotoProfil;
                } else {
                    $_SESSION['fotoProfil'] = $_SESSION['fotoProfil'];
                }

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



                $str_query = "UPDATE user SET namaDepan='" . $_SESSION['namaDepan'] . "', namaTengah='" . $_SESSION['namaTengah'] . "', namaBelakang='" . $_SESSION['namaBelakang'] . "', tempatLahir='" . $_SESSION['tempatLahir'] . "', tglLahir='" . $_SESSION['tglLahir'] . "', nik='" . $_SESSION['nik'] . "', wargaNegara='" . $_SESSION['wargaNegara'] . "', email='" . $_SESSION['email'] . "', noHp='" . $_SESSION['noHp'] . "', alamat='" . $_SESSION['alamat'] . "', kodePos='" . $_SESSION['kodePos'] . "', fotoProfil='" . $_SESSION['fotoProfil'] . "' WHERE username='" . $_SESSION['username'] . "'";

                $query = mysqli_query($connection, $str_query);

                if ($query) {
                    echo "<script>alert('Berhasil Update Profile!');</script>";
                    echo "<script>window.location='profile.php';</script>";
                } else {
                    echo "<script>alert('Gagal Update Profile! Ulangi Update Profile');</script>";
                    echo "<script>window.location='editProfile.php';</script>";
                }
            }
        }
        ?>
    </div>
</body>
