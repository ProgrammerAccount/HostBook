<?php
session_start();
if(!isset($_SESSION['zalogowany']))
{
  header("Location: index.php");
    exit;
}
?>
<html>
<head>
  <!--Style css-->
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="css/css/fontello.css" type="text/css">
    <!--Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Lobster&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<meta charset="utf-8"/>
<title>HostBook</title>
</head>
<body>

    <div id="header">
     Witaj w swoim konciku
       <?php echo $_SESSION['name']; ?>


   </div>
   <div id="menu">
     <a href="home.php"><div class="menu" style="border-left: 2px dotted blue;">Home</div></a>
     <a href="muzyka.php"><div class="menu">Muzyka</div></a>
     <a href="img.php"><div class="menu">Zdjecia</div></a>
     <a href="img.php"><div class="menu">Filmy</div></a>
     <a href="wyloguj.php"><div class="menu">Wyloguj się</div></a>
  </div>
    <main>
      
    </main>
</body>
</html>
