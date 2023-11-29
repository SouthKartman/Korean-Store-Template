<?php
    session_start();
    $title = "Профиль";
    include("db.php");
    include("header.php");
    $query = "SELECT `img`, `name` FROM `users` WHERE `email` = '{$_SESSION['email']}'";
    $result = mysqli_query($db, $query);
    foreach($result as $row){
      $img = $row['img'];
      $name = $row['name'];
    }
    if(isset($_GET['del'])){
        $id = $_GET['del'];
        $query = "DELETE FROM `wishlist` WHERE `id` = '$id' AND `email` = '{$_SESSION['email']}'";
        $result = mysqli_query($db, $query);
        unset($_GET['del']);
        echo "<script>window.location('wishlist.php');</script>";
    }
    if(isset($_SESSION['role'])){
?>
<main class="py-20">
    <script src="https://cdn.tailwindcss.com"></script>
    <div class="grid lg:grid-cols-3 sm:grid-cols-1 m-5 gap-3">
        <div class="grid gap-2 rounded-md">
            <div class="flex flex-auto rounded-md p-3 shadow-lg">
                <div class="flex shrink w-24 h-24 shadow-lg rounded-full">
                    <img src="<?php echo $img; ?>" alt="ava" class="flex rounded-full">
                </div>
                <div class="grid pl-5 items-center">
                    <div>
                        <p class="font-bold text-lg text-gray-600"><?php echo $name; ?></p>
                        <p>Пользователь</p>
                    </div>
                </div>
                <div class="flex flex-auto flex-row justify-end pr-3 items-center">
                    <a href="e-profile.php">
                        <i class="fa fa-edit"></i>
                    </a>
                </div>
            </div>

            <div class="flex flex-auto rounded-md p-3">
                <div class="grid gap-5 w-full">
                    <a href="write.php">
                        <div class="flex-auto w-full cursor-pointer hover:mx-3 bg-orange-300 justify-center items-center bg-cover rounded-md min-h-max ease-in-out duration-300" style="background-image: url('https://static.tildacdn.com/tild6230-3230-4933-b966-393166323932/___.png');">
                            <div class="flex bg-black backdrop-opacity-10 backdrop-invert bg-black/50 rounded-md">
                                <input type="submit" name="product" class="text-white drop-shadow-md font-bold p-10 cursor-pointer text-center" value="Написать статью">
                            </div>
                        </div>
                    </a>
                
                <a href="wishlist.php">
                    <div class="flex-auto w-full cursor-pointer hover:mx-3 bg-orange-300 justify-center items-center bg-cover rounded-md min-h-max ease-in-out duration-300 text-center" style="background-image: url('Looking\ for\ candidate.svg');">
                        <div class="flex bg-black backdrop-opacity-10 backdrop-invert bg-black/50 rounded-md">
                            <input type="submit" name="category" class="text-white drop-shadow-md font-bold p-10 cursor-pointer" value="Список желаний">
                        </div>
                    </div>
                </a>

                <a href="profile.php">
                    <div class="flex-auto w-full cursor-pointer hover:mx-3 bg-orange-300 justify-center items-center bg-cover rounded-md min-h-max ease-in-out duration-300 text-center" style="background-image: url('Looking\ for\ candidate.svg');">
                        <div class="flex bg-black backdrop-opacity-10 backdrop-invert bg-black/50 rounded-md">
                            <input type="submit" name="category" class="text-white drop-shadow-md font-bold p-10 cursor-pointer" value="Мои покупки">
                        </div>
                    </div>
                </a>

                </div>
            </div>

        </div>
        
        <div class="flex flex-col row-span-2 gap-2 sm:col-span-1 lg:col-span-2">
            <div class="flex w-full bg-orange-500 rounded-md items-center justify-center py-3">
                <p class="font-bold text-lg text-white">Ваш список желаний</p>
            </div>
            <form action='' method='get'>
            <?php
            $query = "SELECT * FROM `wishlist` WHERE `email` = '{$_SESSION['email']}'";
            $result = mysqli_query($db, $query);
            foreach($result as $row){ ?>
            <div class="flex rounded-md items-center">
                <div class="flex flex-auto py-3 gap-5 shadow-lg p-5 rounded-md">
                    <a href="product.php?id=<?php echo $row['id'];?>">
                        <div class="flex shrink w-24 h-24 rounded-md">
                            <img src="<?php echo $row['img']; ?>" alt="ava" class="flex rounded-md">
                        </div>
                    </a>
                    <div class="flex flex-auto flex-col">
                        <p class="text-lg"><?php echo $row['name']; ?></p>
                        <p><?php echo $row['category'];?></p>
                        <p class="text-sm"><?php echo $row['price']; ?> ₽</p>
                    </div>
                    <a href='?del=<?php echo $row['id']; ?>'>
                      <div class="flex flex-auto flex-row justify-end pr-3">
                          <i class="fa fa-times"></i>
                      </div>
                    </a>
                </div>
            </div>
            <?php } ?>
            </form>
        </div>
    </div>
</main>
<?php
    } else {
        echo "<main style='min-height: 100vh; display: flex; align-items: center; justify-content: center; font-family: Exo 2, sans-serif'>
            <a href='../../index.php'>
            
                <div>
                
                    <i class='flex fa fa-arrow-left text-lg font-bold flex-row gap-2'>
                        <p>Сначала нужно зарегистрироваться</p>
                    </i>
                
                </div>
            
            </a>
        </main>";
    }
?>
<?php
    include("footer.php");
?>