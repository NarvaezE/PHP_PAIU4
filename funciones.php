<?php
  function lorem(){
    return '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>';
  }
  function promedio($n1,$n2){
    return ($n1+$n2)/2;
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
  <section>
      <?php echo lorem() ?>
      <?php echo lorem() ?>
      <?php echo lorem() ?>
      <h1>Promedio:</h1>
      <?php echo promedio(3,13) ?>

  </section>
  <footer>
    <h1> Todos los derechos reservados
    <?php
      echo date('Y');
    ?></h1>
  </footer>
</body>
</html>