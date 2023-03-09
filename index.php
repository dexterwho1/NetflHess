<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de connexion</title>
    <style type="text/css">
        *{
            background-color: skyblue;
            text-align: center;
            font-family: verdana;
            font-weight: 900;
        }
        h1{
            font-size: 50px;
        }
        input{
            margin: 20px;
            font-size: 25px;
        }
    </style>
</head>

<body>
<h1>Formulaire de Connexion</h1>
<form method="POST" action="login.php">
    <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>">

    <label for="login">Email :</label>
    <input type="email"  name="login" required><br>

    <label for="password">Password :</label>
    <input type="password" name="password" minlength="8" required><br>

    <input type="submit" value="Connexion">
</form>
</body>
</html>