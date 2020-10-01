<?php

require_once '../models/empleados.php';

class empleadosController {

	public function __construct(){
		
		$action = isset($_GET["action"]) ? $_GET["action"] : "all"; //isset devuelve un true o false si la variable se encuetra con datos, (?) significa que si existe se asignara HOLA. (:) es por si no existe.

		if (method_exists($this, $action)) {
			$this->$action();
		} else{
			$this->error();
		}
	}

	public function all(){
		$empleados = empleados::getall();
		//echo "<pre>";
		//print_r($usuarios->fetch_assoc());
		include '../../public/views/menu/index.php';
		
	}

	public function update(){
		if(isset($_GET["id"])){
			$id = $_GET["id"];
			$empleados = empleados::findbyID($id);
			if($empleados != null){
				$empleados = $empleados->fetch_assoc();
				include '../../public/views/menu/update.php';
			}else{
				$msg = "empleados no encontrado";
				$empleados = empleados::getall();
				include '../../public/views/menu/index.php';
			}
		}else{
			$empleados = new empleados();
			$empleados->id = $_POST["id"];
			$empleados->nombre = $_POST["nombre"];
			$empleados->email = $_POST["email"];
			$empleados->sexo = $_POST["sexo"];
			$empleados->area_id = $_POST["area_id"];
			$empleados->boletin = $_POST["boletin"];
			$empleados->descripcion = $_POST["descripcion"];

			$res = $empleados->update();
			if($res == 1){
				$msg = "empleados modificado";
				$empleados = empleados::getall();
				include '../../public/views/menu/index.php';
			}else{
				$msg = "Error al editar usuario";
				$empleados = empleados::getall();
				include '../../public/views/menu/index.php';
			}
		}

	}

	public function delete(){
		
		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
		if(empleados::delete($id)){
			$msg = "empleado eliminado";
		}else{
			$msg = "Error al eliminar";
		}

		$empleados = empleados::getall();
		include '../../public/views/empleados/index.php';
	}

	public function create(){
		if(isset($_POST["opcion"])){
			
			$empleados = new empleados();
			$empleados->nombre = $_POST["nombre"];
			$empleados->email = $_POST["email"];
			$empleados->sexo = $_POST["sexo"];
			$empleados->area_id = $_POST["areas"];
			$empleados->boletin = $_POST["boletin"];
			$empleados->descripcion = $_POST["descripcion"];

			$res = $empleados->create();
			if($res == 1){
				$msg = "empleado creado";
			}else{
				$msg = "error al crear empleado";
			}
			$empleados = empleados::getall();
			include '../../public/views/menu/index.php';
		}else{
			include '../../public/views/menu/index.php';
			echo "no se creo";
		}
	}

	public function error(){
		echo "No existe la funcion";
	}

}

new empleadosController();
