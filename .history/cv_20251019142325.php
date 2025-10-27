
<?php
include 'db.php';
if(isset($_POST['id'])){
    $id = $_POST['id'];
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
else{
    echo "No ID provided.";
}

$sql="select * from person where id= $id";
$result= $conn->query($sql);
$result->fetch_assoc();
$stmt = $conn->prepare("SELECT * FROM person WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>CV - <?php echo $row ? htmlspecialchars($row['name']) : 'Not found'; ?></title>
  <style>
    /* simple CV styling */
    body { font-family: Arial, Helvetica, sans-serif; color:#222; padding:20px; background:#f4f4f4; }
    .cv { max-width:800px; margin:0 auto; background:#fff; padding:28px; box-shadow:0 2px 6px rgba(0,0,0,.1); }
    .header { display:flex; justify-content:space-between; align-items:center; border-bottom:2px solid #eee; padding-bottom:12px; margin-bottom:16px; }
    .name { font-size:28px; font-weight:700; }
    .contact { text-align:right; font-size:14px; color:#666; }
    .content { display:flex; gap:24px; }
    .left { width:35%; }
    .right { width:65%; }
    .section { margin-bottom:14px; }
    .section h3 { margin:0 0 8px 0; font-size:16px; color:#333; border-left:3px solid #2b6cb0; padding-left:8px; }
    .profile { font-size:14px; color:#333; line-height:1.5; }
    .item { margin-bottom:10px; }
    .skills span { display:inline-block; background:#eef6ff; color:#0b63a5; padding:6px 8px; margin:4px 6px 0 0; border-radius:4px; font-size:13px; }
    .edu, .exp { font-size:14px; color:#333; }
    .back-link { display:inline-block; margin-top:12px; color:#2b6cb0; text-decoration:none; }
    @media print { .back-link, .btn { display:none; } body{background:#fff;} }
  </style>
</head>
<body>
  <div class="cv">
    <?php if(!$row): ?>
      <p>Person not found. <a href="list.php" class="back-link">Back to list</a></p>
    <?php else: ?>
      <div class="header">
        <div class="name"><?php echo htmlspecialchars($row['name']); ?></div>
        <div class="contact">
          <div><?php echo htmlspecialchars($row['email']); ?></div>
          <div><?php echo htmlspecialchars($row['phone']); ?></div>
          <div><?php echo htmlspecialchars($row['address']); ?></div>
        </div>
      </div>

      <div class="content">
        <div class="left">
          <div class="section profile">
            <h3>Profile</h3>
            <div><?php echo nl2br(htmlspecialchars($row['summary'] ?? $row['education'] ?? '')); ?></div>
          </div>

          <div class="section skills">
            <h3>Skills</h3>
            <?php
              $skills = array_filter(array_map('trim', explode(',', $row['skills'] ?? '')));
              foreach($skills as $s){
                echo '<span>'.htmlspecialchars($s).'</span>';
              }
            ?>
          </div>

          <div class="section">
            <h3>Education</h3>
            <div class="edu"><?php echo nl2br(htmlspecialchars($row['education'])); ?></div>
          </div>
        </div>

        <div class="right">
          <div class="section">
            <h3>Experience</h3>
            <div class="exp"><?php echo nl2br(htmlspecialchars($row['experience'])); ?></div>
          </div>
        </div>
      </div>

      <a href="list.php" class="back-link">← Back to list</a>
      <button onclick="window.print()" class="btn" style="float:right;padding:8px 12px;margin-top:8px;">Print / Save PDF</button>
    <?php endif; ?>
  </div>
</body>
</html>