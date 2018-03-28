<?php

session_start();
if (!($_SESSION['loggued_on_user'])) {
    header('Refresh: 2; URL="index.html"');
    echo "You are not currently connected. Please log in.\n";
}
else {
    if ($_POST['new_message']) {
        if (!file_exists("../private/chat")) {
            mkdir("../private");
            file_put_contents("../private/chat", null);
        }
        $full_conversation = unserialize(file_get_contents("../private/chat"));
        $fd = fopen("../private/chat", 'w');
        flock($fd, LOCK_EX);
        $message['login'] = $_SESSION['loggued_on_user'];
        $message['time'] = time();
        $message['msg'] = strip_tags($_POST['new_message']);
        $full_conversation[] = $message;
        file_put_contents("../private/chat", serialize($full_conversation));
        fclose($fd);
    }
?>
<html>
<head>
    <meta charset='utf-8' />
    <style>

    .chat_field {
        width: 90%;
        height: 33px;
        padding: 0;
        overflow: hidden;
    }

    .button {
        width: 9%;
        border: none;
        padding: 9.5px;
        margin-left: 8px;
    }

    </style>
    <script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
</head>
<body>
<form action='speak.php' method='POST'>
    <input class="chat_field" type='text' name="new_message" value='' maxlengh='500' accept-charset="ISO-8859-1" autofocus/>
    <input class="button" type='submit' name='submit' value='Send' />
</form>
</body>
</html>
<?php
}
?>
