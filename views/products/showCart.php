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
                        echo "<p>".$array['Nombre']."</p>";
                        echo "<p>".$array['Autor']."</p>";
                        echo "<form method='POST' action='index.php?controller=product&action=ShowCart&id=".$array['IdProducto']."'>";
                        echo "<input type='number' name='quantity' min=1 value=".$_SESSION['Cart'][$array['IdProducto']]['Quantity']." onchange='this.form.submit();window.location.reload()'></p>";
                        echo "</form>";
                        echo "<p>".$_SESSION['Cart'][$array['IdProducto']]['Price']."€</p>";
                    echo "</div>";
                echo "<hr/>";
                echo "</div>";
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
                echo "<hr/>";
                echo "<p>Total: ".$total."€ </p>";
            }
            else {
                echo "<p>Gastos de envío: 4.99€ </p>";
                echo "<hr/>";
                echo "<p>Total: ".$total + 4.99."€ </p>";
            }
            ?>
            <form action="index.php?controller=product&action=ConfirmOrder" method="POST">
                <button class="addToCart"> FINALIZAR COMPRA </button>
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