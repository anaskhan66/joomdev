<?php
include('db.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Login Form</title>

    <style>
        body
        {
            background:#9f9fed;
        }
        .container
        {
            margin-top: 100px;
        }
        </style>
  </head>
  <body>
   <div class="container">
   <div class="row m-auto">
   <form class='m-auto w-50 ' method="post" action=''>
  <div class="form-group">
    <input type="text" class="form-control" id="" required name='username' placeholder="Enter Username">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" required name='password' placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
   </div>
   </div>

  </body>
</html>

<?php
if($_SERVER['REQUEST_METHOD']=='POST' and isset($_REQUEST['username']))
{
    $qry = "select username from user where username='".$_POST['username']."' and password='".$_POST['password']."' ";
    
	$query=mysqli_query($con,$qry);
	$data=mysqli_fetch_array($query);
	if(isset($data['username']))
	{
		$_SESSION['user_name']=$data['username'];
		echo '<script>location.href="dashboard.php";</script>';
	}
	else
	{
		echo '<script>alert("Wrong username or password !");location.href="index.php";</script>';
	}
}