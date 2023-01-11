
<div class="container">
    <div class="detail">
        <?php
        while ($array = $details->fetch(PDO::FETCH_ASSOC)) {
            //cookies//
            
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
            echo "<div class='image'><img class='imgDetail' src=".$array['Imagenlibro']."></img></div>";
            echo "<div class='rest'>";
            echo "<h2 class='encabezado titledetail'>".$array['Nombre']."</h2>";
            echo "<div class='descripcion'>";
            echo "<h3>".$array['Descripcion']."</h3>";
            echo "</div>";
            echo "<div class='precio'>";
            if($array['Liquidacion']==0){
                $precio = number_format($array['Precio'],2);
                echo "<h2>$precio €</h2>";
            }
            else if($array['Liquidacion']==1){
                $precio=number_format($array['Precio'],2);
                $sale = $precio*0.90;
                $sale=number_format($sale,2);
                echo "<h2> <span class='before'> $precio € </span> &nbsp $sale €</h2>";
            }
            echo "</div>";
            echo "<div class='cart'>";
            if($array['Cantidad'] > 0) {
                echo "<h2><a class='addToCart' href='index.php?controller=product&action=AddProductToCart&id=".$array['IdProducto']."' ><img class='addCartIcon' src='img/cart.png' style=width:30px; height:30px; > AÑADIR AL CARRO</a></h2>";    
            }
            else {
                echo "<h2><a class='noStock'  ><img src='img/cart.png' style=width:30px; height:30px; > AÑADIR AL CARRO</a></h2>";
            }
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>
</div>