<?php

if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === "OK") {
    if (!file_exists('../private/passwd')) {
        mkdir('../private');
        file_put_contents('../private/passwd', NULL);
    }
    $accounts = unserialize(file_get_contents('../private/passwd'));
    $there = 0;
    if ($accounts) {
        foreach ($accounts as $user_id => $user_infos) {
            if ($user_infos['login'] === $_POST['login']) {
                header('Refresh: 2; URL="create.html"');
                echo "This login is already taken, please choose another one.\n";
                $there = 1;
            }
        }
    }
    if ($there == 0) {
        $newuser['login'] = $_POST['login'];
        $newuser['passwd'] = hash('sha3-512', $_POST['passwd']);
        $accounts[] = $newuser;
        file_put_contents('../private/passwd', serialize($accounts));
        header('Refresh: 2; URL="index.html"');
        echo "OK\n";
    }
}
else {
    header('Refresh: 2; URL="create.html"');
    echo "Fill all entries of the form !\n";
}
?>
