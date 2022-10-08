<?php
echo $slug=$_GET['slug'];

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
										/<a href="<?= BASEPATH ?>products">Products</a>/<?= $product->slug ?>
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
																		</div>
																		<div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand"><?= $product->brand->name ?> </span>
																				<h5 class="text-uppercase"><?= $product->name ?></h5>
																				
																		</div>
																		<p class="about"><?= $product->description ?></p>
																		<h6 class="text-uppercase">Caracteristicas</h5>
																		<p class="about"><?= $product->features ?></p>

																		<h5 class="text">Categorias</h5>
																		<?php if(isset($product->categories) && count($product->categories)):?>
																			<?php foreach ($product->categories as $category): ?>

																				<a class="btn btn-primary mb-3" href="categorias.php?category=<?=$category->name ?>" role="button"><?=$category->name?></a>
																			<?php endforeach; ?>
																		<?php endif; ?>

																		<h5 class="text">Etiquetas</h5>
																		<?php if(isset($product->tags) && count($product->tags)):?>
																			<?php foreach ($product->tags as $tag): ?>

																				<a class="btn btn-primary mb-3" href="etiquetas.php?tag=<?=$tag->name ?>" role="button"><?=$tag->name?></a>
																			<?php endforeach; ?>
																		<?php endif; ?>
																		
																		<div class="row">
																			<a data-bs-toggle="modal" data-bs-target="#addProductModal" href="#" class="btn btn-warning mb-1 me-1 col-5">
																				Editar
																			</a>
																			<a onclick="eliminar(this)" href="#" class="btn btn-danger mb-1 ms-1 col-5">
																				Eliminar
																			</a>
																		</div>
																</div>
														</div>
												</div>
										</div>
								</div>
							</div>
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











