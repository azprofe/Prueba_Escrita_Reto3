<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculo de dirección de red</title>
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
        <p>Introduce una dirección IP para calcular cuál es su dirección de red</p>
        <form method="post" action="red.php">
            <label for="direccionIP">dirección IP</label>
            <input name="direccionIP" id="direccionIP" type="text">
            <input type="submit" name="enviar" id="enviar" value="calcular">
        </form>
    </section>
    <section class="contenedor-Respuesta">
        <?php
        function esIPv4Valida($ip)
        {
            return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false;
        }
        if(isset($_POST['direccionIP'])){
            $direccionIP = $_POST['direccionIP'];
            if(esIPv4Valida($direccionIP)){
                $bytes = explode('.', $direccionIP,4);
                if($bytes[0] < 128){
                    echo "<p>La dirección de red es $bytes[0].0.0.0 </p>";
                } elseif ( $bytes[0] < 192) {
                    echo "<p>La dirección de red es $bytes[0].$bytes[1].0.0 </p>";
                } elseif ( $bytes[0] < 224) {
                    echo "<p>La dirección de red es $bytes[0].$bytes[1].$bytes[2].0 </p>";
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

