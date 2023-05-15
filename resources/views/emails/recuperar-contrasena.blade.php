<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Recuperar contraseña</title>
</head>
<body>
    <h2>Recuperar contraseña</h2>
    <p>Hola,</p>
    <p>Usted ha solicitado recuperar su contraseña de la cuenta en nuestra aplicación.</p>
    <p>Haga clic en el siguiente enlace para generar una nueva contraseña:</p>
    <a href="{{ url('reset-password/'.$token) }}">Recuperar contraseña</a>
    <p>Si usted no solicitó este correo electrónico, simplemente ignore este mensaje.</p>
    <p>Gracias,<br>Clinica Veterinaria Cachorro PET</p>
</body>
</html>
