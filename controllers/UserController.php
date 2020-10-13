<?php
	include_once "conexion.php";
	include_once "connectionController.php";

	if (isset($_POST) && isset($_POST['action'])) {

		if ($_SESSION['token'] == $_SESSION['token']) {

			$UserController = new UserController();

			switch ($_POST['action']) {
				case 'store':
					$name = strip_tags($_POST['name']);
					$email = strip_tags($_POST['email']);
					$password = strip_tags($_POST['password']);

					$UserController->store($name,$email,$password);

					break;

				case 'update':
					$name = strip_tags($_POST['name']);
					$email = strip_tags($_POST['email']);
					$password = strip_tags($_POST['password']);
					$id = strip_tags($_POST['id']);

					$UserController->update($name,$email,$password,$id);

					break;

				case 'remove':
					$id = strip_tags($_POST['user_id']);
					echo json_encode($UserController->remove($id));
					break;

				default:
					# code...
					break;
			}
		}else{
			$respuesta = array(
				'status'=>"error",
                'message'=> "Sin autorización"
			);
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
						$_SESSION['message'] = "El registro no se ha guardado correctamente";

						header('Location: ' . $_SERVER['HTTP_REFERER']);
					}
				}else{

					$_SESSION['status'] = "error";
					$_SESSION['message'] = "El registro no se ha guardado";

					header('Location: ' . $_SERVER['HTTP_REFERER']);
				}
			}else{

				$_SESSION['status'] = "error";
				$_SESSION['message'] = "Error durante la conexión";

				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
		}

		public function update($name, $email, $password, $id){

			$conn = connect();

			if (!$conn->connect_error){

				if ($name != "" && $email != "" && $password != "" && $id != "") {

					$query = "update users set name = ?, email = ?, password = ? where id = ?";

					$prepared_query = $conn->prepare($query);
					$prepared_query->bind_param('sssi',$name,$email,$password,$id);

					if ($prepared_query->execute()) {

						var_dump($_POST);

						$_SESSION['status'] = "success";
						$_SESSION['message'] = "El registro se ha actualizado correctamente";

						header('Location: ' . $_SERVER['HTTP_REFERER']);
					}
				}else{

					$_SESSION['status'] = "error";
					$_SESSION['message'] = "El registro no se ha actualizado";

					header('Location: ' . $_SERVER['HTTP_REFERER']);
				}
			}else{

				$_SESSION['status'] = "error";
				$_SESSION['message'] = "Error durante la conexión";

				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
		}

		public function remove($id){

			$conn = connect();

			if (!$conn->connect_error){

				if ($id != "") {

					var_dump($id);

					$query = "delete from users where id = ?";
					$prepared_query = $conn->prepare($query);
					$prepared_query->bind_param('i',$id);

					if ($prepared_query->execute()) {

						$respuesta = array(
                        'status'=>"success",
                        "$id"=>$id,
                        'message'=> "El registro se ha eliminado."
                    );
                    return $respuesta;
                        
                    }else{
                        $respuesta= array(
                        'status'=>"error",
                        'message'=> "El registro no se ha eliminado."
                    );
                    return $respuesta;
                    }
                }else{
                    $respuesta= array(
                        'status'=>"error",
                        'message'=> "Verifique la información enviada."
                    );
                    return $respuesta;
                }
            }else{
                $respuesta= array(
                    'status'=>"error",
                    'message'=> "Error durante la conexión."
                );
                return $respuesta;
            }
		}
	}

	
?>