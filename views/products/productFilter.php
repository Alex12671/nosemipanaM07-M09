<?php 
    while ($array = $filter->fetchAll(PDO::FETCH_ASSOC)) {
        foreach ($array as $genero => $value) {
            echo "<img class='productImage' src=".$value['Imagenlibro']."></img>";
            echo "<h2>".$value['Nombre']."</h2>";
            echo "<h2>".$value['Precio']."</h2>"; 
        }
     }
?>