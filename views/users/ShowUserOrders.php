
<h2> Mis pedidos </h2><br/>
<?php
    echo "<table cellspacing = 5>";
        foreach($result as $data) {
            echo "<tr>";
            echo "<td>Nombre del libro</td>";
            echo "<td>Preio</td>";
            echo "<td>Precio sin Iva</td>";
            echo "<td>Precio con Iva</td>";
            echo "<td>Cantidad</td>";
            echo "<td>Estado</td>";
            echo "</tr>";
            echo "<tr>";
            foreach($data as $field_name => $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
    echo "</table>";

?>