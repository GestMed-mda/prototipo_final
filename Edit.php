<?php

include_once "dbconfig.php";

$NColegiado=$_GET['NColegiado'];

if(isset($_POST['enviar'])){
    $Nombre=$_POST['Nombre'];
    $Servicio=$_POST['Servicio'];
    $OldPassword=$_POST['OldPassword'];
    $NewPassword=$_POST['Password'];

    if ($Nombre == '' || $NColegiado == '' || $Servicio == '' || $NewPassword == '') {
        echo '<div>ERROR: Por favor, rellene todos los campos requeridos.</div><br>';
    } else {
        if ($NewPassword == $OldPassword) {
            $NewPassword = $OldPassword;
        } else {
            $NewPassword = md5($NewPassword);
        }

        $res = $db -> prepare("UPDATE medico SET Nombre='$Nombre', Servicio='$Servicio', Password='$NewPassword' WHERE NColegiado='$NColegiado'");
        $res -> execute();

        echo '<script type="text/javascript"> myAlert(2);</script>';
    }
} else {
    $res= $db -> prepare("SELECT * FROM medico WHERE NColegiado='$NColegiado'");
    $res -> execute();
    $row = $res -> fetch(PDO::FETCH_NAMED);

    if ($row) {
        $Nombre = $row['Nombre'];
        $Servicio = $row['Servicio'];
        $Password = $row['Password'];

        echo '
            <form method="post">
                Nombre : <input type="text" name="Nombre" value="' . $Nombre . '" required /><br>
                NColegiado : <input type="text" name="NColegiado" value="' . $NColegiado . '" disabled/><br>
                Servicio : <input type="text" name="Servicio" value="' . $Servicio . '" required /><br>
                <input type="hidden" name="OldPassword" value="' . $Password . '"/>
                Password : <input type="password" name="Password" value="' . $Password . '" required /><br>
                <input id="editConfirm" type="submit" name="enviar">
            </form>
        ';
    }
}