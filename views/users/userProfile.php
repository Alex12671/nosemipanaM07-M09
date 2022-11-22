<div class="container">
    <h2 class="encabezado">Datos de tu perfil</h2>
    <div class="perfil">
        <?php
            $i=1;
            echo "<div class='parent'>";
            foreach($array as $field_name => $value) {
                if($field_name != "Activo" && $field_name != "Password") {
                    echo "<div class='div$i'>$field_name : $value<br/></div>";
                }
                $i=$i+1;
            }
            ?> <a href="index.php?controller=user&action=ModifyUserProfile">Modificar perfil</a><br/>
            <a href="index.php?controller=user&action=DeactivateUserProfile"> Darse de baja</a><br/> <?php
            echo "</div>";
        ?>
    </div>
    

    
</div>