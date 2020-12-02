<?php
    include("dbConnection.php");
    $con = mysqli_connect("localhost","root","","bot");

    if(!$con){
        echo "Connection failed";
    }
    
    $getMsg = mysqli_real_escape_string($con,$_POST['text']);

    $select = "select replyes from robot where command like '$getMsg%'";

    $runQuery = mysqli_query($con, $select);

    if(mysqli_num_rows($runQuery)>0){
        $fetchData = mysqli_fetch_assoc($runQuery);
        $reply = $fetchData['replyes'];
        echo $reply;
    }
    else{
        echo "sorry can't to able to undesrstand you!";
    }
?>