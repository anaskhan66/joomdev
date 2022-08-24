<?php
include('db.php');
if(!isset($_SESSION['user_name']) || !isset($_SESSION['userid']))
{
	echo '<script>location.href="index.php";</script>';
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Login Form</title>

    <style>
        body
        {
            background:#9f9fed;
        }
        .container
        {
            margin-top: 60px;
        }
        </style>

        <script>
            function savestatus()
            {
                var status = document.getElementById('status').value;
                $.ajax({
                    url: "savestatus.php?act=save&s="+status,
                     success: function(result){
                        $("#status").val('');
                        getstatus();
                }});
            }
            function getstatus()
                {
                    $.ajax({
                    url: "savestatus.php?act=get",
                     success: function(result){
                    $("#oldstatus").html(result);
                }});
                }
            $(document).ready(function(){
                getstatus();
            });
        </script>
  </head>
  <body>
    <div class="container">
        <a class="btn btn-danger" style="float: right;" href="logout.php" >Logout</a>
    <div class="row m-auto">
        <form class='m-auto w-50'>
            
            <h2 class=''>Update Status</h2>
            <br>
            <div class="form-group">
                <textarea class="form-control" rows='5' id="status" required name='status' placeholder="Enter Text Here"></textarea>
            </div>

            <button type="button" onclick="savestatus();" class="btn btn-primary">Publish</button>
        </form>

    </div>
    <br>
    <div class="row m-auto">
    <form class='m-auto w-50 '>
            
            <h2 class=''>Your Status</h2>
            <br>
            <div class="form-group">
                <textarea disabled class="form-control" rows='5' id="oldstatus" name='oldstatus' placeholder=""></textarea>
            </div>
        </form>


    </div>
   </div>

  </body>
</html>