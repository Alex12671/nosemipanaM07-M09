<div class="slide">
            <div class="slide-inner">
                <input class="slide-open" type="radio" id="slide-1" 
                      name="slide" aria-hidden="true" hidden="" checked="checked">
                <div class="slide-item">
                    <?php
                        echo "<a href='index.php?controller=product&action=showSales'><img id='img1' src='views/img/ofertas.png'></img></a>";
                    ?>
                </div>
                <input class="slide-open" type="radio" id="slide-2" 
                      name="slide" aria-hidden="true" hidden="">
                <div class="slide-item">
                    <img id='img2' src="views/img/presentacion.png">
                </div>
                <input class="slide-open" type="radio" id="slide-3" 
                      name="slide" aria-hidden="true" hidden="">
                <div class="slide-item">
                    <img id='img3' src="views/img/novedades.png">
                </div>
                <label for="slide-3" class="slide-control prev control-1">‹</label>
                <label for="slide-2" class="slide-control next control-1">›</label>
                <label for="slide-1" class="slide-control prev control-2">‹</label>
                <label for="slide-3" class="slide-control next control-2">›</label>
                <label for="slide-2" class="slide-control prev control-3">‹</label>
                <label for="slide-1" class="slide-control next control-3">›</label>
                <ol class="slide-indicador">
                    <li>
                        <label for="slide-1" class="slide-circulo">•</label>
                    </li>
                    <li>
                        <label for="slide-2" class="slide-circulo">•</label>
                    </li>
                    <li>
                        <label for="slide-3" class="slide-circulo">•</label>
                    </li>
                </ol>
            </div>
</div>
<?php 
    
    if(isset($lastVisited)) {
        echo "<div class='container'>";
            echo "<div class='mainPage'>";
            if(isset($_GET['orderFail'])) {
                echo "<p class='orderFail'> Ha habido un error al realizar la compra. Revise el carrito.</p>";
            }
            echo "<h2 class='lastVisitedSection' >Últimos libros visitados</h2>";
            foreach($lastBooks as $data => $value) {
                while ($array = $value->fetch(PDO::FETCH_ASSOC)) {
                        echo "<section class='libros'>";
                    echo "<div class='internaMain'>";
                    echo "<h2>".$array['Nombre']."</h2>";
                    echo "</div>";
                    echo "<div>";
                    echo "<a href='index.php?controller=product&action=ShowProductDetails&idProduct=".$array['IdProducto']."' ><img class='productImage' src=".$array['Imagenlibro']."></img></a>";
                    echo "</div>";
                    echo "<div class='mainPrize'>";
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
                    echo "<div class='moreInfo'>";
                        echo "<div class='toInfo'>";
                            echo "<button class='mainButton'><a class='morInfo' href='index.php?controller=product&action=ShowProductDetails&idProduct=".$array['IdProducto']."' >Más info</a></button>";
                        echo "</div>";
                    echo "</div>";
                echo "</section>";
                    
                }
            }
            echo "</div>";
        echo "</div>";
    }

    ?>

<div class="clearfix"></div>
    <br/>

<div class="container">
    <div class ="mainPage">
        <?php
        echo "<h2 class='lastVisitedSection' >Novedades</h2>";
        while ($array = $show->fetchAll(PDO::FETCH_ASSOC)) {
            foreach($array as $data) {
                echo "<section class='libros'>";
                    echo "<div class='internaMain'>";
                    echo "<h2>".$data['nombre']."</h2>";
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


<script>
    window.onload = (event) => {
        if(window.screen.width >= 300 && window.screen.width <= 600){
            let img1= document.getElementById('img1');
            let img2= document.getElementById('img2');
            let img3= document.getElementById('img3');

            img1.style.height= '350px';
            img1.style.width= '500px';
            img1.style.objectFit= 'cover';

            img2.style.height= '350px';
            img2.style.width= '500px';
            img2.style.objectFit= 'cover';

            img3.style.height= '350px';
            img3.style.width= '500px';
            img3.style.objectFit= 'cover';

                        
            let div= document.getElementById('div');

            // if(div!=undefined)
            // {
            div.className = 'mobileMenu';
        
            let newA = document.createElement("a");
            let newContent = document.createTextNode("Menu");
            newA.className = 'open-hide';
            newA.appendChild(newContent);
            
            let ul= document.getElementById('ul');
            div.insertBefore(newA, ul);

            let img= document.getElementById('ImgChange');
            img.src= 'views/img/blackchart.png';
            // }
        };
    };
</script>