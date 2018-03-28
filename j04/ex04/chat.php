<?php

date_default_timezone_set('Europe/Paris');
session_start();
if (!($_SESSION['loggued_on_user'])) {
    header('Refresh: 2; URL="index.html"');
    echo "You are not currently connected. Please log in.\n";
}
else {
    if (file_exists('../private/chat')) {
        $full_conversation = unserialize(file_get_contents('../private/chat'));
    }
?>
    <html>
    <head>
        <script type="text/javascript">
        function pageScroll() {
            window.scrollTo(0, document.body.scrollHeight);
        }
        </script>
        <style>

        body {
            font-family: "Comic Sans MS";
        }

        .message {
            display:block;
            padding: 0px 20px;
            border-width: 1px;
        }

        </style>
    </head>
    <body onload="pageScroll()">
<?php
        foreach ($full_conversation as $message) {
?>
        <div class='message'>
<?php
        if ($last_user != $message['login']) {
            echo "<br><b><font size=\"4\">" . ucfirst($message['login']) . "</font></b> - <font size=\"1\">" . date('d/m', $message['time']) . "</font><br>";
            echo "<font size=\"2\">(<i>" . strtolower(date('h:i A', $message['time'])) . "</i>)</font>    : ";
            echo ucfirst($message['msg']) . "<br>";
        }
        else {
            echo "<font size=\"2\">(<i>" . strtolower(date('h:i A', $message['time'])) . "</i>)</font>     : ";
            echo ucfirst($message['msg']) . "";
        }
        $last_user = $message['login'];
?>
        </div>
<?php
        }
?>
        </div>
    </body>
    </html>
<?php
}
?>
