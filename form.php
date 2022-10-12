<?php
require("include.php");
$db = new Db();

foreach($_POST as $key => $value) {
    if ($key != 'controller'){
        $db->bind($key,$value);
    }
}

unset($_SESSION['form']);

switch ($_POST['controller']){
    case 'login':
        $person = $db->query("SELECT * FROM users WHERE password = :password");
        if (!empty($person)){
            $_SESSION['form']['notification'] = ['message' => 'Zalogowano', 'code' => 1];
            $_SESSION['form']['callback_date'] = $person;
        }
        else{
            $_SESSION['form']['notification'] = ['message' => 'Nie znaleziono konta z takim hasłem', 'code' => 0];
        }
        break;
    case 'random':
        echo "RANDOM";
        break;
}

//var_dump($_POST);
header('Location: ' . $_SERVER['HTTP_REFERER']);