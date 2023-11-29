<?php
    $title = "Каталог";
    session_start();
    include("db.php");
    include("header.php");
    if(!isset($_SESSION['email'])){
      if(!isset($_SESSION['guest'])){
        $_SESSION['guest'] = rand(10000, 99999);
      }
    }
    else{
        $_SESSION['guest'] = rand(10000, 99999);
    }
?>
<div>
      <!--<div class="container">-->
        <!-- <div class="carousel">
      <!--    <div class="progress-bar progress-bar--primary">-->
      <!--      <div class="progress-bar__fill"></div>-->
      <!--    </div>-->
        
      <!--  <div class="main-post-wrapper">-->
          
      <!--    <div class="slides">-->
      <!--      <article class="main-post main-post--active">-->
      <!--        <div class="main-post__image">-->
      <!--          <img width="100%" src="https://sun9-12.userapi.com/impg/Ggac9Q9kQp1QW2t_h1w0wUIy1UEu196w6apYrg/LWqZOi61hxc.jpg?size=604x400&quality=96&sign=003eac77f7c3790ae018421d72680149&c_uniq_tag=N7Ios7FsfwDu6G_G02CFV7Tf7C7kmVHgRQYb7QJyRx8&type=album" alt="New McLaren wind tunnel 'critical' to future performance, says Tech Director Key" />-->
      <!--        </div>-->
      <!--        <div class="main-post__content">-->
      <!--          <div class="main-post__tag-wrapper">-->
      <!--            <span class="main-post__tag">Разработчик</span>-->
      <!--          </div>-->
      <!--          <h1 class="main-post__title">Захар</h1>-->
      <!--          <p class="descripton-slider">Да, да, да... Это я.</p>-->
      <!--          <div style="padding-top: 30px; ">-->
      <!--              <a href="https://vk.com/lge0rg3l" class="fill a slider_btn" style="border-radius: 7px;">-->
      <!--                  Написать в ВК-->
      <!--              </a>-->
      <!--        </div>-->
                
      <!--        </div>-->
      <!--      </article>-->
      <!--      <form action="../../php/buy.php" method="get">-->
      <!--      </form>-->
      <!--    </div>-->
      <!--  </div>-->
        
      <!--  <div class="posts-wrapper hide-on-mobile" >-->
      <!--    <article class="post post--active">-->
      <!--      <div class="progress-bar">-->
      <!--        <div class="progress-bar__fill"></div>-->
      <!--      </div>-->
      <!--      <header class="post__header">-->
      <!--        <span class="post__tag">Товары</span>-->
      <!--        <p class="post__published">По скидке</p>-->
      <!--      </header>-->
      <!--      <h2 class="post__title"></h2>-->
      <!--    </article>-->
      <!--    <article class="post">-->
      <!--      <div class="progress-bar">-->
      <!--        <div class="progress-bar__fill"></div>-->
      <!--      </div>-->
      <!--      <header class="post__header">-->
      <!--        <span class="post__tag">Товары</span>-->
      <!--        <p class="post__published">По скидке</p>-->
      <!--      </header>-->
      <!--      <h2 class="post__title"></h2>-->
      <!--    </article>-->
      <!--    <article class="post">-->
      <!--      <div class="progress-bar">-->
      <!--        <div class="progress-bar__fill"></div>-->
      <!--      </div>-->
      <!--      <header class="post__header">-->
      <!--        <span class="post__tag">Товары</span>-->
      <!--        <p class="post__published">По скидке</p>-->
      <!--      </header>-->
      <!--      <h2 class="post__title">-->
      <!--      </h2>-->
      <!--    </article>-->
      <!--  </div> -->-->
        
      <!--  </div>-->
      <!--</div> -->
       <div class="w-100">
        <div class="catalog-intro bg-auto mt-5 rounded-md" style="background-image: url('../../img/bg.jpg');">
            <div class="catalog-intro__info">
                <h1 class="sm:text-xl text-orange-500">Подборка от<br> Korean</h1>
                <h2 class="text-white"> Только здесь лучшая корейская бытовая техника!</h2>
            </div>
        </div>
        <form action="../../php/buy.php" method="get">
            <div class="grid sm:grid-cols-1 lg:grid-cols-10 m-5 gap-5">
            <div class="flex sm:col-span-1 lg:col-span-3 flex-col border-solid border-2 border-gray-200 rounded-md px-8 pt-3 pb-5">
                    <input class="mt-3 p-2 border-orange-200 border-solid border-2 rounded-md" name="search" placeholder="Поиск...">
                    <p class="py-3 text-xl font-bold">Категории</p>
                <?php $query = "SELECT * FROM `categories`";
                      $result = mysqli_query($db, $query);
                      foreach($result as $row){ 
                      if($_GET['category'] == $row['category']){
                      ?>
                      <div class="flex items-center">
                        <a href="catalogue.php"><i class="fa fa-times hover:text-orange-500 ease-in-out pl-1 duration-200"></i></a>
                        <a href="?category=<?php echo $row['category']; ?>"><p class="font-bold hover:text-orange-500 px-5 ease-in-out duration-200"><?php echo $row['category']; ?></p></a>
                      </div class="grid lg:grid-cols-3 sm:grid-cols-1 gap-5 p-10 justify-center">
                <?php } else {?>
                    <a href="?category=<?php echo $row['category']; ?>"><p class="hover:text-orange-500 pl-10 px-5 ease-in-out duration-200"><?php echo $row['category']; ?></p></a>
                <?php }} ?>
                    <p class="py-3 text-xl font-bold">Бренд</p>
<?php
$query = "SELECT * FROM `categories`";
$result = mysqli_query($db, $query);
foreach($result as $row){ 
if($_GET['category'] == $row['brand']){if(!empty($row['brand'])){
?>
<div class="flex items-center">
  <a href="catalogue.php"><i class="fa fa-times hover:text-orange-500 ease-in-out pl-1 duration-200"></i></a>
  <a href="?category=<?php echo $row['brand']; ?>"><p class="font-bold hover:text-orange-500 px-5 ease-in-out duration-200"><?php echo $row['brand']; ?></p></a>
</div class="grid lg:grid-cols-3 sm:grid-cols-1 gap-5 p-10 justify-center">
<?php } else { } ?>
<?php } elseif(!empty($row['brand'])) {?>
    <a href="?category=<?php echo $row['brand']; ?>"><p class="hover:text-orange-500 pl-10 px-5 ease-in-out duration-200"><?php echo $row['brand']; ?></p></a>
<?php }} ?>

            </div>
            <div class="grid sm:col-span-1 lg:col-span-7 lg:grid-cols-3 sm:grid-cols-1 gap-5 justify-center">
                <?php include("cat-products.php"); ?>
            </div>
            </div>
        </form>
                <style>
                    .hidden{
                      display: none;
                    }
                    
                    .categorytext
                    {
                        font: italic 900 40px/1 "Comfortea", serif
                    }
                    .linecategory
                    {
                        width: 60%;
                        height: 3px;
                        /* color: orange; */
                        background: #FF8900;
                    }
                    @media screen and (max-width: 700px) {
                      .linecategory {
                        width: 90%;
                      }
                    }
                    @media screen and (min-width: 1024px){
                    .hidden {
                        display: grid;
                    }
                    }
                    
                </style>
                </div>
    </div>
    <script src="../../js/jquery.js"></script>
    <!-- <script src="../../js/catalog.js"></script> -->
    </div>
<?php
    include("footer.php");
?>