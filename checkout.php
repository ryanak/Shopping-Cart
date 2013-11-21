<?php session_start();?>
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
<div>
<p class="left">Your Order: </p><p class="right"><a href="final_project.php">Go Back to Products Page</a></p>
<div class="clear"></div>
<?php
echo "<ul><b>";
echo implode("<li></li>", $_SESSION['items']);
echo "</b></ul>";
echo "<br>Sub Total: " . "<span>$". array_sum($_SESSION['price']) . "</span>";
echo "<br>Tax: " . "<span>$" . $_SESSION['tax'] . "</span>";
echo "<br>Final Cost (including tax) " . "<span>$" . $_SESSION['final'] . "</span>";
?>
<br />
<div class="clear"></div>
<h2>Please provide your details:</h2>
<form action="complete.php" method="post">
<label for="firstname">First Name: </label> <input type="text" name="firstname" /><br /><br />
<label for="lastname">Last Name: </label> <input type="text" name="lastname" /><br /><br />
<label for="email">E-Mail Address: </label> <input type="email" name="email" /><br /><br />
<label for="phone">Phone Number: </label> <input type="tel" name="phone" /><br /><br />
<input type="submit" value="Submit">
</form>
</div>
</body>
</html>