<?php
	include "controllers/UserController.php";
	$UserController = new UserController();

	$users = $UserController->get();
	//echo json_encode($users);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bootstrap</title>

	<link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.min.css">

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"> </script> 

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
	<div id="wrapper">
		<div class="container">
			<!-- NAV -->
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			    <a class="navbar-brand" href="#">Waifus</a>
			    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			      <li class="nav-item active">
			        <a class="nav-link" href="#">
			        	Inicio
			        </a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">
			        	Link
			        </a>
			      </li>
			    </ul>
			    <form class="form-inline my-2 my-lg-0">
			      <input class="form-control mr-sm-2" type="search" placeholder="Escribe aquí" aria-label="Search">
			      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">
			      	Buscar
			      </button>
			    </form>
			  </div>
			</nav>

			<!-- BREAD -->
			<div class="container-fliudd">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item active" aria-current="page">Home</li>
				  </ol>
				</nav>
			</div>

			<!-- NOTIFICACION -->	
			<?php if (isset($_SESSION['status']) && $_SESSION['status']=="success"): ?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>
					Correcto!
				</strong> <?=$_SESSION['message']?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php unset($_SESSION['status']); ?>
			<?php endif ?>

			<?php if (isset($_SESSION['status']) && $_SESSION['status']=="error"): ?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>
					Error!
				</strong> <?=$_SESSION['message']?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php unset($_SESSION['status']); ?>
			<?php endif ?>

			<!-- TABLA DE USUARIOS -->
			<div class="row">
				<div class="col-12">
					<div class="card mb-4">
						<div class="card-header">
							Lista de usuarios registrados

							<button type="button" data-toggle="modal" data-target="#staticBackdrop" class="btn btn-primary float-right">
								Añadir usuario
							</button>
						</div>
						<div class="card-body">
							<table class="table table-striped">
							    <thead>
								    <tr>
								        <th scope="col">#</th>
								        <th scope="col">Nombre</th>
								        <th scope="col">
								    		<a> Correo electrónico </a>
								    	</th>
								        <th scope="col">Estatus</th>
								        <th scope="col">Acciones</th>
								    </tr>
							    </thead>
							    <tbody>
							    	<?php if (isset($users) && count($users)>0): ?>
							    	<?php foreach ($users as $user): ?>

								    <tr>
								        <th scope="row">
								        	<?= $user['id'] ?>
								        </th>
								        <td>
								        	<?= $user['name'] ?>
								        </td>
								        <td>
								      		<a href="mailto:<?= $user['email'] ?>">
								      			<?= $user['email'] ?>
								      		</a>
								        </td>
								        <td>
								        	<?php if ($user['status']): ?>

								        		<span class="badge badge-success">
								        			Activo
								        		</span>

								        	<?php else: ?>

								        		<span class="badge badge-warning">
								        			Inactivo
								        		</span>

								        	<?php endif ?>
								      </td>
								      <td>
								      	<button type="button" class="btn btn-warning">
							      			<i class="fa fa-pencil"></i>
							      			Editar
							      		</button>
							      		<button onclick="remove(1)" type="button" class="btn btn-danger">
							      			<i class="fa fa-trash"></i>
							      			Eliminar
							      		</button>
								      </td>
								    </tr>

									<?php endforeach ?>
									<?php endif ?>
							    </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			    <div class="modal-dialog modal-lg">

			    	<div class="modal-content">

				        <div class="modal-header">
					        <h5 class="modal-title" id="staticBackdropLabel">Agregar usuario</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
				        </div>

				        <form method="POST" action="controllers/UserController.php" onsubmit="return validarRegistro()">
					        <div class="modal-body">
					        	<form>

					        		<!-- NOMBRE -->
									<div class="form-group">
										<label for="exampleInputEmail1">
											Nombre completo
										</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">
													<i class="fa fa-user" aria-hidden="true"></i>
												</span>
											</div>
											<input type="text" class="form-control" id="nombre" aria-describedy="emailHelp" placeholder="Lucy Heartfilia" required="" name="name">
										</div>
										<small id="emailHelp" class="form-text text-muted">No ingrese números.</small>
									</div>

									<!-- Correo -->
									<div class="form-group">
										<label for="exampleInputEmail1">
											E-Mail
										</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">
													<i class="fa fa-at" aria-hidden="true"></i>
												</span>
											</div>
											<input type="text" class="form-control" id="email" aria-describedy="emailHelp" placeholder="lucy@hotmail.com" required="" name="email">
										</div>
									</div>

									<!-- CONTRASEÑA -->
									<div class="form-group">
										<label for="password">
											Contraseña
										</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">
													<i class="fa fa-lock"></i>
												</span>
											</div>
											<input type="password" class="form-control" id="password" aria-describedy="emailHelp" placeholder="*****" required="" name="password">
										</div>
									</div>

									<!-- CONFIRMAR CONTRASEÑA -->
									<div class="form-group">
										<label for="password2">
											Confirme su contraseña
										</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">
													<i class="fa fa-lock"></i>
												</span>
											</div>
											<input type="password" class="form-control" id="password2" aria-describedy="emailHelp" placeholder="*****" required="">
										</div>
									</div>

									<div class="modal-footer">
								        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
								        <button type="submit" class="btn btn-primary">Guardar</button>
								        <input type="hidden" name="action" value="store">
							        </div>

								</form>
					        </div>
					    </form>
			    	</div>
			    </div>
			</div>

			<!-- Un row -->
			<div class="row">
				<div class="col-sm">
					<h1>
						D_D
					</h1>
					<p>
						Un pirri
					</p>
					<a href="">Leer más</a>
				</div>
				<div class="col-sm-12 col-md-6">
					<h1>
						D_D
					</h1>
					<p>
						Un pirri
					</p>
					<a href="">Leer más</a>
				</div>
				<div class="col-sm">
					<h1>
						D_D
					</h1>
					<p>
						Un pirri
					</p>
					<a href="">Leer más</a>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function validarRegistro(){
			if ($("#password").val() == $("#password2").val()) {
				return true;
			}else{
				$("#password").addClass('is-invalid')
				$("#password2").addClass('is-invalid')

				swal("", "Las contraseñas no coinciden", "error");

				return false;
			}
		}

		function remove(){
			swal({
				  title: "",
				  text: "¿Desea eliminar el usuario",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				  buttons: ["Cancelar", "Eliminar"]
				})
				.then((willDelete) => {
				  if (willDelete) {
				    swal("¡Ususario eliminado con exito!", {
				      icon: "success",
				    });
				  } else {
				    ´//swal("Your imaginary file is safe!");
				  }
				});
		}
	</script>

</body>
</html>