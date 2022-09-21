<!DOCTYPE html>
<html>
<head>
<title>Feedback Form</title>
</head>
<body>

<?php

if(isset($_POST["formButton"])) :
	if($_POST["name"] == "" || $_POST["email"] == "") :
		echo "Please fill all the fields.";
	elseif(strpos($_POST["email"],"@") == false) :
		echo "Please check your e-mail address";
	else :
		echo "<p>Hello!<br>
		Thank you for your feedback! We will contact you at {$_POST["email"]} as soon as possible. Here is your feedback for reference.<br>
		{$_POST["feedback"]}";
	endif;
endif;
?>

<form action="feedback.php" method="post" id="login-form">
	<label for="user_name">Name</label>
    <input type="text" name="name" id="name"><br>
	<label for="email">E-mail</label>
    <input type="text" name="email" id="email"><br>
	<label for="feedback">Your feedback</label><br>
    <textarea name="feedback" id="feedback"></textarea><br>
	<input type="submit" id="formButton" name="formButton" value="Send!">
</form>

</body>
</html>