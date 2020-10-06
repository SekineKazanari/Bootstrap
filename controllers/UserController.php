<?php
	include_once "conexion.php";
	include_once "connectionController.php";

	if (isset($_POST) && isset($_POST['action'])) {

		$UserController = new UserController();

		switch ($_POST['action']) {
			case 'store':
				$name = strip_tags($_POST['name']);
				$email = strip_tags($_POST['email']);
				$password = strip_tags($_POST['password']);

				$UserController->store($name,$email,$password);

				break;
			
			default:
				# code...
				break;
		}
	}

	Class UserController{
		function get(){
			$conn = connect();
			if (!$conn->connect_error) {
				$query = "select * from users";
				$prepared_query = $conn->prepare($query);
				$prepared_query->execute();

				$results = $prepared_query->get_result();
				$users = $results->fetch_all(MYSQLI_ASSOC);

				if ($users) {
					return $users;
				}else{
					return array();
				}
			}else{
					return array();
			}
		}

		public function store($name, $email, $password){
			$conn = connect();
			if (!$conn->connect_error){
				if ($name != "" && $email != "" && $password != "") {
					$query = "insert into users (name,email,password) values (?,?,?)";
					$prepared_query = $conn->prepare($query);
					$prepared_query->bind_param('sss',$name, $email, $password);
					if ($prepared_query->execute()) {

						$_SESSION['status'] = "success";
						$_SESSION['messahe'] = "El registro no se ha guardado correctamente";

						header('Location: ' . $_SERVER['HTTP_REFERER']);
					}
				}else{

					$_SESSION['status'] = "error";
					$_SESSION['messahe'] = "El registro no se ha guardado";

					header('Location: ' . $_SERVER['HTTP_REFERER']);
				}
			}else{

				$_SESSION['status'] = "error";
				$_SESSION['messahe'] = "Error durante la conexión";

				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
		}
	}

	
?>