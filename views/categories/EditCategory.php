<div class="container">
    <form class='categoryTable' action='index.php?controller=category&action=EditCategory' method='POST' ENCTYPE="multipart/form-data">
        <h2>Modificar género</label></h2>
        <label>ID</label>        <input type='text' name='ID' value="<?php echo ($_GET['id']) ?>" > <br>
        <label>Nombre</label>    <input type='text' name='Nombre' value="<?php echo ($_GET['name']) ?>"><br>
        <input class="button" type='submit' name='enviar'>
    </form>

</div>


