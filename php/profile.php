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
?>
<main class="py-20">
    <script src="https://cdn.tailwindcss.com"></script>
    <div class="grid lg:grid-cols-3 sm:grid-cols-1 m-5 gap-3">
        <div class="grid gap-2 rounded-md">
            <div class="flex flex-auto rounded-md p-3 shadow-lg">
                <div class="flex shrink w-24 h-24 shadow-lg rounded-full">
                    <img src="<?php echo $img;?>" alt="ava" class="flex rounded-full">
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
                <p class="font-bold text-lg text-white">Ваши покупки</p>
            </div>
            <?php $query = "SELECT * FROM `cart` WHERE `email` = '{$_SESSION['email']}' AND `status` = 'Оплачено'";
                $result = mysqli_query($db, $query);
                if(mysqli_num_rows($result) > 0)
                    foreach($result as $row){
                ?>
            <div class="flex rounded-md items-center">
                <div class="flex flex-auto py-3 gap-5 shadow-lg p-5 rounded-md">
                    <div class="flex shrink w-24 h-24 shadow-lg rounded-md">
                        <img src="<?php echo $row['img'] ?>" alt="ava" class="flex rounded-md">
                    </div>
                    <div class="flex flex-auto flex-col">
                        <p class="text-lg"><?php echo $row['name'] ?></p>
                        <p><?php echo $row['category'] ?></p>
                        <p class="text-sm"><?php echo $row['price'] ?> ₽</p>
                    </div>
                    <!-- <div class="flex flex-auto flex-row justify-end pr-3">
                        <i class="fa fa-times"></i>
                    </div> -->
                </div>
            </div>
            <?php } else {?>
            <div class="text-lg text-center">
                Пусто.
            </div>
            <?php } ?>
        </div>
    </div>
</main>
<?php
    include("footer.php");
?>