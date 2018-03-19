<?php

include_once "dbconfig.php";

if(isset($_POST['enviar'])){
    $Nombre=$_POST['Nombre'];
    $NColegiado=$_POST['NColegiado'];
    $Servicio=$_POST['Servicio'];
    $Password=md5($_POST['Password']);
    $value="null";

    $res = $db -> prepare("SELECT * FROM medico WHERE NColegiado='$NColegiado'");
    $res -> execute();

    $num_rows = $res -> rowCount();

    if ($num_rows > 0) {
        echo '<p>Error, el número de colegiado introducido ya existe.</p><br>';
    } else {
        $res = $db -> prepare("INSERT INTO medico (Nombre, NColegiado, Servicio, Password, Foto)
        VALUES ('$Nombre','$NColegiado','$Servicio','$Password','$value')");
        $res -> execute();

        echo '<script type="text/javascript"> myAlert(1);</script>';

        #header("Location: index.php");
    }
}

echo '
    <form method="post">
        Nombre : <input type="text" name="Nombre" value="" required><br>
        NColegiado : <input type="number" name="NColegiado" value="" required><br>
        Servicio : <input type="text" name="Servicio" value="" required><br>
        Password : <input type="password" name="Password" value="" required><br>
        <input type="submit" name="enviar")">
    </form>
';




