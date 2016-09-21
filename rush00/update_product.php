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

if (file_exists(PDT_DB) == 1 && $_POST['submit'] == "delete")
{
	$products = file_get_contents(PDT_DB);
	$products = unserialize($products);
	if ($products)
	{
		foreach ($products as $key => $product)
		{
			if ($product["product"] == $_POST["product"])
			{
				unset($products[$key]);
				file_put_contents(PDT_DB, serialize($products));
				$_POST['info'] = "Product deleted.";
			}
		}
		if ($_POST['info'] == NULL)
		{
			file_put_contents(PDT_DB, serialize($products));
			$_POST['error'] = "This product doesn't exist.";
		}
		
 	}
}

if (file_exists(PDT_DB) == 1 && $_POST['submit'] == "update")
{
	$products = file_get_contents(PDT_DB);
	$products = unserialize($products);
	if ($products)
	{
		foreach ($products as $key => $product)
		{
			if ($product["product"] == $_POST["product"])
			{
				if ($product == $_POST)
				{
					file_put_contents(PDT_DB, serialize($products));
					$_POST['error'] = "No modification to be done.";
				}
				else
				{	
					$products[$key] = $_POST;
					file_put_contents(PDT_DB, serialize($products));
					$_POST['info'] = "Modifications done.";
				}
			}
		}
		if ($_POST['error'] == NULL && $_POST['info'] == NULL)
		{
			file_put_contents(PDT_DB, serialize($products));
			$_POST['error'] = "This product doesn't exist.";
		}
		
 	}
}

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
}
?>
<div style="clear:both"></div>
	<div class="admin_form">
	<form action="update_product.php" method="POST">
			<div style="clear:both"></div>
			<div class="input_label">
			<p>product</p><input type="text" name="product" class="input" />
			</div>
			<div class="input_label">
				<p>type</p><input type="text" name="type" class="input" />
			</div>
			<div class="input_label">
				<p>price</p><input type="text" name="price" class="input" />
			</div>
			<div class="input_label">
				<p>category 1</p><input type="text" name="cat1" class="input" />
			</div>
			<div class="input_label">
				<p>category 2</p><input type="text" name="cat2" class="input" />
			</div>
			<input type="hidden" name="action" value="update"/>
			<input type="submit" name="submit" value="update" class="bouton"/>
			<input type="submit" name="submit" value="delete" class="bouton" style="background-color: #ff5050;">
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
				<li><a href="#"><?php echo $name.": ".$price."$";  ?></a></li>
<?php
			}
?>
		</ul>
	</div>

	</div>
</div>
