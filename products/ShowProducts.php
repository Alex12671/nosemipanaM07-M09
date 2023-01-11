<div class="container">
    <div class="encabezado">
        <h2>Administrar productos</h2><br/>
        <form action="index.php?controller=product&action=searchProducts" method="POST" id="searchProducts">
            Buscar: <input type="text" id="searchField" name="searchField" onchange="this.form.submit()">
        </form>
    </div>
    <?php
    echo "<table class='showProducts' cellspacing = 10>";
    echo "<th> ID </th>";
    echo "<th> Nombre </th>";
    echo "<th> Descripcion </th>";
    echo "<th> Género </th>";
    echo "<th> Autor </th>";
    echo "<th> Editorial </th>";
    echo "<th> Páginas </th>";
    echo "<th> Portada </th>";
    echo "<th> Precio </th>";
    echo "<th> Fecha </th>";
    echo "<th> Cantidad </th>";
    echo "<th> Liquidación </th>";
    echo "<th> Ed.prod </th>";
    echo "<th> Ed.img </th>";
    echo "<th> Mod. Estado </th>";

    while ($array = $show->fetchAll(PDO::FETCH_ASSOC)) {
        foreach($array as $data) {
            echo "<tr>";
            foreach($data as $field_name => $value) {
                if($field_name == "Imagenlibro") {
                    echo "<td><img class='imageTable' src=$value></img></td>";
                }
                else {
                    if($value!=$data['Activo']){
                        echo "<td>$value</td>";
                    }
                }
                
            }
            echo "<td><a href= 'index.php?controller=category&action=getCategoriesEdit&id=".$data['IdProducto']."&name=".$data['Nombre']."&desc=".$data['Descripcion']."&category=".$data['Genero']."&author=".$data['Autor']."&editorial=".$data['Editorial']."&pages=".$data['Paginas']."&price=".$data['Precio']."&date=".$data['Fecha_Entrada']."&date=".$data['Fecha_Entrada']."&quantity=".$data['Cantidad']."&settlement=".$data['Liquidacion']."'> <img src='views/img/lapiz.png' width='60'> </a></td>";
            echo "<td><a href= 'index.php?controller=product&action=getEditImgForm&id=".$data['IdProducto']."'> <img src='views/img/camara.png' width='60'> </a></td>";
            if($data['Activo']=='a'){
                echo "<td><a href= 'index.php?controller=product&action=Desactivate&id=".$data['IdProducto']."'><img src='views/img/on.png' width='60'></a></td>"; 
            }else if($data['Activo']=='d'){
                echo "<td><a href= 'index.php?controller=product&action=Activate&id=".$data['IdProducto']."'> <img src='views/img/off.png' width='60'> </a></td>"; 
            }
            echo "</tr>";
        }
    }
    echo "</table>";

    ?>

</div>
