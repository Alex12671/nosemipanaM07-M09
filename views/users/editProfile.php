<div class="container">
    
        <?php 
        if(isset($_POST['Provincia'])) {
            echo "Usuario editado correctamente";
            ?> <meta http-equiv="refresh" content="2; url=index.php?controller=user&action=ShowUserProfile"> <?php
        }
        else {?>
            <form  action='index.php?controller=user&action=EditUserProfile' method='POST' ENCTYPE="multipart/form-data">
                <h2 class="encabezado">Editar perfil</h2>
                <div class="editProfile">
                    
                    <div class="profile1"><label>Nombre</label> </div>
                    <div class="profile2"><input type='text' name='Nombre'  value="<?php echo $editProfileArray['Nombre']; ?>" ></div>
                    <div class="profile3"><label>1r apellido</label></div>
                    <div class="profile4"><input type='text' name='Apellidos1' value="<?php echo $editProfileArray['Apellido1']; ?>" ></div>
                    <div class="profile5">2do apellido</div>
                    <div class="profile6"><input type='text' name='Apellidos2' value="<?php echo $editProfileArray['Apellido2']; ?>" ></div>
                    <div class="profile7"><label>Cambiar password</label></div>
                    <div class="profile8"><input type='checkbox' id="passwdCheckbox" onchange="changePassword()" ><input type='hidden' name='Password' id="passwd" required></div>
                    <div class="profile9"><label>DNI</label></div>
                    <div class="profile10"><input type='text' name='DNI' pattern="[0-9]{8}[A-Z]" value="<?php echo $editProfileArray['DNI']; ?>" ></div>
                    <div class="profile11"><label>Email</label> </div>
                    <div class="profile12"><input type='email' name='Email' value="<?php echo $editProfileArray['Email']; ?>" ></div>
                    <div class="profile13"><label>Teléfono</label> </div>
                    <div class="profile14"><input type="number" name="Telefono" pattern="[0-9]{9}" value="<?php echo $editProfileArray['Telefono']; ?>" ></div>
                    <div class="profile15"><label>Calle</label></div>
                    <div class="profile16"><input type='text' name='Calle' value="<?php echo $editProfileArray['Calle']; ?>" ></div>
                    <div class="profile17"><label>Número</label></div>
                    <div class="profile18"><input type='number' name='Número' value="<?php echo $editProfileArray['Número']; ?>" ></div>
                    <div class="profile19"> <label>CP</label></div>
                    <div class="profile20"><input type='text' name='CP' pattern="[0-9]{5}" value="<?php echo $editProfileArray['CP']; ?>" ></div>
                    <div class="profile21"><label>Piso</label></div>
                    <div class="profile22"><input type='number' name='Piso' min="1" max="99" value="<?php echo $editProfileArray['Piso']; ?>" ></div>
                    <div class="profile23"><label>Ciudad</label></div>
                    <div class="profile24"><input type='text' name='Ciudad' value="<?php echo $editProfileArray['Ciudad']; ?>" ></div>
                    <div class="profile23"><label>Provincia</label></div>
                    <div class="profile24"> <input type='text' name='Provincia' value="<?php echo $editProfileArray['Provincia']; ?>" ></div>
                    <input type='submit' name='enviar'>
                    <a href="index.php?controller=user&action=ShowUserProfile"><img src='views/img/flecha.png' width='60'></a>
                </div>
            </form> 
            <br/>
        <?php
        }
        ?>
</div>


    
