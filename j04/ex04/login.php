<?php

session_start();
include 'auth.php';
$login = $_POST['login'];
$passwd = $_POST['passwd'];
if (auth($login, $passwd)) {
    $_SESSION['loggued_on_user'] = $login;
?>
    <html>
    <head>
        <meta charset='utf-8' />
        <style>
    /* ===== GENERAL ===== */
            body {
                font-family: arial;
                background-color: lightgrey;
                margin: 0;
            }

            header {
                display: block;
                background-color: grey;
                height: 40px;
            }

    /* ===== TOP BAR ===== */
            .create_account {
                position: absolute;
                color: white;
                text-decoration: none;
                left: 4%;
                top: 2px;
                width: 100px;
                text-align: center;
            }

            .modify {
                position: absolute;
                color: white;
                text-decoration: none;
                top: 2px;
                width: 100px;
                text-align: center;
                left: 45px;
                margin-left: 20%;
            }

            .logout {
                position: absolute;
                color: white;
                text-decoration: none;
                right: 20px;
                top: 11px;
                vertical-align: center;
            }
        </style>
    </head>
    <body>
    <header>
        <a class='create_account' href='create.html'>Create a new account</a>
        <a class='modify' href='modif.html'>Modify my password</a>
        <a class='logout' href='logout.php'>Log out of <?php echo $_SESSION['loggued_on_user']; ?></a>
    </header>
        <iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
        <iframe name="speak" src="speak.php" width="100%" height="50px" scrolling='no'></iframe>
    </body>
    </html>

<?php

}
else {
    $_SESSION['loggued_on_user'] = '';
    header('Refresh: 2; URL="index.html"');
    echo "The login/password you entered is wrong, try again.\n";
}

?>
