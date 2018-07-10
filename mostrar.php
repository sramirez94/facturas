<html>
    <head>
            <link rel="icon" href="icono.ico"> 
            <meta charset="utf-8">
            <style type="text/css">
            
            body {
                font-family: Helvetica, Helvetica, sans-serif;
               background-color: cornflowerblue;
                text-align: center;}

            table {     
                font-family: "arial", "arial", Sans-Serif;
                font-size: 15px;    
                margin: 20px;     
                width: 1140px; 
                text-align: center;    
                border-collapse:collapse; 
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
            <title>Descarga tus facturas electrónicas</title>
            <meta charset = "utf-8">
        
        </head>
    <body>
        <br>
        
     <?php
        
                session_start();
                require("conexion.php");

                $usuario = $_SESSION['rfc'];
        
                $query = "SELECT * FROM pdf INNER JOIN xml WHERE pdf.folio = xml.folio and pdf.rfc = '". $usuario. "' GROUP BY pdf.folio order by pdf.fecha desc ";
                $sql = mysql_query($query,$con);
        
    if($row = mysql_fetch_array($sql)){
            
                echo '<center>';

                echo'<form name="consultar_fecha" method="post" action="consulta_fechas.php" class="footable">
                Del día: <input type="date" name="fecha1" maxlenght="5">

                <form name="consultar_fecha" method="post" action="consulta_fechas.php" class="fecha">
                Al día: <input type="date" name="fecha2" maxlenght="5">

                <input type="submit" value="Buscar"> <br><br>';

                echo "<table border = '4'> \n";
                echo "<text-align='center'><tr><td>Cliente</td></td><td>Fecha</td><td>Subtotal</td><td>I.V.A.</td><td>Total</td><td>Observaciones</td><td>RFC Del Cliente</td><td>Descargar XML</td><td>Descargar PDF</td></tr> \n";
                echo '<a href="logout.php">Cerrar Sesión</a>';
        
                $_SESSION["rfc"] = $row['rfc'];
            
         do {
             
                echo "<tr><td>".$row["nomcli"]."</td><td>".$row["fecha"]."</td><td>".$row["subt"]."</td><td>".$row["iva"]."</td><td>".$row["totalf"]."</td><td>".$row["obser"]."</td><td>".$row["rfc"]."</td><td>"?><a href="<?php echo $row["ruta"]; ?>">Descargar</a><td><a href="<?php echo $row["ruta_docto"]; ?>">Descargar</a><?php "</td>"; 
                
        } while ($row = mysql_fetch_array($sql));
            
                echo "</tabla> \n";
            
        } else {
            
                echo 'No se encontraron registros
                <br><a href="logout.php">Cerrar Sesión</a>';
        }
        
        ?>
    
    </body>
</html>
