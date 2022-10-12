<?php
require('include.php');

$db = new Db();
$drawns = $db->query("SELECT drawns.year, users.imie, users.nazwisko FROM drawns INNER JOIN users ON drawns.drawn_id=users.id");

?>
<!DOCTYPE html>
<html>
    <head>
        <?php require('template/head.php'); ?>
    </head>
    <body>
        <h1>Losowanie osoby na święta</h1>
        <form name="test1" action="form.php" method="get">
            <input type="hidden" name="send" value="1">
            <button name="name" value="Mateusz Matusiak" type="submit">Losuj</button>
        </form>
        <h1>Historia losowań</h1>
        <?php
            foreach ($drawns as $key){
                echo "<h1>".$key['year']."</h1>";
                echo "<p>".$key['imie']." ".$key['nazwisko']."</p>";
            }
        ?>

        <?php
        function generatepassword(){
            $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789012345678901234567890';
            $pass = array();
            $alphaLength = strlen($alphabet) - 1;
            for ($i = 0; $i < 3; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            return implode($pass);
        }
        ?>
    </body>
</html>
