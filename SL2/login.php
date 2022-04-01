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
    <div class="title">
        <h3>Login</h3>
    </div>
    <div class="content">
        <div class="login-form-container">
            <form action="./loginProcess.php" method="post">
                <table>
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username" value="<?php if (isset($_POST['username'])) echo $_POST['username'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="Login" style="background-color: lightgreen">
                            <a href="./welcome.php"><input type="button" value="Kembali" style="background-color: orange"></a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>