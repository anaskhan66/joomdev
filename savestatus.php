<?php
include('db.php');

if($_SERVER['REQUEST_METHOD']=='GET' && $_GET['act']=='save' && $_GET['s']!='')
{
    $qry2 = "INSERT INTO `status` (`userid`, `text`) VALUES ('".$_SESSION['userid']."', '".$_GET['s']."');";
    $query2 = mysqli_query($con,$qry2);
    if($query2)
    {
        echo $_GET['s'];
    }
}


if($_SERVER['REQUEST_METHOD']=='GET' && $_GET['act']=='get')
{
    $qry = "select * from status where userid='".$_SESSION['userid']."' order by id DESC";
    $query = mysqli_query($con,$qry);
    while($data = mysqli_fetch_array($query))
    {
        echo $data['text']." \n";
    }
}

?>