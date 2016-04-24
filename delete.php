<?php
session_start();
require_once('connect.php');
$connect=new mysqli($host,$user,$pass,$base);
if($connect->connect_error)
{
  echo "Error ".$connect->connect_errno;
}
else
  {

    $id_img=$_POST['id_img'];
    $id_user=$_SESSION['id'];
    $name=$_POST['name_file'];
    unlink("Upload/".$id_user."/"."img/".$name);
    $return=$connect->query("DELETE FROM img WHERE id='".$id_img."' AND id_user='".$id_user."' AND file_name='".$name."'");
    $connect->close();
  
    header("Location: img.php");
}
 ?>
