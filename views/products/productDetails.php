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
                $lastVisited = array
                (
                    0 => $array['IdProducto'],
                );
                $json = json_encode($lastVisited);
                setcookie('lastVisitedBooks', $json,time() + (60 * 60 * 24 * 365));
            }
            else {
                $length = count(json_decode($_COOKIE['lastVisitedBooks'],true));
                if($length == 3){
                   $lastVisited = json_decode($_COOKIE['lastVisitedBooks'],true);
                    if(!in_array($array['IdProducto'],$lastVisited)) {
                        array_shift($lastVisited);
                        array_push($lastVisited,$array['IdProducto']);
                    }
                    else {
                        $clave = array_search($array['IdProducto'],$lastVisited);
                        array_splice($lastVisited,$clave,1);
                        array_push($lastVisited,$array['IdProducto']);
                    }
                    $json = json_encode($lastVisited);
                    setcookie('lastVisitedBooks', $json,time() + (60 * 60 * 24 * 365));
                }
                else if($length > 1) {
                    $lastVisited = json_decode($_COOKIE['lastVisitedBooks'],true);
                    if(!in_array($array['IdProducto'],$lastVisited)) {
                        array_push($lastVisited,$array['IdProducto']);
                    }
                    $json = json_encode($lastVisited);
                    setcookie('lastVisitedBooks', $json,time() + (60 * 60 * 24 * 365));
                }
                else {
                    $lastVisited = json_decode($_COOKIE['lastVisitedBooks'],true);
                    if(!in_array($array['IdProducto'],$lastVisited)) {
                        array_push($lastVisited,$array['IdProducto']);
                    }
                    $json = json_encode($lastVisited);
                    setcookie('lastVisitedBooks', $json,time() + (60 * 60 * 24 * 365));
                }
            }
        }
    }
}
?>