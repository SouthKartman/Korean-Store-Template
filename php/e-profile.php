<?php
    session_start();
    $title = "Профиль";
    include("db.php");
    include("header.php");
    $query = "SELECT `img`, `name` FROM `users` WHERE `email` = '{$_SESSION['email']}'";
    $result = mysqli_query($db, $query);
    foreach($result as $row){
      $ava = $row['img'];
      $name = $row['name'];
    }
    if(isset($_GET['del'])){
        $id = $_GET['del'];
        $query = "DELETE FROM `wishlist` WHERE `id` = '$id' AND `email` = '{$_SESSION['email']}'";
        $result = mysqli_query($db, $query);
        unset($_GET['del']);
        echo "<script>window.location('wishlist.php');</script>";
    }
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $new_pswd = $_POST['new_pswd'];
        $pswd = $_POST['pswd'];
        include('load.php');
        $query = "SELECT * FROM `users` WHERE `email` = '{$_SESSION['email']}'";
        $result = mysqli_query($db, $query);
        foreach($result as $row){
            $hash = $row['password'];
        }
        if(password_verify($pswd, $hash)){
            $new_pswd = password_hash($new_pswd, PASSWORD_BCRYPT);
            $query = "UPDATE `users` SET `password` = '$new_pswd' WHERE `email` = '{$_SESSION['email']}'";
            $result = mysqli_query($db, $query);
            $msg = 'Вы успешно изменили пароль!';
        }
        if(!empty($img) || !empty($name)){
            if(!empty($img)){
                $query = "UPDATE `users` SET `img` = '../../img/$img', `name` = '$name' WHERE `email` = '{$_SESSION['email']}'";
                $result = mysqli_query($db, $query);
                $msg = 'Вы успешно изменили личные данные!';
            }
            else {
                $query = "UPDATE `users` SET `img` = '../../img/$ava', `name` = '$name' WHERE `email` = '{$_SESSION['email']}'";
                $result = mysqli_query($db, $query);
                $msg = 'Вы успешно изменили личные данные!';
            }
        }
    }
?>
<main class="py-20">
    <script src="https://cdn.tailwindcss.com"></script>
    <div class="grid lg:grid-cols-3 sm:grid-cols-1 m-5 gap-3">
        <div class="grid gap-2 rounded-md">
            <div class="flex flex-auto rounded-md p-3 shadow-lg">
                <div class="flex shrink w-24 h-24 shadow-lg rounded-full">
                    <img src="<?php echo $ava; ?>" alt="ava" class="flex rounded-full">
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
        
        <div class="grid sm:row-span-1 lg:row-span-2 lg:col-span-2 mx-5 mt-5 rounded-md gap-5">
            <div class="flex items-center border bg-orange-500 border-solid border-orange-400 align-center justify-center rounded-md">
                <p class="font-bold text-white text-lg p-6 uppercase">Редактирование профиля</p>
                <?php echo $msg; ?>
            </div>
            <div class="grid border-2 border-solid border-gray-200 rounded-md min-h-full">
                <?php $query = "SELECT * FROM `users` WHERE `email` = '{$_SESSION['email']}'"; $result = mysqli_query($db, $query);
                foreach($result as $row){
                    $name = $row['name'];
                    $category = $row['password'];
                    $image = $row['img'];
                }
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                        <div class="flex p-5 flex-col">
                        <img class="flex w-32" src="<?php echo $row['img']; ?>">
                        <label class="py-2" for="name">Ваше имя</label>
                        <input class="border rounded-md p-2" type="text" name="name" id="name" value = "<?php echo $name; ?>" placeholder="Ваше имя">
                        <label class="py-2" for="email">Ваш email</label>
                        <input class="border rounded-md p-2" type="email" name="email" value = "<?php echo $_SESSION['email']; ?>" placeholder="Ваш email">
                        <label class="py-2" for="new_pswd">Новый пароль</label>
                        <input class="border rounded-md p-2" type="password" name="new_pswd" placeholder="Новый пароль">
                        <label class="py-2" for="pswd">Старый пароль</label>
                        <input class="border rounded-md p-2" type="password" name="pswd" placeholder="Старый пароль">
                        <input class="py-2 rounded-md" type="file" name="img">
                        <input name="submit" type="submit" value="Редактировать" class="bg-orange-500 rounded-md p-3 mt-10 cursor-pointer text-white font-medium hover:mx-3 hover:bg-black ease-in-out duration-300">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
    include("footer.php");
?>