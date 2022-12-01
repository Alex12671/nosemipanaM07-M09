<div class="container">
    <div class="cart">
        <?php 
        if(isset($_SESSION['Cart']) || !empty($_SESSION['Cart'])) {
            if(isset($_POST['quantity'])) {
                $precioUnitario = $_SESSION['Cart'][$_GET['id']]['Price'] / $_SESSION['Cart'][$_GET['id']]['Quantity'];
                $_SESSION['Cart'][$_GET['id']]['Price'] = $precioUnitario * $_POST['quantity'];
                $_SESSION['Cart'][$_GET['id']]['Quantity'] = $_POST['quantity'];
                $_SESSION['TotalQuantity'] = 0;
            foreach($_SESSION['Cart'] as $data) {
                
                $_SESSION['TotalQuantity'] += $data['Quantity']; 
            }
            }
            foreach($cart as $data) {
                $array = $data->fetch(PDO::FETCH_ASSOC);
                echo "<div class='orderLine'>";
                    echo "<div class='orderLineImg'>";
                        echo "<img src='".$array['Imagenlibro']."' style=width:150px; height:150px; >";
                    echo "</div>";
                    echo "<div class='orderLineDetails'>";
                        echo "<p class='bookTitle'>".$array['Nombre']."</p>";
                        echo "<p class='bookAuthor'>".$array['Autor']."</p>";
                        echo "<form method='POST' action='index.php?controller=product&action=ShowCart&id=".$array['IdProducto']."'>";
                        echo "<input type='number' name='quantity' min=1 value=".$_SESSION['Cart'][$array['IdProducto']]['Quantity']." onchange='this.form.submit();window.location.reload()'></p>";
                        echo "</form>";
                        echo "<p class='linePrice' >".$_SESSION['Cart'][$array['IdProducto']]['Price']."€</p>";
                    echo "</div>";
                echo "</div>";
                echo "<hr class='separator' >";
            }
        ?>
        <div class="orderSummary">
            <?php
            $total = 0;
            foreach($_SESSION['Cart'] as $data) {
                $total += $data['Price'];
            } 
            echo "<p>Subtotal: ".$total."€</p>";
            if($total > 30) {
                echo "<p>Gastos de envío: Gratis </p>";
                echo "<hr class='summarySeparator'>";
                echo "<p>Total: <span class='totalPrice' >".$total."€ </span> </p>";
            }
            else {
                echo "<p>Gastos de envío: 4.99€ </p>";
                echo "<hr class='summarySeparator'>";
                echo "<p>Total: <span class='totalPrice' >".$total + 4.99."€ </span> </p>";
            }
            ?>
            <form action="index.php?controller=product&action=ConfirmOrder" method="POST">
                <button class="addToCart"> FINALIZAR COMPRA </button>
            </form>
            <form action="index.php?controller=product&action=EmptyCart" method="POST">
                <button class="emptyCart"> VACIAR CARRITO </button>
            </form>
        </div>
        <?php
        }
        else {
            echo "<p>The cart is fulln't</p>";
        }
        ?>

            
    </div>
</div>