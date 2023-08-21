<?php
    session_start();
    include ("pripojeni.php");
    include ("funkce.php");

   

    if($_SERVER['REQUEST_METHOD'] =="POST")
    {
        $user_name = addslashes($_POST["user_name"]);
        $user_surname = addslashes($_POST["user_surname"]);
        $user_login = addslashes($_POST["user_login"]);
        $user_password = addslashes($_POST["user_password"]);

        if (empty($user_name) || empty($user_surname)||empty($user_login) || empty($user_password)) {
            echo "Musí být vyplněna všechna pole <br><br>";
        }else{
            
           //uložení do databáze
           $sql = "SELECT * FROM users WHERE user_login = '$user_login'";
           $result = $con->query($sql);
           
            if ($result->num_rows > 0){
                echo "Uživatel s tímto uživatelským jménem již existuje. <br><br>";
            }else{
                mysqli_query($con,"SET NAMES 'utf8'");
                $query = "INSERT INTO users (user_name, user_surname, user_login, user_password) VALUES ('$user_name', '$user_surname', '$user_login', '$user_password')";
                    
                    if (mysqli_query($con,$query))
                    {
                        //Přihlášení po registraci
                        // $_SESSION["id_user"] = mysqli_insert_id($con);
                        // header("Location: pro_prihlasene.php");
                        echo "Registrace proběhla úspěšně <br><br>";
                    }else
                    {
                        echo "Zkontrolujte si, jestli jste zadali stejné heslo." . mysqli_error($con);
                    }
                mysqli_close($con); 
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <title>Registrace</title>
</head>
<body>
<?php  menu();
    if (!isset($_SESSION["id_user"])) {
        echo '<div class="container">
        <form class="form" method="post">
            
                <h1>Registrace</h1><br>
        
                <label for="name">Jméno:</label>
                <input type="text" name="user_name" placeholder="Zadejte křestní jméno"><br><br>
                
                <label for="surname">Přijmení:</label>
                <input type="text" name="user_surname" placeholder="Zadejte přijmení"><br><br>
        
                <label for="user_login">Login:</label>
                <input type="text" name="user_login" placeholder="Zadejte login"><br><br>
        
                <label for="user_password">Heslo:</label>
                <input type="password" name="user_password" placeholder="Zadejte heslo"> <br><br>
        
                <label for="user_password2">Opakujte heslo:</label>
                <input type="password" name="user_password2" placeholder="Zadejte heslo znovu"> <br><br>
        
                <input type="submit" class="button" value="Zaregistrovat se"><br><br>
            </form>
            </div>';
    }else{
        header("Location: pro_prihlasene.php");
    }
?>

</body>
</html>