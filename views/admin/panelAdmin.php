<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administración</title>
</head>
<body>
    <h1>Panel administrador</h1>
    <ul class="adminMenu">
        <li><a href="index.php?controller=product&action=showProducts">Administrar productos</li>
        <li><a href="index.php?controller=category&action=showCategories">Administrar categorias</li>
        <li><a href="index.php?controller=order&action=orderStatus">Ver pedidos</li>
        <li><a href= "index.php?controller=category&action=getCategoriesAdd"> Añadir Producto </a></li>
        <li><a href= "index.php?controller=category&action=AddCategoryForm"> Añadir Genero </a></li>
    </ul>
</body>
</html>