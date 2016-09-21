<?php
session_start();
include('config.php');
include('include/header.php');


$products = file_get_contents(PDT_DB);
$products = unserialize($products);

// if($_GET['product'])
// 	$_SESSION['basket'][] = $_GET['product'];

function get_category($db)
{
	$category = array();
	if ($db)
	{
		foreach($db as $entry => $product)
		{
			foreach($product as $name => $value)
			{
				if (strstr($name, "cat") && strlen($name) == 4)
				{
					if ($value && !in_array($value, $category))
					{
						$category[] = $value;
					}
				}
			}
		}
		return $category;
	}
}

function get_product($db, $category_name)
{
	$products = array();
	if ($db)
	{
		foreach ($db as $key => $product)
		{
			foreach ($product as $category => $value)
			{
				if (strstr($category, "cat") && strlen($category) == 4)
				{
					if ($value == $category_name)
					{
						$products[] = $product;
					}
				}
			}
		}
	}
	return $products;
}

$category_name = get_category($products);
?>
<h1>Products</h1>

<form action="category.php" method="GET" id="category_search">
	<label>category
		<input type="text" name="cat"></label>
		<br/>
</form>

	<ul id="product_category">
<?php
	if ($category_name)
	{
		foreach ($category_name as $name)
		{
?>
			<li><a href="products.php?category=<?php echo $name ?>"><?php echo $name ?></a></li>
<?php
		}
	}
?>
	</ul>
	<div id="content">
<?php
	if ($_GET['category'])
	{
		$items = get_product($products, $_GET['category']);
		foreach ($items as $item => $product)
		{
?>
			<div class="item">
<?php
				echo "<p class='item_img'>Img: ".$product['img']."</p>";
				echo "<p class='item_price'>".$product['price']."$</p>";
				echo "<p class='item_name'>".$product['product']."</p>";
				echo "<p class='item_content'>".$product['type']."</p>";
				echo "<div class='add_item_bouton'><a href='products.php?category=".$_GET['category']."&product=".$product['product']."'>add</a></div>"
?>
			</div>
<?php
		}
	}
echo "</br>";
echo "</br>";
?>
</div>
