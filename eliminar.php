<?php
if(!empty($_GET["rut"])){
    $rut=$_GET["rut"];
    $sql=$conexion->query("DELETE FROM formulario WHERE rut='$rut'");
    if ($sql==1) {
        echo '<div class="text-center alert alert-success">Persona eliminada correctamente</div>';
    } else {
        echo '<div class="alert alert-danger">Error al eliminar</div>';
    }   
}
?>