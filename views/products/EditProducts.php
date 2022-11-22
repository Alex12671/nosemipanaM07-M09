<div class="container">
    <form class="editProduct" action='index.php?controller=product&action=EditProduct' method='POST'>
        <h2>Modificar Producto</h2>
        </br>
        <input type='number' name='ID' value="<?php echo ($_GET['id']) ?>" hidden>
        <label>Nombre</label>         <input type='text' name='Nombre' required value="<?php echo ($_GET['name']) ?>"><br>
        <label>Descripción</label>    <input type='text' name='Descripcion' required value="<?php echo ($_GET['desc']) ?>"><br>
        <label>Género</label>  
        <select name="Genero" class="generos" required>
            <?php
                foreach($allCategories as $rows => $cell) {
                    if($cell['IdGenero']==$_GET['category']){
                        echo "<option value='".$cell['IdGenero']."' selected>".$cell['Nombre']."</option>";
                    }else{
                        echo "<option value='".$cell['IdGenero']."' >".$cell['Nombre']."</option>";
                    }
                }
            ?>
        </select><br>
        <label>Autor</label>          <input type='text' name='Autor' required value="<?php echo ($_GET['author']) ?>"><br>
        <label>Editorial</label>      <input type='text' name='Editorial' required value="<?php echo ($_GET['editorial']) ?>"><br>
        <label>Páginas</label>        <input type='number' name='Paginas' required value="<?php echo ($_GET['pages']) ?>"><br>
        <label>Precio</label>         <input type='number' name='Precio' required value="<?php echo ($_GET['price']) ?>"><br>
        <label>Fecha_Entrada</label>  <input type='date' name='Fecha_Entrada' required value="<?php echo ($_GET['date']) ?>"><br>
        <label>Cantidad</label>       <input type='number' name='Cantidad' required value="<?php echo ($_GET['quantity']) ?>"><br>
        <input type='submit' name='enviar'>
    </form>
</div>

