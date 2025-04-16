<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro camiones</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $matriculaErr = $runClienteErr = "";
        $matricula = $marca = $tipo = $color = $runCliente = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["matricula"])) {
                $matriculaErr = "Se requiere la matricula";
            } else {
                $matricula = $_POST["matricula"];
            }

            if (empty($_POST["marca"])) {
                $marca = "";
            } else {
                $marca = $_POST["marca"];
            }

            if (empty($_POST["tipo"])) {
                $tipo = "";
            } else {
                $tipo = $_POST["tipo"];
            }

            if (empty($_POST["color"])) {
                $color = "";
            } else {
                $color = $_POST["color"];
            }

            if (empty($_POST["runCliente"])) {
                $runClienteErr = "Se requiere el rut";
            } else {
                $runCliente = $_POST["runCliente"];
            }
        }

    ?>
    <a href="http://localhost/poo"><button id="botonVolver" class="botonPrincipal">Volver atras</button></a>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
        <h1>Formulario registro camion</h1>

        <label for="Fmatricula">Matricula</label><br>
        <input type="text" id="Fmatricula" name="matricula">
        <span class="error"><?php echo $matriculaErr; ?></span><br>

        <label for="Fmarca">Marca</label><br>
        <input type="text" id="Fmarca" name="marca"><br>

        <label for="Ftipo">Tipo</label><br>
        <input type="text" id="Ftipo" name="tipo"><br>

        <label for="Fcolor">Color</label><br>
        <input type="text" id="Fcolor" name="color"><br>

        <label for="FprecioVenta">Precio de venta</label><br>
        <input type="text" id="FprecioVenta" name="precioVenta"><br>

        <label for="FvalorCancelado">Valor cancelado</label><br>
        <input type="text" id="FvalorCancelado" name="valorCancelado"><br>

        <label for="FfechaVenta">Fecha de venta</label><br>
        <input type="date" id="FfechaVenta" name="fechaVenta"><br>

        <label for="FrunCliente">Rut Cliente</label><br>
        <input type="text" id="FrunCliente" name="runCliente"><br>
        <span class="error"><?php echo $runClienteErr;?></span><br>

        <br>
        <input class="botonPrincipal" type="submit">
    </form>
       
</body>
</html>

<?php
    class Vehiculo {
        public $matricula;
        public $marca;
        public $tipo;
        public $color;
        private $precio_venta;
        private $valor_cancelado;
        private $fecha_venta;
        public $cliente_run;

        function __construct($matricula, $marca, $tipo, $color, $cliente_run){
            $this->matricula = $matricula;
            $this->marca = $marca;
            $this->tipo = $tipo;
            $this->color = $color;
            $this->cliente_run = $cliente_run;
        }

        function __destruct() {
            echo "El auto matricula: {$this->matricula}, marca: {$this->marca}, tipo: {$this->tipo}, color: {$this->color}, del cliente con rut: {$this->cliente_run} ha sido creado exitosamente.<br>";
        }

        function get_matricula(){
            return $this->matricula;
        }
    }

    if ($matricula && $runCliente) {
        $camion = new Vehiculo($matricula, $marca, $tipo, $color, $runCliente);

        $host="localhost";
        $port=3307;
        $socket="";
        $user="root";
        $password="";
        $dbname="compra_venta_2024";

        $con = new mysqli($host, $user, $password, $dbname, $port, $socket)
        or die ('Could not connect to the database server' . mysqli_connect_error());

        $sql = "INSERT INTO vehiculo (Matricula, Marca, Tipo, Color, Cliente_Run) VALUES ('$camion->matricula', '$camion->marca', '$camion->tipo', '$camion->color', '$camion->cliente_run')";

        if ($con->query($sql) === TRUE) {
            echo "<p>New record created successfully<p>";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
            
        $con->close();
    }
?>