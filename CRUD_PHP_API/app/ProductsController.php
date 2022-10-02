<?php
  session_start();

  if (isset($_POST['action'])){
    switch ($_POST['action']){
      case 'create':
          
          $name = strip_tags($_POST['name']);
          $description = strip_tags($_POST['description']);
          $features = strip_tags($_POST['features']);
          $brand_id = strip_tags($_POST['brand_id']);

          $uploadedfileload="true";
          $uploadedfile_size=$_FILES['uploadedfile']['size'];
          echo $_FILES['uploadedfile']['name'];
          if ($_FILES['uploadedfile']['size']>200000)
          {$msg=$msg."El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo<BR>";
          $uploadedfileload="false";}

          if (!($_FILES['uploadedfile']['type'] =="image/pjpeg" OR $_FILES['uploadedfile']['type'] =="image/gif"))
          {$msg=$msg." Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
          $uploadedfileload="false";}

          $file_name=$_FILES['uploadedfile']['name'];
          $add="uploads/$file_name";
          if($uploadedfileload=="true"){

          if(move_uploaded_file ($_FILES['uploadedfile']['tmp_name'], $add)){
          echo " Ha sido subido satisfactoriamente";
          }else{echo "Error al subir el archivo";}

          }else{echo $msg;}
          
          // echo $name. ' ' .$description. ' ' .$features. ' ' .$brand_id;
          $createProduct = new ProductsController($name, $description, $features, $brand_id);
          $createProduct->createProduct($name, $description, $features, $brand_id);
        break;
    }
  }
  
  Class ProductsController
  {
    public function getProducts() 
    {
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
          'Authorization: Bearer '.$_SESSION["token"]
        ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);
      $response = json_decode($response);

      if (isset($response->code) && $response->code>0){
        return $response->data;

      }else{
        return Array();
      }
    }

    public function createProduct($name, $description, $features, $brand_id){

      $curl = curl_init();
      $slug = preg_replace('/\s+/', '_', $name);

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
          'name' => $name,
          'slug' => $slug,
          'description' => $description,
          'features' => $features,
          'brand_id' => $brand_id
          ),
          CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION["token"]
          ),
      ));

      $response = curl_exec($curl);
      curl_close($curl);
      $response = json_decode($response);

      if (isset($response->code) && $response->code>0){

        header("Location: ../products?".$response->message);
      }else{
        header("Location: ../?".$response->message);
      }
    }
  }
?>