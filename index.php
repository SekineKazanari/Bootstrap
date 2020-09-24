<!DOCTYPE html>
<html>
<head>
	<title>Bootstrap</title>

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

			<!-- JUMBOTRON -->
			<div class="jumbotron">
			  <h1 class="display-4">
			  	Cats
			  </h1>

			  <!-- Carrusel -->
			  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
				  <ol class="carousel-indicators">
				    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
				    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
				    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
				  </ol>
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				      <img src="images/cat_java.jpg" class="d-block w-100" alt="...">
				      <div class="carousel-caption d-none d-md-block">
				        <h4>Cat programmer</h4>
				        <p>Cat java, no more.</p>
				      </div>
				    </div>
				    <div class="carousel-item">
				      <img src="images/cat_halp.jpg" class="d-block w-100" alt="...">
				      <div class="carousel-caption d-none d-md-block">
				        <h4>Cat halp</h4>
				        <p>Please help this cat.</p>
				      </div>
				    </div>
				    <div class="carousel-item">
				      <img src="images/cat_ehhh.jpg" class="d-block w-100" alt="...">
				      <div class="carousel-caption d-none d-md-block">
				        <h4>Cat "ehhh"</h4>
				        <p>This cat doesn't want to work.</p>
				      </div>
				    </div>
				  </div>
				  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>			  
			</div>

			<!-- Cards -->
			<div class="row">
				<div class="col-12">
					<div class="card-deck mb-4">

					  <div class="card">
					    <img src="images/cat_eyes.jpg" class="card-img-top" alt="...">
					    <div class="card-body">
					      <h5 class="card-title">Cat whit big eyes</h5>
					      <p class="card-text">This is a cat whit biggest eyes.</p>
					      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
					    </div>
					  </div>

					  <div class="card">
					    <img src="images/cat_pet.jpg" class="card-img-top" alt="...">
					    <div class="card-body">
					      <h5 class="card-title">Cat pet pet</h5>
					      <p class="card-text">This is a cat pet pet.</p>
					      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
					    </div>
					  </div>

					  <div class="card">
					    <img src="images/cat_pan.jpg" class="card-img-top" alt="...">
					    <div class="card-body">
					      <h5 class="card-title">Cat whit pan</h5>
					      <p class="card-text">This is a cat whit one pan.</p>
					      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
					    </div>
					  </div>
					</div>
				</div>
			</div>

			<!-- Otro card -->
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
							      <th scope="col">First</th>
							      <th scope="col">Last</th>
							      <th scope="col">Handle</th>
							    </tr>
							  </thead>
							  <tbody>
							    <tr>
							      <th scope="row">1</th>
							      <td>Mark</td>
							      <td>Otto</td>
							      <td>@mdo</td>
							    </tr>
							    <tr>
							      <th scope="row">2</th>
							      <td>Jacob</td>
							      <td>Thornton</td>
							      <td>@fat</td>
							    </tr>
							    <tr>
							      <th scope="row">3</th>
							      <td>Larry</td>
							      <td>the Bird</td>
							      <td>@twitter</td>
							    </tr>
							  </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        ...
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Understood</button>
			      </div>
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
</body>
</html>