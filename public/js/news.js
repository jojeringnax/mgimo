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
        //alert($('#content-news').val())
        console.log($('#content-news').val(), 'asd', $('#editor > .ql-editor').html())
        return true;
    });

    $('.item-card-news').mouseover(function(){
        $(this).children('.card-body ').css({'background-color':'#0054B9'});
        $(this).children('.card-body ').children('.title-card-news').css({'color':'white'});
        $(this).children('.card-body ').children('.date-news-page').css({'color':'white'});
        $(this).animate({'border':'none'},1000);
    });
    $('.item-card-news').mouseout(function(){
        $(this).children('.card-body ').css({'background-color':'transparent'});
        $(this).children('.card-body ').children('.title-card-news').css({'color':'#1A2F3F'});
        $(this).children('.card-body ').children('.date-news-page').css({'color':'#1A2F3F'});

    });
});
