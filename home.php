<?php
session_start();
if(!isset($_SESSION['zalogowany']))
{
  header("Location: home.php");
}
?>
<html>
<head>
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="css/css/fontello.css" type="text/css">
<meta charset="utf-8"/>
<title>HostBook</title>
</head>
<body>
  <main>
    <div id="header">
     Witaj w swoim konciku
       <?php echo $_SESSION['name']; ?>


   </div>
   <div id="menu">
     <a href="img.php"><div class="menu" style="border-left: 2px dotted blue;">Muzyka</div></a>
     <a href="img.php"><div class="menu">zdjecia</div></a>
     <a href="img.php"><div class="menu">Filmy</div></a>
     <a href="img.php"><div class="menu">Muzyka</div></a>
  </div>
  Witaj w miejscu gdzie możesz zebrać ulubioną muzyka zdjecia i filmy.
<i class="demo-icon icon-note"></i>
  </main>
</body>
</html>
