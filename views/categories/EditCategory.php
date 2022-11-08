<form action='index.php?controller=category&action=EditCategory' method='POST' ENCTYPE="multipart/form-data">
    <label>ID</label>        <input type='text' name='ID' value="<?php echo ($_GET['id']) ?>" > <br>
    <label>Nombre</label>    <input type='text' name='Nombre' value="<?php echo ($_GET['name']) ?>"><br>
    <input type='submit' name='enviar'>
</form>

