<?php

include_once "dbconfig.php";

$NColegiado = $_GET['NColegiado'];
$var = $db -> prepare("DELETE FROM medico WHERE NColegiado = $NColegiado");
$var -> execute();

echo '<script type="text/javascript"> myAlert(3);</script>';

