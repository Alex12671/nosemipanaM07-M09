
<?php 
if(isset($_POST['Provincia'])) {
    echo "Usuario editado correctamente";
    ?> <meta http-equiv="refresh" content="2; url=index.php?controller=user&action=ShowUserProfile"> <?php
}
else {?>
    <form class="editForm" action='index.php?controller=user&action=EditUserProfile' method='POST' ENCTYPE="multipart/form-data">
            <label>Nombre</label>             <input type='text' name='Nombre'  value="<?php echo $editProfileArray['Nombre']; ?>" ><br>
            <label>1r apellido</label>        <input type='text' name='Apellidos1' value="<?php echo $editProfileArray['Apellido1']; ?>" ><br>
            <label>2do apellido</label>       <input type='text' name='Apellidos2' value="<?php echo $editProfileArray['Apellido2']; ?>" ><br>
            <label>Cambiar password</label>   <input type='checkbox' id="passwdCheckbox" onchange="changePassword()" ><input type='hidden' name='Password' id="passwd" required><br>
            <label>DNI</label>                <input type='text' name='DNI' pattern="[0-9]{8}[A-Z]" value="<?php echo $editProfileArray['DNI']; ?>" ><br>
            <label>Email</label>              <input type='email' name='Email' value="<?php echo $editProfileArray['Email']; ?>" ><br>
            <label>Teléfono</label>           <input type="number" name="Telefono" pattern="[0-9]{9}" value="<?php echo $editProfileArray['Telefono']; ?>" ><br>
            <label>Calle</label>              <input type='text' name='Calle' value="<?php echo $editProfileArray['Calle']; ?>" ><br>
            <label>Número</label>             <input type='number' name='Número' value="<?php echo $editProfileArray['Número']; ?>" ><br>
            <label>CP</label>                 <input type='text' name='CP' pattern="[0-9]{5}" value="<?php echo $editProfileArray['CP']; ?>" ><br>
            <label>Piso</label>               <input type='number' name='Piso' min="1" max="99" value="<?php echo $editProfileArray['Piso']; ?>" ><br>
            <label>Ciudad</label>             <input type='text' name='Ciudad' value="<?php echo $editProfileArray['Ciudad']; ?>" ><br>
            <label>Provincia</label>          <input type='text' name='Provincia' value="<?php echo $editProfileArray['Provincia']; ?>" ><br>
            <input type='submit' name='enviar'>
    </form> 
    <a href="index.php?controller=user&action=ShowUserProfile">Volver a datos de mi cuenta</a><br/>
<?php
}
?>
