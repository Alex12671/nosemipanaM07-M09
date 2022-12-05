<div class="container">
    <form class="editImage" action='index.php?controller=category&action=EditcatImg' method='POST' ENCTYPE="multipart/form-data">
        <h2>Modificar Imagen Género</h2><br>
        <input type='text' name='IdGenero' value="<?php echo ($_GET['id']) ?>" hidden>
        <input type="file" name="ImagenGenero" accept=".png, .jpg, .jpeg" required><br>
        <input class ="button" type='submit' name='enviar'>
    </form>
</div>