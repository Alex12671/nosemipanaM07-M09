<?php
while ($array = $show->fetchAll(PDO::FETCH_ASSOC)) {
    foreach($array as $data) {
            echo "<img class='productImage' src=".$data['Imagenlibro']."></img>";
            echo "<h2>".$data['nombre']."</h2>";
            echo "<h2>".$data['Precio']."</h2>"; 
    }
}

?>