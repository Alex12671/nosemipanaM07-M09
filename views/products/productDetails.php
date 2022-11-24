<?php
while ($array = $details->fetch(PDO::FETCH_ASSOC)) {
    echo "<img src=".$array['Imagenlibro']."></img>";
    echo "<h1>".$array['Nombre']."</h1>";
    echo "<h2>".$array['Precio']."€</h2>"; 
    echo "<h3>".$array['Descripcion']."</h3>"; 
    echo "<h2><a href='index.php?controller=product&action=AddProductToCart' >Añadir al carro</a></h2>";
    if($_COOKIE['aceptado'] == 1) {
        if(!isset($_COOKIE['lastVisitedBooks'])) {
            setCookie('lastVisitedBooks[idProducto'.$array['IdProducto'].']',''.$array['IdProducto'].'',time() + (60 * 60 * 24 * 365));
        }
        else {
            echo count($_COOKIE['lastVisitedBooks']);
            if((count($_COOKIE['lastVisitedBooks']) >= 3)) {
                echo "uwu";
                setcookie("lastVisitedBooks[idProducto".array_pop($_COOKIE['lastVisitedBooks'])."]", "", time()-7200);    
                setCookie('lastVisitedBooks[idProducto'.$array['IdProducto'].']',''.$array['IdProducto'].'',time() + (60 * 60 * 24 * 365));
            }
            else {
                setCookie('lastVisitedBooks[idProducto'.$array['IdProducto'].']',''.$array['IdProducto'].'',time() + (60 * 60 * 24 * 365));
            }
        }
        
    }
}
?>