<div class="container">
    <form class= "logIn" action='index.php?controller=admin&action=validateAdmin' method='POST'>
        <h2>Conexión de administrador</h2>
        </br>    
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