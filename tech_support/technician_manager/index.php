<?php

require('../model/database.php');
include('../view/header.php');

global $db;
$sql = "SELECT * FROM technicians ORDER BY firstName";
$technicians = $db->query($sql);


 ?>
 <table>
   <tr>
     <th>Tech ID</th>
     <th>First Name</th>
     <th>Last Name</th>
     <th>Email</th>
     <th>Phone</th>
     <th>Password</th>
     <th>&nbsp;</th>
   </tr>
   <?php foreach ($technicians as $technician): ?>
<tr>
  <td><?php echo $technician['techID'] ?></td>
  <td><?php echo $technician['firstName'] ?></td>
  <td><?php echo $technician['lastName'] ?></td>
  <td><?php echo $technician['email'] ?></td>
  <td><?php echo $technician['phone'] ?></td>
  <td><?php echo $technician['password'] ?></td>
  <td>
    <form action="" method="post">
      <input type="hidden" name="tech_id" value="<?php echo $technician['techID']; ?>">
      <input type="submit" name="submit-value">
    </form>
  </td>
</tr>
   <?php endforeach; ?>
 </table>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <?php
      if (isset($_POST['submit-value'])) {
        $tech_id = $_POST['tech_id'];

        $query = "DELETE FROM technicians WHERE techID = '$tech_id'";
        if ($db->query($query)) {
          header("Location: index.php");
        }else {
          echo "Error";
        }

      }
     ?>
  </body>
</html>
<?php include('../view/footer.php'); ?>
