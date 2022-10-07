<?php
include_once "config.php";

  if (isset($_POST['action'])){
    switch ($_POST['action']){
      case 'create':
          
        $name = strip_tags($_POST['name']);
        $description = strip_tags($_POST['description']);
        $features = strip_tags($_POST['features']);
        $brand_id = strip_tags($_POST['brand_id']);
       
        
        $target_path = "uploads/";
        $target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
        if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
            echo "El archivo ".  basename( $_FILES['uploadedfile']['name']). 
            " ha sido subido";
            echo $target_path;
        } else{
            echo "Ha ocurrido un error, trate de nuevo!";
        }


          echo $name. ' ' .$description. ' ' .$features. ' ' .$brand_id;
          $createProduct = new ProductsController($name, $description, $features, $brand_id, $target_path);
          $createProduct->createProduct($name, $description, $features, $brand_id, $target_path);
        break;
        case 'update':

          $name = strip_tags($_POST['name']);
          $slug = strip_tags($_POST['slug']);
          $description = strip_tags($_POST['description']);
          $features = strip_tags($_POST['features']);
          $brand_id = strip_tags($_POST['brand_id']); 
  
          $id = strip_tags($_POST['id']); 
  
          $productsController = new ProductsController();
          $productsController->updateProduct($name,$slug,$description,$features,$brand_id,$id);
        break;
  
        case 'delete':
          
          $id = strip_tags($_POST['id']);
  
          $productsController = new ProductsController();
  
          echo json_encode( $productsController->remove($id) );
  
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
    public function getProductBySlug($product_slug){
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/slug/'.$product_slug,
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
        header("Location: ../?".$response->message);
      }
    }
    public function createProduct($name, $description, $features, $brand_id,$target_path){

      $curl = curl_init();
      $slug = preg_replace('/\s+/', '-', $name);
      echo $target_path;
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
          'brand_id' => $brand_id,
          'cover' => new CURLFILE($target_path)
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
        header("Location: ../products?".$response->error);
      }
    }
    public function updateProduct($name,$slug,$description,$features,$brand_id,$id)
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
			  CURLOPT_CUSTOMREQUEST => 'PUT',
			  CURLOPT_POSTFIELDS => 'name='.$name.'&slug='.$slug.'&description='.$description.'&features='.$features.'&brand_id='.$brand_id.'&id='.$id,
			  CURLOPT_HTTPHEADER => array(
			   'Authorization: Bearer '.$_SESSION['token'],
			    'Content-Type: application/x-www-form-urlencoded'
			  ),
			));

			$response = curl_exec($curl); 
			curl_close($curl);
			$response = json_decode($response); 

			if (isset($response->code) && $response->code > 0) { 

				header("Location:../products?success");

			}else{

				header("Location:../products?error");
			}
		}

		public function remove($id)
		{

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/'.$id,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'DELETE',
			  CURLOPT_HTTPHEADER => array(
			    'Authorization: Bearer '.$_SESSION['token']
			  ),
			));

			$response = curl_exec($curl); 
			curl_close($curl);
			$response = json_decode($response);  

			if (isset($response->code) && $response->code > 0) { 

				return true;

			}else{

				return false;
			}
		}
  }
?>