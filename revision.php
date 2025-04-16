<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="http://localhost/poo"><button id="botonVolver" class="botonPrincipal">Volver atras</button></a>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
        <h1>Formulario registro Cliente</h1>
        
        <label for="FcambioFiltro">Cambio de filtro</label><br>
        <input type="checkbox" id="FcambioFiltro" name="cambioFiltro" value="Si"><br>

        <label for="FcambioFrenos">Cambio de frenos</label><br>
        <input type="checkbox" id="FcambioFrenos" name="cambioFrenos" value="Si"><br>

        <label for="FcambioAceite">Cambio de aceite</label><br>
        <input type="checkbox" id="FcambioAceite" name="cambioAceite" value="Si"><br>

        <label for="Fotros">Otros</label><br>
        <input type="text" id="Fotros" name="otros"><br>

        <label for="Ftaller">Fecha de ingreso al taller</label><br>
        <input type="date" id="Ftaller" name="taller"><br>

        <label for="Fmatricula">Matricula</label><br>
        <input type="text" id="Fmatricula" name="matricula"><br>

        <input class="botonPrincipal" type="submit">

    </form>
</body>
</html>