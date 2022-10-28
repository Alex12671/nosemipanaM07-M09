<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action='index.php?controller=admin&action=validateAdmin' method='POST'>
        <label>Usuario</label>
        <input type='text' name='nombre'>
        <label>Password</label>
        <input type='password' name='password'>
        <input type='submit' name='enviar'>
    </form>
</body>
</html>