
<h2> Mis pedidos </h2><br/>
<?php
    echo "<table cellspacing = 5>";
    echo "<tr>";
    echo "<th>Nombre del libro</th>";
    echo "<th>Preio</th>";
    echo "<th>Precio sin Iva</th>";
    echo "<th>Precio con Iva</th>";
    echo "<t>Cantidad</th>";
    echo "<th>Estado</th>";
    echo "</tr>";
        foreach($result as $data) { 
            echo "<tr>";
            foreach($data as $field_name => $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
    echo "</table>";

?>
