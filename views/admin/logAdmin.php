<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<div class="container">
        <form class= "logIn" action='index.php?controller=admin&action=validateAdmin' method='POST'>
            <label>Conexión de administrador</label>
            </br>    
            <label>Usuario</label>
            <input type='text' name='nombre'>
            </br>
            <label>Password</label>
            <input type='password' name='password'>
            </br>
            <input type='submit' name='enviar'>
        </form>
    </div>
</body>
</html>