<?php
   
   $array= array();
   $cant = 4;
   $i=0;
   Class Auto{
       public $id;
       public $name;
       public $color;

       function __construct(Int $id, String $name, String $color){
           $this->id=$id;
           $this->name=$name;
           $this->color=$color;
       }
       function getId(){
           return $this->$this->id;
       }
   }
   $auto1 = new Auto(1,"Tsuru","Rojo");
   array_push($array,$auto1);
   $auto2 = new Auto(2,"PickUp","Azul");
   array_push($array,$auto2);
   $auto3= new Auto(3,"4X4","Negro");
   array_push($array,$auto3);
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
<?php
 
    foreach ($array as $auto) {
        echo "<h1>--------Auto-------</h1>";
        echo "<p>id: " . $auto->id."</p>";
        echo "<p>Nombre: " . $auto->name."</p>";
        echo "<p>Color: " . $auto->color."</p>";
    }
?>
</body>
</html>