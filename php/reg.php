<?php
    session_start();
    include("db.php");
    include("header.php");
    $name = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password_repeat = mysqli_real_escape_string($db, $_POST['password_repeat']);
    $query = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($db, $query);
    if(isset($_POST['submit'])){
        if(empty($name)){
            $error = "Введите Ваше имя!";
        }
        elseif(empty($email)){
            $error = "Введите Вашу почту!";
        }
        elseif(empty($password)){
            $error = "Введите Ваш пароль!";
        }
        elseif(empty($password_repeat)){
            $error = "Повторите пароль!";
        }
        else{
            if(mysqli_num_rows($result) == 1){
                echo "Такая почта уже зарегистрирована";
                echo $name, $email, $password, $password_repeat;
            }
            else {
                if($password == $password_repeat){
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $query = "INSERT INTO `users` (`name`,`email`,`password`) VALUES ('$name', '$email', '$password')";
                    $result = mysqli_query($db, $query);
                    $query = "UPDATE `cart` SET `email` = '$email' WHERE `email` = '{$_SESSION['guest']}'";
                    $result = mysqli_query($db, $query);
                     echo
                    "<script>
                        window.location.replace('https://whereideasbegin.online/php/login.php');
                    </script>";
                }
                else{
                    echo "Пароли не совпадают!";
                }
        }
    }
    } else{
        echo "";
    }
?>
<main>
<div class="main">
        <div class="bio">
          <div class="flex flex-row items-center gap-2 hover:text-white ease-in duration-200">
          <a href="../../index.php">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
          </a>
          <a href="../../index.php">
            <h3 class="header">Korean</h3>
          </a>
          </div>
          <p>Best store in the world</p>
            <a class="bio-link">Google<i class="fa fa-google"></i></a>
            <a class="bio-link" href="">Twitter<i class="fa fa-twitter"></i></a>
            <a class="bio-link" href="">Youtube<i class="fa fa-youtube"></i></a>
        </div>
        <div class="contact">
          <form id="form" action="reg.php" method="post">
            <div class="flex items-center">
              <a href="../../index.php"><i class="fa fa-arrow-left lg:hidden pr-3 text-white"></i></a>
              <a href="../../index.php"><legend class="header">Регистрация</legend></a>
            </div>
            <fieldset>
              <label for="email-input" aria-hidden="true"></label>
              <input type="email" name="email" placeholder="Ваш Email..." id="email-input"/>
            </fieldset>
            <fieldset>
              <label for="name-input" aria-hidden="true"></label>
              <input type="text" name="username" placeholder="Ваше Имя..." id="name-input"/>
            </fieldset>
            <fieldset>
              <label class="fa fa-password" for="password-input" aria-hidden="true"></label>
              <input type="password" name="password" placeholder="Ваш Пароль..." id="password-input"/>
            </fieldset>
            <fieldset>
              <label class="fa fa-password" for="password-repeat-input" aria-hidden="true"></label>
              <input type="password" name="password_repeat" placeholder="Повторите Ваш пароль..." id="password-repeat-input"/>
            </fieldset>
            <fieldset>
              <button name="submit" type="submit" id="btn-submit">Зарегистрироваться</button>
            </fieldset>
          </form>
        </div>
      </div>
</main>
<?php
    include("footer.php");
?>