<?php
    function check_login($con){
        if(isset($_SESSION["id_user"]))
        {
            $id=$_SESSION['id_user'];
            $query="SELECT * FROM users WHERE id_user = '$id'";

            $result= mysqli_query($con,$query);
            if($result && mysqli_num_rows($result)>0)
            {
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }else
        {
            echo "Ajaj nastala chyba " . mysqli_error($con);
        }
    }

    function menu() {
        echo '<ul>';
        echo '<li><a href="registrace.php">Registrace</a></li>';
        echo '<li><a href="prihlaseni.php">Pro registrované</a></li>';
        echo '<li><a href="odhlaseni.php">Odhlásit se</a></li>';
        echo '</ul>';
    }
?>