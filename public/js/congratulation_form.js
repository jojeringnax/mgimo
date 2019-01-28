$(document).ready(function () {
    $('input[type=file]').change(function(e){
        let input = $(this);
        $(this).parent().children('label').html($(this).val());
        $(this).parent().parent().children('.clear').children('span').html('Clear');
        $(this).parent().parent().children('.clear').children('span').css({"cursor":"pointer"});
        $(this).parent().parent().children('.clear').click(function(){
            input.attr('value', '');
            input.parent().children('label').html('Загрузите ' + input.parent().parent().children('.clear').children('span').data('file') + ' фото');
            input.parent().parent().children('.clear').children('span').html('Upload');
            input.parent().parent().children('.clear').children('span').css({'cursor':'default'});
        });
    });

    $('.congratulation_ajax').submit(function(e) {
      e.preventDefault();
      $('.link-video').attr('value', 'no video')
      $.ajax({
          url: "api/congratulations/create",
          dataType: 'json',
          data: new FormData($(this)[0]),
          method: 'POST',
          async: false,
          cache:false,
          contentType: false,
          processData: false,
          error: function(data) {
              $('.modal-body > .container > .row').html('Поздравление не отправлено, попробуйте снова');
          },
          success: function(data) {
              $('.modal-body > .container > .row').html('Спасибо за поздравление!');
          }
      });
    });
});

