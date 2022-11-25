<?php
while ($array = $details->fetch(PDO::FETCH_ASSOC)) {
    echo "<img src=".$array['Imagenlibro']."></img>";
    echo "<h1>".$array['Nombre']."</h1>";
    echo "<h2>".$array['Precio']."€</h2>"; 
    echo "<h3>".$array['Descripcion']."</h3>"; 
    echo "<h2><a href='index.php?controller=product&action=AddProductToCart' >Añadir al carro</a></h2>";
    if(isset($_COOKIE['aceptado'])) {
        if($_COOKIE['aceptado'] == 1) {
            if(!isset($_COOKIE['lastVisitedBooks'])) {
                setCookie('lastVisitedBooks[idProducto'.$array['IdProducto'].']',''.$array['IdProducto'].'',time() + (60 * 60 * 24 * 365));
            }
            else {
                var_dump($_COOKIE);
                    setCookie('lastVisitedBooks[idProducto'.$array['IdProducto'].']',''.$array['IdProducto'].'',time() + (60 * 60 * 24 * 365));
                
            }
        }
    }
}
?>