<?php
require_once('./utils/JSONfunctions.php');
require_once('./utils/lib_auth.php');

$title="Sign Out";

if (is_logged('uID')) signout('signin.php');
else header('location: signin.php');

require_once('header.php');
echo 'Successfully signed out.';

require_once('footer.php');

?>