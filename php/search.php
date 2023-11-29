<?php
    session_start();
    include("db.php");
    include("header.php");
    $search = mysqli_real_escape_string($db, $_POST['search']);
    $query = "SELECT * FROM `products` WHERE `name` LIKE '%$search%' OR `category` LIKE '%$search%' OR `descr` LIKE '%$search%' OR `price` = '%$search%'";
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) == 0){
        echo "<div style='min-height: 80vh'>";
        echo "<h1 style='padding-top: 150px'>По Вашему запросу '" . $search . "' ничего не найдено!";
    }
    else{
        echo "<h1 style='padding-top: 150px'>По Вашему запросу '" . $search . "' найдено:</h1>";
        foreach($result as $row){
        ?>
        
        <div style="background: red; color: white; min-height: 50vh">
        <?php
            echo "<div style='display: flex; flex-direction: row; align-items: center; flex-wrap: wrap;'>";
            echo "<img style='max-width: 50px' src=" . $row['img'] . ">";
            echo $row['name'];
            echo $row['category'];
            echo $row['descr'];
            echo $row['price'];
            echo "</div><br>";
        }
        ?>
        </div>
        <?php } ?>
        </div>

<?php
    include("footer.php");
?>