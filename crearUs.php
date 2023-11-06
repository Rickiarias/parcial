<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <title>login</title>
        

    </head>
    <body class="text-center">
        <form name="formulario" method="post" action="usuario.php">
            <h1>sistema</h1>
            <div class="form-group">
                <label for="nombre">Usuario</label>
                <input type="text" placeholder="nombre" name='nombre' require>
            </div>
            <br>
            <div class="form-group">
                <label for="email">email</label>
                <input type="text" placeholder="email" name='email' require>
            </div>
            <br>
            <div class="form-group">
                <label for="contraseña">contraseña</label>
                <input type="password" placeholder="contraseña" name='contrasena' require>
            </div>  
                <button type="submit" class="btn btn-primary">Crear cuenta</button>
                <div class="mt-3">
                    <a href="admin.php">volver</a>
                

        </form>
        
    </body>
</html>

