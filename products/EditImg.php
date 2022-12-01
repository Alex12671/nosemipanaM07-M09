<div class="container">
    <form class="editImage" action='index.php?controller=product&action=EditImg' method='POST' ENCTYPE="multipart/form-data">
        <h2>Modificar Imagen Producto</h2><br>
        <input type='number' name='ID' value="<?php echo ($_GET['id']) ?>" hidden>
        <input type="file" name="Imagenlibro" accept=".png, .jpg, .jpeg" required><br>
        <input class ="button" type='submit' name='enviar'>
    </form>
</div>