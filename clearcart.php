<?php
session_start();
require 'products.inc';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META HTTP-EQUIV="refresh" CONTENT="3;URL=index.php">
<title>Shopping Cart - Clear Cart</title>
<link href="style.css" rel='stylesheet' type='text/css'/>
</head>
<body id="clearcart">
<h1 class='left'>BBQ Online Store</h1>
<div class="clear"></div>
<div>

<?php
unset($_SESSION['items']);
unset($_SESSION['orderedlist']);
unset($_SESSION['quantity']);
echo "<p>Your Cart Has Been Cleared. You will be sent back to the order selection page.</p>";
?>
</div>
</body>
</html>
