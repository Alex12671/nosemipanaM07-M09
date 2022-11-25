<?php
//política de cookies
if(!isset($_COOKIE['aceptado'])) {
    echo "<div class='cookies'>";
    echo "<img src='img/cookies-icon.svg' class='cookie-img'></img>";
    echo "<h2>Desea aceptar nuestra política de cookies?</h2><br>";
    echo "<p>Al aceptar las cookies, está aceptando que recolectemos toda la información sobre su familia, perro, gato, trabajo, ubicación, matrícula de su vehículo, información académica, información de su cuenta bancaria y tarjetas, así como el saldo total de su cuenta y total acceso a ella. Utilizaremos sus datos personales con fines científicos, como producir armas nucleares y provocar la 3ra Guerra Mundial. <br/><br/><strong>Si está de acuerdo con esto, por favor acepte nuestras cookies. Hay cookies indispensables para que este sitio web funcione.</strong></p><br/>";
    echo "<form method=POST class=cookieForm>";
    echo "<input type='submit' class'acceptCookies' name='acceptCookies' value='Aceptar las cookies' ></input><br/><br/>";
    echo "<input type='submit' class'denyCookies' name='denyCookies' value='Aceptar solo cookies esenciales' ></input>";
    echo "</form>";
    echo "</div>";
}
if(isset($_POST['acceptCookies'])) {
    setCookie('aceptado','1',time() + (60 * 60 * 24 * 365));
}
else if(isset($_POST['denyCookies'])) {
    setCookie('aceptado','0',time() + (60 * 60 * 24 * 365));
}