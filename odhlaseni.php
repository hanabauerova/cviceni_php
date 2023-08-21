<?php
    session_start();

    if(isset($_SESSION["id_user"]))
    {
        unset($_SESSION["id_user"]);
        echo "Úspěšně odhlášeno";
    }
    echo '<br><br> <a href="prihlaseni.php">Zpět na přihlášení</a>';
?>