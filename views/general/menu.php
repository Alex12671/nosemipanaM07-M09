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
                ?>
            </ul>
        </li>
    </ul>
</nav>


