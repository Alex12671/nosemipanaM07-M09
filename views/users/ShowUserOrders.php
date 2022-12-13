<div class="container">
    <h2 class='encabezado'> Mis pedidos </h2><br/>
    <?php
        echo "<table class='orderTable'>";
        echo "<tr>";
        echo "<th>Nombre del libro</th>";
        echo "<th>Precio</th>";
        echo "<th>Precio sin Iva</th>";
        echo "<th>Precio con Iva</th>";
        echo "<th>Cantidad</th>";
        echo "<th>Estado</th>";
        echo "</tr>";
            foreach($result as $data) { 
                echo "<tr>";
                foreach($data as $value) {
                    echo "<td>$value</td>";
                }
                echo "</tr>";
            }
        echo "</table>";

    ?>

</div>
