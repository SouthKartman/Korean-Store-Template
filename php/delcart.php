<?php
    session_start();
    include("db.php");
    $id = $_GET['del'];
    if(isset($_SESSION['email'])){
        if(isset($_GET['minus'])){
            $minus = $_GET['minus'];
            $query = "SELECT * FROM `cart` WHERE `id` = '$minus' AND `email` = '{$_SESSION['email']}'";
            $result = mysqli_query($db, $query);
            foreach($result as $row){
                foreach($result as $row){
                    $name = $row['name'];
                    $category = $row['category'];
                    $descr = $row['descr'];
                    $price = $row['price'];
                    $quantity = $row['q'];
                }
            }
            $quantity = $quantity - 1;
            if(!empty($quantity)){
                $query = "UPDATE `cart` SET `name` = '$name', `category` = '$category', `descr` = '$descr', `price` = '$price', `email` = '{$_SESSION['email']}', `q` = '$quantity' WHERE `id` = '$minus' AND `email` = '{$_SESSION['email']}'";
                $result = mysqli_query($db, $query);
                echo "<meta http-equiv='refresh' content='0'>";
                header("location: ../../php/cart.php");
            }
            else{
                $query = "DELETE FROM `cart` WHERE `id` = '$minus' AND `email` = '{$_SESSION['email']}'";
                $result = mysqli_query($db, $query);
                echo "<script>
                    window.location.replace('../../php/cart.php');
                    if(window.name !== 'refreshed') {
                    window.location.replace('../../php/cart.php');    
                    window.name = 'refreshed';
                    window.location.refresh();
                    }</script>";
            }
        }
        if(isset($_GET['plus'])){
            $plus = $_GET['plus'];
            $query = "SELECT * FROM `cart` WHERE `id` = '$plus' AND `email` = '{$_SESSION['email']}'";
            $result = mysqli_query($db, $query);
            foreach($result as $row){
                $name = $row['name'];
                $category = $row['category'];
                $descr = $row['descr'];
                $price = $row['price'];
                $quantity = $row['q'];
            }
            $quantity = $quantity +1;
            $query = "UPDATE `cart` SET `name` = '$name', `category` = '$category', `descr` = '$descr', `price` = '$price', `email` = '{$_SESSION['email']}', `q` = '$quantity' WHERE `id` = '$plus' AND `email` = '{$_SESSION['email']}'";
            $result = mysqli_query($db, $query);
            echo "<script>
                    window.location.replace('../../php/cart.php');
                    if(window.name !== 'refreshed') {
                    window.location.replace('../../php/cart.php');  
                    window.name = 'refreshed';
                    window.location.refresh();
                    }</script>";
        }
        if(isset($_GET['del'])){
        $query = "DELETE FROM `cart` WHERE `id` = '$id' AND `email` = '{$_SESSION['email']}'";
        $result = mysqli_query($db, $query);
        echo "<script>
                    window.location.replace('../../php/cart.php');
                    if(window.name !== 'refreshed') {
                    window.location.replace('../../php/cart.php');  
                    window.name = 'refreshed';
                    window.location.refresh();
                    }</script>";
        }
    } else {
        if(isset($_GET['minus'])){
            $minus = $_GET['minus'];
            $query = "SELECT * FROM `cart` WHERE `id` = '$minus' AND `email` = '{$_SESSION['guest']}'";
            $result = mysqli_query($db, $query);
            foreach($result as $row){
                $name = $row['name'];
                $category = $row['category'];
                $descr = $row['descr'];
                $price = $row['price'];
                $quantity = $row['q'];
            }
            $quantity = $quantity - 1;
            if(!empty($quantity)){
                $query = "UPDATE `cart` SET `name` = '$name', `category` = '$category', `descr` = '$descr', `price` = '$price', `email` = '{$_SESSION['guest']}', `q` = '$quantity' WHERE `id` = '$minus' AND `email` = '{$_SESSION['guest']}'";
                $result = mysqli_query($db, $query);
                echo "<script>
                    window.location.replace('../../php/cart.php');
                    if(window.name !== 'refreshed') {
                    window.location.replace('../../php/cart.php');  
                    window.name = 'refreshed';
                    window.location.refresh();
                    }</script>";
            }
            else{
                $query = "DELETE FROM `cart` WHERE `id` = '$minus' AND `email` = '{$_SESSION['guest']}' ";
                $result = mysqli_query($db, $query);
                echo "<script>
                    window.location.replace('../../php/cart.php');
                    if(window.name !== 'refreshed') {
                    window.location.replace('../../php/cart.php');  
                    window.name = 'refreshed';
                    window.location.refresh();
                    }</script>";
            }
        }
        if(isset($_GET['plus'])){
            $plus = $_GET['plus'];
            $query = "SELECT * FROM `cart` WHERE `id` = '$plus' AND `email` = '{$_SESSION['guest']}'";
            $result = mysqli_query($db, $query);
            foreach($result as $row){
                $name = $row['name'];
                $category = $row['category'];
                $descr = $row['descr'];
                $price = $row['price'];
                $quantity = $row['q'];
            }
            $quantity = $quantity + 1;
            $query = "UPDATE `cart` SET `name` = '$name', `category` = '$category', `descr` = '$descr', `price` = '$price', `email` = '{$_SESSION['guest']}', `q` = '$quantity' WHERE `id` = '$plus' AND `email` = '{$_SESSION['guest']}'";
            $result = mysqli_query($db, $query);
            echo "<script>
                    window.location.replace('../../php/cart.php');
                    if(window.name !== 'refreshed') {
                    window.location.replace('../../php/cart.php');  
                    window.name = 'refreshed';
                    window.location.refresh();
                    }</script>";
        }
        if(isset($_GET['del'])){
        $query = "DELETE FROM `cart` WHERE `id` = '$id' AND `email` = '{$_SESSION['guest']}'";
        $result = mysqli_query($db, $query);
        echo "<script>
                    window.location.replace('../../php/cart.php');
                    if(window.name !== 'refreshed') {
                    window.location.replace('../../php/cart.php');  
                    window.name = 'refreshed';
                    window.location.refresh();
                    }</script>";
        }
    }
?>