<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    #exampleModal{
        display: none;
    }
</style>
</head>
<body>
<input type="text" placeholder="name" id="name">
<input type="text" placeholder="email" id="email">
<input type="submit" value="Save" id="submit">

    <div id="load-table"></div>
    <span id="message" class="col-md-2 alert alert-success"></span>

    <!-- Modal -->
<div id="exampleModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" id="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table>
        
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

    <script type="text/javascript" src="<?=base_url()?>assets/jquery.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/ajax.js"></script>
    <script>
        //edit records
$(document).on("click",".edit-record",function(){
   
    $('#exampleModal').show();
    var id = $(this).data("eid");
    
    $.ajax({
        url : '/ajax/first_controller/edit',
        type:'POST',
        data:{id:id},
        success:function(data){
           // $('#message').fadeIn(2000);
           $('#exampleModal table').delay(2000).fadeIn(3000);

           // $('#message').show();
            $('#exampleModal table').html(data);
           // $('#message').delay(2000).fadeOut(3000);

          //  loadTables();
        }
    })
    
   
});

$('#close').on('click',function(){
    $('#exampleModal').hide();

})
    </script>
    
</body>
</html>