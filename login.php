<?php
session_start();
if((!isset($_POST['login']))&&(!isset($_POST['pass'])))
{
header("Location: index.php");
}
$email=$_POST['login'];
$password=$_POST['pass'];

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

if($return->num_rows>0)
{

  $array=$return->fetch_assoc();
  if(password_verify($password,$array['pass']))
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
