
<?php
    if($title != "Каталог"){
        unset($_SESSION['more']);
    }
    if(isset($_SESSION['email'])){
        $query = "SELECT * FROM `cart` WHERE `email` = '{$_SESSION['email']}' AND `status` = 'В корзине'";
        $cart = mysqli_query($db, $query);
    }
    elseif(isset($_SESSION['guest'])){
        $query = "SELECT * FROM `cart` WHERE `email` = '{$_SESSION['guest']}' AND `status` = 'В корзине'";
        $cart = mysqli_query($db, $query);
    } else{
        $cart = '';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
       (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
       m[i].l=1*new Date();
       for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
       k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
       (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
    
       ym(93852155, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true
       });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/93852155" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Korean | <?php echo $title?></title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/button.css">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/auth.css">
    <link rel="stylesheet" href="../../css/mobmenu.css">
    <link rel="stylesheet" href="../../css/catalog.css">
    <link rel="stylesheet" href="../../font-awesome-4.7.0/css/font-awesome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/slider.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <header>
       
    <div class="sidehead">
        <div class="mobmenu">
            <input id="menu__toggle" type="checkbox" />
        <label class="menu__btn" for="menu__toggle">
            <span></span>
        </label>
        
        <ul class="menu__box">
            
            <li><a class="menu__item" href="../../index.php">Главная</a></li>
            <li><a class="menu__item" href="../../php/catalogue.php">Каталог</a></li>
            <li><a class="menu__item" href="../../php/news.php">Новости</a></li>
            <?php if($_SESSION['role'] == "Администратор"){?>
                <li><a class="menu__item" href="../../php/admin.php">Админ-Панель</a></li>
            <?php } ?>
            <br><br><br><br><br> 
            <iframe frameborder="0" style="border:none;width:295px;height:80px;" width="320" height="450" src="https://music.yandex.ru/iframe/#playlist/yamusic-daily/152599575">Слушайте <a href='https://music.yandex.ru/users/yamusic-daily/playlists/152599575'>Плейлист дня</a> — <a href='https://music.yandex.ru/users/yamusic-daily'>yamusic-daily</a> на Яндекс.Музыке</iframe>
            
           <!--  <br><br><br><br><br><iframe class="test" src="https://open.spotify.com/embed/playlist/37i9dQZF1E3aiW7d90Hxx2?utm_source=generator" width="295" height="80" widht-left= frameborder="0" allowtransparency="true" allow="encrypted-media" ></iframe>
           <script>
           const onPlay = () => {
               console.log('onplay')
               const audio = new Audio('https://www.youtube.com/watch?v=S4lZHCgefMI&list=RDS4lZHCgefMI&start_radio=1');
               audio.play();
           }
           </script> -->
        </ul>
        </div>
        <div class="flex items-center justify-center logohead">
          <a href="../../index.php"><img src="../../img/logo.svg" class="w-20 h-10"></a>
        </div>
        <!--<div class="authsection hide-on-mobile">-->
        <!--<form action="../../php/search.php" method="post">-->
        <!--    <input name = "search" placeholder="Поиск...">-->
        <!-- </form>-->
        <!-- </div>-->
        <div class="menu">
           
                <nav>                      

                    <ul class="nav-list">
                      <li>
                        <a href="../../index.php">Главная</a>
                      </li>
                      <li>
                        <a href="../../php/catalogue.php">Каталог</a>
                      </li>
                      
                      <li>
                        <a href="../../php/news.php">Новости</a>
                      </li>
                    <?php if($_SESSION['role'] == "Администратор"){?>
                        <li>
                            <a href="../../php/admin.php">Админ-панель</a>
                      </li>
                    <?php } ?>  
                        </ul>
                      </li>
                      
                    </ul>
                  </nav>
            
        </div>
        <div class="cart">
            <div class="buttonsSide">
                <a href="<?php if(empty($_SESSION['email'])){ ?>../../php/login.php <?php } elseif($_SESSION['role'] == "Администратор"){ ?> ../../php/admin.php <?php } else {?>
                ../../php/profile.php
                <?php }?>" class="fill a" style="border-radius: 7px;">
                <?php if(empty($_SESSION['email'])){ ?>
                    <i class="fa fa-sign-in" aria-hidden="true">
                    </i>
                <?php } else { ?>
                    <i class="fa fa-user-circle" aria-hidden="true">
                    </i>
                <?php } ?>
                </a> 
                <a href="../../php/cart.php" class="fill a" style="border-radius: 7px;">
                <?php if(!empty($_SESSION['email']) || !empty($_SESSION['guest'])){ if(mysqli_num_rows($cart) >= 1){?>
                  <div class="base">
                    <div class="indicator">
                      <p><?php echo mysqli_num_rows($cart)?></p>
                    </div>
                    <i class="flex fa fa-shopping-basket items-center" aria-hidden="true"></i>
                    </div>
                <?php } else{?>
                        <i class="flex fa fa-shopping-basket items-center" aria-hidden="true"></i>
                    </a>
                <?php }} else { ?>
                    <i class="flex fa fa-shopping-basket items-center" aria-hidden="true"></i>
                <?php } ?>
                </a>
                <?php if(!empty($_SESSION['email'])){ ?>
                    <a href="../../php/logout.php" class="fill a" style="border-radius: 7px;">
                        <i class="flex fa fa-sign-out"></i>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
    
  </header>