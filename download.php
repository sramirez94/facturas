<?php

    include('conexion.php');
    
if(isset($_POST['dow'])){
    
    $path   = $_GET['dow'];
    $res    = mysql_query("SELECT * FROM pdf WHERE ruta = '$path'");
    
    header('Conten-type: application/octet-stream');
    header('Conten-Disposition: attachment; filename="'.basename($path).'"');
    header('Conten-Lenght: '.filesize($path));
    readfile($path);
}

?>
