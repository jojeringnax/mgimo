$(document).ready(function () {
    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        ['blockquote', 'code-block'],

        [{ 'size': [] }],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
        [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
        [{ 'direction': 'rtl' }],                         // text direction


        [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
        [{ 'font': [] }],
        [{ 'align': [] }],

        ['clean']                                         // remove formatting button
    ];
    var quill = new Quill('#editor', {
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'snow'
    });

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

    $('.news-form').submit(function(){
        $('#content-news').attr('value', $('#editor > .ql-editor').html());
        return true;
    });


    let colorTags = {
        'СПОРТ': '#05C386',
        'ИСКУССТВО': '#EB205E',
        'НАУКА': '#0054B9',
        'ОБРАЗОВАНИЕ':'#FFBA00',
        'МЕЖДУНАРОДНЫЕ СВЯЗИ':'#A5A5A5',
        'ВСТРЕЧИ ВЫПУСКНИКОВ':'#B2E821',
        'КОНЦЕРТЫ':'#1DB5ED',
        'ЮБИЛЕИ':'#FF6C00',
        'ПРЕЗЕНТАЦИИ':'#9946B2',
        'ИЗДАНИЯ':'#1A2F3F'
    };
    $('.tag').each(function(){
        $(this).children('i').css({'background-color': colorTags[$(this).children('span').text().toUpperCase()]}) ;
    });

});
