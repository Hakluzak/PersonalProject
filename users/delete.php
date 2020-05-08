<?php
require_once('../settings.php');
require_once('../utils/lib_auth.php');
if (!Auth::is_logged('uID')){ 
	header('location: ../index.php');
	die();
}
$pdo=mysqldb::connect();
$q=$pdo->prepare('SELECT status FROM users WHERE ID=?');
$q->execute([$_SESSION['uID']]);
$user=$q->fetch();
if ($user['status'] != 'A') header ('location: ../index.php');

require_once("../sqldb/dbclass.php");
$delVal = new Dbuse;
$delVal->duser($_GET['index']);
header('location: index.php');
?>
<!doctype html>
<style>
.navBut {
	display: block;
	align: right;
	text-align: center;
	margin-left: 90%;
	padding-bottom: 5px;
}
.webLnk {
	padding: 5px;
}
#logo {
	border-style: solid;
	border-width: 5px;
}
.nav {
	
}
</style>

<html lang="en">

	<?php
	require_once('./reqs/header.php');
	?>
	
	<body style="background: url(https://fractalsoftworks.com/wp-content/themes/starfarer/images/bg_top_stars.jpg) repeat-x top center; background-color: black;">
	 <div class="container" style="background-color:#bfbfbf">
		
	 </div>
	</body>
	
	<?php
		require_once('./reqs/footer.php');
	?>
  </body>
</html>