<?php

if (file_exists(PDT_DB) == 1)
{
	$products = file_get_contents(PDT_DB);
	$products = unserialize($products);
	if ($products)
	{
		foreach ($products as $key => $product)
		{
			if ($product["product"] == $_GET["product"])
			{
				if ($product == $_GET)
				{
					file_put_contents(PDT_DB, serialize($products));
					//	header('Location: http://e3r7p10.42.fr:8080/');
					echo "No modification to be done";
					return ;
				}
				else
				{	
					$products[$key] = $_GET;
					file_put_contents(PDT_DB, serialize($products));
					//	header('Location: http://e3r7p10.42.fr:8080/');
					echo "modifications done.";
					return;
				}
			}
			else
			{
				file_put_contents(PDT_DB, serialize($products));
				//	header('Location: http://e3r7p10.42.fr:8080/');
				echo "This product doesn't exist.";
				return ;
			}
		}
 	}
}

?>