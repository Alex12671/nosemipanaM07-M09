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
        echo "<th>Detalle Pedido</th>";
        echo "</tr>";
            foreach($result as $data) {
                echo "<tr>";
                // foreach($data as $value) {
                    // if($data['IdPedido'] != $value){
                    //     echo "<td>$value</td>";
                    // }
                    echo "<td>".$data['Nombre']."</td>";
                    echo "<td>".$data['Precio']."</td>";
                    echo "<td>".$data['Precio_sin_IVA']."</td>";
                    echo "<td>".$data['Precio_IVA']."</td>";
                    echo "<td>".$data['Cantidad']."</td>";
                    echo "<td>".$data['Estado_Pedido']."</td>";
                // }
                echo "<td> <a href= 'index.php?controller=order&action=searchOrder&id=".$data['IdPedido']."''> Pedido </a></td>";
                echo "</tr>";
            }
        echo "</table>";

    ?>

</div>
