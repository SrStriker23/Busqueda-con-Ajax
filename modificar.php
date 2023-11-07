<?php
if(!empty($_POST["btnmodificar"])){
    if(!empty($_POST["nombre"]) and !empty($_POST["apellidos"]) and !empty($_POST["direccion"]) and !empty($_POST["sexo"]) and !empty($_POST["fecha_nacimiento"]) and !empty($_POST["edad"])){

        $rut=$_POST["rut"];
        $nombre=$_POST["nombre"];
        $apellidos=$_POST["apellidos"];
        $direccion=$_POST["direccion"];
        $sexo=$_POST["sexo"];
        $fecha_nacimiento=$_POST["fecha_nacimiento"];
        $edad=$_POST["edad"];

        $sql=$conexion->query("UPDATE formulario SET nombre='$nombre',apellidos='$apellidos',direccion='$direccion',sexo='$sexo',fecha_nacimiento='$fecha_nacimiento',edad='$edad' WHERE rut='$rut'");
        if ($sql==1) {
            header("location:principal.php");
        } else {
            echo '<div class="alert alert-danger">Error al modificar</div>';
        }
        
    }else{
        echo '<div class="alert alert-warning">Alguno de los campos esta vacio</div>';
    }
}
?>