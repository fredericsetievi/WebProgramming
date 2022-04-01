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
        <form action="./registerProcess.php" method="post" enctype="multipart/form-data">
            <!-- untuk upload foto pakai => enctype="multipart/form-data" -->
            <table>
                <tr>
                    <td><label for="namaDepan">Nama Depan</label></td>
                    <td><input type="text" name="namaDepan" autofocus></td>
                    <td><label for="namaTengah">Nama Tengah</label></td>
                    <td><input type="text" name="namaTengah"></td>
                    <td><label for="namaBelakang">Nama Belakang</label></td>
                    <td><input type="text" name="namaBelakang"></td>
                </tr>
                <tr>
                    <td><label for="tempatLahir">Tempat Lahir</label></td>
                    <td><input type="text" name="tempatLahir"></td>
                    <td><label for="tglLahir">Tanggal Lahir</label></td>
                    <td><input type="date" name="tglLahir"></td>
                    <td><label for="nik">NIK</label></td>
                    <td><input type="number" name="nik"></td>
                </tr>
                <tr>
                    <td><label for="wargaNegara">Warga Negara</label></td>
                    <td><input type="text" name="wargaNegara"></td>
                    <td><label for="email">Email</label></td>
                    <td><input type="email" name="email"></td>
                    <td><label for=" noHp">No Hp</label></td>
                    <td><input type="number" name="noHp"></td>
                </tr>
                <tr>
                    <td><label for="alamat">Alamat</label></td>
                    <td><textarea name="alamat" cols="20" rows="5"></textarea></td>
                    <td><label for="kodePos">Kode Pos</label></td>
                    <td><input type="number" name="kodePos"></td>
                    <td><label for="fotoProfil">Foto Profil</label></td>
                    <td><input type="file" name="fotoProfil" accept="image/*"></td>
                </tr>
                <tr>
                    <td><label for="username">Username</label></td>
                    <td><input type="text" name="username"></td>
                    <td><label for="password1">Password 1</label></td>
                    <td><input type="password" name="password1"></td>
                    <td><label for="password2">Password 2</label></td>
                    <td><input type="password" name="password2"></td>
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
