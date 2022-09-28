<?php

    if (isset($_POST['enviar'])){

        session_start();

        $_SESSION["usuario"] = htmlentities($_POST["usuario"]);
        $_SESSION["email"] = htmlentities($_POST["email"]);

        header("Location: entities.php");  //header("Location: ".$_SESSION["email"]);

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="usuario" placeholder="Ingreso usuario">
        <input type="text" name="email" placeholder="Ingreso email">
        <input type="submit" name="enviar" value="Enviar" />
    </form>
</body>
</html>