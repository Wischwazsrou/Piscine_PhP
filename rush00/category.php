<?php

$products = file_get_contents(PDT_DB);
$products = unserialize($products);
if ($products)
{
	foreach ($products as $key => $product)
		if (($product["cat1"] && $product["cat1"] == $_GET["cat"]) || ($product["cat2"] && $product["cat2"] == $_GET["cat"])
			|| ($product["cat3"] && $product["cat3"] == $_GET["cat"]))
		{
			echo $product["product"]."<br/>";
//			header('Location: http://e3r7p10.42.fr:8080/');
		}
}

?>