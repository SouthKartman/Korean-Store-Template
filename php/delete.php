<?php 
    include("db.php");
    $id = $_GET['id'];
    $query = "DELETE FROM `products` WHERE `id` = '$id'";
    $result = mysqli_query($db, $query);
    echo "<script>
            window.location.replace('../../php/catalogue.php?',);
        </script>";
?>