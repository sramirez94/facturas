<html lang="es">
    <head>
        <link rel="icon" href="calendario.ico" > 
        <title>Busqueda de factura</title>
        <meta charset="utf-8">
        <style type="text/css">
            
body {
                font-family: Arial, Helvetica, sans-serif;
                background-color:cadetblue;
                text-align: center;
        }

       table {     
                font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
                font-size: 14px;    
                margin: 40px;     
                width: 1110px; 
                text-align: center;    
                border-collapse:separate; 
       }

       th {
                font-size: 13px;     
                font-weight: normal;     
                padding: 8px;     
                background: #b9c9fe;
                border-top: 4px solid #aabcfe;    
                border-bottom: 1px solid #fff; 
                color: #039; 
       }

        td {    
                padding: 8px;     
                background: #e8edff;     
                border-bottom: 1px solid #fff;
                color: #669;    
                border-top: 1px solid transparent; 
            }

        tr:hover td { 

                background: #d0dafd; 
                color: #339; 
        }

        </style>
        <title>Archivos subidos en PDF</title>
    </head>
    <body>
    
        <?php

                session_start();
                require("conexion.php");
                $rfc = $_SESSION["rfc"];
                $sql = "SELECT * FROM pdf inner join xml WHERE pdf.fecha between '".$_POST['fecha1']."' and '".$_POST['fecha2']."'  and pdf.rfc = '".$rfc."' group by pdf.folio";
                $result = mysql_query($sql);
        
        if(!$result){
        
                echo "No hay nada para mostrar";
    
        } else {
                echo'<center>';
                echo "<table border = '4'> \n";
                echo "<text-align='center'><tr><td>Cliente</td></td><td>Fecha</td><td>Subtotal</td><td>I.V.A.</td><td>Total</td><td>Observaciones</td><td>RFC Del Cliente</td><td>Descargar PDF</td><td>Descargar XML</td></tr> \n";

        while($row = mysql_fetch_row($result)){

                 echo "<tr><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[10]."</td><td>".$row[11]."</td><td>".$row[12]."</td><td>".$row[13]."</td><td>".$row[18]."</td><td>"?><a href="<?php echo $row[23]; ?>">Descargar</a><td><a href="<?php echo $row[47]; ?>">Descargar</a><?php "</td>"; 
                  
        }
        }
                echo"</tr></table>";
                echo '<a href="mostrar.php">Volver a la busqueda</a>';
        
?>
    
    </body>
</html>
