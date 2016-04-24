<?php
session_start();
if(!isset($_SESSION['zalogowany']))
{
  header("Location: index.php");
    exit;
}
if(isset($_FILES['file']))
{

     $dir="Upload/".$_SESSION['id']."/"."img/";
     $name_tmp=$_FILES['file']['tmp_name'];
     $name=$_FILES['file']['name'];
     //sprawdzam rozszeżenia
     $pathinfo = pathinfo($_FILES['file']['name']);
     $path=$pathinfo['extension'];
     $type=mime_content_type($name_tmp);
     if(($type!="image/png")&&($type!="image/jpeg")&&($type!="image/jpg")&&($type!="image/gif"))
      {
        $bad='<div class="bad">Nasz serwis obsługije tylko formaty: jpg,gif,jpeg i png</div>';
      }
     else{
       //generuje nową nazwe
       $name="";
       for($i=0;30>$i;$i++)
        {
          $name=$name.rand(1,9);
        }
      $name=$name.".".$path;
      move_uploaded_file($name_tmp,$dir.$name);

        //wysyłam
      require("connect.php");
      $connect= new mysqli($host,$user,$pass,$base);
      if($connect->connect_error)
      {
        echo "Error".$connect->connect_errno;
      }
      else
      {
        $connect->query("INSERT INTO img VALUES(NULL,'".$_SESSION['id']."','".$name."')" );
        $connect->close();
          header("Location: img.php");
      }
      }


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
    <div style="text-align:center; margin:auto; padding-top:300px;">
<form  method="post" enctype="multipart/form-data"  >
  <input type="file" value="Poszukaj pliku" name="file" accept="image/*">
    <input type="submit" value="Wyslij Plik">
</form>
<?php
if(isset($bad))
{
  echo $bad;
  unset($bad);
}

?>

  </main>
</body>
</html>
