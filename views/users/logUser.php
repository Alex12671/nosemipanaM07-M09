
<div class="container">
    <form class= "logIn" autocomplete="off" class= "logUser" action='index.php?controller=user&action=ValidateUserCredentials' method='POST'>
    <h2>Conexión de usuario</h2></br>        
    <label>Usuario</label>
        <input type='text' name='email' required>
        </br>
        <label>Password</label>
        <input type='password' name='password' required>
        </br>
        <input class="button" type='submit' name='enviar'>
        <?php
            if(isset($_GET['loginFailed']) && $_GET['loginFailed'] == 1) {
                echo "<p class='loginFail'> El usuario o contraseña introducido son incorrectos</p>";
            } 
            else if(isset($_GET['orderFailed']) && $_GET['orderFailed'] == 1) {
                echo "<p class='validateFail'> Debes iniciar sesión para finalizar tu pedido</p>";
            } 
        
        ?>
    </form>
</div>
