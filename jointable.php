<?php
/**
 * Created by PhpStorm.
 * User: Office
 * Date: 9/3/2015
 * Time: 1:47 AM
 */

$invoice_id = $_GET['invoice'];

?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/jquery.numpad.css">
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
<br><br>
<form action="joiningtable.php?invoice=<?echo $invoice_id?>" method = "post">
    <input class="form-control in" name="joinnum" autocomplete="off">
    <button class="btn btn-default">Join</button>
</form>
</body>

</html>
