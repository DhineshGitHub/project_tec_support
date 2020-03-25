<?php
require('../model/database.php');
//require('../model/product_db.php');

if (isset($_POST['delete_submit'])) {

  require("../model/database.php");

  $product_code = $_POST['product_code'];

  $sql = "DELETE FROM products WHERE productCode='$product_code'";

  if ($db->exec($sql)) {
    header("Location: index.php");
  }else {
    echo "error";
  }
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {?>
	<?php
		global $db;
		$query = 'SELECT * FROM products ORDER BY name';
		$products = $db->query($query);?>

	<?php include('../view/header.php'); ?>
	<table>
		<tr>
			<th>ProductCode</th>
			<th>name</th>
			<th>version</th>
			<th>releaseDate</th>
			<th>&nbsp;</th>
		</tr>
		<?php foreach ($products as $product): ?>
			<tr>
				<td><?php echo $product['productCode']; ?></td>
				<td><?php echo $product['name']; ?></td>
				<td><?php echo $product['version']; ?></td>
				<td><?php echo $product['releaseDate']; ?></td>
				<td>
					<form action=" . " method="post">
						<input type="hidden" name="action" value="delete_product"/>
						<input type="hidden" name="product_code"
						value="<?php echo $product['productCode'];?>"/>
						<input type="submit" name="delete_submit" value="Delete" />
					</form>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
<?php } ?>
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
