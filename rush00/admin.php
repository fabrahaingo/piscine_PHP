<?php
include ('session_start.php');

/* ===== Change that with the real authentification function === */
if (isset($_POST['title']) && isset($_POST['price']) && isset($_POST['submit']) && $_POST['submit'] === 'Register')
{
    if (!file_exists('./db'))
        mkdir("db");
    if (file_exists('db/books')){
        $books = unserialize(file_get_contents('./db/books'));
    }
    $categories = array("title", "price", "thriller", "sf", "novels", "comics");
    foreach ($categories as $val) {
              $tmp[$val] = $_POST[$val];}
    $books[$_POST['title']] = $tmp;
    file_put_contents('./db/books', serialize($books));
    header('Refresh: 0; URL=' . $_SERVER['PHP_SELF']);//modifier
    exit();
}
else if (isset($_POST['submit']) && $_POST['submit'] === 'delete')
{
    if (!file_exists('./db'))
      mkdir("db");
    if (file_exists('db/books')){
    $books = unserialize(file_get_contents('./db/books'));
    }
    unset($books[$_POST['title']]);

    file_put_contents('./db/books', serialize($books));
}
else if (isset($_POST['login_delete']) && $_POST['login_delete'] === 'delete')
{
    $logins = unserialize(file_get_contents('./private/passwd'));
    foreach ($logins as $key => $value) {
      if ($_POST['login'] === $value['login'])
      {
          unset($logins[$key]['login']);

      }
    }
}
elseif (isset($_POST['cart_sent']) && $_POST['cart_sent'] === 'sent')
{
  $orders = unserialize(file_get_contents('./db/archives'));
  unset($orders[$_POST['login_sent']]);
  file_put_contents("./db/archives",serialize($orders));
}

if (isset($_COOKIE['logged_on_user']) && ($_COOKIE['logged_on_user'] === "fabien" || $_COOKIE['logged_on_user'] === "scarlett")) {

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
</head>
<body>
    <header>
        <?php include ('menu.php'); ?>
        <?php include ('login_menu.php'); ?>
    </header>
        <link rel="stylesheet" type="text/css" href="stylesheets/register_form.css">
        <form class="register_form" action='admin.php' method='POST'>
          <div class='title'>Modify/Add<br><br>
          <div class='title'>Title<br>
                <input type='text' name='title' value='' maxlength="50" placeholder="Max. 50 characters" autofocus required/></div>
          <div class='price'>price<br>
                <input type='number' name='price' value='' placeholder="" required/></div>


          <br><div class='price'>categorie<br><br>
          <div class='price'>comics<br>
              <input type='number' min="0" max="1" name='comics' value='0' placeholder="" required/></div>
          <div class='price'>thirller<br>
                  <input type='number' min="0" max="1" name='thriller' value='0' placeholder="" required/></div>
          <div class='price'>sf<br>
                  <input type='number' min="0" max="1"  name='sf' value='0' placeholder="" required/></div>
          <div class='price'>novels<br>
                          <input type='number' min="0" max="1" name='novels' value='0' placeholder="" required/></div>
          <div class='push'><input class='button' type='submit' name='submit' value='Register' /></div>
    </form>

        <br><br>

  <form class="register_form" action='admin.php' method='POST'>
        <div class='title'>Book Delete<br><br>
        <div class='price'>Title<br>
                        <input type='text' name='title' value='' placeholder="Max. 50 characters" required/></div>
        <div class='push'><input class='button' type='submit' name='submit' value='delete' /></div>
        </form>
  <br><br>

    <form class="register_form" action='admin.php' method='POST'>
      <div class='title'>Account Delete<br><br>
      <div class='price'>Login<br>
                      <input type='text' name='login' value='' placeholder="Max. 12 characters" required/></div>
      <div class='push'><input class='button' type='submit' name='login_delete' value='delete' /></div>
    </form>
  <br><br>

    <form class="register_form" action='admin.php' method='POST'>
        <div action="./admin.php" class='title'>Customers'orders<br><br>
      <?php
      $users = unserialize(file_get_contents('./private/passwd'));
      $orders = unserialize(file_get_contents('./db/archives'));
      $books = unserialize(file_get_contents('./db/books'));
      $idonline = 2;
      foreach ($users as $user)
      {
          if(isset($orders[$user['login']]))
          {
              $idonline = 3;
              ?> <div class=""> <?php echo $user['login']; ?> </div><br> <?php
              foreach ($books as $key_title => $val)
              {
                if(isset($orders[$user['login']][$val['title']]))
                {
                  ?> <div class=""> <?php echo $key_title."   ".$orders[$user['login']][$val['title']];?> </div> <?php
                }
              }
                  ?>
                  <form action="./admin.php" method="POST">
                    <input type="hidden" name="login_sent" value="<?php echo $user['login']; ?>" />
                  <div class='push'><input class='button' type='submit' name='cart_sent' value='sent' /></div>
                 </form>
                 <br><br>
                 <?php
          }
      }
      if ($idonline === 2)
      ?> <div class=""> You are up to date </div><br> <?php

       ?>
       </div>
<?php include ('footer.php'); ?>
</body>
<html>
<?php
}
else {
    echo "<script>alert(\"You must be a logged on admin in order to come here, goodbye 😈\");</script>";
    header('Refresh: 0; URL="login.php"');
}
