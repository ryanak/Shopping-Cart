<?php 
	session_start();
	require 'products.inc';
	
	if((isset($_POST['ordered']))){
		$_SESSION['orderedlist'] = $_POST['ordered'];
	}

    if((isset($_POST['quantity'])))
    {
         $quantity = $_POST['quantity'];
    }

    else
    {
        $quantity = $_SESSION['quantity'];
    }
   
	if(!empty($_SESSION['orderedlist'])){
		foreach ($_SESSION['orderedlist'] as $pId){
            if (is_numeric($quantity[$pId]) && $quantity[$pId] > 0) {
			$price[] = number_format(($products[$pId]['price'] * $quantity[$pId]), 2);
			$tax =  number_format((array_sum($price) * 0.0775),2);
			$final = number_format($tax + array_sum($price),2);
			$items[] = " " . $products[$pId]['name'] . " - " . " Cost: " . "$" . $products[$pId]['price'] . " - " . " Quantity: " . $quantity[$pId] . "<br>";
            $_SESSION['quantity'][$pId] = $quantity[$pId];
		}
        else {
        $not_numeric_value = TRUE;
         }
       }
		$_SESSION['price'] = $price;
		$_SESSION['tax'] = $tax;
		$_SESSION['final'] = $final;
		$_SESSION['items'] = $items;
	}

	?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart - Review Cart</title>
<link href="style.css" rel='stylesheet' type='text/css'/>
</head>
<body>
<h1 class='left'>BBQ Online Store</h1>
<div class="clear"></div>
<?php
	if ($not_numeric_value == TRUE)
    {
        echo "<div><p class='left'>Your Order: </p><p class='right'><a href='index.php'>Return to Order Page</a></p>
    <div class='clear'></div>";
		echo "One of your quantities is invalid. Please return to the order page and input proper numeric quantities.";
		echo "</div>";
    }
    elseif (!empty($_SESSION['items'])){
		echo "<div>
<p class='left'>Your Order: </p><p class='right'><a href='index.php'>Return to Order Page</a></p>
<div class='clear'></div>";
		echo "<ul><b>";
		echo implode("<li></li>", $_SESSION['items']);
		echo "</b></ul>";
		echo "<ul>";
		echo "<li>Sub Total: " . "<span>$". array_sum($_SESSION['price']) . "</span><li>";
		echo "<li>Tax: " . "<span>$" . $_SESSION['tax'] . "</span><li>";
		echo "<li>Final Cost (including tax) " . "<span>$" . $_SESSION['final'] . "</span><li>";
		echo "<li><br><a href='checkout.php'>Continue with Checkout</a><li>";
		echo "</ul>";
	} else {
		echo "<div><p class='left'>Your Order: </p><p class='right'><a href='index.php'>Return to Order Page</a></p>
    <div class='clear'></div>";
		echo "Your cart is currently empty.";
		echo "</div>";
	}

	?>
<br /><br />
<?php 
	
	if(!empty($_SESSION['items']))
	{
		echo "<a href='clearcart.php'>Clear Cart</a>";
	}

	?>
</div>
</body>
</html>
