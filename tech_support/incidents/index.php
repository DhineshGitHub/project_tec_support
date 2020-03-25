<?php

require("../model/database.php");

include('../view/header.php');

global $db;
$sql = "SELECT * FROM incidents ORDER BY title";
$incidents = $db->query($sql);

 ?>

<table>
  <tr>
    <th>incident Id</th>
    <th>Customer Id</th>
    <th>Product Code</th>
    <th>Tech Id</th>
    <th>Date Opened</th>
    <th>Date Closed</th>
    <th>Title</th>
    <th>Description</th>
  </tr>
  <?php foreach ($incidents as $incident): ?>
<tr>
  <td><?php echo $incident['incidentID'] ?></td>
  <td><?php echo $incident['customerID'] ?></td>
  <td><?php echo $incident['productCode'] ?></td>
  <td><?php echo $incident['techID'] ?></td>
  <td><?php echo $incident['dateOpened'] ?></td>
  <td><?php echo $incident['dateClosed'] ?></td>
  <td><?php echo $incident['title'] ?></td>
  <td><?php echo $incident['description'] ?></td>
</tr>
  <?php endforeach; ?>
</table>
<?php include('../view/footer.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>

  </body>
</html>
