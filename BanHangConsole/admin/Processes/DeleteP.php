<?php
include("../DataProvider.php");
$id=$_REQUEST['ID'];
$idA=$_GET['id'];
$result = DataProvider::ExecuteQuery("DELETE FROM product WHERE ID=$id");
?>
<script >
	window.location.href="../products.php?id=<?php echo $idA; ?>";
</script>