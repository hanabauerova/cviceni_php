<?php
    session_start();
    include ("pripojeni.php");
    include ("funkce.php");

  $user_data = check_login($con);

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
<?php  menu(); ?>
    <h1>Pro přihlášené</h1>
    Vítej, <?php echo $user_data['user_login']; ?>. 
</body>
</html>