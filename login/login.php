<?php
// Incluir la conexión a la base de datos
include('../conexion/conexion.php');

// Verificar si se ha recibido la solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contra'];

    // Proteger contra inyecciones SQL
    $usuario = mysqli_real_escape_string($con, $usuario);
    $contrasena = mysqli_real_escape_string($con, $contrasena);

    // Consultar si el usuario existe en la base de datos
    $sql = "SELECT * FROM usuarios WHERE correo = '$usuario'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Usuario encontrado, verificar la contraseña
        $row = $result->fetch_assoc();
        
        // Verificar la contraseña en texto plano (sin cifrado)
        if ($contrasena === $row['contrasena']) {
            // Iniciar sesión y devolver respuesta exitosa
            session_start();
            $_SESSION['usuario_id'] = $row['id_usuario'];
            $_SESSION['usuario_nombre'] = $row['nombre'];

            echo json_encode(['success' => true, 'message' => 'Iniciando sesión...']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Contraseña incorrecta']);
        }
    } else {
        // Usuario no encontrado
        echo json_encode(['success' => false, 'message' => 'Usuario no encontrado']);
    }

    // Cerrar la conexión
    $con->close();
}
?>
