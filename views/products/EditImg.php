<form action='index.php?controller=product&action=EditImg' method='POST' ENCTYPE="multipart/form-data">
    <input type='number' name='ID' value="<?php echo ($_GET['id']) ?>" hidden>
    <label>Imagenlibro</label>    <input type="file" name="Imagenlibro" accept=".png, .jpg, .jpeg" required><br>
    <input type='submit' name='enviar'>
</form>