<?php

session_start();
if ($_GET["submit"] == "OK")
{
	$_SESSION["login"] = $_GET["login"];
	$_SESSION["passwd"] = $_GET["passwd"];
}
echo $_SESSION["passwd"];

?>

<html>
	<head>
		<title>ex00</title>
	</head>
	<body>
		<form action="http://e1r11p7.42.fr:8080/" method="GET">
			<label>login
				<input type="text" name="login" value="<?php echo $_SESSION["login"]?>"></label>
				<br/>
			<label>passwd
				<input type="password" name="passwd" value="<?php echo $_SESSION["passwd"]?>"></label>
				<br/>
			<button type="submit" name="submit" value="OK">OK</button>
		</form>
	</body>
</html>