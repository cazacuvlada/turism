<?php
$id = "";
$destinatie="";
$pret_bilet="";
$pasager="";
$tip_zbor="";


$errorMessage="";
$successeMessage ="";

@include "../php/config.php";
$conn = mysqli_connect('localhost','root','','turism');


$destinatie="";
$pret_bilet="";
$pasager="";
$tip_zbor="";





if($_SERVER['REQUEST_METHOD']=='GET'){
if(!isset($_GET["id"])){
    header("location:../menu/destinatii.php");
    exit;
}

$id = $_GET["id"];
//Get method : show the data of the client
//read the row of the selected client from db
$sql = "SELECT * FROM `destinatii` WHERE id=$id";
$result =mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
if(!$row){
    header("location:../menu/destinatii.php");
    exit;
}
   
    
   
}
else{
//post method: update the data of the client
$id = $_POST["id"];
$destinatie=$_POST["destinatie"];
$pret_bilet=$_POST["pret_bilet"];
$pasager=$_POST["pasager"];
$tip_zbor=$_POST["tip_zbor"];

 
    do{
        if(empty($destinatie)||empty ($pret_bilet) ||empty ($pasager)||empty($tip_zbor)){
            $errorMessage = "All the fields are required";
            break;
        }
        $sql="UPDATE  destinatii ".
        "SET destinatie= '$destinatie' , pret_bilet = '$pret_bilet', pasager = '$pasager' ,tip_zbor='$tip_zbor'".
        "WHERE id = '$id'";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            $errorMessage="Invalid query:".$conn->error;
            break;
        }

        $successeMessage="Row update correctly";
        header("location:../menu/destinatii.php");
        exit;
 }while(true);

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
<title>Edit  a  row  </title>
</head>
<body style="font-family: 'Garamond', sans-serif; overflow:hidden;background-color:#DFD3C3;background-image:url('../pictures/destinatii.jpg')">
<div class="home-btn">
    <a href="../php/admin.php" style="color:#85586F;font-size:2.2vh;text-deoration:none;font-weight:bold;position:relative;left:4vh;top:2vh;">Instrument TIC In Turism Folosind Sistemul de Recomandare</a>
</div>
<div class="home-btn">
    <a href="../menu/destinatii.php"style="color:#85586F;font-size:2.2vh;text-deoration:none; font-weight:bold;position:relative;left:6vh;top:3vh;">Destinatii</a>
</div>
    <div class="container my-5">
        <h2 style="position:relative;top:-4vh;left:75vh;">Edit the Row</h2>
        
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
            <input type="hidden"  name="id" value="<?php echo $id?>">
       <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Destinatie</label>
<div class="col-sm-6">
<input type="text" class="form-control" style="background-color:#85586F;color:white;"name="destinatie" value="<?php echo $destinatie; ?>">
</div>
       </div>
       <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Pret bilet(lei)</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="pret_bilet"  style="background-color:#85586F;color:white;"value="<?php echo $pret_bilet; ?>">
</div>
       </div>
       <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Pasager</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="pasager"  style="background-color:#85586F;color:white;"value="<?php echo $pasager; ?>">
</div>
       </div>
       <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Tip zbor</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="tip_zbor"  style="background-color:#85586F;color:white;" value="<?php echo $tip_zbor; ?>">
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
    <a style="background-color:#85586F;color:white;" class="btn btn-outline-primary" href="../menu/destinatii.php" role="button">Cancel</a>
</div>
            </div>
        </form>
    </div>
</body>
</head>
</html>