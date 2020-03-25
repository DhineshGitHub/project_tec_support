<?php

require('../model/database.php');
include('../view/header.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {?>

<?php

global $db;
$sql = "SELECT * FROM customers ORDER BY firstName";
$customers = $db->query($sql);
 ?>

<table>
  <tr>
    <th>Customer Id</th>
    <th>first Name</th>
    <th>Last Name</th>
    <th>Address</th>
    <th>City</th>
    <th>State</th>
    <th>Postal Code</th>
    <th>Country Code</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Password</th>
    <th>&nbsp;</th>
  </tr>
<?php foreach ($customers as $customer): ?>
<tr>
  <td><?php echo $customer['customerID'] ?></td>
  <td><?php echo $customer['firstName']; ?></td>
  <td><?php echo $customer['lastName']; ?></td>
  <td><?php echo $customer['address']; ?></td>
  <td><?php echo $customer['city']; ?></td>
  <td><?php echo $customer['state']; ?></td>
  <td><?php echo $customer['postalCode']; ?></td>
  <td><?php echo $customer['countryCode']; ?></td>
  <td><?php echo $customer['phone']; ?></td>
  <td><?php echo $customer['email']; ?></td>
  <td><?php echo $customer['password']; ?></td>
  <td>
    <form action="" method="post">
      <input type="hidden" name="action" value="delete_customers">
      <input type="hidden" name="customerid" value="<?php echo $customer['customerID']; ?>">
      <input type="submit" name="value-submit" value="Delete">
    </form>
  </td>
</tr>
<?php endforeach; ?>
</table>

<?php } ?>

<?php include("../view/footer.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    body {
        margin-top: 0;
        background-color: #BFCFFE;
        font-family: Arial, Helvetica, sans-serif;
    }
    h1 {
        font-size: 150%;
        margin: 0;
        padding: .5em 0 .25em;
    }
    h2 {
        font-size: 120%;
        margin: 0;
        padding: .25em 0 .25em ;
    }
    h1, h2 {
        color: black;
    }
    p {
        margin: .5em 0 .5em 0;
        padding: 0;
    }

    ul {
        margin: 0;
        padding: 0;
    }
    li {
        margin: 0;
        padding: 0;
    }

    ul.nav {
        list-style-type: none;
        margin-left: 0;
        padding-left: 0;
    }

    ul.nav li {
        padding-bottom: 0.5em;
    }

    a {
        color: #3333CC;
        font-weight: bold;

    }
    a:hover {
        color: #3333CC;
    }

    table {
        border: 1px solid #001963;
        border-collapse: collapse;
    }
    td, th {
        border: 1px dashed #001963;
        padding: .2em .5em .2em .5em;
        vertical-align: top;
        text-align: left;
    }
    #no_border {
        border: 0px;
    }
    #no_border td {
        border: 0px;
    }

    form {
        margin: 0;
    }
    br {
        clear: left;
    }
    textarea {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 80%;
    }

    /* the styles for the div tags that divide the page into sections */
    #page {
        width: 100%;
        margin: 0 auto;
        background-color: white;
        border: 1px solid #001963;
    }
    #header {
        margin: 0;
        border-bottom: 2px solid black;
        padding: .5em 2em;
    }
    #header h1 {
        color: black;
        margin: 0;
        padding: 0;
    }
    #header p {
        margin: 0;
        padding: .25em 0 0 0;
    }
    #header ul {
        margin: 0;
        padding: 1em 0 0 0;
    }
    #main {
        margin: 0;
        padding: .5em 2em .25em;
    }

    #content {
        padding-bottom: .25em;
    }
    #footer {
        clear: both;
        margin-top: 1em;
        padding-right: 1em;
        border-top: 2px solid black;
    }
    #footer p {
        text-align: right;
        font-size: 80%;
        margin: 1em 0;
        color: blue;
    }

    .right {
        text-align: right;
    }
    .error {
        color: red;
    }


    /********************************************************************
    * Additional styles for aligned forms
    ********************************************************************/
    #aligned {
        margin: .5em 0 2em;
    }
    #aligned label {
        width: 8em;
        padding-right: 1em;
        padding-bottom: .5em;
        float: left;
    }
    #aligned input {
        float: left;
    }
    #aligned input[text] {
        width: 15em;
    }
    </style>

  </head>
  <body>
<?php

if (isset($_POST['value-submit'])) {
  $customer_id = $_POST['customerid'];

  $query = "DELETE FROM customers WHERE customerID ='$customer_id'";
  if ($db->query($query)) {
    header("Location: index.php");
  }else {
    echo "Error";
  }
}

 ?>
  </body>
</html>
