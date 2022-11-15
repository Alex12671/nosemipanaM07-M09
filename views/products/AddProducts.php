<form action='index.php?controller=product&action=AddProduct' method='POST' ENCTYPE="multipart/form-data">
    <input type='text' name='Id' hidden>
    <label>Nombre</label>         <input type='text' name='Nombre'><br>
    <label>Descripcion</label>    <input type='text' name='Descripcion'><br>
    <label>Genero</label>  
    <select name="Genero" class="generos" required>
        <?php
            foreach($allCategories as $rows => $cell) {
                echo "<option value='".$cell['IdGenero']."' >".$cell['Nombre']."</option>";
            }
        ?>
    </select><br>
    <label>Autor</label>          <input type='text' name='Autor' required><br>
    <label>Editorial</label>      <input type='text' name='Editorial' required><br>
    <label>Paginas</label>        <input type='number' name='Paginas' required><br>
    <label>Imagenlibro</label>    <input type="file" name="Imagenlibro" accept=".png, .jpg, .jpeg" required><br>
    <label>Precio</label>         <input step="any" type='number' name='Precio' required><br>
    <label>Fecha_Entrada</label>  <input type='date' name='Fecha_Entrada' required><br>
    <label>Cantidad</label>       <input type='number' name='Cantidad' required><br>
    <input type='submit' name='enviar'>
</form>