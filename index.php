<?php  session_start(); 
 require 'products.inc';
	foreach ($_SESSION['orderedlist'] as $pId)
	{
		$products[$pId]['checked'] = 'checked';
	}
 for ($i = 1; $i < 11; $i++)
 {
    if (!isset($_SESSION['quantity'][$i]))
    {
       $_SESSION['quantity'][$i] = 1;
    }
 }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart - Select Your Items</title>
<link href="style.css" rel='stylesheet' type='text/css'/>
</head>
<body id="home">
<form action="order.php" method="post">
<h1 class="left">BBQ Online Store</h1><p class="right"><a href="order.php">View Current Order</a></p>
<div class="clear"></div>
<ul>
<li><h2><?php  echo $products[1]['name']; ?></h2>
<h3>Price: $<?php  echo $products[1]['price']; ?></h3>
<img alt="<?php  echo $products[1]['name']; ?>" src="<?php  echo $products[1]['picture']; ?>"/>
<label for="largegasgrill">Select: </label><input type="checkbox" id="largegasgrill" name="ordered[]" value="1" <?php  echo $products[1]['checked']; ?>/><label for="quantity[1]">Quantity</label>
<input type="text" value="<?php echo $_SESSION['quantity'][1] ?>" name="quantity[1]"/>

</li>
<li><h2><?php  echo $products[2]['name']; ?></h2>
<h3>Price: $<?php  echo $products[2]['price']; ?></h3>
<img alt="<?php  echo $products[2]['name']; ?>" src="<?php  echo $products[2]['picture']; ?>"/>
<label for="smallgasgrill">Select: </label><input type="checkbox" id="smallgasgrill" name="ordered[]" value="2" <?php  echo $products[2]['checked']; ?>/><label for="quantity[2]">Quantity</label>
<input type="text" value="<?php echo $_SESSION['quantity'][2] ?>" name="quantity[2]"/>

</li>
<li><h2><?php  echo $products[3]['name']; ?></h2>
<h3>Price: $<?php  echo $products[3]['price']; ?></h3>
<img alt="<?php  echo $products[3]['name']; ?>" src="<?php  echo $products[3]['picture']; ?>"/>
<label for="firepit">Select: </label><input type="checkbox" id="firepit" name="ordered[]" value="3" <?php  echo $products[3]['checked']; ?>/><label for="quantity[3]">Quantity</label>
<input type="text" value="<?php echo $_SESSION['quantity'][3] ?>" name="quantity[3]"/>
</li>
<li><h2><?php  echo $products[4]['name']; ?></h2>
<h3>Price: $<?php  echo $products[4]['price']; ?></h3>
<img alt="<?php  echo $products[4]['name']; ?>" src="<?php  echo $products[4]['picture']; ?>"/>
<label for="camppit">Select: </label><input type="checkbox" id="camppit" name="ordered[]" value="4" <?php  echo $products[4]['checked']; ?>/><label for="quantity[4]">Quantity</label>
<input type="text" value="<?php echo $_SESSION['quantity'][4] ?>" name="quantity[4]"/>

</li>
<li><h2><?php  echo $products[5]['name']; ?></h2>
<h3>Price: $<?php  echo $products[5]['price']; ?></h3>
<img alt="<?php  echo $products[5]['name']; ?>" src="<?php  echo $products[5]['picture']; ?>"/>
<label for="portablegrill">Select: </label><input type="checkbox" id="portablegrill" name="ordered[]" value="5" <?php  echo $products[5]['checked']; ?>/><label for="quantity[5]">Quantity</label>
<input type="text" value="<?php echo $_SESSION['quantity'][5] ?>" name="quantity[5]"/>

</li>
</ul>
<ul>
<li><h2><?php  echo $products[6]['name']; ?></h2>
<h3>Price: $<?php  echo $products[6]['price']; ?></h3>
<img alt="<?php  echo $products[6]['name']; ?>" src="<?php  echo $products[6]['picture']; ?>"/>
<label for="smoker">Select: </label><input type="checkbox" id="smoker" name="ordered[]" value="6" <?php  echo $products[6]['checked']; ?>/><label for="quantity[6]">Quantity</label>
<input type="text" value="<?php echo $_SESSION['quantity'][6] ?>" name="quantity[6]"/>

</li>
<li><h2><?php  echo $products[7]['name']; ?></h2>
<h3>Price: $<?php  echo $products[7]['price']; ?></h3>
<img alt="<?php  echo $products[7]['name']; ?>" src="<?php  echo $products[7]['picture']; ?>"/>
<label for="apron">Select: </label><input type="checkbox" id="apron" name="ordered[]" value="7" <?php  echo $products[7]['checked']; ?>/><label for="quantity[7]">Quantity</label>
<input type="text" value="<?php echo $_SESSION['quantity'][7] ?>" name="quantity[7]"/>

</li>
<li><h2><?php  echo $products[8]['name']; ?></h2>
<h3>Price: $<?php  echo $products[8]['price']; ?></h3>
<img alt="<?php  echo $products[8]['name']; ?>" src="<?php  echo $products[8]['picture']; ?>"/>
<label for="bbqsauce">Select: </label><input type="checkbox" id="bbqsauce" name="ordered[]" value="8" <?php  echo $products[8]['checked']; ?>/><label for="quantity[8]">Quantity</label>
<input type="text" value="<?php echo $_SESSION['quantity'][8] ?>" name="quantity[8]"/>

</li>
<li><h2><?php  echo $products[9]['name']; ?></h2>
<h3>Price: $<?php  echo $products[9]['price']; ?></h3>
<img alt="<?php  echo $products[9]['name']; ?>" src="<?php  echo $products[9]['picture']; ?>"/>
<label for="spatulas">Select: </label><input type="checkbox" id="spatula" name="ordered[]" value="9" <?php  echo $products[9]['checked']; ?>/><label for="quantity[9]">Quantity</label>
<input type="text" value="<?php echo $_SESSION['quantity'][9] ?>" name="quantity[9]"/>

</li>
<li><h2><?php  echo $products[10]['name']; ?></h2>
<h3>Price: $<?php  echo  $products[10]['price']; ?></h3>
<img alt="<?php  echo $products[10]['name']; ?>" src="<?php  echo  $products[10]['picture']; ?>"/>
<label for="starters">Select: </label><input type="checkbox" id="starters" name="ordered[]" value="10" <?php  echo $products[10]['checked']; ?>/><label for="quantity[10]">Quantity</label>
<input type="text" value="<?php echo $_SESSION['quantity'][10] ?>" name="quantity[10]"/>
</li>
</ul>
<input type="submit" value="Review Order" /> <!--<input type="reset" value="Reset" />-->
</form>
</body>
    
</html>
