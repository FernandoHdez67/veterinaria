$(document).ready(function() {
    // Asignar evento click a los elementos del menú
    $('#div-btn1').click(function(e) {
        e.preventDefault(); // Prevenir la acción por defecto del enlace
        
        // Obtener la URL del enlace
        var url = $(this).attr('href');
        
        // Realizar la solicitud AJAX
        $.ajax({
            url: url,
            success: function(data) {
                // Actualizar el contenido en el elemento con la clase "content"
                $('.contenido').html(data);
            }
        });
    });
});