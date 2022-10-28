<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action='index.php?controller=product&action=AddProducts' method='POST'>
        <label>Nombre</label>
        <input type='text' name='Nombre'>
        <label>Descripcion</label>
        <input type='text' name='Descripcion'>
        <label>Genero</label>
        <input type='text' name='Genero'>
        <label>Autor</label>
        <input type='text' name='Autor'>
        <label>Editorial</label>
        <input type='text' name='Editorial'>
        <label>Imagenlibro</label>
        <input type='text' name='Imagenlibro'>
        <label>Precio</label>
        <input type='text' name='Precio'>
        <label>Fecha_Entrada</label>
        <input type='text' name='Fecha_Entrada'>
        <label>Cantidad</label>
        <input type='text' name='Cantidad'>
        <label>Liquidacion</label>
        <input type='text' name='Liquidacion'>
        <input type='submit' name='enviar'>
    </form>
</body>
</html>