<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="stylesheets/login.css">

<?php

if (isset($_COOKIE['logged_on_user'])) {?>
    <div>
        <a class="special1" href="#">Bonjour <?php echo ucfirst($_COOKIE['logged_on_user']); ?> <span class="arrow">&#9660;</span></a>
        <a class="special2" href="logout.php">Logout</a>
    </div><?php
}
else {?>
    <a class="top_login" href="create_account.php">Login / Create account</a><?php
}

?>
