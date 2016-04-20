<?php
session_start();
if(isset($_SESSION['zalogowany']))
{
	header("Location: home.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Witaj na stronie HostBook</title>
	<link href="css/login.css" rel="stylesheet" type="text/css"/>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<meta charset="utf-8" />
</head>
<body>

<main>
	<form action="login.php" method="POST">
	<div id="logowanie">
	<!--Logowanie-->
	<div class="input"><input type="email" 	  name="login" 	placeholder="E-mail"/></div> <br/>
	<div class="input"><input type="password" name="pass" 	placeholder="Hasło"/></div></br>
	<div class="g-recaptcha" data-sitekey="6LcT2B0TAAAAAMZGMEWRRSSldJFFNSWvVAzXNYwy"></div></br>
	<div class="input"><input type="submit"   value="Zaloguj się"/></div>
	<?php
	if (isset($_SESSION['b_email']))
	{
		echo $_SESSION['b_email'];
		unset($_SESSION['b_email']);
	}
	if (isset($_SESSION['recaptcha']))
	{
		echo $_SESSION['recaptcha'];
		unset($_SESSION['recaptcha']);
	}
	?>
	</div>
	</form>
	<h3 style="text-align: center;">Nie masz konta? Stwórz je teraz!</h3>
	<!--Rejstracja-->
	<form action="rej.php" method="POST">
	<div id="rejstracja">
	<div class="input"><input type="email" 	  name="login" 	placeholder="E-mail"/></div></br>

	<div class="input"><input type="password" name="pass" 	placeholder="Hasło"/></div></br>

	<div class="input"><input type="password" name="passv2" 	placeholder="Powtórz hasło"/></div></br>

	<div class="input"><input type="text" 	  name="name" 	placeholder="Imie"/></div></br>
	<div class="g-recaptcha" data-sitekey="6LcT2B0TAAAAAMZGMEWRRSSldJFFNSWvVAzXNYwy"></div></br>
	<div class="input"><input type="submit"   value="Zarejstruj się"/></div>
	<?php
	if (isset($_SESSION['b_email']))
	{
		echo $_SESSION['b_email'];
		unset($_SESSION['b_email']);
	}
	?>
	<?php
	if (isset($_SESSION['b_pass']))
	{
		echo $_SESSION['b_pass'];
		unset($_SESSION['b_pass']);
	}
	?>
	</div>
	</form>



</main>

</body>
</html>
