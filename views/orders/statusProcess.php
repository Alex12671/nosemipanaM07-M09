<div class="container">
    <?php
    //formulario para modificar el estado de los pedidos.
       
        echo "<form class='category' action='index.php?controller=order&action=statusModification' method='POST'>";
        echo "<p> ID del pedido". $_GET['id'] . "</p>";
        $id=$_GET['id'];
        echo "<input type = 'hidden' name = 'ID' value = '$id' size = '11' maxlength='11'></br>";
        echo "<p> <select name = 'Estado_Pedido'></p>";
            echo "<option value= 'Pendiente'> Pendiente </option>";
            echo "<option value= 'En trámite'> En trámite </option>";
            echo "<option value= 'Enviado'> Enviado </option>";
            echo "<option value= 'Entregado'> Entregado </option>";
            echo "</select></br>";
            echo "</br><input class='button' type='submit' name='enviar'>";
        echo "</form>";
    ?>
</div>
