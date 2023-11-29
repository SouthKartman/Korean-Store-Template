<?php
    session_start();
    $title = "Товар";
    include("db.php");
    include("header.php");
    if(isset($_GET['wish'])){
        if(!empty($_SESSION['email'])){
        $id = $_GET['wish'];
        $query = "SELECT * FROM `products` WHERE `id` = '$id'";
        $result = mysqli_query($db, $query);
        foreach($result as $row){
            $name = $row['name'];
            $category = $row['category'];
            $price = $row['price'];
            $img = $row['img'];
        }
        $query = "INSERT INTO `wishlist` (`id`,`name`, `category`, `price`, `img`, `email`) VALUES ('$id','$name', '$category', '$price', '$img', '{$_SESSION['email']}')";
        $result = mysqli_query($db, $query);
        echo "<script>window.location.replace('https://whereideasbegin.online/php/wishlist.php');</script>";
        } else {
            echo "<script>window.location.replace('https://whereideasbegin.online/php/wishlist.php');</script>";
        }
    }
?>
<body>
    <link rel="stylesheet" href="../../css/product.css">
      <?php
        if(!empty($_GET)){
        $id = $_GET['id']; 
        $query = "SELECT * FROM `products` WHERE `id` = '$id'";
        $result = mysqli_query($db, $query);
        foreach($result as $row){
      ?>
      <main class="p-10">
        <div class="grid pt-20">
        <form action="../../php/buy.php" method="GET">
          <div class="grid product p-5 sm:grid-cols-1 lg:grid-cols-2">
            <div class="grid justify-center">
              <div class="product-gallery">
                <div class="product">
                  <img class="object-scale-down h-80 w-80" src="<?php echo $row['img']; ?>">
                </div>
              </div>
            </div>
            <div class="column-xs-12 column-md-5">
              <h1><?php echo $row['name']; ?></h1>
              <div id="change" class="description line-clamp-3">
                <p class="text-justify"><?php echo nl2br($row['descr']); ?></p>
              </div>
              <div class="flex flex-col">
                <a id="show" class="cursor-pointer text-orange-500" onClick="show()">Показать...</a>
              </div>
              <br>
                <h2><?php echo $row['price']; ?> ₽</h2>
                <br>
                <a class="add-to-cart" href="../../php/buy.php?id=<?php echo $row['id']; ?>">В корзину</a>
            </div>
          </div>
          <?php }} ?>
          <div class="grid related-products">
            <div class="column-xs-12">
              <h3>Вам также могут понравится:</h3>
            </div>
            <div class="grid sm:grid-cols-1 lg:grid-cols-3 items-center justify-center gap-5">
            <?php $query = "SELECT * FROM `products`";
            $result = mysqli_query($db, $query);
            $max = mysqli_num_rows($result);
            $rand = rand(1, $max);
            $query = "SELECT * FROM `products` WHERE `id` = '$rand'";
            $result = mysqli_query($db, $query);
            foreach($result as $row){?>
            <a href="product.php?id=<?php echo $row['id']; ?>">
            <div class="column-xs-12 column-md-4 p-5 p-5">
            <div class="flex justify-center">
              <img class="object-scale-down h-48 w-48" src="<?php echo $row['img']; ?>">
            </div>
              <h4 class='line-clamp-1'><?php echo $row['name']; ?></h4>
              <p class="price"><?php echo $row['price']; ?> ₽</p>
            </div>
            </a>
            <?php }
            $rand = rand(1, $max);
            $query = "SELECT * FROM `products` WHERE `id` = '$rand'";
            $result = mysqli_query($db, $query);
            foreach($result as $row){?>
            <a href="product.php?id=<?php echo $row['id']; ?>">
            <div class="column-xs-12 column-md-4 p-5 p-5">
            <div class="flex justify-center">
              <img class="object-scale-down h-48 w-48" src="<?php echo $row['img']; ?>">
            </div>
              <h4 class='line-clamp-1'><?php echo $row['name']; ?></h4>
              <p class="price"><?php echo $row['price']; ?> ₽</p>
            </div>
            </a>
            <?php }
            $rand = rand(1, $max);
            $query = "SELECT * FROM `products` WHERE `id` = '$rand'";
            $result = mysqli_query($db, $query);
            foreach($result as $row){?>
            <a href="product.php?id=<?php echo $row['id']; ?>">
            <div class="column-xs-12 column-md-4 p-5">
            <div class="flex justify-center">
              <img class="object-scale-down h-48 w-48" src="<?php echo $row['img']; ?>">
            </div>
              <h4 class='line-clamp-1'><?php echo $row['name']; ?></h4>
              <p class="price"><?php echo $row['price']; ?> ₽</p>
            </div>
            </a>
            <?php } ?>
            </div>
          </div>
          </form>
        </div>
      </main>
      <script>
          var buba = document.getElementById("show");
          function show(){
              if(buba.id == 'show'){
                  document.getElementById("change").classList.remove("line-clamp-3");
                  document.getElementById("show").textContent = 'Скрыть';
                  document.getElementById("show").id = "hide";
              }
              else {
                  document.getElementById("change").classList.add("line-clamp-3");
                  document.getElementById("hide").textContent = 'Показать...';
                  document.getElementById("hide").id = "show";
              }
          }
      </script>
      <script src="../../js/product.js"></script>
</body>
<?php include("footer.php"); ?>