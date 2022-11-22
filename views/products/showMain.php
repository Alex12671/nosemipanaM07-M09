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
