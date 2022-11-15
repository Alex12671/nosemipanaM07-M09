<h1>Administrar productos</h1>

<?php

echo "<table cellspacing = 0>";
while ($array = $show->fetchAll(PDO::FETCH_ASSOC)) {
    foreach($array as $data) {
        echo "<tr>";
        foreach($data as $field_name => $value) {
            if($field_name == "Imagenlibro") {
                echo "<td><img class='productImage' src=$value></img></td>";
            }
            else {
                if($value!=$data['Activo']){
                    echo "<td>$value</td>";
                }
            }
            
        }
        echo "<td><a href= 'index.php?controller=category&action=getCategoriesEdit&id=".$data['IdProducto']."&name=".$data['Nombre']."&desc=".$data['Descripcion']."&category=".$data['Genero']."&author=".$data['Autor']."&editorial=".$data['Editorial']."&pages=".$data['Paginas']."&price=".$data['Precio']."&date=".$data['Fecha_Entrada']."&date=".$data['Fecha_Entrada']."&quantity=".$data['Cantidad']."'> Editar Producto </a></td>";
        echo "<td><a href= 'index.php?controller=product&action=getEditImgForm&id=".$data['IdProducto']."'> Editar Imagen </a></td>";
        if($data['Activo']==1){
            echo "<td><a href= 'index.php?controller=product&action=Desactivate&id=".$data['IdProducto']."'> Desactivar </a></td>"; 
        }else{
            echo "<td><a href= 'index.php?controller=product&action=Activate&id=".$data['IdProducto']."'> Activar </a></td>"; 
        }
        echo "</tr>";
    }
}
echo "</table>";

?>
