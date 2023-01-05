

<div class="container">
    <form class= "logIn" action='index.php?controller=user&action=AddUser' method='POST' ENCTYPE="multipart/form-data">
        <h2>Registro de usuario</h2></br> 
        <div class= "columnas">
        <div class="columna1">
        <label>Nombre</label><br>           <input type='text' name='Nombre' required><br><br>
        <label>Apellidos1</label><br>      <input type='text' name='Apellidos1' required><br><br>
        <label>Apellidos2</label><br>       <input type='text' name='Apellidos2' required><br><br>
        <label>Password</label><br>         <input type='password' name='Password' required><br><br>
        <label>DNI</label><br>              <input type='text' name='DNI' pattern="[0-9]{8}[A-Z]" required><br><br>
        <label>Email</label><br>            <input type='email' name='Email' required><br><br>
        <label>Teléfono</label><br>         <input type="number" name="Telefono" pattern="[0-9]{9}" required><br>
        </div>
        <div class="columna2">
        <label>Calle</label><br>            <input type='text' name='Calle' required><br><br>
        <label>Número</label><br>           <input type='number' name='Número' min="1" max="2000" required><br><br>
        <label>CP</label><br>               <input type='text' name='CP' pattern="[0-9]{5}" required><br><br>
        <label>Piso</label><br>             <input type='number' name='Piso' min="1" max="99" required><br><br>
        <label>Ciudad</label><br>           <input type='text' name='Ciudad' required><br><br>
        <label>Provincia</label><br>       <input type='text' name='Provincia' required><br></br><br>
        <input class="button sigin" type='submit' name='enviar'>
        </div>
        </div>
        
    </form>
</div>