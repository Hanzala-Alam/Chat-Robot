<?php 
    include("dbConnection.php");
    session_start();
    if(isset($_SESSION["username"])){
        $username = $_SESSION["username"];
    }else{
        header("location:login.php");
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/cssfilea.css">
</head>
<body>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="form-container">
                    <div class="haider-body">
                        <p class="haider-title">
                            Chat Robot
                        </p>
                    </div>
                    <div id="form_" class="msg-body"></div>
                    <div class="btn-body">
                        <input type="text" name="" class="form-control" placeholder="Type Message Here" style="width:350px;" id="msg_" require>
                        <input type="submit" value="Send" class="btn btn-primary" id="sendBtn">
                        &nbsp;
                        <a href="home.php" class="btn btn-secondary">clear</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#sendBtn").on("click",function(){
                Send_MSG();
            });

            $("#msg_").on("keypress", function(){
                if(event.keyCode == 13){
                    Send_MSG();
                }                
            });
            
            
            function hi($val){
                $("#form_").append("<div style='width:250px;height:70px;padding:5px;float:left'>"+
                        "<div style='display:flex'>"+
                            "<div><div style='width:55px;height:55px;border-radius:50%;display:flex;justify-content:center;align-items:center;background:#73d1ce'>"+
                                "<i class='fa fa-user' style='font-size:35px;color:white;'></i>"+
                            "</div> &nbsp;"+
                            "<p class='user-name'><?php echo $username ?></p></div>"+
                            "<div style='width:100%;padding:5px;vertical-align: middle;text-align:left'>"+
                                $val+
                            "</div>"+
                        "</div>"+
                    "</div>");
                    $("#msg_").val("");

            };

            function Send_MSG(){
                $msg = $("#msg_").val();
                if($msg == "" || $msg == null){
                    alert("Please Type Message First");
                }
                else{
                    hi($msg);
                    $.ajax({
                        url: 'Message.php',
                        type: 'POST',
                        data: 'text='+$msg,
                        success: function(result){
                            $reply = "<div style='width:250px;height:70px;padding:5px;float:right'>"+
                                "<div style='display:flex;'>"+
                                    "<div style='width:100%;padding:5px;vertical-align:middle;text-align:right'>"+
                                        result+
                                    "</div>&nbsp;"+
                                    "<div style='width:55px;height:55px;border-radius:50%;display:flex;justify-content:center;align-items:center;'>"+
                                        "<img src='icons/robotIcon.png' height='40' width='40'>"+
                                    "</div> &nbsp;"+
                                "</div></div>";
                            $("#form_").append($reply);
                            $("#form_").scrollTop($("#form_")[0].scrollHeight);
                        }
                    });
                }
            }
        });        
    </script>
</body>
</html>