<?php
session_start();
if((!isset($_POST['login']))&&(!isset($_POST['pass'])))
{
header("Location: index.php");
}



$email=$_POST['login'];
$password=$_POST['pass'];
$passwordv2=$_POST['passv2'];
$name=htmlentities($_POST['name']);
require("connect.php");
$connect= new mysqli($host,$user,$pass,$base);
if($connect->connect_error)
{
  echo "Error: ".$connect->connect_errno;
}
$good=true;
//sanityzacja e-mial'a
$anwers=$connect->query("SELECT * FROM user WHERE email='".$email."'");



  if($anwers->num_rows>0)
  {
  $good=false;
  $_SESSION['b_email']='<div class="bad">Ten adres e-mail jest już wykożystywany.</div>';

  }

$save_email=filter_var($email, FILTER_SANITIZE_EMAIL);
if($save_email!=$email)
{
  $good=false;
  $_SESSION['b_email']='<div class="bad">Ten adres e-mail nie jest poprawnyv2.</div>';
}

//Hasło
if(strlen($password)<8)
{
  $good=false;
  $_SESSION['b_pass']='<div class="bad">Hasło jest za krótkie.</div>';
}
if ($password!=$passwordv2)
{
  $good=false;
  $_SESSION['b_pass']='<div class="bad">Hasła są różne.</div>';
}
if($good==true)
{
  $connect->query("INSERT INTO user VALUES(NULL,'".$save_email."','".password_hash($password,PASSWORD_DEFAULT)."','".$name."') ");

  $_SESSION['zalogowany']=true;
    $_SESSION['name']=$name;
  unset($anwers);
  $anwers=$connect->query("SELECT * FROM user WHERE email='".$save_email."'");
  $tab=$anwers->fetch_assoc();
  mkdir("Upload/".$tab['id'],0777);
  chmod("Upload/".$tab['id'],0777);
  mkdir("Upload/".$tab['id']."/img",0777);
  mkdir("Upload/".$tab['id']."/muzyka",0777);
  mkdir("Upload/".$tab['id']."/filmy",0777);

  fopen("Upload/".$tab['id']."/index.php","w+");
  $_SESSION['id']=$tab['id'];
    $connect->close();
  header("Location: home.php");
}
else {
    $connect->close();
header("Location: index.php");

}
?>
