<div class="container">
    <div class="encabezado">    
        <h2>Estado de los  pedidos</h2><br/>
    </div>
    <?php
        echo "<table class='orderTable'>";
        echo "<th> Nombre Cliente </th>";
        echo "<th> Dirección </th>";
        echo "<th> Nombre producto </th>";
        foreach ($orderStatus as $pedido) {
            echo "<tr>";
            echo "<td>". $pedido['Apellido1'] .' '. $pedido['Apellido1'] . "</td>";
            echo "<td>". $pedido['Calle'] .' '. $pedido['Número'] .' '. $pedido['CP'] .' '. $pedido['Piso'] .' '. $pedido['Ciudad'] .' '. $pedido['Provincia'] . "</td>";
            echo "<td>". $pedido['Nombre']. "</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
    </br>
    <div> <a href="javascript: history.go(-1)">Volver atrás</a> </div>
</div>
