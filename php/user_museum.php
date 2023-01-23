<?php

if(isset($_POST['search']))

{
    $priceToSearch = $_POST['priceToSearch'];
   
    $query= "SELECT * FROM muzee_price WHERE price <='{$priceToSearch}'";
  
    $search_result = filterTable($query);
}

else{
    $query = "SELECT * FROM muzee_price ";
 
    $search_result = filterTable($query);
}
function filterTable($query){
    $connect = mysqli_connect('localhost', 'root', '', 'turism');
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User_Destinatii</title>

    <link rel="stylesheet" href="../css/turism.css">
</head>
<body style="background-image:url(../pictures/admin.jpg); font-family: 'Garamond', sans-serif; ">

<div  class="container"  >
    <h4 style="color:#85586F;font-size:2vh;">Instrument TIC In Turism Folosind Sistemul de Recomandare</h4>
    



<div class="admin_logout">
<a style=" position:relative; top:-5vh;left:180vh;color:#85586F;text-decoration:none; text-shadow: 2px 2px #F8EDE3;font-size:3vh;"href="../php/user.php"><i><b>HomePage</i></b></a>
</div>

   <form action="../php/user_museum.php" method="post">
    <div class="input" style="position:absolute; left:90vh;right:50vh;">
    <input  style="background-color:#85586F;color:white;"type="text" name="priceToSearch" placeholder="Persons"  ><br><br>
    
    <input  style="color:#DFD3C3;background-color:#85586F; cursor:pointer;position:absolute; left:35vh;top:0vh;"type="submit" name="search" value="Count"><br><br>
    </div>
    <table class="new_row" >
        <thead>
        <tr style="position:relative;left:75vh; font-weight:bold;top:10vh;">
            <th style="color:#DFD3C3;background-color:#85586F;">Id</th>
            <th style="position:relative;left:3vh;color:#DFD3C3;background-color:#85586F;">Muzeu</th>
            <th style="position:relative;left:5vh;color:#DFD3C3;background-color:#85586F;">Price</th>

            
        </tr>
      
           </thead>
           <tbody>
           <?php
   
         while($row = mysqli_fetch_array($search_result)):?>
             <tr style='position:relative;left:75vh;top:5vh;font-weight:bold;top:13vh;'>
              <td ><?php echo $row['id'];?></td>
               <td style='position:relative;left:3vh;'><?php echo  $row['muzeu'];?></td>
               <td style='position:relative;left:5vh;'><?php echo  $row['price'];?></td>
               
              
            
              </tr>
           
              
              <?php
            endwhile;
            ?>
        
           </tbody>
       </table>
   </div>
</form>
</body>
</html>
<?php

