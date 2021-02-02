$(document).ready(function(){
    loadTables();
   
  function loadTables() {
    $.ajax({
        url: '/ajax/first_controller/fetch_records',
        type: 'POST',
       
        success: function(data){
           // console.log(data);
            $('#load-table').html(data);
        }
    });
}

$('#message').hide();

$('#submit').on('click',function(){
    var name = $('#name').val();
    var email = $('#email').val();
    $.ajax({
        url: '/ajax/first_controller/insert_records',
        type: 'POST',
        data: {name: name, email: email},
        success: function(data){
            $('#message').fadeIn(2000);

            $('#message').show();
            $('#message').html(data);
            $('#message').delay(2000).fadeOut(2000);

            loadTables();
        }
    });
});

$(document).on('click','.dlt',function(){
    var id = $(this).data("id");
    $.ajax({
        url: '/ajax/first_controller/delete',
        type:'POST',
        data:{id:id},
        success:function(data){
            $('#message').fadeIn(2000);

            $('#message').show();
            $('#message').html(data);
            $('#message').delay(2000).fadeOut(3000);

            loadTables();
        }
    })
});



});