<?php 
    while ($array = $filter->fetchAll(PDO::FETCH_ASSOC)) {
        foreach ($array as $genero => $value) {
            echo "".$value['IdProducto']."".$value['Nombre']."";
        }
     }
?>