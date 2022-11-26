<?php 
    
    if(isset($lastVisited)) {
        echo "<div class='container'>";
            echo "<div class='mainPage'>";
            echo "<h2 class='lastVisitedSection' >Últimos libros visitados</h2>";
            foreach($lastBooks as $data => $value) {
                while ($array = $value->fetch(PDO::FETCH_ASSOC)) {
                        echo "<section class='libros'>";
                            echo "<h2>".$array['Nombre']."</h2>";
                            echo "</br>";
                            echo "<img class='productImage' src=".$array['Imagenlibro']."></img>";
                            echo "</br>";
                            echo "<h2>".$array['Precio']."</h2>"; 
                            echo "<h2><a href='index.php?controller=product&action=ShowProductDetails&idProduct=".$array['IdProducto']."' >Ver ficha</a></h2>";
                            echo "</br>";
                        echo "</section>";
                    
                }
            }
            echo "</div>";
        echo "</div>";
    }

    ?>
    <br/>

<div class="container">
    <div class ="mainPage">
        <?php
        
        while ($array = $show->fetchAll(PDO::FETCH_ASSOC)) {
            foreach($array as $data) {
                echo "<section class='libros'>";
                    echo "<h2>".$data['nombre']."</h2>";
                    echo "</br>";
                    echo "<img class='productImage' src=".$data['Imagenlibro']."></img>";
                    echo "</br>";
                    echo "<h2>".$data['Precio']."</h2>"; 
                    echo "<h2><a href='index.php?controller=product&action=ShowProductDetails&idProduct=".$data['IdProducto']."' >Ver ficha</a></h2>";
                    echo "</br>";
                echo "</section>";
            }
        }

        ?>
    </div>
</div>
