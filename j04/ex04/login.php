<?php

session_start();
include 'auth.php';

$login = $_POST['login'];
$passwd = $_POST['passwd'];
if (auth($login, $passwd)) {
    $_SESSION['loggued_on_user'] = $login;
    echo "OK\n";
}
else {
    $_SESSION['loggued_on_user'] = '';
    header('Refresh: 2; URL="index.html"');
    echo "The login/password you entered is wrong, try again.\n";
}

?>
