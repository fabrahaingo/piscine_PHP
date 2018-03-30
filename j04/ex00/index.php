<?php

session_start();
if (isset($_GET['login']) && isset($_GET['passwd']) && isset($_GET['submit']) && $_GET['submit'] === "OK") {
    $_SESSION['login'] = $_GET['login'];
    $_SESSION['passwd'] = $_GET['passwd'];
}

?>
<html><body>
<form action="index.php" method="GET">
    Identifiant: <input type="text" name="login" value="<?php echo (isset($_SESSION['login'])) ? $_SESSION['login'] : ''; ?>" />
    <br />
    Mot de passe: <input type="password" name="passwd" value="<?php echo (isset($_SESSION['passwd'])) ? $_SESSION['passwd'] : ''; ?>" />
    <input type="submit" value="OK">
</form>
</body></html>
