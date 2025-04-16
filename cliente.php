<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $runErr = "";
        $run = $nombre = $apellido = $pais = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["matricula"])) {
                $runErr = "Se requiere rut";
            } else {
                $run = $_POST["run"];
            }

            if (empty($_POST["nombre"])) {
                $nombre = "";
            } else {
                $nombre = $_POST["nombre"];
            }

            if (empty($_POST["apellido"])) {
                $apellido = "";
            } else {
                $apellido = $_POST["apellido"];
            }

            if (empty($_POST["pais"])) {
                $pais = "";
            } else {
                $pais = $_POST["pais"];
            }
        }

    ?>
    <a href="http://localhost/poo"><button id="botonVolver" class="botonPrincipal">Volver atras</button></a>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
        <h1>Formulario registro Cliente</h1>
        
        <label for="Frun">Rut</label><br>
        <input type="text" id="Frun" name="run">
        <span class="error"><?php echo $runErr; ?></span><br>

        <label for="Fnombre">Nombre</label><br>
        <input type="text" id="Fnombre" name="nombre"><br>

        <label for="Fapellido">Apellido</label><br>
        <input type="text" id="Fapellido" name="apellido"><br>

        <label for="Fpais">Pais</label><br>
        <input type="text" id="Fpais" name="pais"><br>

        <input class="botonPrincipal" type="submit">

    </form>
</body>
</html>

<?php
    class Persona {
        public $run;
        public $nombre;
        public $apellido;
        public $pais;

        function __construct($run, $nombre, $apellido, $pais) {
            $this->run = $run;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->pais = $pais;
        }

        function __destruct() {
            echo "El cliente rut: {$this->rut}, nombre: {$this->nombre}, apellido: {$this->apellido}, pais: {$this->pais} ha sido creado exitosamente.<br>";
        }

        function get_run() {
            return $this->run;
        }
    }

    if ($run) {
        $cliente = new Persona($run, $nombre, $apellido, $pais);

        $host="localhost";
        $port=3307;
        $socket="";
        $user="root";
        $password="";
        $dbname="compra_venta_2024";

        $con = new mysqli($host, $user, $password, $dbname, $port, $socket)
        or die ('Could not connect to the database server' . mysqli_connect_error());

        $sql = "INSERT INTO cliente (Run, Nombre, Apellido, Pais, Codigo_Interno) VALUES ('$cliente->run', '$cliente->nombre', '$cliente->apellido', '$cliente->pais', )";

        if ($con->query($sql) === TRUE) {
            echo "<p>New record created successfully<p>";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
            
        $con->close();
    }
?>