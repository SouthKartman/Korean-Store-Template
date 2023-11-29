<?php
    session_start();
    $title = "Корзина";
    include("db.php");
    include("header.php");
    if(isset($_GET['pay'])){
        $query = "UPDATE `cart` SET `status` = 'Оплачено'  WHERE `email` = '{$_SESSION['email']}' OR `email` = '{$_SESSION['guest']}'";
        $result = mysqli_query($db, $query);
        echo "<script>
                window.location.replace('https://pkp.ai/ZGY528768');
            </script>";
    }
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
                echo "<script>
            window.location.replace('../../php/cart.php?',);
        </script>";
                
            }
            else{
                $query = "DELETE FROM `cart` WHERE `id` = '$minus' AND `email` = '{$_SESSION['email']}'";
                $result = mysqli_query($db, $query);
                echo "<script>
            window.location.replace('../../php/cart.php?',);
        </script>";
                
            }
            echo "<script>
            window.location.replace('../../php/cart.php?',);
        </script>";
            unset($_GET['minus']);
            unset($_GET['plus']);
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
            window.location.replace('../../php/cart.php?',);
        </script>";
            unset($_GET['plus']);
            unset($_GET['minus']);
        }
        if(isset($_GET['del'])){
        $query = "DELETE FROM `cart` WHERE `id` = '$id' AND `email` = '{$_SESSION['email']}'";
        $result = mysqli_query($db, $query);
        echo "<script>
            window.location.replace('../../php/cart.php?',);
        </script>";
                
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
            window.location.replace('../../php/cart.php?',);
        </script>";
            }
            else{
                $query = "DELETE FROM `cart` WHERE `id` = '$minus' AND `email` = '{$_SESSION['guest']}' ";
                $result = mysqli_query($db, $query);
                echo "<script>
            window.location.replace('../../php/cart.php?',);
        </script>";
                
            }
            unset($_GET['minus']);
            unset($_GET['plus']);
            echo "<script>
            window.location.replace('../../php/cart.php?',);
        </script>";
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
            
            unset($_GET['plus']); 
            unset($_GET['minus']);
            echo "<script>
            window.location.replace('../../php/cart.php?',);
        </script>";
        }
        if(isset($_GET['del'])){
        $query = "DELETE FROM `cart` WHERE `id` = '$id' AND `email` = '{$_SESSION['guest']}'";
        $result = mysqli_query($db, $query);
        echo "<script>
            window.location.replace('../../php/cart.php?',);
        </script>";
        
                
        }
    }
unset($_GET['minus']);
unset($_GET['plus']);
unset($_GET['del']);

?>
  <style>
    #summary {
      background-color: #f6f6f6;
    }
  </style>
<body class="bg-gray-100">
  <div class="container mx-auto mt-100">
    <div class="grid shadow-md my-20">
      <div class="w-100 bg-white px-10 py-10">
        <div class="flex justify-between border-b pb-8">
          <h1 class="font-semibold text-2xl">Корзина</h1>
          <h2 class="font-semibold text-2xl">Выбрано товаров: <?php echo mysqli_num_rows($cart) ?></h2>
        </div>
        <div class="flex mt-10 mb-5">
          <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Описание продукта</h3>
          <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/4 text-center">Кол-во</h3>
          <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/4 text-center">Цена</h3>
        </div>
        <form action = "" method = "get">
        <?php
            $query = "SELECT * FROM `cart` WHERE `email` = '{$_SESSION['email']}' AND `status` = 'В корзине'";
            $result = mysqli_query($db, $query);
            if(mysqli_num_rows($result) == 0){
                $query = "SELECT * FROM `cart` WHERE `email` = '{$_SESSION['guest']}' AND `status` = 'В корзине'";
                $result = mysqli_query($db, $query);
                foreach($result as $row){
        ?>
          <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
          <div class="flex w-2/5"> <!-- product -->
            <div class="w-100">
              <img class="object-scale-down h-28 w-28" src="<?php echo $row['img']; ?>" alt="">
            </div>
            <div class="flex flex-col justify-between ml-4 flex-grow">
              <span class="font-bold text-sm"><?php echo $row['name']; ?></span>
              <span class="text-red-500 text-xs"><?php echo $row['category']; ?></span>
              <a href="?del=<?php echo $row['id']; ?>" class="font-semibold hover:text-red-500 text-gray-500 text-xs">Удалить</a>
            </div>
          </div>
          <div class="flex justify-center w-1/4">
            <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512">
                <a id="minus" href="?minus=<?php echo $row['id']; ?>">
                <path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                </a>
            </svg>

            <input class="mx-2 border text-center w-8" type="text" id="cart" value="<?php echo $row['q']; ?>">
           
            <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512">
              <a id="plus" href="?plus=<?php echo $row['id']; ?>">
              <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
              </a>
            </svg>

          </div>
          <span class="text-center w-1/4 font-semibold text-sm"><?php echo $row['price']; ?> Руб.</span>
        </div>
        <?php
            if($row['q'] > 1){
                for($i = 1; $i <= $row['q']; $i++){
                    $total = $total + $row['price'];
                }
            }
            else{
                $total = $total + $row['price'];
            }
          }
        ?>
        <?php }  else {
            foreach($result as $row){?>
          <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
          <div class="flex w-2/5"> <!-- product -->
            <div class="w-100">
              <img class="object-scale-down h-28 w-28" src="<?php echo $row['img']; ?>" alt="">
            </div>
            <div class="flex flex-col justify-between ml-4 flex-grow">
              <span class="font-bold text-sm"><?php echo $row['name']; ?></span>
              <span class="text-red-500 text-xs"><?php echo $row['category']; ?></span>
              <a href="?del=<?php echo $row['id']; ?>" class="font-semibold hover:text-red-500 text-gray-500 text-xs">Удалить</a>
            </div>
          </div>
          <div class="flex justify-center w-1/4">
            <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512">
                <a id="minus" href="?minus=<?php echo $row['id']; ?>">
                <path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                </a>
            </svg>

            <input class="mx-2 border text-center w-8" type="text" id="cart" value="<?php echo $row['q']; ?>">
           
            <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512">
              <a id="plus" href="?plus=<?php echo $row['id']; ?>">
              <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
              </a>
            </svg>

          </div>
          <span class="text-center w-1/4 font-semibold text-sm"><?php echo $row['price']; ?> Руб.</span>
        </div>
        <?php
            if($row['q'] > 1){
                for($i = 1; $i <= $row['q']; $i++){
                    $total = $total + $row['price'];
                }
            }
            else{
                $total = $total + $row['price'];
            }
          }
        ?>
        <?php }?>


        <a href="../../index.php" class="flex font-semibold  text-sm mt-10 text-orange-500">
      
          <svg class="fill-current mr-2 text-orange-500 w-4 " viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
          Продолжить покупки
        </a>
      </div>

      <div id="summary" class="w-100 px-8 py-10">
        <h1 class="font-semibold text-2xl border-b pb-8">Заказы</h1>
        <div class="flex justify-between mt-10 mb-5">
          <span class="font-semibold text-lg uppercase">Итого:</span>
          <span class="font-semibold text-sm"><?php echo $total; ?> Руб.</span>
        </div>
        <div>
          <label class="font-medium inline-flex mb-3 text-sm uppercase">Способ оплаты:</label>
          <select class="flex p-2 text-gray-600 w-full text-sm">
            <option>Карта</option>
            <option>Наличные</option>
          </select>
          <label class="font-medium inline-flex my-3 text-sm uppercase">Способ доставки:</label>
          <select class="flex p-2 text-gray-600 w-full text-sm">
            <option>Самовывоз</option>
            <option>Курьером</option>
          </select>
        </div>
<!--         <div class="py-10">
          <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">Promo Code</label>
          <input type="text" id="promo" placeholder="Enter your code" class="p-2 text-sm w-full">
        </div> -->
        <div class="border-t mt-8">
          <div class="flex font-semibold justify-between py-6 text-sm uppercase">
<!--             <span>Total cost</span>
            <span>$600</span> -->
          </div>
          <a href="">
            <button name="pay" class="bg-orange-500 rounded-md font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">Купить</button>
          </a>
        </div>
      </div>
    </form>
    </div>
  </div>
<script>
$(document).ready(function() {
        $("#plus").click(function() {
        location.reload();
  });
    $(document).ready(function() {
        $("#minus").click(function() {
        location.reload();
  });
});
</script>
</body>
<?php
    include("footer.php");
?>