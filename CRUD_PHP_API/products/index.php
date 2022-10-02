<?php
	include '../app/ProductsController.php';

	$productsController = new ProductsController();
	//$products=$productsController->getProducts();
	$products=$productsController->getProducts();
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

					<section> 
						<div class="row bg-light m-2">
							<div class="col">
								
									<label>/Products</label>
								
							</div>
							<div class="col">
								<button data-bs-toggle="modal" data-bs-target="#addProductModal" class=" float-end btn btn-primary">
									Añadir producto
								</button>
							</div>
						</div> 
					</section>
					
					<section>
						
						<div class="row">
							<?php if(isset($products) && count($products)):?>
							<?php foreach ($products as $product): ?>

							<div class="col-md-4 col-sm-12"> 

								<div class="card mb-2">
								  <img src="<?= $product->cover ?>" alt="...">
								  <div class="card-body">
								    <h5 class="card-title"><?= $product->name ?></h5>
								    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
								    <p class="card-text"><?= $product->description ?>
										</p>

								    <div class="row">
									    <a data-bs-toggle="modal" data-bs-target="#addProductModal" href="#" class="btn btn-warning mb-1 col-6">
									    	Editar
									    </a>
									    <a onclick="eliminar(this)" href="#" class="btn btn-danger mb-1 col-6">
									    	Eliminar
									    </a>
									    <a href="detalles.php" class="btn btn-info col-12">
									    	Detalles
									    </a>
								    </div>

								  </div>
								</div>  

							</div>


							<?php endforeach; ?>
							<?php endif; ?>
						</div>

					</section> 

					 
				</div>

			</div>

		</div>

		<!-- Modal -->
		<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>

		      <form method="post" action="../app/ProductsController.php">

			      <div class="modal-body">
							<div class="input-group mb-3">
								<span class="input-group-text" id="basic-addon1">@</span>
								<input required type="text" name="name" class="form-control" placeholder="Nombre producto" aria-label="Name" aria-describedby="basic-addon1">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="basic-addon1">@</span>
								<input required type="text" name="description" class="form-control" placeholder="Descripcion" aria-label="Description" aria-describedby="basic-addon1">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="basic-addon1">@</span>
								<input required type="text" name="features" class="form-control" placeholder="Caracteristicas" aria-label="Features" aria-describedby="basic-addon1">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="basic-addon1">@</span>
								<input required type="text" name="brand_id" class="form-control" placeholder="ID Marca" aria-label="ID Marca" aria-describedby="basic-addon1">
							</div>
							<input type="hidden" name="MAX_FILE_SIZE" value="200000" />
							<input name="uploadedfile" type="file" />
							<input type="submit" value="Subir archivo" />
			      </div>

			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
			        	Close
			        </button>
			        <button type="submit" class="btn btn-primary">
			        	Save changes
			        </button>
							
			      </div>
						<input type="hidden" name="action" value="create" />
		      </form>

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











