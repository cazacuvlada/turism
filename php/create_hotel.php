
<?php

$destinatie="";
$hotel="";
$pret_noapte="";



//create connection

@include '../php/config.php';

$conn = mysqli_connect('localhost','root','','turism');

$errorMessage="";
$successeMessage ="";

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $destinatie=$_POST["destinatie"];
    $hotel=$_POST["hotel"];
    $pret_noapte=$_POST["pret_noapte"];

   

    do{
        if(empty($destinatie)||empty ($pret_noapte) ||empty ($hotel)){
            $errorMessage = "All the fields are required";
            break;
        }
       
        //add a new book to DB
        $sql = "INSERT INTO hotele (destinatie,hotel,pret_noapte)
        VALUES ('$destinatie' ,'$hotel','$pret_noapte')";
        $result = mysqli_query($conn, $sql);
        # or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
        #die(mysqli_error($analiz_econom_bucuria));
        #$result=$conn->query($sql);
        if(!$result){
            $errorMessage = "Invalid query:".$conn->error;
            break;
              }
       
              
             
$destinatie="";
$hotel="";
$pret_noapte="";


$successeMessage = "Row added correctly";
header("location:../menu/hotele.php");
exit;

    }while(false);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/eco.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<title>Create a new row registration </title>
</head>
<body style="font-family: 'Garamond', sans-serif; overflow:hidden;background-color:#DFD3C3;background-image:url('../pictures/hotele.jpg')">
<div class="home-btn">
    <a href="../php/admin.php" style="color:#85586F;font-size:2.2vh;text-deoration:none;font-weight:bold;position:relative;left:4vh;top:2vh;">Instrument TIC In Turism Folosind Sistemul de Recomandare</a>
</div>
<div class="home-btn">
    <a href="../menu/hotele.php"style="color:#85586F;font-size:2.2vh;text-deoration:none; font-weight:bold;position:relative;left:6vh;top:3vh;">Hotele</a>
</div>
    <div class="container my-5">
        <h2 style="position:relative;top:-4vh;left:75vh;">Create New Row</h2>>
<?php
if(!empty($errorMessage)){
    echo"
    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>$errorMessage</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
    
    ";
}


?>
        
        <form method="post" style="font-weight:bold;color:#85586F;font-style:italic;font-size:2.5vh;">
            
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Destinatie</label>
<div class="col-sm-6">
    <input type="text" class="form-control" style="background-color:#85586F;color:white;" name="destinatie" value="<?php echo $destinatie; ?>">
</div>
            </div>
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Hotel</label>
<div class="col-sm-6">
    <input type="text" class="form-control" style="background-color:#85586F;color:white;" name="hotel" value="<?php echo $hotel; ?>">
</div>
            </div>
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Pret noapte(lei)</label>
<div class="col-sm-6">
    <input type="text" class="form-control" style="background-color:#85586F;color:white;" name="pret_noapte" value="<?php echo $pret_noapte; ?>">
</div>
            </div>
           
            
            
           
<?php
if(!empty($successeMessage)){
    echo"
    div class='row mb-3'>
    <div class='offset-sm-3 col-sm-6'>
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>$successeMessage</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
    </div>
    </div>
    ";
    
}


?>

<div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button style="background-color:#85586F;color:white;"type="submit" class="btn btn-primary">Submit</button>
</div>
<div class="col-sm-3 d-grid">
    <a style="background-color:#85586F;color:white;" class="btn btn-outline-primary" href="../menu/hotele.php" role="button">Cancel</a>
</div>
            </div>
        </form>
    </div>
</body>
</head>
</html>
