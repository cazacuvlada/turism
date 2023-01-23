<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Destinatii</title>

    <link rel="stylesheet" href="../css/turism.css">
</head>
<body style="background-color:#DFD3C3; font-family: 'Garamond', sans-serif; background-image:url(../pictures/muzee.jpg);">

<div  class="head"  >
       <a  style="text-decoration:none;font-size:2vh;position:relative;left:5vh;top:5vh;font-weight:bold;"href="../php/admin.php">Home Page</a>
       <h1 style="text-align:center;color:#85586F;"><b><i>Muzee</i></b></h1>
</div>
<div class="container_2 my-5">
    <a   style="color:#85586F;background-color:#F8EDE3; position:relative; left:142vh;top:4vh;text-decoration:none;font-weight:bold;"  class="btn btn-primary" href="../php/create_muzee.php" role="button">New Row</a>
    <br>
    <table class="new_row" >
        <thead>
        <tr style="position:relative;left:50vh;top:2vh;font-weight:bold;">
            <th>Id</th>
            <th style="position:relative;left:3vh;">Destinatie</th>
            <th style="position:relative;left:5vh;">Muzeu</th>
            <th style="position:relative;left:7vh;">Categorie</th>
            <th style="position:relative;left:8vh;">Pret intrare</th>
           
           
        </tr>
        </thead>
        <tbody>
        <?php

        @include '../php/config.php';
        //check connection to db
        if($conn->connect_error){
            die("Connection failed:".$conn->connect_error);
        }
        //read all row from db table
        $sql = "SELECT * FROM muzee";
        $result =mysqli_query($conn,$sql);
        if(!$result){
            die("Invalid query:".$conn->error);
        }
        //read data of each row
        while($row = $result->fetch_assoc()){
            echo " <tr style='position:relative;left:50vh;top:2vh;font-weight:bold;'>
           <td >$row[id]</td>
            <td style='position:relative;left:3vh;'>$row[destinatie]</td>
            <td style='position:relative;left:5vh;'>$row[nume]</td>
            <td style='position:relative;left:7vh;'>$row[despre]</td>
            <td style='position:relative;left:8vh;'>$row[pret]</td>
            <td style='position:relative;left:10vh;'>
                <a style='color:#85586F;background-color:#F8EDE3;text-decoration:none;font-weight:bold;' class= 'btn btn-primary  btn-sm' href='../php/edit_muzee.php?id=$row[id]'>Edit</a>
                <a  style='color:#85586F;background-color:#F8EDE3; text-decoration:none;font-weight:bold;' class= 'btn btn-danger btn-sm' href='../php/delete_muzee.php?id=$row[id]'>Delete</a>
                </td>
           </tr>";
           }
        ?>

        </tbody>
    </table>


</div>

</body>
</html>

</body>
</html>