<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido</title>
    <style>
        a{

            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: block;
            font-size: 16px;
            width: 40px,
            
        }

        body{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Bienvenido, {{$user->name}}</h1>
    <p>Bienvenido al sistema de planificación de ciclos de la Facultad de Quimíca y Farmacia UES </p>
    <p>Debe ingresar a la siguiente URL, para establecer su contraseña de acceso y verificar la cuenta:     
    </p>    
    <a href="{{route('verificacion.email',$user->codigoVerificacion)}}">Presione aqui</a>
    <p>Si tiene un problema con el enlace, comuniquese con el administrador del sistema.</p>
</body>
</html>