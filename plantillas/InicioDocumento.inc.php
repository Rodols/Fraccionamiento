<!DOCTYPE html>
<html>
<head>
    <?php
$valorDeTimezone = "America/Mexico_City";
date_default_timezone_set($valorDeTimezone);
$fechaActual = strftime("%Y-%m-%d", time());
?>
    <title>RealDelBosque</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../Css/registro.css" media="screen" />
     <script>
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>


</head>
