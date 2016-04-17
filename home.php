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
<meta charset="utf-8"/>
<title>HostBook</title>
</head>
<body>
  <main>
    <h2 style="text-align:center;">Witaj w swoim konciku
       <?php echo $_SESSION['name']; ?>
     </h2>
   <div id="menu">
     <a href="img.php"><div class="menu">Muzyka</div></a>
     <a href="img.php"><div class="menu">zdjecia</div></a>
     <a href="img.php"><div class="menu">Filmy</div></a>
     <a href="img.php"><div class="menu">Muzyka</div></a>
  </div>
  </main>
</body>
</html>
