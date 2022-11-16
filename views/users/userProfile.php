<div class="container">
    <h2>Datos de tu perfil</h2>
        
        <?php
        foreach($array as $field_name => $value) {
            if($field_name != "Activo" && $field_name != "Password") {
                echo "$field_name : $value<br/>";
            }
        }
        ?> <a href="index.php?controller=user&action=ModifyUserProfile">Modificar perfil</a><br/>
        <a href="index.php?controller=user&action=DeactivateUserProfile">Darse de baja</a><br/> <?php
    ?>

    
</div>