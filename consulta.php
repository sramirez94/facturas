<html lang="es">
    <head>
        <title>Busqueda de factura</title>
            <meta charset="utf-8">
            <style type="text/css">
            
                body {font-family: Arial, Helvetica, sans-serif;
                            background-color:cadetblue;
                                    text-align: center;}

                table {     
                    font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
                    font-size: 14px;    
                    margin: 40px;     
                    width: 1110px; 
                    text-align: center;    
                    border-collapse:separate; }

                th {    
                    font-size: 13px;     
                    font-weight: normal;     
                    padding: 8px;     
                    background: #b9c9fe;
                    border-top: 4px solid #aabcfe;    
                    border-bottom: 1px solid #fff; 
                    color: #039; }

                td {    
                    padding: 8px;     
                    background: #e8edff;     
                    border-bottom: 1px solid #fff;
                    color: #669;    
                    border-top: 1px solid transparent; }

                tr:hover td { 
                    background: #d0dafd; 
                    color: #339; }
               
             </style>
        <title>Facturas subidas al portal</title>
    </head>
<body>
    
<?php

            require("conexion.php");

            $sql = "SELECT * FROM pdf inner join (xml) WHERE pdf.folio = '".$_POST['folio']."' group by pdf.folio";
            $result = mysql_query($sql);
    
if(!$result){
        
            echo "No hay nada para mostrar";
        
} else {
        
            echo"<br>";
            echo "<table border = '1'> \n";
            echo "<text-align='center'><tr><td>Folio</td><td>Cliente</td><td>RFC del cliente</td><td>Fecha de emisión</td><td>Descargar archivo PDF</td><td>Descargar archivo XML</td></tr> \n";
        
    while($row = mysql_fetch_row($result)){
            
            echo "<tr><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>"?><a href="<?php echo $row[6]; ?>">Descargar</a><td><a href="<?php echo $row[15]; ?>">Descargar</a><?php "</td>";
                
        }
    
            echo"</tr></table>";
    }
?>
    
    </body>
</html>
