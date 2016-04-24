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
     <a href="img.php"><div class="menu">zdjecia</div></a>
     <a href="img.php"><div class="menu">Filmy</div></a>
     <a href="wyloguj.php"><div class="menu">Wyloguj się</div></a>
  </div>
  <main>
    <a href="Upload.php"><h4 style="text-align:center">Dodaj zdjecie</h4></a>
    <script>
function myFunction() {
confirm("Press a button!");
}
</script>
<br/>

    <?php
    $id=$_SESSION['id'];
    require_once('connect.php');
    $connect=new mysqli($host,$user,$pass,$base);
    if($connect->connect_error)
    {
      echo "Error ".$connect->connect_errno;
    }
    else
      {
        $id=$_SESSION['id'];
        $return=$connect->query("SELECT * FROM img WHERE id_user='".$id."'");
        $ile=$return->num_rows;
        if($ile>0)
        {

            while ($ile--)
            {
              $tab=$return->fetch_assoc();
              echo '<form method="POST" action="manager.php">';
              echo '<input type="hidden" name="id_img" value="'.$tab['id'].'">';
              echo '<input type="hidden" name="name_file" value="'.$tab['file_name'].'">';
              $source="Upload/".$id."/img"."/".$tab['file_name'];

              echo '<div class="img"><input img class="img_size" type="image" src="'.$source.'"  alt="Submit Form" /></div>';
              echo "</form>";
            }

        }
      }
      ?>
  </main>
</body>
</html>
