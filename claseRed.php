<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clase de red</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<nav class="cabecera"><ul>
        <li><a href="index.php">inicio</a></li>
        <li><a href="modeloOSI.html">Modelo OSI</a></li>
        <li><a href="claseRed.php">Clase de red</a></li>
        <li><a href="tipo.php">Tipo de dirección</a></li>
        <li><a href="red.php">Dirección de red</a></li>
    </ul>
</nav>
<main>
    <section class="contenedor">
        <p>Introduce una dirección IP para saber de qué clase es A, B o C</p>
        <form method="post" action="claseRed.php">
            <label for="direccionIP">dirección IP</label>
            <input name="direccionIP" id="direccionIP" type="text">
            <input type="submit" name="enviar" id="enviar" value="calcular">
        </form>
    </section>
    <section class="contenedor-Respuesta">
        <?php
        function esIPv4Valida($ip) {
            return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false;
        }
        if(isset($_POST['direccionIP'])){
            $direccionIP = $_POST['direccionIP'];
            if(esIPv4Valida($direccionIP)){
                $bytes = explode('.', $direccionIP,4);
                //echo $bytes[0];
                if($bytes[0] < 128){
                    echo '<p>La dirección IP es de clase <strong>A</strong></p>';
                } elseif ($bytes[0] < 192) {
                    echo '<p>La dirección IP es de clase <strong>B</strong></p>';
                } elseif ($bytes[0] < 224) {
                    echo '<p>La dirección IP es de clase <strong>C</strong></p>';
                } else{
                    echo '<p>La dirección IP es de clase <strong>D</strong> o <strong>E</strong></p>';
                }
            }else{
                echo "<p>El texto introducido no es una dirección IPv4 válida</p>";
            }

        }
        ?>
    </section>


</main>
<footer class="pie"> <p>Prueba realizada por Adrián Zúñiga Antón 2026®</p></footer>
</body>
</html>

