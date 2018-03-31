<?php

session_start();
include 'auth.php';
isset($_POST['login']) ? $login = $_POST['login'] : $login = "";
isset($_POST['passwd']) ? $passwd = $_POST['passwd'] : $passwd = "";
if (auth($login, $passwd)) {
    $_SESSION['logged_on_user'] = $login;
?>
    <html>
    <head>
        <meta charset='utf-8' />
        <title>42Chat - <?php echo ucfirst($_SESSION['logged_on_user']); ?></title>
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

            iframe {
                border: none;
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
        <a class='logout' href='logout.php'>Log out of <?php echo ucfirst($_SESSION['logged_on_user']); ?></a>
    </header>
        <iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
        <iframe name="speak" src="speak.php" width="100%" height="50px" scrolling='no'></iframe>
    </body>
    </html>

<?php

}
else {
    $_SESSION['logged_on_user'] = '';
    header('Refresh: 2; URL="index.html"');
    echo "The login/password you entered is wrong, try again.\n";
}

?>
