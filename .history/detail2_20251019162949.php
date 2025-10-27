<?php
include 'db.php';
$id=$_GET['id'];
$sql="select * from person where id='$id'";
$result=$conn->query($sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="style.css">
  
    
</head>
<body>
    <h2>Detail list of person with <?php echo  $id; ?></h1>
   
    <p><a href="cv.php?id=<?php echo $id ; ?>" class="btn">Generate CV</a></p>

    <p><a href="list.php"> Go back to list page</a></p>
    <?php
    if($result->num_rows>0){


while($row=$result->fetch_assoc()){
  
    echo "ID".$row["id"]."</td>";
    echo "NAME".$row["fullname"]."</td>";
    echo "Email".$row["email"]."</td>";
    echo "PHONE".$row["phone"]."</td>";
    echo "<td>".$row["address"]."</td>";
    echo "<td>".$row["education"]."</td>";
    echo "<td>".$row["experience"]."</td>";
    echo "<td>".$row["skills"]."</td>";
    echo "</tr>";
    
}
echo "</table>";
    }
    else{
        echo "no records found";
    }

?>
</body>
</html>