$(document).ready(function() {
    $('#inicio').click(function(event) {
        event.preventDefault(); // Previene el comportamiento por defecto del enlace

        // Realiza la solicitud AJAX
        $.ajax({
            url: '/resources/views/welcome.blade.php', // Reemplaza esto con la ruta de tu controlador o endpoint de Laravel
            type: 'GET',
            dataType: 'html',
            success: function(data) {
                // Manipula los datos recibidos (por ejemplo, actualiza el contenido de un div)
                $('#resultado').html(data);
            },
            error: function(error) {
                console.log(error); // Maneja errores si los hay
            }
        });
    });
});



