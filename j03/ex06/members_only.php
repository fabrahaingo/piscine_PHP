<?php
if ($_SERVER["PHP_AUTH_USER"] == "zaz" && $_SERVER["PHP_AUTH_PW"] == "jaimelespetitsponeys")
{
?>
<html><body>
Bonjour Zaz<br />
<img src='data:image/png;base64,<?php
$img = file_get_contents("../img/42.png");
$img = base64_encode($img);
echo $img;
?>
'>
</body></html>
<?php
}
else {
    header("WWW-Authenticate: Basic realm=''Espace membres''");
    header("HTTP/1.0 401 Unauthorized");
?>
<html><body>Cette zone est accessible uniquement aux membres du site</body></html>
<?php
}
?>
