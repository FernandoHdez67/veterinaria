$('a').on('click', 'a', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    $.ajax({
      url: url,
      type: 'GET',
      dataType: 'html',
      success: function(data) {
        $('#contenido').html(data);
      }
    });
  });
  