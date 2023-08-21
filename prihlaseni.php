<?php
    session_start();
    include ("pripojeni.php");
    include ("funkce.php");

   
    if($_SERVER['REQUEST_METHOD'] =="POST")
    {
           //čtení databáze

            $user_login=addslashes($_POST["user_login"]);
            $user_password=addslashes($_POST["user_password"]);

            if (!empty($user_login) && !empty($user_password))
            {
                $query = "SELECT * FROM users WHERE user_login='$user_login'";
                $result=mysqli_query($con,$query);

                if($result)
                {
                    if($result && mysqli_num_rows($result)>0)
                    {
                        $user_data = mysqli_fetch_assoc($result);
                        if($user_data['user_password'] === $user_password)
                        {
                            $_SESSION['id_user']=$user_data['id_user'];
                            header("Location: pro_prihlasene.php");
                        }
                    }
                }
                echo "Špatný login nebo heslo! <br><br>";

            }
            else
            {
                echo "Musí být vyplněna obě pole! " . mysqli_error($con);
            }
          mysqli_close($con); 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <title>Pro registrované</title>
</head>
<body>
<?php  menu();

if (!isset($_SESSION["id_user"])) {
    echo '<div class="container">
    <form action="" method="post">
        <h1>Přihlášení</h1><br>

        <label for="login">Login:</label>
        <input type="text" name="user_login" placeholder="Zadejte login"><br><br>

        <label for="password">Heslo:</label>
        <input type="password" name="user_password" placeholder="Zadejte heslo"> <br><br>

        <input type="submit" class="button" value="Přihlásit se"><br><br>
    </form>
    </div>';
}else{
    header("Location: pro_prihlasene.php");
}
?>

</body>
</html>