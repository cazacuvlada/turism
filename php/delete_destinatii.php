<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    @include "../php/config.php";
$conn = mysqli_connect('localhost','root','','turism');


$sql = "DELETE FROM `destinatii` WHERE id= '$id'  ";
$result=mysqli_query($conn,$sql);
if($result){
        echo "Deleted successfull";
    header("location:../menu/destinatii.php");
}
else{
        die(mysqli_error($conn));
}
}


?>
