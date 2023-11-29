<?php
    session_start();
    $title = "Профиль";
    include("db.php");
    include("header.php");
    $query = "SELECT `img`, `name` FROM `users` WHERE `email` = '{$_SESSION['email']}'";
    $result = mysqli_query($db, $query);
    foreach($result as $row){
      $ava = $row['img'];
      $author = $row['name'];
    }
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $descr = $_POST['descr'];
        include('load.php');
        $query = "INSERT INTO `news` (`name`, `descr`, `author`, `img`) VALUES ('$name', '$descr', '$author', '../../img/$img')";
        $result = mysqli_query($db, $query);
        $msg = '| Успешно добавлена!';
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
                        <p class="font-bold text-lg text-gray-600"><?php echo $author; ?></p>
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
        <div class="grid lg:col-span-2 sm:col-span-1 row-span-2 mx-5 mt-5 rounded-md gap-5">
            <div class="flex items-center border bg-orange-500 border-solid border-orange-400 align-center justify-center rounded-md">
                <p class="font-bold text-white text-lg p-6 uppercase">Статья <?php echo $msg; ?></p>
            </div>
            <div class="flex flex-col border-2 border-solid border-gray-200 rounded-md min-h-full">
                <form action="" method="post" enctype="multipart/form-data">
                        <div class="flex p-5 flex-col">
                        <label class="py-2" for="name">Название статьи</label>
                        <input class="border rounded-md p-2" type="text" name="name" id="name" placeholder="Введите название статьи">
                        <label class="py-2" for="descr">Описание статьи</label>
                        <textarea class="border rounded-md p-2" name="descr"></textarea>
                        <input class="py-2 rounded-md" type="file" name="img">
                        <input name="submit" type="submit" value="Добавить" class="bg-orange-500 rounded-md p-3 mt-10 cursor-pointer text-white font-medium hover:mx-3 hover:bg-black ease-in-out duration-300">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include("footer.php"); ?>