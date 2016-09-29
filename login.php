<html>
<head>
    <title>Login to Shabu</title>
    <meta name="viewport" content="width=device-width ,initial-scale = 1.0">

    <!-- css file-->

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="mui-0.1.18/css/mui.css">

    <!-- script file-->

    <script type="text/javascript" src="bootstrap/js/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="mui-0.1.18/js/mui.min.js"></script>
    <!-- link file-->
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">

    <script>
        $(document).ready(function(){

        });
    </script>
</head>
<body>
<form class="form-horizontal" autocomplete="off" action="check_login.php" method="post">
    <div class="form-group">
        <label class="control-label col-sm-2" for="txtUsername">Username:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="txtUsername" placeholder="Enter username">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="txtPassword">Password:</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="txtPassword" placeholder="Enter password">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </div>
</form>


</body>

</html>
