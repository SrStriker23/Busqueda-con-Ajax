<?php
include("conexion.php");
$rut=$_GET["rut"];
$sql=$conexion->query("SELECT * FROM formulario WHERE rut='$rut'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>CRUD php</title>
</head>
<body>
    <div class="col-md-3 m-auto">
        <h1>Ingrese datos</h1>
        <form method="POST">
            <input type="hidden" name="rut" value="<?=$_GET["rut"]?>">
            <h5 class="text-center alert alert-secondary">Modificar Productos</h5>
            <?php 
            include("modificar.php");
            while($datos=$sql->fetch_object()){
            ?>
            <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre" value="<?=$datos->nombre?>">
            <input type="text" class="form-control mb-3" name="apellidos" placeholder="Apellidos" value="<?=$datos->apellidos?>">
            <input type="text" class="form-control mb-3" name="direccion" placeholder="Direccion"  value="<?=$datos->direccion?>">
            <input type="radio" class="form-check-input" name="sexo" value="Hombre" <?php echo ($datos->sexo === 'Hombre') ? 'checked' : ''; ?>> Hombre<br>
            <input type="radio" class="form-check-input" name="sexo" value="Mujer" <?php echo ($datos->sexo === 'Mujer') ? 'checked' : ''; ?>> Mujer<br>
            <input type="radio" class="form-check-input" name="sexo" value="Otro" <?php echo ($datos->sexo === 'Otro') ? 'checked' : ''; ?>> Otro

            <input type="date" class="form-control mb-3" name="fecha_nacimiento" placeholder="Fecha de nacimiento"  value="<?=$datos->fecha_nacimiento?>">
            <input type="number" class="form-control mb-3" name="edad" placeholder="Edad"  value="<?=$datos->edad?>">
            <button type="submit" class="btn btn-primary" name="btnmodificar" value="ok">Modificar</button>
            <?php
            }
            ?>
        </form>
    </div>
</body>
</html>