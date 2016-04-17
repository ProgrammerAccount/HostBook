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
  $connect->close();
  $_SESSION['zalogowany']=true;
  header("Location: home.php");
}
else {
    $connect->close();
header("Location: index.php");

}
?>
