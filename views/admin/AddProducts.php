<form action='index.php?controller=product&action=AddProduct' method='POST'>
    <label>Nombre</label>         <input type='text' name='Nombre'><br>
    <label>Descripcion</label>    <input type='text' name='Descripcion'><br>
    <select name="Genero" class="generos" required>
        <?php
            foreach($allCategories as $rows => $cell) {
                echo "<option value='".$cell['IdGenero']."' >".$cell['Nombre']."</option>";
            }
        ?>
    </select><br>
        <label>Autor</label>          <input type='text' name='Autor'><br>
        <label>Editorial</label>      <input type='text' name='Editorial'><br>
        <label>Paginas</label>        <input type='number' name='Paginas'><br>
        <label>Imagenlibro</label>    <input type='text' name='Imagenlibro'><br>
        <label>Precio</label>         <input type='number' name='Precio'><br>
        <label>Fecha_Entrada</label>  <input type='date' name='Fecha_Entrada'><br>
        <label>Cantidad</label>       <input type='number' name='Cantidad'><br>
        <input type='submit' name='enviar'>
    </form>
    <h2>hola</h2>
    <h2><a href="index.php?controller=admin&action=logAdmin">Panel administración</a></h2>