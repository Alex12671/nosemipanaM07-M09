<div class="container">
    <div class ="mainPage">
        <?php 
            while ($array = $filter->fetchAll(PDO::FETCH_ASSOC)) {
                foreach ($array as $genero => $value) {
                    echo "<section class='libros'>";
                    echo "<div class='internaMain'>";
                    echo "<h2>".$value['Nombre']."</h2>";
                    echo "</div>";
                    echo "<div>";
                    echo "<img class='productImage' src=".$value['Imagenlibro']."></img>";
                    echo "</div>";
                    echo "<div>";
                    if($value['Liquidacion']==0){
                        $precio = number_format($value['Precio'],2);
                        echo "<h2>$precio €</h2>";
                    }
                    else if($value['Liquidacion']==1){
                        $precio=$value['Precio']*0.90;
                        $precio=number_format($precio,2);
                        echo "<h2>$precio €</h2>";
                    }
                    echo "</div>";
                    echo "<div class='internaMain'>";
                    echo "<h2><a href='index.php?controller=product&action=ShowProductDetails&idProduct=".$value['IdProducto']."' >Ver ficha</a></h2>";
                    echo "</div>";
                echo "</section>"; 
                }
            }
        ?>
    </div>
</div>
