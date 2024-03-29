<div class="cartSidebar" id="cartSidebar" >
    <div class="closeSidebar">
        <img class="closeSidebarImg" src="img/close-icon.png" onclick="closeSidebar()">
    </div>
    <div class="orders">
    <?php 
    if(isset($_SESSION['Cart']) || !empty($_SESSION['Cart'])) {
        if(isset($_POST['quantity'])) {
            $precioUnitario = $_SESSION['Cart'][$_GET['id']]['Price'] / $_SESSION['Cart'][$_GET['id']]['Quantity'];
            if(isset($_SESSION['Cart'][$_GET['id']]['OriginalPrice'])) {
                $precioOriginalUnitario = $_SESSION['Cart'][$_GET['id']]['OriginalPrice'] / $_SESSION['Cart'][$_GET['id']]['Quantity'];
                $_SESSION['Cart'][$_GET['id']]['OriginalPrice'] = $precioOriginalUnitario * $_POST['quantity'];
            }
            $_SESSION['Cart'][$_GET['id']]['Price'] = $precioUnitario * $_POST['quantity'];
            $_SESSION['Cart'][$_GET['id']]['Quantity'] = $_POST['quantity'];
            $_SESSION['TotalQuantity'] = 0;
        foreach($_SESSION['Cart'] as $data) {
            
            $_SESSION['TotalQuantity'] += $data['Quantity']; 
        }
        }
        foreach($_SESSION['Cart'] as $data => $value) {
            echo "<div class='orderLine'>";
                echo "<div class='orderLineImg'>";
                    echo "<img src='".$value['Imagen']."' style=width:150px; height:150px; >";
                echo "</div>";
                echo "<div class='orderLineDetails'>";
                    echo "<p class='bookTitle'>".$value['Nombre']."</p>";
                    echo "<p class='bookAuthor'>".$value['Autor']."</p>";
                    
                    if($_SESSION['Cart'][$data]['Stock'] < $_SESSION['Cart'][$data]['Quantity']) {        
                        echo "<form method='POST' action='index.php?controller=product&action=ShowMain&id=".$data."' id='quantityForm'>";
                        echo "<input type='number' name='quantity' id='quantity' min='1' max='".$_SESSION['Cart'][$data]['Stock']."' value=".$_SESSION['Cart'][$data]['Quantity']." onchange='checkQuantityInput()'></p>";
                        echo "</form>";
                        echo "<p class='maxStock'>Stock disponible: 100 \n</p>";
                    }
                    else {
                        echo "<form method='POST' action='index.php?controller=product&action=ShowMain&id=".$data."' id='quantityForm'>";
                        echo "<input type='number' name='quantity' id='quantity' min='1' max='".$_SESSION['Cart'][$data]['Stock']."' value=".$_SESSION['Cart'][$data]['Quantity']." onchange='checkQuantityInput()'></p>";
                        echo "</form>";
                    }
                    if($_SESSION['Cart'][$data]['Liquidacion']==0){
                        echo "<p class='linePrice' >".number_format( (float) $_SESSION['Cart'][$data]['Price'],2)."€</p>";
                    }
                    else if($_SESSION['Cart'][$data]['Liquidacion']==1){
                        $_SESSION['Cart'][$data]['Price']=$_SESSION['Cart'][$data]['Price'];
                        $_SESSION['Cart'][$data]['Price'] = number_format($_SESSION['Cart'][$data]['Price'],2);
                        echo "<p class='originalPrice' >".$_SESSION['Cart'][$data]['OriginalPrice']."€</p>";
                        echo "<p class='linePrice' >".$_SESSION['Cart'][$data]['Price']."€</p>";
                    }
                    echo "<form action='index.php?controller=product&action=DeleteProductFromCart&id=".$data."' method='POST'>";
                    echo "<button class='deleteProduct'> ELIMINAR PRODUCTO </button>";
                    echo "</form>";
                echo "</div>";
            echo "</div>";
            echo "<hr class='separator' >";
        }
    ?>
    </div>
    <div class="orderSummary">
        <?php
        $total = 0;
        foreach($_SESSION['Cart'] as $data) {
            $total += $data['Price'];
        } 
        echo "<p>Subtotal: ".number_format((float) $total,2)."€</p>";
        if($total > 30) {
            echo "<p>Gastos de envío: Gratis </p>";
            echo "<hr class='summarySeparator'>";
            echo "<p>TOTAL: <span class='totalPrice' >".number_format((float) $total,2)."€ </span> </p>";
        }
        else {
            $total += 4.99;
            echo "<p>Gastos de envío: 4.99€ </p>";
            echo "<hr class='summarySeparator'>";
            echo "<p>TOTAL: <span class='totalPrice' >".number_format((float) $total,2)."€ </span> </p>";
        }
        ?>
        <form action="index.php?controller=order&action=AddOrder&total=<?php echo $total; ?>" method="POST">
            <button class="addToCart"> FINALIZAR COMPRA </button>
        </form>
        <form action="index.php?controller=product&action=EmptyCart" method="POST">
            <button class="emptyCart"> VACIAR CARRITO </button>
        </form>
    
    <?php
    }
    else {
        echo "<p class='cartIsEmpty' >The cart is empty</p>";
    }
    ?>
    </div>
</div>