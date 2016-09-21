<?php

include('config.php');
include('include/header.php');
?>

<h1>Admin</h1>

<div id="admin_content">
	<div id="admin_menu">
		<ul>
			<li><a href="admin.php?type=user_handle">user</a></li>
			<li><a href="admin.php?type=product_handle">product</a></li>
		</ul>
	</div>
<?php

function get_all_product()
{
	$all_product = array();
	$products = file_get_contents(PDT_DB);
	$products = unserialize($products);
	if ($products)
		foreach ($products as $key => $product)
			foreach ($product as $name => $content)
			{
				if ($name == 'product')
				{
					$all_product[] = array($product['product'] => $product['price']);
				}
			}
	return $all_product;
}

if ($_POST['submit'] == "OK")
{

	if (file_exists(PDT_DB) == 0)
	{
		if (file_exists("db") == 0)
			mkdir("db");
		// file_put_contents(PDT_DB, "");
	}
	if (file_exists(PDT_DB) == 1)
	{
		$products = file_get_contents(PDT_DB);
		if ($products)
		{
			$products = unserialize($products);
			foreach ($products as $key => $product)
			{
				if ($product["product"] == $_POST["product"])
					$_POST['error'] = "Product already exists";
			}
		}
	}
	$_POST['info'] = "Product added";
	if ($_POST['error'])
	{
?>
		<div class="error" class"admin_popup_position">
			<p><?php echo $_POST['error']; ?></p>
		</div>
<?php
	}
	else if ($_POST['info'])
	{
?>
		<div class="info" class"admin_popup_position">
			<p><?php echo $_POST['info']; ?></p>
		</div>
<?php
	$products[] = $_POST;
	file_put_contents(PDT_DB, serialize($products));
	}
}
?>
<h1 id="title">PRODUCT : ADD</h1>
<div style="clear:both"></div>
	<div class="admin_form">
	<form action="add_product.php" method="POST">
			<div style="clear:both"></div>
			<div class="input_label">
			<p>product</p><input type="text" name="product" class="input" />
			</div>
			<div class="input_label">
				<p>description</p><input type="text" name="type" class="input" />
			</div>
			<div class="input_label">
				<p>price</p><input type="text" name="price" class="input" />
			</div>
			<div class="input_label">
				<p>category</p><input type="text" name="cat1" class="input" />
			</div>
			<div class="input_label">
				<p>image</p><input type="text" name="cat2" class="input" />
			</div>
			<input type="submit" name="submit" value="OK" class="bouton"/>
		</form>
<?php
		$all_products = get_all_product();
?>
	<div id="register_user" class="content_style">
		<p>Products</p></br>
		<ul>
<?php 
		foreach ($all_products as $id)
			foreach ($id as $name => $price)
			{
?>
				<li><a href="#"><?php echo $name;  ?></a></li>
<?php
			}
?>
		</ul>
	</div>

	</div>
</div>
