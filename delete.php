<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/options/connection_database.php');
$id=$_GET["id"];
mysqli_query($dbh, 'delete from `tbl_products` where id=$id');
?>
<script>
    window.location="add_product.php";
</script>
