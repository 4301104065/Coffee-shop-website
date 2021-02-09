<?php
include("../DataProvider.php");
$id=$_REQUEST['ID'];
$idA=$_GET['id'];
$result = DataProvider::ExecuteQuery("DELETE FROM customer WHERE ID=$id");
?>
<script>
window.location.href="../accounts.php?id=<?php echo $idA;?>";
</script>