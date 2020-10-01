<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/prueba_nexura/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/prueba_nexura/public/css/styles">
    <title>Document</title>
</head>
<body>
<h3 class='container'>Prototipo de creacion de formulario</h3>
<h1 class="container">Creacion de empleado</h1>
    <div id="errores"  ></div>
    <form action="/prueba_nexura/app/controllers/empleadosController.php?action=create" method="post"   class="container">
    <input type="hidden" name="opcion" value="create">
    <input type="text" id="nombre" name="nombre" placeholder="nombre completo del empleado" class="form-control"><br>
    <input type="email" id="email" name="email" placeholder="correo electronico" class="form-control"><br>
    
    sexo * <input type="radio" name="sexo" value="h"> Hombre
    <input type="radio" name="sexo" value="m"> Mujer <br><br>
    
    Area * 
    <select name="areas" id="areas">
      <option value="1">administracion</option>
      <option value="2">ventas</option>
      <option value="3">calidad</option>
      <option value="4">produccion</option>
    </select> <br><br>

    Descripcion * <br><textarea name="descripcion" id="descripcion" cols="30" rows="5" placeholder="descripcion de la experiencia del empleado"></textarea><br><br>
    
    <input type="checkbox" name="boletin" value="1"> Deseo recibir boletin informativo <br><br>

    Roles * <input type="checkbox" name="rol[]" value="desarrollador"> Profesional de proyectos - desarrollador <br>
    <input type="checkbox" name="rol[]" value="gerente"> gerente estrategico <br>
    <input type="checkbox" name="rol[]" value="gerente"> auxiliar administrativo <br>
    <br><button type"submit" class="btn btn-light">Guardar</button>
    
    </form>
    <script src="/prueba_nexura/public/js/jquery.min.js"></script>
	<script src="/prueba_nexura/public/js/bootstrap.min.js"></script>
   

<center><h1>EMPLEADOS DEL SISTEMA</h1></center>
	<?php if(isset($msg)){
	echo "<div class='alert alert-primary'>";
	echo $msg;
	echo "</div>";
	} ?>
	<?php
	if ($empleados != null) { ?>
		<table border="2" class="table table-hover table-dark table-striped">
			<thead>
				<tr>
					<th>NOMBRE</th>
					<th>EMAIL</th>
					<th>SEXO</th>
					<th>AREA</th>
					<th>BOLETIN</th>
				</tr>
			</thead>	
			<tbody>
				<?php
					while ($row = $empleados->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $row["nombre"] . "</td>";
						echo "<td>" . $row["email"] . "</td>";
						echo "<td>" . $row["sexo"] . "</td>";
            echo "<td>" . $row["area_id"] . "</td>";
            echo "<td>" . $row["boletin"] . "</td>";
						echo "<td>
							<a href='/prueba_nexura/app/controllers/empleadosController.php?action=update&id=" . $row["id"] . "' class='btn btn-info'>EDITAR</a>
							<a href='/prueba_nexura/app/controllers/empleadosController.php?action=delete&id=" . $row["id"] . "' class='btn btn-danger'>BORRAR</a>
						</td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	<?php 
	} else { ?>
		<h3>No hay usuarios</h3>
		<?php } ?>

<script src="/prueba_nexura/public/js/jquery.min.js"></script>
<script src="/prueba_nexura/public/js/bootstrap.min.js"></script>
</body>
</html>