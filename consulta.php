<?php
// CONEXIÓN A LA BASE DE DATOS
include("conexion.php");

// VALORES INICIALES
$tabla = "";
$query = "SELECT * FROM formulario";

// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BÚSQUEDA
if (isset($_POST['formulario'])) {
    $q = $conexion->real_escape_string($_POST['formulario']);
    $query = "SELECT * FROM formulario WHERE 
        nombre LIKE '%" . $q . "%' OR
        apellidos LIKE '%" . $q . "%' OR
        rut LIKE '%" . $q . "%' OR
        direccion LIKE '%" . $q . "%' OR
        sexo LIKE '%" . $q . "%' OR
        fecha_nacimiento LIKE '%" . $q . "%' OR
        edad LIKE '%" . $q . "%'";
}
$buscarformulario = $conexion->query($query);
if ($buscarformulario->num_rows > 0) {
    $tabla =
        '<table class="table bg-white">
        <tr class="table-dark table-striped">
            <td>Nombre</td>
            <td>Apellidos</td>
            <td>Rut</td>
            <td>Direccion</td>
            <td>Sexo</td>
            <td>Fecha de nacimiento</td>
            <td>Edad</td>
            <td></td>
            <td></td>
        </tr>';
    while ($filaformulario = $buscarformulario->fetch_assoc()) {
        $tabla .=
            '<tr>
                <td>' . $filaformulario['nombre'] . '</td>
                <td>' . $filaformulario['apellidos'] . '</td>
                <td>' . $filaformulario['rut'] . '</td>
                <td>' . $filaformulario['direccion'] . '</td>
                <td>' . $filaformulario['sexo'] . '</td>
                <td>' . $filaformulario['fecha_nacimiento'] . '</td>
                <td>' . $filaformulario['edad'] . '</td>
                <td>
                    <a href="pagina-modificar.php?rut=' . $filaformulario['rut'] . '" class="btn btn-info">Editar</a>
                </td>
                <td>
                    <a onclick="return eliminar()" href="principal.php?rut=' . $filaformulario['rut'] . '" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>';
    }
    $tabla .= '</table>';
} else {
    $tabla = "No se encontraron coincidencias con sus criterios de búsqueda.";
}
echo $tabla;
?>