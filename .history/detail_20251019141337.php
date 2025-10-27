
<?php
include 'db.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$sql = "SELECT * FROM person WHERE id='$id'";
$result = $conn->query($sql);
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
    <h2>Detail list of person with <?php echo htmlspecialchars($id); ?></h2>
    <p><a href="list.php"> Go back to list page</a></p>

    <!-- Generate CV button -->
    <p><a href="cv.php?id=<?php echo urlencode($id); ?>" class="btn">Generate CV</a></p>

    <?php
    if($result->num_rows>0){
        echo "<table border='1' cellpadding='10'>";
        echo   "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Education</th>
            <th>Experience</th>
            <th>Skills</th>
        </tr>";

        while($row=$result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".htmlspecialchars($row["id"])."</td>";
            echo "<td>".htmlspecialchars($row["name"])."</td>";
            echo "<td>".htmlspecialchars($row["email"])."</td>";
            echo "<td>".htmlspecialchars($row["phone"])."</td>";
            echo "<td>".htmlspecialchars($row["address"])."</td>";
            echo "<td>".htmlspecialchars($row["education"])."</td>";
            echo "<td>".htmlspecialchars($row["experience"])."</td>";
            echo "<td>".htmlspecialchars($row["skills"])."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "no records found";
    }
    ?>
</body>
</html>