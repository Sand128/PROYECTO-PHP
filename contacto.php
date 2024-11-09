<?php
// Inicializa variables
$nombre = $correo = $asunto = $mensaje = "";
$mensaje_enviado = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = htmlspecialchars($_POST['correo']);
    $asunto = htmlspecialchars($_POST['asunto']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Aquí puedes agregar validaciones adicionales

    // Enviar correo electrónico
    $to = "tu_email@ejemplo.com"; // Cambia esto a tu dirección de correo
    $headers = "From: $nombre <$correo>" . "\r\n" .
               "Reply-To: $correo" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    if (mail($to, $asunto, $mensaje, $headers)) {
        $mensaje_enviado = true;
    } else {
        echo "Error al enviar el mensaje.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
</head>
<body>
    <h1>Contacto</h1>

    <?php if ($mensaje_enviado): ?>
        <p>¡Gracias por tu mensaje, <?php echo $nombre; ?>! Nos pondremos en contacto contigo pronto.</p>
    <?php else: ?>
        <form action="contacto.php" method="post">
            <label for="nombre">Nombre:</label><br>
            <input type="text" name="nombre" required><br>

            <label for="correo">Correo Electrónico:</label><br>
            <input type="email" name="correo" required><br>

            <label for="asunto">Asunto:</label><br>
            <input type="text" name="asunto" required><br>

            <label for="mensaje">Mensaje:</label><br>
            <textarea name="mensaje" rows="5" required></textarea><br>

            <button type="submit">Enviar</button>
        </form>
    <?php endif; ?>

    <h2>Información de Contacto</h2>
    <p>Coordinador: Mtro. Edgar Galicia Solalindez</p>
    <p>Clave de Institución: 15ESU0027P</p>
    <p>Teléfono: 7229326275</p>
    <p>Correo Electrónico: uesxalatlaco@umb.mx</p>
    <p>Dirección: CALLE LOS CAPULINES SN, BARRIO DE SAN JUAN, 52680 SAN JUAN, XALATLACO, ESTADO DE MÉXICO. A UN COSTADO  DE LA UNIDAD DEPORTIVA DE XALATLACO.</p>
</body>
</html>