<?php
    session_start();
    include ("pripojeni.php");
    include ("funkce.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <title>Hlavní stránka</title>
</head>
<body>
    <h1>Hlavní stránka</h1>
    
    <?php  menu(); ?>
</body>
</html>