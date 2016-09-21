<?php

if (file_exists(PDT_DB) == 1)
{
	$products = file_get_contents(PDT_DB);
	$products = unserialize($products);
	print_r ($products);
	if ($products)
	{
		foreach ($products as $key => $product)
			if ($product["product"] == $_POST["product"])
			{
				echo "Product already exist";
	//			header('Location: http://e3r7p10.42.fr:8080/');
				return ; 
			}
 	}
 	else
 	{
 //		header('Location: http://e3r7p10.42.fr:8080/');
 		echo "Array initialized and ";
 	}
 	$products[] = $_POST;
	file_put_contents(PDT_DB, serialize($products));
//	header('Location: http://e3r7p10.42.fr:8080/');
	echo "product added";
}

?>
<<<<<<< HEAD
<html>
    <head>
        <title>product</title>
    </head>
    <body>
        <form action="create_product.php" method="POST">
            <label>produit
                <input type="text" name="product"></label>
                <br/>
            <label>type
                <input type="text" name="content"></label>
                <br/>
            <label>image
                <input type="text" name="img"></label>
                <br/>
            <label>prix
                <input type="text" name="price"></label>
                <br/>
            <label>categorie 1
                <input type="text" name="cat1"></label>
                <br/>
            <label>categorie 2
                <input type="text" name="cat2"></label>
                <br/>
            <label>categorie 3
                <input type="text" name="cat3"></label>
                <br/>
            <button type="submit" name="submit" value="OK">OK</button>
        </form>
    </body>
</html>
=======

<html>
	<head>
		<title>product</title>
	</head>
	<body>
		<form action="product.php" method="POST">
			<label>produit
				<input type="text" name="product"></label>
				<br/>
			<label>type
				<input type="text" name="content"></label>
				<br/>
			<label>image
				<input type="text" name="img"></label>
				<br/>
			<label>prix
				<input type="text" name="price"></label>
				<br/>
			<label>categorie 1
				<input type="text" name="cat1"></label>
				<br/>
			<label>categorie 2
				<input type="text" name="cat2"></label>
				<br/>
			<label>categorie 3
				<input type="text" name="cat3"></label>
				<br/>
			<button type="submit" name="submit" value="OK">OK</button>
		</form>
	</body>
</html>
>>>>>>> 0d7b5aa1b2951f39359f23dbcacb2bdf1eb75382
