<?php
while ($array = $details->fetch(PDO::FETCH_ASSOC)) {
            echo "<img src=".$array['Imagenlibro']."></img>";
            echo "<h1>".$array['Nombre']."</h1>";
            echo "<h2>".$array['Precio']."€</h2>"; 
            echo "<h3>".$array['Descripcion']."</h3>"; 
            echo "<h2><a href='index.php?controller=product&action=AddProductToCart' >Añadir al carro</a></h2>";
}
?>