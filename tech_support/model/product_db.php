 <?php 
function get_products() {
	global $db;
	$query = 'select * from products order by name';
	$products = $db->query($query);
	return $products;
}
