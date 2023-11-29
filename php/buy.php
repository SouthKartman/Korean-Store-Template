<?php
    session_start();
    include("db.php");
    if(isset($_GET['search'])){
        $search = $_GET['search'];
        $_SESSION['search'] = $search;
        echo "<script>
            window.location.replace('../../php/catalogue.php?search=".$search."',);
        </script>";
    }
    if(isset($_GET['submit'])){
        $_SESSION['more'] = 1;
        echo "<script>
            window.location.replace('../../php/catalogue.php?',);
        </script>";
    
    }else{
    $id = $_GET['id'];
    $query = "SELECT * FROM `products` WHERE `id` = '$id'";
    $result = mysqli_query($db, $query);
    foreach($result as $row){
        $name = $row['name'];
        $category = $row['category'];
        $descr = $row['descr'];
        $price = $row['price'];
        $img = $row['img'];
    }
    if(isset($_SESSION['email'])){
        $query = "SELECT * FROM `cart` WHERE `email` = '{$_SESSION['email']}' AND `id` = '$id' AND `status` = 'В корзине'";
        $check = mysqli_query($db, $query);
        if(mysqli_num_rows($check) == 1){
            foreach($result as $row){
                $q = $row['q'];
            }
            $q = $q + 1;
            $query = "UPDATE `cart` SET `q` = '$q' WHERE `email` = '{$_SESSION['email']}' AND `id` = '$id' AND `status` = 'В корзине'";
            $result = mysqli_query($db, $query);
            echo "<script>
                window.location.replace('../../php/cart.php');
            </script>";
        }
        else{
            $query = "INSERT INTO `cart` (`id`, `name`, `category`, `descr`, `price`, `img`, `email`, `q`) VALUES ('$id', '$name', '$category', '$descr', '$price', '$img', '{$_SESSION['email']}', '1')";
            $result = mysqli_query($db, $query);
            echo "<script>
                window.location.replace('../../php/cart.php');
            </script>";
        }
    } else{
        $query = "SELECT * FROM `cart` WHERE `email` = '{$_SESSION['guest']}' AND `id` = '$id' AND `status` = 'В корзине'";
        $check = mysqli_query($db, $query);
        if(mysqli_num_rows($check) == 1){
            foreach($check as $row){
                $q = $row['q'];
            }
            $q = $q + 1;
            $query = "UPDATE `cart` SET `q` = '$q' WHERE `email` = '{$_SESSION['guest']}' AND `id` = '$id' AND `status` = 'В корзине'";
            $result = mysqli_query($db, $query);
            echo "<script>
                window.location.replace('../../php/cart.php');
            </script>";
        }
        else{
            $query = "INSERT INTO `cart` (`id`, `name`, `category`, `descr`, `price`, `img`, `email`, `q`) VALUES ('$id', '$name', '$category', '$descr', '$price', '$img', '{$_SESSION['guest']}', '1')";
                $result = mysqli_query($db, $query);
            echo "<script>
            window.location.replace('../../php/cart.php');
        </script>";
        }
    }
}