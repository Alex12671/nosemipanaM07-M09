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
            echo "</div>";
            ?> </br>
            <div class="profileImg">
                <a href="index.php?controller=user&action=ModifyUserProfile"><img src='views/img/lapiz.png' width='60'></a>
                <a href="index.php?controller=user&action=DeactivateUserProfile"> <img src='views/img/trash.png' width='60'></a><br/>
            </div>
            <?php
        ?>
    </div>
    

    
</div>