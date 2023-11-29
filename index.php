<?php
    session_start();
    $title = "Главная";
    include("php/db.php");
    include("php/header.php");
    if(!isset($_SESSION['email'])){
      if(!isset($_SESSION['guest'])){
        $_SESSION['guest'] = rand(10000, 99999);
      }
    }
    else{
        $_SESSION['guest'] = rand(10000, 99999);
    }
    if(isset($_POST['send'])){
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $phone = mysqli_real_escape_string($db, $_POST['phone']);
        $descr = mysqli_real_escape_string($db, $_POST['descr']);
        $query = "INSERT INTO `reports` (`name`, `phone`, `descr`) VALUES ('$name', '$phone', '$descr')";
        $result = mysqli_query($db, $query);
        $_SESSION['send'] = 'true';
    }
?>
<style>
@media(max-width: 390px){
    .mobile-col{
        display: flex;
        flex-direction: column;
    }
    
}
</style>
<div class="mainpage">
      <div class="container">
        <div class="carousel">
          <div class="progress-bar progress-bar--primary">
            <div class="progress-bar__fill"></div>
          </div>
        
        <div class="main-post-wrapper">
          
          <div class="slides">
            <article class="main-post main-post--active">
              <div class="main-post__image">
                <img width="100%" src="../../img/z.jpg" />
              </div>
              <div class="main-post__content">
                <h1 class="main-post__title">Добро пожаловать!</h1>
                <p class="descripton-slider">Мы рады видеть Вас в нашем магазине. У нас товары крутые, кстати.</p>
                
              </div>
            </article>
            <form action="../../php/read.php" method="get">
              <?php include("php/showproducts.php"); ?>
            </form>
          </div>
        </div>
        
        <div class="posts-wrapper hide-on-mobile" >
          <article class="post post--active">
            <div class="progress-bar">
              <div class="progress-bar__fill"></div>
            </div>
            <header class="post__header">
              <span class="post__tag">Товары</span>
              <p class="post__published">По скидке</p>
            </header>
            <h2 class="post__title"></h2>
          </article>
          <article class="post">
            <div class="progress-bar">
              <div class="progress-bar__fill"></div>
            </div>
            <header class="post__header">
              <span class="post__tag">Товары</span>
              <p class="post__published">По скидке</p>
            </header>
            <h2 class="post__title"></h2>
          </article>
          <article class="post">
            <div class="progress-bar">
              <div class="progress-bar__fill"></div>
            </div>
            <header class="post__header">
              <span class="post__tag">Товары</span>
              <p class="post__published">По скидке</p>
            </header>
            <h2 class="post__title">
            </h2>
          </article>
        </div>
        
        </div>
      </div> 
       <div class="main-content">
        <div class="flex flex-col p-2 flex-wrap">
          <div class="catalog-intro bg-auto mt-5 rounded-md" style="background-image: url('../../img/bg.jpg');">
              <div class="catalog-intro__info">
                  <h1 class="sm:text-xl text-orange-500">Добро пожаловать в<br> Korean</h1>
                  <h2 class="text-white"> Только здесь лучшая корейская бытовая техника!</h2>
              </div>
          </div>
          <div class="flex w-100 gap-5 flex-row mobile-col">
            <div class="flex flex-col lg:w-2/3 sm:w-full bg-auto mt-5 rounded-md p-10 items-center flex-wrap" style="background-image: url('../../img/bg.jpg');">
                  <h1 class="text-xl font-bold text-white">Ниже представлена подборка!</h1>
                  <h2 class="text-white"> Мы надеемся, что Вы сможете приглядеть себе нужный товар</h2>
            </div>
            
            <div class="flex flex-col lg:w-1/3 sm:w-full bg-auto mt-5 rounded-md p-10" style="background-image: url('../../img/bg.jpg');">
                  <h1 class="sm:text-xl text-orange-500">Вступай к нам!</h1>
                  <h2 class="text-white">Зарегистрируйся и получай скидки вплоть до 50%</h2>
            </div>

          </div>
        </div>
        <h1 class="text-2xl font-bold text-black text-center py-5">Популярное</h1>
        <form action="../../php/buy.php" method="get">
        <div class="grid lg:grid-cols-3 sm:grid-cols-1 gap-5 p-10 justify-center">
                <?php include("php/products.php"); ?>
        </form>
        <div class="grid sm:grid-cols-1 lg:grid-cols-2 catalog-intro bg-auto mt-5" style="background-image: url('../../img/bg.jpg');">
              <div class="catalog-intro__info">
                  <h1 class="sm:text-xl text-orange-500">Возникли <br> вопросы?</h1>
                  <h2 class="text-white"> Вы можете связаться с нами вручную:</h2>
                  <div class="py-2">
                      <h2 class="text-orange-300"> georgetimjab@icloud.com</h2>
                      <h2 class="text-orange-300"> 8-800-555-35-35</h2>
                  </div>
              </div>
              <div class="catalog-intro__info bg-white bg-opacity-75">
                  <?php if(empty($_SESSION['send'])){ ?>
                  <h1 class="sm:text-xl text-orange-500">Или можете заполнить <br> контактную форму</h1>
                  <form method="post" action="">
                  <div class="grid py-5 gap-5 w-100">
                        <input class="border-solid p-1.5 border-gray-200 focus:outline-none focus:ring-orange-500 focus:border-white focus:ring border-2 rounded-md duration-200 ease-in-out" name="name" type="text" placeholder="Ваше имя..." />
                        <input class="border-solid p-1.5 border-gray-200 focus:outline-none focus:ring-orange-500 focus:border-white focus:ring border-2 rounded-md duration-200 ease-in-out" name="phone" type="text" placeholder="Ваш номер телефона..." />
                        <textarea class="border-solid p-1.5 border-gray-200 focus:outline-none focus:ring-orange-500 focus:border-white focus:ring border-2 rounded-md duration-50 ease-in-out" name="descr" type="text" placeholder="Опишите суть Вашей проблемы..."></textarea>
                        <input name="send" class="cursor-pointer bg-orange-500 p-3 rounded-md text-white ease-in-out duration-200 hover:bg-black font-bold" type="submit" value="Отправить" />
                  </div>
                  </form>
                  <?php } else {?>
                  <h1 class="sm:text-xl text-orange-500 drop-shadow-lg">Ваша заявка отправлена!</h1>
                  <h2 class="sm:text-lg text-orange-500 drop-shadow-lg">В скором времени с Вами свяжутся.</h2>
                  <?php } ?>
              </div>
          </div>
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
                        display: flex;
                    }
                    }
                    
                </style>
                </div>
    </div>
    <script src="../../js/jquery.js"></script>
    <!-- <script src="../../js/catalog.js"></script> -->
    </div>
<?php
    include("php/footer.php");
?>