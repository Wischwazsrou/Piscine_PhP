<?php

session_start();
include('config.php');

$products = file_get_contents(PDT_DB);
$products = unserialize($products);

function get_product($db, $product_name)
{
	$products = array();
	if ($db)
	{
		foreach ($db as $key => $product)
		{
			foreach ($product as $category => $value)
			{
				if ($category == "product" && $value == $product_name)
				{
					if ($_GET['action'] == "remove" && $_GET['stuff'] == $product_name)
					{
						unset($product);
					}
					else
						$products[] = $product;
					return $products;
				}
			}
		}
	}
	return $products;
}

if ($_POST['submit'] == "valid")
{
	$basket = $_SESSION['basket'];
	if ($_SESSION['status'] != "logged")
	{
		header("location: auth.php?action=login");
	}
	else
	{
		$_POST['info'] = "basket validated.";
		$basket['user'] = $_SESSION['user'];
		file_put_contents("db/basket", serialize($basket));
	}
}

if ($_POST['submit'] == "delete")
{
	unset($_SESSION['basket']);
}

include('include/header.php');

if ($_POST['info'])
{
?>
	<div class="info" class"admin_popup_position">
		<p><?php echo $_POST['info']; ?></p>
	</div>
<?php
}
?>
<h1>Basket</h1>
<?php
$n_product = 0;
$cost = 0;
if ($_SESSION['basket'])
{
	foreach ($_SESSION['basket'] as $product)
	{
		$item = get_product($products, $product);
?>
	<div class="basket_entry">
		<div class="basket_item_img">
			<?php echo $itemi[0]['img']; ?>
		</div>
		<div class="basket_item_desc">
			<div class="basket_item_name">
				<?php echo $item[0]['product']; 
					$n_product++;?>
			</div>
			<!-- </br> -->
			<div class="basket_item_type">
				<?php echo $item[0]['type']; ?>
			</div>
		</div>
		<div class="basket_item_price">
			<?php echo $item[0]['price']; 
				$cost = $cost + $item[0]['price']?>
		</div>
	</div>
	<hr/>
<?php
	}
	echo "cost: ".$cost."<br>";
	echo "nbr_product: ".$n_product;
}
else
{
	echo "<h1>empty basket !</h1>";
}
?>

<form action="basket.php" method="POST">
	<input type="submit" name="submit" value="valid" class="bouton"/>
	<input type="submit" name="submit" value="delete" class="bouton" style="background-color: #ff5050;">
</form>
