<?php

$type = ($_GET['type']) ? $_GET['type'] : $_POST['type'];
$action = ($_GET['action']) ? $_GET['action'] : $_POST['action'];
echo "GET: ".$_GET['type']."</br>";
echo "POST: ".$_POST['type']."</br>";

?>

	<div style="clear:both"></div>
	<div class="admin_form">
	<form action="admin_<?php echo $action ?>.php?type="<?php echo $type ?>"action=sign_in" method="POST">
			<div style="clear:both"></div>
			<div class="input_label">
			<p>login</p><input type="text" name="login" class="input" />
			</div>
			<div class="input_label">
				<p>password</p><input type="password" name="pwd" class="input" />
			</div>
			<div class="input_label">
				<p>privilege</p><input type="number" name="privilege" min="0" max="3" class="input"/>
			</div>
			<input type="hidden" name="type" value="<?php echo $type ?>"/>
			<input type="hidden" name="action" value="<?php echo $action ?>"/>
			<input type="submit" name="login" value="OK" class="bouton"/>
		</form>
	</div>
</div>
