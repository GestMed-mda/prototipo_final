<?php
include_once "dbconfig.php";
$var = $db -> prepare('SELECT  Nombre,NColegiado,Servicio,Password FROM medico ');
$var -> execute();


if ($var){
    echo '<h2>Tabla de prototipo <h2>';
    $var -> setFetchMode(PDO::FETCH_NAMED);
    $first= true;
    foreach ($var as $row) {
        if($first){
            echo "<table><tr>";
            foreach ($row as $field => $value){

                    echo "<th>$field</th> ";

            }
            $first= false;
            echo "</tr>";
        }
        echo "<tr>";
        foreach ($row as $field => $value){
            if($field == 'NColegiado') {
                $NColegiado = $value;
                echo "<td>$value</td> ";
            }else{
                echo "<td>$value</td> ";
            }
        }
        echo '<td><a href="Edit.php?NColegiado=' . $NColegiado . '">Editar</a></td>
              <td><a href="Delete.php?NColegiado=' . $NColegiado . '" onclick="deleteConfirm()">Eliminar</a></td>
              </tr>'
        ;
    }
    echo '</table>
          <a href="Add.php">Añadir</a>';
}
