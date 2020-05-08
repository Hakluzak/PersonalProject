<?php
require_once('./utils/JSONfunctions.php');
require_once('./utils/lib_auth.php');
if(!Auth::is_logged('uID')) header('location:signin.php');

$title='User Area';

session_start();
require_once('./reqs/header.php');
header('location:index.php');

require_once('./reqs/footer.php');