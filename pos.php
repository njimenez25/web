<?php
session_start();
if($_SESSION['user_name'] == '') {
    header('location:login.php');
}
//echo $_SESSION['user_name'];
$servername = "127.0.0.1";
$username = "kajornsak";
$password = "";
$dbname = "mydb";
$usertype = $_SESSION['user_type'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM table_table";
$result = mysqli_query($conn,$sql);

?>

<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width ,initial-scale = 1.0">

    <!-- css file-->

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/jquery.numpad.css">

    <!-- script file-->

    <script type="text/javascript" src="bootstrap/js/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/jquery.numpad.js"></script>
    <!-- link file-->
    <!--<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">-->

    <link href="main.css" rel="stylesheet">
    <script>


        $(document).ready(function(){
            var tablenum;
            $(".available").click(function(){
                tablenum = $(this).text();
                $("#pos-right-side").load("opentable.php?number="+$(this).text());
                $("#methodbar").css('display','none');

            });
            $(".not-available").click(function(){
                tablenum = $(this).text();
                $("#pos-right-side").load("showtable.php?number="+tablenum);
                $("#methodbar").css('display','block');
            });
            $("#office").click(function(){
               tablenum = $(this).text();
                $("#pos-right-side").load("showtable.php?number="+tablenum);
                $("#methodbar").css('display','block');
            });
            $("#orderbtn").click(function () {
                $("#pos-right-side").load("orderpage.php?number="+tablenum);
            });
            $("#viewbtn").click(function () {

                alert("view order from table "+tablenum);
            });
            $("#fastbtn").click(function () {

                alert("fast from table "+tablenum);
            });



        });
    </script>
  </head>
  <body>

    <div class="container-fluid">
        <div>
            <div class="panel" align="center">
                <label style="font-size: 26px !important;">POS Page</label>
                <button  class="btn btn-primary" id="refresh" onclick="location.reload()">Refresh</button>
            </div>

        </div>


        <div>

        	<!-- left side-->
        	<div class = "col-lg-6" id = "pos-left-side">

                    <?php
                    while($row = $result->fetch_assoc()){
                        if($row['table_status'] == 'available'){
                            echo '<button class = "btn btn-success table-btn available">'.$row['table_number'].'</button>';
                        }
                        else if($row['table_status'] == 'not-available'){
                            echo '<button class = "btn btn-danger table-btn not-available">'.$row['table_number'].' <span class="glyphicon glyphicon-user"></button>';
                        }


                    }
                    if($usertype == "admin"){
                        echo '<button class = "btn btn-warning table-btn" id = "office">999</button>';
                    }
                    $conn->close();
                    ?>





        	</div>

        	<!-- right side-->

        	<div class = "col-lg-6" id ="pos-right-side" align="center">


        	</div>

        </div>
        <br>
        <div class="row" id="methodbar" style="display: none;">
            <div class="col-md-6">
                <button class="btn btn-default" id="orderbtn">Order</button>
                <!--
                <button class="btn btn-default" id="viewbtn">View</button>
                <button class="btn btn-default" id="editbtn">Edit</button>
                -->
            </div>

        </div>

    </div>
  </body>
</html>
