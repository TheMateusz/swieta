<?php
require ('include.php');

$db = new DB();


$drawns = $db->query("SELECT * FROM drawns WHERE year = '2021'");
$drawns2 = $db->query("SELECT * FROM drawns WHERE user_id = '3'");
$users = $db->query("SELECT id,imie,nazwisko FROM users");

echo '<br>';
echo '<br>';

foreach($drawns as $key){
    var_dump($drawns);
}

echo '<br>';
echo '<br>';

foreach($drawns2 as $key){
    var_dump($drawns2);
}

echo '<br>';
echo '<br>';
foreach($users as $key => $value){
    foreach($drawns as $key2){
        if ($value['id'] == $key2['drawn_id']) {
            unset($users[$key]);
        }
        if ($value['id'] == 3) {
            unset($users[$key]);
        }
    }
    foreach($drawns2 as $key3){
        if ($value['id'] == $key3['drawn_id']) {
            unset($users[$key]);
        }
    }
}

echo '<br>';
echo '<br>';
foreach($users as $key){
echo($key['imie'] .' '. $key['nazwisko']. '<br>');
}