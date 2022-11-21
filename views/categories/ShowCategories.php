<div class="container">
    <h1>Administrar categorias</h1>
    <?php
        echo "<table cellspacing = 10>";
            echo "<th> Abreviatura </th>";
            echo "<th> Nombre Género</th>";
            echo "<th> Editar </th>";
            echo "<th> Estado </th>";
            while ($array = $show->fetchAll(PDO::FETCH_ASSOC)) {
                foreach($array as $data) {
                    echo "<tr>";
                    foreach($data as $field_name => $value) {
                        if($value!=$data['Activo']){
                            echo "<td>$value</td>";
                        }
                    }
                    echo "<td><a href= 'index.php?controller=category&action=ShowEditCategoryForm&id=".$data['IdGenero']."&name=".$data['Nombre']."'> Editar Genero </a></td>";
                    if($data['Activo']==1){
                        echo "<td><a href= 'index.php?controller=category&action=Desactivate&id=".$data['IdGenero']."'> Desactivar </a></td>"; 
                    }else{
                        echo "<td><a href= 'index.php?controller=category&action=Activate&id=".$data['IdGenero']."'> Activar </a></td>"; 
                    }
                    echo "</tr>";
                }
            }
        echo "</table>";

    ?>

</div>

