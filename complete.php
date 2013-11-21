<?php 
session_start();
$_SESSION['firstname'] = htmlentities($_POST['firstname']); 
$_SESSION['lastname'] = htmlentities($_POST['lastname']); 
$_SESSION['email'] = htmlentities($_POST['email']); 
$_SESSION['phone'] = htmlentities($_POST['phone']); 
date_default_timezone_set('America/Los_Angeles');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart - Review Cart</title>
<link href="style.css" rel='stylesheet' type='text/css'/>
</head>
<body>
<h1 class='left'>BBQ Online Store</h1>
<div class="clear"></div>
<div>
<p class="right"><a href="final_project.php">Go Back to Products Page</a></p>
<div class="clear"></div>
<?php 
if ((isset($_SESSION['firstname'])) && (isset($_SESSION['lastname'])) && (isset($_SESSION['phone'])) && (isset($_SESSION['email'])))
	{
		$email_regex = '/^[^@\s]+@([-a-z0-9]+\.)+[a-z]{2,}$/i';
		$phone_regex = '/^\d{3}-\d{3}-\d{4}$/';

		if (!preg_match($email_regex, $_SESSION['email']))
	          {
	              $errors[] = "<b>Your email address is not valid. Please use the format: 000-000-0000.</b>"; 
	          }
			  
			  if (!preg_match($phone_regex, $_SESSION['phone'])) 
			      {
				  $errors[] = "<b>Your phone number is not valid.</b>"; 
				  }
				  
			 if (empty($_SESSION['firstname'])) 
			      {
				 $errors[] = "<b>Your name is not stated.</b>"; 
				  }
			 if (empty($_SESSION['lastname']))
			      {
				 $errors[] = "<b>Your last name is not stated is not stated.</b>"; 
				  }
			if(!empty($errors))
			{
				echo "<ul>";
				echo (implode("<li></li>",$errors));
				echo "<br><br><li><b>Click <a href='checkout.php'>Here</a> to return to the information page.</b></li>";
				echo "</ul>";
			}

			  else {
		echo "<h2>Your order has been submitted with the following details:</h2>";
echo "<ul>";
echo "<li>Sub Total: " . "<span>$" . array_sum($_SESSION['price']) . "</span></li>";
echo "<li>Tax: " . "<span>$" . $_SESSION['tax'] . "</span></li>";
echo "<li>Final Cost (including tax) " . "<span>$" . $_SESSION['final'] . "</span></li><br>";
echo "<li>Your Name: " . "<span>" . $_SESSION['firstname'] . " " . $_SESSION['lastname'] . "</span>" . "</li>";
echo "<li>Your Email: " . "<span>" . $_SESSION['email'] . "</span>" . "</li>";
echo "<li>Your Phone Numbers: " . "<span>" . $_SESSION['phone'] . "</span>" . "</li>";
echo "<li>Date and Time of Order: " . "<span>" . date('l d-M-Y g:i a' ) . "</span>" . "</li>";
echo "</ul>";
$to = $_SESSION['email'];
$subject = "Your Order";
$message = "Name: " . $_SESSION['firstname'] . " " . $_SESSION['lastname'] . "\n" .
"Ordered Items: \n\n" . implode("\n", $_SESSION['items']) . "\n\n" .
"Sub Total: " . "$". array_sum($_SESSION['price']) . "\n" .
"Tax: " . "$" . $_SESSION['tax'] . "\n" .
"Final Cost (including tax) " . "$" . $_SESSION['final'] . "\n" .
"Your Email: " . $_SESSION['email'] . "\n" .
"Your Phone Numbers: " . $_SESSION['phone'] . "\n" .
"Date of Order: " . date('Y-m-d H:i:s') . "\n\n";
$message = strip_tags($message);
mail($to, $subject, $message);

function save_comment($message) {
	if (!empty($message)) {
	$handle = @fopen('./orders.txt', 'a');
	fputs($handle, "\n" . $message);
	fclose($handle);
	return true;
}
}
save_comment($message);

echo "<br>You have been emailed a confirmation. Thank you.";
}
}
	else {
	echo "You did not enter any information. Click <a href='checkout.php'>Here</a> to return to the information page.";
	}
?>

</div>
</body>
</html>