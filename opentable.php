<?php
$number = $_GET["number"];
//echo $number;
?>

<html>
<head>
    <meta name="viewport" content="width=device-width ,initial-scale = 1.0">

    <!-- css file-->
    <link href="main.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/jquery.numpad.css">

    <!-- script file-->

    <script type="text/javascript" src="bootstrap/js/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/jquery.numpad.js"></script>
    <script>
        $.fn.numpad.defaults.gridTpl = '<table class="table modal-content"></table>';
        $.fn.numpad.defaults.backgroundTpl = '<div class="modal-backdrop in"></div>';
        $.fn.numpad.defaults.displayTpl = '<input type="text" class="form-control" />';
        $.fn.numpad.defaults.buttonNumberTpl =  '<button type="button" class="btn btn-default"></button>';
        $.fn.numpad.defaults.buttonFunctionTpl = '<button type="button" class="btn" style="width: 100%;"></button>';
        $.fn.numpad.defaults.onKeypadCreate = function(){$(this).find('.done').addClass('btn-primary');};

        $(document).ready(function(){
           $("#adult").numpad();
            $("#half").numpad();
            $("#free").numpad();
            $(".in").numpad();
        });
    </script>

    <style type="text/css">
        .nmpd-grid {border: none; padding: 20px; width: 249px}
        .nmpd-grid>tbody>tr>td {border: none;}

        /* Some custom styling for Bootstrap */
        .qtyInput {display: block;
            width: 100%;
            padding: 6px 12px;
            color: #555;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
            -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        }
    </style>
</head>

<body>
<label>เปิดโต๊ะ : <? echo $number ?> </label>

<form onsubmit="mybtn.disabled = true;" action="createtable.php?number=<? echo $number ?>" method="post">

    <div class="form-group">
        <!--<input name="pass" class="in form-control" placeholder="รหัสผ่าน" style="background-color: white; color: white;">-->
        <br>
        <div class="input-group">
            <div class="input-group-addon">ผู้ใหญ่</div>
            <input type="text" class="form-control" id="adult" name="adultamount"  value="0">
            <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
        </div>

        <div class="input-group">
            <div class="input-group-addon">เด็ก</div>
            <input type="text" class="form-control" id="half" name="halfamount"  value="0">
            <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
        </div>

        <div class="input-group">
            <div class="input-group-addon">ฟรี</div>
            <input type="text" class="form-control" id="free" name="freeamount"  value="0">
            <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
        </div>

    </div>

    <button name="mybtn" class="btn btn-default">Open table</button>

</form>




</body>

</html>