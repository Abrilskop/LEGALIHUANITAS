document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('login-form');
    const forgotPasswordBtn = document.getElementById('forgot-password');

    form.addEventListener('submit', function(e) {
        e.preventDefault(); // Prevenir el envío del formulario

        // Obtener los valores de los campos
        const username = document.getElementById('usuario').value;
        const password = document.getElementById('contra').value;

        // Validación de campos vacíos
        if (username.trim() === '' || password.trim() === '') {
            Swal.fire({
                icon: 'error',
                title: 'Campos vacíos',
                text: 'Por favor, complete todos los campos'
            });
            return;
        }

        // Crear el objeto de datos para enviar
        const data = {
            usuario: username,
            contra: password
        };

        // Hacer la solicitud AJAX al servidor
        fetch('./login/login.php', { // Asegúrate de que 'login.php' esté en la misma carpeta o ajusta la ruta según sea necesario
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams(data)
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                // Si la autenticación es exitosa, redirigir
                Swal.fire({
                    icon: 'success',
                    title: 'Iniciando Sesión...',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = './inicio/inicio.php'; // Redirigir a la página de inicio
                });
            } else {
                // Si hay error de autenticación, mostrar mensaje de error
                Swal.fire({
                    icon: 'error',
                    title: 'Error de Autenticación',
                    text: result.message
                });
            }
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Error de Conexión',
                text: 'Hubo un error al intentar iniciar sesión. Intente más tarde.'
            });
            console.error('Error en la solicitud:', error);
        });
    });

    // Función para recuperar contraseña
    forgotPasswordBtn.addEventListener('click', function() {
        Swal.fire({
            icon: 'info',
            title: 'Recuperar contraseña',
            text: 'Por favor, contacte al administrador "Fhuaman@uandina.edu.pe".'
        });
    });
});
