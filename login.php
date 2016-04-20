<?php
session_start();
if((!isset($_POST['login']))&&(!isset($_POST['pass'])))
{
header("Location: index.php");
}
$email=$_POST['login'];
$password=$_POST['pass'];
if(isset($_POST['g-recaptcha-response']))
{
$captcha=$_POST['g-recaptcha-response'];
$secret_key="6LcT2B0TAAAAAKj9Wgab_UfuF-sWJcKqtUeYMfmo";
//$res=file_get_contents("https://www.google.com/recaptcha/api/siteverify&secret=".$secret_key."&response=".$captha."&remoteip=".$_SERVER['REMOTE_ADDR']);
$res=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
if(!$captcha)
{
      $_SESSION['recaptcha']='<div class="bad">Pokaż że nie jesteś robotem!</div>';
      header("Location: index.php");
      exit;
}
if($res.success==false)
{

    $_SESSION['recaptcha']='<div class="bad">Pokaż że nie jesteś robotem!</div>';
    header("Location: index.php");
      exit;
}
}


require("connect.php");
$connect= new mysqli($host,$user,$pass,$base);
if($connect->connect_error)
{
  echo "Error".$connect->connect_errno;
}
else
{
if($return=$connect->query("SELECT * FROM user WHERE email='".$email."'"))
{
if($return->num_rows>0)// sprawdam czy jest user o takim e-mail'u
{

  $array=$return->fetch_assoc();
  if(password_verify($password,$array['pass']))//srpawdzam hasła
    {
        $_SESSION['id']=$array['id'];
        $_SESSION['name']=$array['name'];
        $_SESSION['zalogowany']=true;
        header("Location: home.php");

    }
    else {
        $_SESSION['b_email']='<div class="bad">Nie ma takiego konta.</div>';
  header("Location: index.php");
    }
}
else {
  $_SESSION['b_email']='<div class="bad">Nie ma takiego konta.</div>';

  header("Location: index.php");
}
}
}
