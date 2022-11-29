
<div class="container">
    <form class= "logIn" autocomplete="off" class= "logUser" action='index.php?controller=user&action=ValidateUserCredentials' method='POST'>
    <h2>Conexión de usuario</h2></br>        
    <label>Usuario</label>
        <input type='text' name='nombre' required>
        </br>
        <label>Password</label>
        <input type='password' name='password' required>
        </br>
        <input type='submit' name='enviar'>
        <?php
            if(isset($_GET['loginFailed']) && $_GET['loginFailed'] == 1) {
                echo "<p class='loginFail'> El usuario o contraseña introducido son incorrectos</p>";
            } 
        
        ?>
    </form>
</div>
