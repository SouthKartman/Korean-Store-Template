<?php
    session_start();
    include("db.php");
    $title = "Админ - панель";
    include("header.php");
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $category = $_POST['category'];
        $brand = $_POST['brand'];
        $descr = $_POST['descr'];
        $price = $_POST['price'];
        include("load.php");
        $query = "INSERT INTO `products` (`name`, `category`, `descr`, `price`, `img`, `brand`) VALUES ('$name', '$category', '$descr', '$price', '../../img/$img', '$brand')";
        $result = mysqli_query($db, $query);
    }
    if($_SESSION['role'] == "Администратор"){
        
?>
<script src="https://cdn.tailwindcss.com"></script>
<main class="pt-20">
    <div class="grid sm:grid-cols-1 lg:grid-cols-2">
        <div class="flex flex-col row-span-1 min-h-fit">
            <div class="flex border bg-orange-500 border-solid border-orange-400 align-center m-5 rounded-md">
                <div class="flex-auto flex-col p-5 gap-2">
                    <p class="text-white"><?php echo $_SESSION['email']; ?></p>
                    <p><?php echo $_SESSION['role']; ?></p>
                </div>
                <!--<div class="flex-initial items-center flex-row m-5 bg-white hover:bg-orange-300 ease-in-out duration-200 rounded-md p-3">-->
                <!--    <input type="button" class="cursor-pointer bg-transparent font-medium text-sm" value="Изменить пароль">-->
                <!--    <i class="fa fa-unlock-alt"></i>-->
                <!--</div>-->
            </div>
            <div class="flex border bg-orange-500 border-solid border-orange-400 align-center justify-center mx-5 rounded-md">
                <p class="font-bold text-white text-lg p-6 uppercase">Действие</p>
            </div>
            
            <div class="grid grid-cols-2 mx-5 mt-5 gap-5">
                <a href="admin.php">
                <div class="flex-auto cursor-pointer hover:mx-5 bg-orange-300 justify-center items-center bg-cover rounded-md min-h-max ease-in-out duration-300" style="background-image: url('https://static.tildacdn.com/tild6230-3230-4933-b966-393166323932/___.png');">
                    <div class="flex bg-black backdrop-opacity-10 backdrop-invert bg-black/50 rounded-md">
                        <input type="submit" name="product" class="text-white drop-shadow-md font-bold p-10 cursor-pointer" value="Добавить товар">
                    </div>
                </div>
                </a>
                
                <a href="add.php">
                <div class="flex-auto cursor-pointer hover:mx-5 bg-orange-300 justify-center items-center bg-cover rounded-md min-h-max ease-in-out duration-300" style="background-image: url('../../img/Looking\ for\ candidate.svg');">
                    <div class="flex bg-black backdrop-opacity-10 backdrop-invert bg-black/50 rounded-md">
                        <input type="submit" name="category" class="text-white drop-shadow-md font-bold p-10 cursor-pointer" value="Категории">
                    </div>
                </div>
                </a>
                
                <a href="add-news.php">
                <div class="flex-auto cursor-pointer hover:mx-5 bg-orange-300 justify-center items-center bg-cover rounded-md min-h-max ease-in-out duration-300" style="background-image: url('../../img/Looking\ for\ candidate.svg');">
                    <div class="flex bg-black backdrop-opacity-10 backdrop-invert bg-black/50 rounded-md">
                        <input type="submit" name="news" class="text-white drop-shadow-md font-bold p-10 cursor-pointer" value="Добавить новость">
                    </div>
                </div>
                </a>
                
                <a href="catalogue.php">
                <div class="flex-auto cursor-pointer hover:mx-5 bg-orange-300 justify-center items-center bg-cover rounded-md min-h-max ease-in-out duration-300" style="background-image: url('https://static.tildacdn.com/tild6230-3230-4933-b966-393166323932/___.png');">
                    <div class="flex bg-black backdrop-opacity-10 backdrop-invert bg-black/50 rounded-md">
                        <input type="submit" name="review" class="text-white drop-shadow-md font-bold p-10 cursor-pointer" value="Удалить товары">
                    </div>
                </div>
                </a>
            
        </div>
    </div>

        <div class="flex flex-col row-span-2 mx-5 mt-5 rounded-md gap-5">
            <div class="flex items-center border bg-orange-500 border-solid border-orange-400 align-center justify-center rounded-md">
                <p class="font-bold text-white text-lg p-6 uppercase">Добавление товара</p>
            </div>
            <div class="grid border-2 border-solid border-gray-200 rounded-md">
                <form action="" method="post" enctype="multipart/form-data">
                        <div class="flex p-5 flex-col">
                        <label class="py-2" for="name">Название товара</label>
                        <input class="border rounded-md p-2" type="text" name="name" id="name" placeholder="Введите название товара">
                        <label class="py-2" for="category">Категория</label>
                        <select name="category">
                            <?php $query = "SELECT * FROM `categories`";
                            $result = mysqli_query($db, $query);
                            foreach($result as $row){ ?>
                            <option name="category"><?php echo $row['category']?></option>
                            <?php } ?>
                        </select>
                        <label class="py-2" for="brand">Бренд</label>
                        <select name="brand">
                            <?php foreach($result as $row){ if(!empty($row['brand'])){ ?>
                            <option name="brand"><?php echo $row['brand']?></option>
                            <?php }} ?>
                        </select>
                        <label class="py-2" for="descr">Описание товара</label>
                        <textarea class="border rounded-md p-2" name="descr"></textarea>
                        <label class="py-2" for="price">Цена товара</label>
                        <input class="border rounded-md p-2" type="text" name="price" id="name" placeholder="Введите цену">
                        <input class="py-2 rounded-md" type="file" name="img">
                        <input name="submit" type="submit" value="Добавить" class="bg-orange-500 rounded-md p-3 mt-10 cursor-pointer text-white font-medium hover:mx-3 hover:bg-black ease-in-out duration-300">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php } else { echo "<script>
                window.location.replace('../../index.php');
            </script>"; } ?>
<?php include("footer.php"); ?>