<nav class="navegador">
    <ul>
        <li> <a href= 'index.php?controller=admin&action=logAdmin' >login admin </a></li>
        <li> <a href= 'index.php?controller=user&action=showRegisterForm' >Registrarse</a></li>
        <li class="bookCategory">Libros
            <ul class="filterCategories" >
                <?php
                    while ($array = $show->fetchAll(PDO::FETCH_ASSOC)) {
                       foreach ($array as $genero => $value) {
                            echo "<li><a href='index.php?controller=product&action=SearchProductsByCategory&id=".$value['IdGenero']."'>".$value['Nombre']."</a></li>";
                       }
                    }
                    echo "<li><a href='index.php?controller=product&action=showSales'>Ofertas</a></li>";
                ?>
            </ul>
        </li>
        <?php
            if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'comprador') {
        ?> 
            <li>Mi cuenta UwU
                    <ul class="filterCategories" >
                        <?php
                            echo "<li> <a href= 'index.php?controller=user&action=ShowUserProfile' >Datos de mi cuenta</a></li>"; 
                            echo "<li> <a href= 'index.php?controller=user&action=ShowUserOrders' >Ver mis pedidos</a></li>";
                            echo "<li> <a href= 'views/general/sortir.php' >Cerrar sesión</a></li>";  
                        ?>
                    </ul>
                </li>
            <?php
            }
            else {
                echo "<li> <a href= 'index.php?controller=user&action=logUser' >Iniciar sesión</a></li>";

        }
    ?>
    <li><?php echo "<form action= 'index.php?controller=product&action=SearchProductsByName' method='post'>"; ?>
            <input type='text' name='bookFilter'/>
            <input type='submit' value='Buscar'/>
        </form>
    </li>
    <li class="cartMenu" > <a href="Javascript:openSidebar()" > <img class="cartIcon" src="img/cart.png" >
    <?php
        if(isset($_SESSION['Cart'])) {
        echo "<p class='numberOfArticles'>".$_SESSION['TotalQuantity']."</p>";
        } 
    ?> 
    </a>
    </li>
    </ul>
</nav>


