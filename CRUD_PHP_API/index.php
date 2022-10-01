<?php
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Panel</title>
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
		<!-- <link rel="stylesheet" type="text/css" href="public/css/main.css"> -->
		<style type="text/css">
			.registro{  
				min-height: 600px;
			}
		</style>
	</head>
	<body>

		<div class="container recolor" >
				
			<section>
				
				<div class="row registro justify-content-md-center align-items-center">
					
					<div class="col-md-6 col-sm-12 p-3 border">
						<form method="post" action="app/AuthController.php">
					
							<h1 class="text-center">
								Acceso al panel
							</h1>

							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitat
							</p>

							<div class="mb-3">
							   <label>
									Correo electrónico
								</label> 

								<div class="input-group mb-3">
								  <span class="input-group-text" id="basic-addon1">
								  	@
								  </span>
								  <input type="text" name="email" class="form-control" placeholder="Correo electrónico" aria-label="Username" aria-describedby="basic-addon1" required>
								</div>
							</div>  
								
							<div class="mb-3">
								<label>
									Contraseña
								</label>
								<div class="input-group mb-3">
								  <span class="input-group-text" id="basic-addon1">
								  	@
								  </span>
								  <input type="text" name="password" class="form-control" placeholder="* * * * * * *" aria-label="Username" aria-describedby="basic-addon1" required>
								</div>
							</div> 

							<button class="btn btn-primary col-12" type="submit">
								A C C E D E R
							</button>

							<input type="hidden" name="action" value="access" />
						</form>
					</div>

				</div>

			</section>

				
			<section>
				
			</section>
			 

		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
	</body>
</html>