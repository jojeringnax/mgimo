$(document).ready(function(){
   $('.delete-admin').click(function(e){
        e.preventDefault();
        //alert($(this).attr('href'));
       if(confirm("Вы уверены, что хотите удалить данное поле?")) {
           document.location.href = $(this).attr('href');
       }

   })
});