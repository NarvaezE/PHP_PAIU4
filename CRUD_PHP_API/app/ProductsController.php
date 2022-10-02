<?php
  session_start();

  if (isset($_POST['action'])){
    switch ($_POST['action']){
      case 'create':
          
          $name = strip_tags($_POST['name']);
          $description = strip_tags($_POST['description']);
          $features = strip_tags($_POST['features']);
          $brand_id = strip_tags($_POST['brand_id']);

          
          
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