<?php
    echo "<table border='1'>";
    foreach ($orderStatus as $pedido) {
        echo "<tr>";
        echo "<td>". $pedido['IdPedido'] . "</td>";
        echo "<td>".$pedido['Precio_sin_IVA'] . "</td>";
        echo "<td>".$pedido['Precio_IVA'] . "</td>";
        echo "<td>".$pedido['Estado_Pedido'] . "</td>";
        echo "<td>".$pedido['DNI'] . "</td>";
        echo "<td> <a href= 'index.php?controller=order&action=statusProcess&id=".$pedido['IdPedido']."''> <img src='views/img/lapiz.png' width='30'></a> </td>";
        echo "</tr>";
    }
    echo "</table>";
?>