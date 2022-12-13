<div class="container">
    <h2 class='encabezado'>Estado de los pedidos</h2></br>
    <?php
        echo "<table class='orderTable'>";
        echo "<th> Núm. pedido </th>";
        echo "<th> Precio </th>";
        echo "<th> Precio IVA</th>";
        echo "<th> Estado </th>";
        echo "<th> DNI cliente </th>";
        echo "<th> Editar estado </th>";
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
    </br>
    <form action="index.php?controller=order&action=searchOrders" method="POST" id="filterForm">
        <select name="filter" id="filter" onchange="selectValue()">
            <option value="noFilter" selected>Seleccione un filtro</option>
            <option value="userFilter" >Filtrar por usuario</option>
            <option value="statusFilter" >Filtrar por estado</option>
        </select>
        <input type="hidden" id="userSearch" name="userSearch" onchange="this.form.submit()">
        <select name="stateSearch" id="statusSearch" hidden onchange="this.form.submit()">
            <option value="" selected disabled>Selecciona estado</option>
            <option value="Pendiente">Pendiente</option>
            <option value="En trámite">En trámite</option>
            <option value="Enviado">Enviado</option>
            <option value="Entregado">Entregado</option>
        </select>
    </form>
    <script>

        function selectValue() {
            var form = document.getElementById("filterForm");
            var filtro = document.getElementById("filter");
            var value = filtro.value;
            var input = document.getElementById("userSearch");
            var select = document.getElementById("statusSearch");
            if(filtro.value == "userFilter") {
                input.setAttribute("type","text");
                select.setAttribute("hidden","");
                
            }
            else if(filtro.value == "statusFilter") {
                input.setAttribute("type","hidden");
                select.removeAttribute("hidden");
                
            }
            else {
                input.setAttribute("type","hidden");
                select.setAttribute("hidden","");
            }
        }
        
    </script>
</div>
