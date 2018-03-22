<?php

if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] === "OK") {
    if (!file_exists('../private/passwd')) {
        mkdir('../private');
        file_put_contents('../private/passwd', NULL);
    }
    $accounts = unserialize(file_get_contents('../private/passwd'));
    if ($accounts) {
        $there_and_correct = 0;
        foreach ($accounts as $user_id => $user_infos) {
            if ($user_infos['login'] === $_POST['login']) {
                $old = hash('sha3-512', $_POST['oldpw']);
                $new = hash('sha3-512', $_POST['newpw']);
                if ($user_infos['passwd'] == $old) {
                    $accounts[$user_id]['passwd'] = $new;
                    $there_and_correct = 1;
                    header('Refresh: 2; URL="index.html"');
                    echo "OK\n";
                }
            }
        }
        if ($there_and_correct == 1) {
            file_put_contents('../private/passwd', serialize($accounts));
        }
        else {
            header('Refresh: 2; URL="modif.html"');
            echo "Wrong login or password, try again.\n";
        }
    }
    else {
        header('Refresh: 2; URL="modif.html"');
        echo "There's currently noone registered on this website.\n";
    }
}
else {
    header('Refresh: 2; URL="modif.html"');
    echo "Fill all entries of the form !\n";
}

?>
