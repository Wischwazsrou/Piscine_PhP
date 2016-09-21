<?php
session_start();
if ($_GET['action'] == "logout")
{
	$_SESSION = NULL;
	session_destroy();
	header('Location:'.ROOT);
}
if ($_GET['product'])
{
	$_SESSION['basket'][] = $_GET['product'];
	$_GET['product']=NULL;
}

?>
<!DOCTYPE html>
<html>
	<head>
		<!-- <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/product.css">
		<link rel="stylesheet" href="css/backend.css">
		<link rel="stylesheet" href="css/basket.css">
	</head>
	<body>
		<nav id="nav">
			<div>
				<div id="name_site">
	  				<a class="navbar-brand" href="index.php">WebSiteName</a>
				</div>
				<ul id="nav-left">
					<li><a href="products.php">Produit</a></li>
					<li><a href="basket.php">Panier</a><span id="nb_item_basket">i<p><?php echo count($_SESSION['basket']) ?></p></span></li>
				</ul>
				<ul class="nav-right">
<?php
if (!$_SESSION['user'])
{
?>
					<li><a href="auth.php?action=sign_in"><span class=""></span>Sign Up</a></li>
					<li><a href="auth.php?action=login"><span class=""></span>Login</a></li>
<?php
}
else
{
	if ($_SESSION['privilege'] == 3)
	{
?>
		<div class="nav-right">
			<li><a href="admin.php"><span class=""></span>Admin</a></li>
<?php
	}
?>
			<li><a href="edit_profil.php"><span class=""></span><?php echo $_SESSION['user']  ?></a></li>
			<li><a href="index.php?action=logout"><span class=""></span>Logout</a></li>
		</div>
<?php
}
?>
				</ul>
				<div style="clear: both"></div>
  			</div>
		</nav>
