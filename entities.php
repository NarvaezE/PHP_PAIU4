<?php
  if (isset($_POST['btn'])){
    //toma las etiquetas html
    // $input = htmlentities($_POST['input']);

    // echo "<h1>".$input."</h1>";

    //ignora las etiquetas html en el output
    // $input = $_POST['input'];

    // echo "<h1>".$input."</h1>";


    // $input = htmlspecialchars($_POST['input']);

    // echo $input;
    $input = strip_tags($_POST['input']);

    echo $input;
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
  <form method="POST" >
    <input type="text" name="input" placeholder="Enter"><br><br>
    <button type="submit" name="btn">ENTER</button>
  </form>
  
</body>
</html>