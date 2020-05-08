<?php
require_once('settings.php');
require_once('./utils/lib_auth.php');

$title="Sign Out";

if (Auth::is_logged('uID')) Auth::signout('signin.php');
else header('location: signin.php');

require_once('header.php');
echo 'Successfully signed out.';

require_once('footer.php');

?>