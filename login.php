<?php
require("include.php");

$db = new Db();

?>

<!DOCTYPE html>
<html>
    <head>
        <?php require('template/head.php'); ?>
    </head>
    <body>
        <h1>Logowanie</h1>
        <?php
        if(isset($_SESSION['form']['notification'])){
            if ($_SESSION['form']['notification']['code'] == 1){
                echo '<p style="color:green;">'. $_SESSION['form']['notification']['message'] .'</p>';
                $_SESSION['user_id'] = $_SESSION['form']['callback_date'];
            }
            else{
                echo '<p style="color:red;">'. $_SESSION['form']['notification']['message'] .'</p>';
            }
        }
//        if(isset($_SESSION['form']['callback_date'])){
//            var_dump($_SESSION['form']['callback_date']);
//        }
        ?>
        <form action="form.php" method="post">
            <input type="text" name="password" placeholder="Podaj hasło">
            <button name="controller" value="login" type="submit">Zaloguj</button>
        </form>
    </body>
</html>