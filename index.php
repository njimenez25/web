<?php
    session_start();
    if($_SESSION['user_type'] == ''){
        echo "Please login!";
        //exit();
        header("location:login.php");
    }
    if($_SESSION['user_type'] != 'admin'){
        echo "You must be admin to view this page<br>";
        echo '<form action="login.php">
                <button type="submit">Login</button>
            </form>';
        exit();
    }

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<title>Admin panel</title>
    <meta name="viewport" content="width=device-width ,initial-scale = 1.0">

    <!-- css file-->

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="mui-0.1.18/css/mui.min.css">

    <!-- script file-->

    <script type="text/javascript" src="bootstrap/js/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="mui-0.1.18/js/mui.min.js"></script>
    <!-- link file-->
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">



    <script>
$(document).ready(function(){

    $("li").click(function(){
        $("li").removeClass("active")
        $("#nextpage").empty()
        $(this).addClass("active")
        $("#content").empty()


    });
    $

    $("#loadphp").click(function(){
        $("#content").load("query.php?name='*'");
    });

    $("#live").click(function(){
        $("#content").load("pos.php");
    });
    $("#user").click(function(){
        $("#content").load("adduserpage.php");
    });






});
</script>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-default" >
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Admin Panel</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-justified">
                        <li id = "live"><a href="#">Live</a></li>
                        <li><a href="#">Stock</a></li>
                        <li><a href="#">Summary</a></li>
                        <li><a href="#">Bill</a></li>
                        <li id="user"><a href="#">User</a></li>
                        <li><a href="#">Etc.</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

                    </ul>

                </div>
            </div>
        </nav>
    </div>
        <div class = "mui-container-fluid">
            <div id="content"></div>
        </div>

</body>



</html>

