<div class="slide">
            <div class="slide-inner">
                <input class="slide-open" type="radio" id="slide-1" 
                      name="slide" aria-hidden="true" hidden="" checked="checked">
                <div class="slide-item">
                    <img src="views/img/ofertas.png"></img>
                </div>
            </div>
</div>
<div class="container">
    <div class ="mainPage">
        <?php 
            while ($array = $filter->fetchAll(PDO::FETCH_ASSOC)) {
                foreach ($array as $genero => $data) {
                    echo "<section class='libros'>";
                    echo "<div class='internaMain'>";
                    echo "<h2>".$data['Nombre']."</h2>";
                    echo "</div>";
                    echo "<div>";
                    echo "<a href='index.php?controller=product&action=ShowProductDetails&idProduct=".$data['IdProducto']."' ><img class='productImage' src=".$data['Imagenlibro']."></img></a>";
                    echo "</div>";
                    echo "<div class='mainPrize'>";
                    if($data['Liquidacion']==0){
                        $precio = number_format($data['Precio'],2);
                        echo "<h2>$precio €</h2>";
                    }
                    else if($data['Liquidacion']==1){
                        $precio=number_format($data['Precio'],2);
                        $sale = $precio*0.90;
                        $sale=number_format($sale,2);
                        echo "<h2> <span class='before'> $precio € </span> &nbsp $sale €</h2>";
                    }
                    echo "</div>";
                    echo "<div class='cart'>";
                    if($data['Cantidad'] > 0) {
                        echo "<h2><a class='addToCart' href='index.php?controller=product&action=AddProductToCart&id=".$data['IdProducto']."' ><img class='addCartIcon' src='img/cart.png' style=width:30px; height:30px; > AÑADIR AL CARRO</a></h2>";    
                    }
                    else {
                        echo "<h2><a class='noStock'  ><img src='img/cart.png' style=width:30px; height:30px; > AÑADIR AL CARRO</a></h2>";
                    }
                    echo "</div>";
                    echo "<div class='moreInfo'>";
                        echo "<div class='toInfo'>";
                            echo "<button class='mainButton'><a class='morInfo' href='index.php?controller=product&action=ShowProductDetails&idProduct=".$data['IdProducto']."' >Más info</a></button>";
                        echo "</div>";
                    echo "</div>";
                echo "</section>";
                }
            }
        ?>
    </div>
</div>