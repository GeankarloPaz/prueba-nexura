<?php

require_once '../db/connection.php';

class empleados {

	public $id;
	public $nombre;
	public $email;
	public $sexo;
	public $area_id;
	public $boletin;
	public $descripcion;

public static function getall(){
	$sql = "select * from empleados";

	$con = new connection();
	$rs = $con->query($sql); 
	$con->close();

	return $rs;
}

public static function getallpornombre(){
	$sql = "select id iden, nombre nom from empleados";

	$con = new connection();
	$rs = $con->query($sql); 
	$con->close();

	return $rs;
}

public static function findbyID($id){
	$sql = "select * from empleados where id = '$id' ";

	$con = new connection();
	$rs = $con->query($sql);
	$con->close();

	return $rs;
}

public static function delete($id){
	$sql = "delete from empleados where id = '$id' ";
echo $sql;
	$con = new connection();
	$rs = $con->execute($sql);
	$con->close();

	return $rs;
}

public function create(){
	$sql = "insert into empleados values('$this->nombre',
	'$this->email',
	'$this->sexo',
	'$this->area_id',
	'$this->boletin'
	'$this->descripcion')";
	echo $sql;
	$con = new connection();
	$rs = $con->execute($sql);
	$con->close();

	return $rs;
}

public function update(){
	$sql = "update empleados set		
	nombre = '$this->nombre',
	email = '$this->email',
	sexo = '$this->sexo',
	area_id = '$this->area_id',
	boletin = '$this->boletin',
	descripcion = '$this->descripcion'
	where id = '$this->id'";
echo $sql;
	$con = new connection();
	$rs = $con->execute($sql);
	$con->close();

	return $rs;
	}
}

