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
     <a href="img.php"><div class="menu">Muzyka</div></a>
     <a href="img.php"><div class="menu">Filmy</div></a>
     <a href="img.php"><div class="menu">Zdjecia</div></a>
     <a href="wyloguj.php"><div class="menu">Wyloguj się</div></a>
  </div>
    <main>
      <?php
      $id_img=$_POST['id_img'];
      $id_user=$_SESSION['id'];
      $name=$_POST['name_file'];
      $source="Upload/".$id_user."/img"."/".$name;

      echo '<form method="POST" action="delete.php" onsubmit="return confirm'."('Czy jestes pewien że chcesz usunąć zdjecie?')".'">';
      echo '<input type="hidden" name="id_img" value="'.$id_img.'">';
      echo '<input type="hidden" name="name_file" value="'.$name.'">';


      echo '<div class="img"><input class="img_size" type="image" src="'.$source.'"  alt="Submit Form" /></div>';

      ?>
    </form>
    </main>
</body>
</html>
