<div class="container">
    <div class="encabezado">
        <h2>Administrar categorías</h2><br/>
    </div>
    <?php
        echo "<table cellspacing = 10>";
            echo "<th> Abreviatura </th>";
            echo "<th> Nombre Género</th>";
            echo "<th> Imagen</th>";
            echo "<th> Editar </th>";
            echo "<th> Ed.img </th>";
            echo "<th> Estado </th>";
            while ($array = $show->fetchAll(PDO::FETCH_ASSOC)) {
                foreach($array as $data) {
                    echo "<tr>";
                    foreach($data as $field_name => $value) {
                        if($field_name == "Imagen") {
                            echo "<td><img class='imageCat' src=$value></img></td>";
                        }
                        else {
                            if($value!=$data['Activo']){
                                echo "<td>$value</td>";
                            }
                        }
                    }
                    echo "<td><a href= 'index.php?controller=category&action=ShowEditCategoryForm&id=".$data['IdGenero']."&name=".$data['Nombre']."'> <img src='views/img/lapiz.png' width='60'> </a></td>";
                    echo "<td><a href= 'index.php?controller=category&action=getEditCatImgForm&id=".$data['IdGenero']."'> <img src='views/img/camara.png' width='60'> </a></td>";
                    if($data['Activo']==1){
                        echo "<td><a href= 'index.php?controller=category&action=Desactivate&id=".$data['IdGenero']."'> <img src='views/img/on.png' width='60'> </a></td>"; 
                    }else{
                        echo "<td><a href= 'index.php?controller=category&action=Activate&id=".$data['IdGenero']."'> <img src='views/img/off.png' width='60'> </a></td>"; 
                    }
                    echo "</tr>";
                }
            }
        echo "</table>";
    ?>

</div>

