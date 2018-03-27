<?php

session_start();
if (!($_SESSION['loggued_on_user'])) {
    header('Refresh: 2; URL="index.html"');
    echo "You are not currently connected. Please log in.\n";
}
else {
    if (file_exists('../private/chat')) {
        $full_conversation = unserialize(file_get_contents('../private/chat'));
        foreach ($full_conversation as $message) {
            echo $message['user'] . " ";
            echo "(" . date($message['time']) . "): ";
            echo $message['msg'] . "\n";
        }
    }
}

?>
