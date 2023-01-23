<?php

if(isset($_POST['search']))

{
    $valueToSearch = $_POST['valueToSearch'];
   
    $query= "SELECT * FROM destinatii WHERE destinatie ='{$valueToSearch}'";
  
    $search_result = filterTable($query);
}

else{
    $query = "SELECT * FROM destinatii ";
 
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
<a style=" position:relative; top:-5vh;left:180vh;color:#85586F;text-decoration:none; text-shadow: 2px 2px #F8EDE3;font-size:3vh;"href="../php/homePage.php"><i><b>Logout</i></b></a>
</div>

   <form action="../php/user.php" method="post">
    <div class="input" style="position:absolute; left:90vh;right:50vh;">
    <input  style="background-color:#85586F;color:white;"type="text" name="valueToSearch" placeholder="Place"  ><br><br>
    
    <input  style="color:#DFD3C3;background-color:#85586F; cursor:pointer;position:absolute; left:35vh;top:0vh;"type="submit" name="search" value="Search"><br><br>
    </div>
    <table class="new_row" >
        <thead>
        <tr style="position:relative;left:55vh; font-weight:bold;top:10vh;">
            <th style="color:#DFD3C3;background-color:#85586F;">Id</th>
            <th style="position:relative;left:3vh;color:#DFD3C3;background-color:#85586F;">Destinatie</th>
            <th style="position:relative;left:5vh;color:#DFD3C3;background-color:#85586F;">Pret bilet</th>
            <th style="position:relative;left:7vh;color:#DFD3C3;background-color:#85586F;">Pasager</th>
            <th style="position:relative;left:9vh;color:#DFD3C3;background-color:#85586F;">Tip zbor</th>
        </tr>
      
           </thead>
           <tbody>
           <?php
   
         while($row = mysqli_fetch_array($search_result)):?>
             <tr style='position:relative;left:55vh;top:5vh;font-weight:bold;top:13vh;'>
              <td ><?php echo $row['id'];?></td>
               <td style='position:relative;left:3vh;'><?php echo  $row['destinatie'];?></td>
               <td style='position:relative;left:5vh;'><?php echo  $row['pret_bilet'];?></td>
               <td style='position:relative;left:7vh;'><?php  echo $row['pasager'];?></td>
               <td style='position:relative;left:9vh;'><?php echo $row['tip_zbor'];?></td>
            
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

if(isset($_POST['search']))

{
    $valueToSearch = $_POST['valueToSearch'];

    $query= "SELECT * FROM hotele WHERE destinatie ='{$valueToSearch}'";

    $search_result = filterTab($query);
}

else{
    $query = "SELECT * FROM hotele ";
 
    $search_result = filterTab($query);
}
function filterTab($query){
    $connect = mysqli_connect('localhost', 'root', '', 'turism');
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
 <form action="../php/user.php" method="post">
   =
    <table class="new_row" >
        <thead>
        <tr style="position:relative;left:65vh; font-weight:bold;top:15vh;">
            <th style="color:#DFD3C3;background-color:#85586F;">Id</th>
            <th style="position:relative;left:3vh;color:#DFD3C3;background-color:#85586F;">Destinatie</th>
            <th style="position:relative;left:5vh;color:#DFD3C3;background-color:#85586F;">Hotel</th>
            <th style="position:relative;left:7vh;color:#DFD3C3;background-color:#85586F;">Pret noapte(lei)</th>
        </tr>
      
           </thead>
           <tbody>
           <?php
   
         while($row = mysqli_fetch_array($search_result)):?>
             <tr style='position:relative;left:65vh;top:5vh;font-weight:bold;top:17vh;'>
              <td ><?php echo $row['id'];?></td>
               <td style='position:relative;left:3vh;'><?php echo  $row['destinatie'];?></td>
               <td style='position:relative;left:5vh;'><?php echo  $row['hotel'];?></td>
               <td style='position:relative;left:7vh;'><?php  echo $row['pret_noapte'];?></td>
            
            
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
if(isset($_POST['search']))

{
    $valueToSearch = $_POST['valueToSearch'];
   
    $query= "SELECT * FROM muzee WHERE destinatie ='{$valueToSearch}'";
  
 
    $search_result = filterTabe($query);
}

else{
    $query = "SELECT * FROM muzee ";
 
    $search_result = filterTabe($query);
}
function filterTabe($query){
    $connect = mysqli_connect('localhost', 'root', '', 'turism');
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
 
    <table class="new_row" >
        <thead>
        <tr style="position:relative;left:55vh; font-weight:bold;top:21vh;">
            <th style="color:#DFD3C3;background-color:#85586F;">Id</th>
            <th style="position:relative;left:3vh;color:#DFD3C3;background-color:#85586F;">Destinatie</th>
            <th style="position:relative;left:5vh;color:#DFD3C3;background-color:#85586F;">Muzeu</th>
            <th style="position:relative;left:7vh;color:#DFD3C3;background-color:#85586F;">Categorie</th>
            <th style="position:relative;left:7vh;color:#DFD3C3;background-color:#85586F;">Pret intrare (lei)</th>
        </tr>
      
           </thead>
           <tbody>
           <?php
   
         while($row = mysqli_fetch_array($search_result)):?>
             <tr style='position:relative;left:55vh;top:5vh;font-weight:bold;top:23vh;'>
              <td ><?php echo $row['id'];?></td>
               <td style='position:relative;left:3vh;'><?php echo  $row['destinatie'];?></td>
               <td style='position:relative;left:5vh;'><?php echo  $row['nume'];?></td>
               <td style='position:relative;left:7vh;'><?php  echo $row['despre'];?></td>
               <td style='position:relative;left:7vh;'><?php  echo $row['pret'];?></td>
            
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

