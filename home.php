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
<h2 style="text-align:center;">Witaj, To miejsce gdzie możesz zgromadzić<p> Muzyke Zdjecia  Filmy</p></h2>
<div style="margin: auto; text-align:center; ">
<div class="zakladki"><i style="font-size:48px;" class="demo-icon icon-note"> </i></div>
<div class="zakladki"><i style="font-size:48px;" class="demo-icon icon-video"></i></div>
<div class="zakladki"><i style="font-size:48px;" class="demo-icon icon-picture"></i></div>
</div>
  </main>
</body>
</html>
