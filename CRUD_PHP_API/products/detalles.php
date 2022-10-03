<?php
$slug=$_GET['slug'];

include '../app/ProductsController.php';
	$productsController = new ProductsController();
	//$products=$productsController->getProducts();
	$product=$productsController->getProductBySlug($slug);
?>
<!DOCTYPE html>
<html>
	<head>
  <?php
      include('../layout/head.template.php');
    ?>
	</head>
	<body>

		<!-- NAVBAR -->
		<?php
      include('../layout/navbar.template.php');
    ?>
		<!-- NAVBAR -->

		<div class="container-fluid">
			
			<div class="row">
				
				<!-- SIDEBAR -->
				<?php
          include('../layout/sidebar.template.php');
        ?>
				<!-- SIDEBAR -->

				<div class="col-md-10 col-lg-10 col-sm-12">

					<div class="col-md-10 col-lg-10 col-sm-12">

						<section> 
							<div class="row bg-light m-2">
								<div class="col">
									<label>
										/Productos
									</label>
								</div>
								
							</div> 
						</section>
						<div class="container mt-5 mb-5">
							<div class="row d-flex justify-content-center">
								<div class="col-md-10">
										<div class="card">
												<div class="row">
														<div class="col-md-6">
																<div class="images p-3">
																		<div class="text-center p-4"> <img id="main-image" src="<?= $product->cover ?>" width="250" /> </div>
																</div>
														</div>
														<div class="col-md-6">
																<div class="product p-4">
																		<div class="d-flex justify-content-between align-items-center">
																				<div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <span class="ml-1">Back</span> </div> <i class="fa fa-shopping-cart text-muted"></i>
																		</div>
																		<div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand"><?= $product->brand->name ?> </span>
																				<h5 class="text-uppercase"><?= $product->name ?></h5>
																				<!-- <div class="price d-flex flex-row align-items-center"> <span class="act-price">$20</span>
																						<div class="ml-2"> <small class="dis-price">$59</small> <span>40% OFF</span> </div>
																				</div> -->
																		</div>
																		<p class="about"><?= $product->description ?></p>
																		
																		<div class="cart mt-4 align-items-center"> <button class="btn btn-danger text-uppercase mr-2 px-4">Add to cart</button> <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i> </div>
																</div>
														</div>
												</div>
										</div>
								</div>
							</div>
							<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Marca </th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">Nombre</th>
								<td><?= $product->brand->name ?></td>
							</tr>
							<tr>
								<th scope="row">Descripción</th>
								<td><?= $product->brand->description ?></td>
							</tr>
							<tr>
								<th scope="row">Slug</th>
								<td><?= $product->brand->slug ?></td>
							</tr>
							<tr>
								<th scope="row">ID</th>
								<td><?= $product->brand->id ?></td>
							</tr>
						</tbody>
					</table>
					<br>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Categorias </th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">Nombre</th>
								<td><?= $product->categories[0]->name ?></td>
							</tr>
							<tr>
								<th scope="row">Descripción</th>
								<td><?= $product->categories[0]->description ?></td>
							</tr>
							<tr>
								<th scope="row">Slug</th>
								<td><?= $product->categories[0]->slug ?></td>
							</tr>
							<tr>
								<th scope="row">ID</th>
								<td><?= $product->categories[0]->id ?></td>
							</tr>
						</tbody>
					</table>
					</div>
					
				</div>
			</div>
		</div>

		<?php
      include('../layout/scripts.template.php');
    ?>
		<script type="text/javascript">
			function eliminar(target)
			{
				swal({
				  title: "Are you sure?",
				  text: "Once deleted, you will not be able to recover this imaginary file!",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				    swal("Poof! Your imaginary file has been deleted!", {
				      icon: "success",
				    });
				  } else {
				    swal("Your imaginary file is safe!");
				  }
				});
			}
		</script>
	</body>
</html>











