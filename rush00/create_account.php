<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
</head>
<body>
    <header>
        <?php include ('menu.php'); ?>
        <?php include ('login.php'); ?>
    </header>
        <link rel="stylesheet" type="text/css" href="stylesheets/login_form.css">
        <form class="log_form" action='create_account.php' method='POST'>
            <div class='login'>Login:<br>
                <input type='text' name='login' value='' placeholder="Username" autofocus required/></div>
            <div class='password'>Password:<br />
                <input type='password' name='passwd' value='' placeholder="Password" required/></div>
            <div class='push'>
                <input class='button' type='submit' name='submit' value='Log in' />
            </div>
            <br />
            <br />
            <br />
            Not a member yet ? <a href="register.php">Register</a> 😉
        </form>
        <?php include ('footer.php'); ?>
</body>
<html>
