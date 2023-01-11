<div class="container">
    <form class="category" action='index.php?controller=category&action=AddCategory' method='POST' ENCTYPE="multipart/form-data">
        <h2>Añadir categoría</h2></br>
        <label>ID</label>        <input type='text' name='ID' required><br>
        <label>Nombre</label>    <input type='text' name='Nombre' required><br>
        <label>ImagenGenero</label>    <input type="file" name="ImagenGenero" accept=".png, .jpg, .jpeg" required><br>
        <input class="button" type='submit' name='enviar'>
    </form>
</div>


