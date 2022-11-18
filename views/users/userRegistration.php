<form action='index.php?controller=user&action=AddUser' method='POST' ENCTYPE="multipart/form-data">
    <label>Nombre</label>           <input type='text' name='Nombre' required><br>
    <label>Apellidos1</label>       <input type='text' name='Apellidos1' required><br>
    <label>Apellidos2</label>       <input type='text' name='Apellidos2' required><br>
    <label>Password</label>         <input type='passwd' name='Password' required><br>
    <label>DNI</label>              <input type='text' name='DNI' pattern="[0-9]{8}[A-Z]" required><br>
    <label>Email</label>            <input type='email' name='Email' required><br>
    <label>Teléfono</label>         <input type="number" name="Telefono" pattern="[0-9]{9}" required><br>
    <label>Calle</label>            <input type='text' name='Calle' required><br>
    <label>Número</label>           <input type='number' name='Número' required><br>
    <label>CP</label>               <input type='text' name='CP' pattern="[0-9]{5}" required><br>
    <label>Piso</label>             <input type='number' name='Piso' min="1" max="99" required><br>
    <label>Ciudad</label>           <input type='text' name='Ciudad' required><br>
    <label>Provincia</label>        <input type='text' name='Provincia' required><br>
    <input type='submit' name='enviar'>
</form>