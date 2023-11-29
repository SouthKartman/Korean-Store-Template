<?php
    session_start();
    include("db.php");
    include("header.php");
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $query = "SELECT `password` FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($db, $query);
    if(!empty($_POST['email']) && !empty($_POST['password'])){
    if(mysqli_num_rows($result) == 1){
      foreach($result as $row){
        $hash = $row['password'];
      }
      if(password_verify($password, $hash)){

        $query = "SELECT `password` FROM `users` WHERE `email` = '$email' AND `password` = '$hash'";
        $result = mysqli_query($db, $query);

        if(isset($_POST['submit'])){
            if(empty($email)){
                $error = "Введите Вашу почту!";
            }
            elseif(empty($password)){
                $error = "Введите Ваш пароль!";
            }
            else{
                if(mysqli_num_rows($result) == 1){
                    $_SESSION['email'] = $email;
                    $_SESSION['role'] = "Пользователь";
                     echo
                        "<script>
                            window.location.replace('https://whereideasbegin.online/index.php');
                        </script>";
                } else{
                    $error = "Неверный логин или пароль!";
                }
            }
        }
      }

      else{
          $error = "Неверный логин или пароль!";
      }

    } else {
    $query = "SELECT `password` FROM `admins` WHERE `login` = '$email'";
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) == 1){
      foreach($result as $row){
        $hash = $row['password'];
        }
        
      if(password_verify($password, $hash)){

      $query = "SELECT * FROM `admins` WHERE `login` = '$email' AND `password` = '$hash'";
      $result = mysqli_query($db, $query);
      if(empty($email)){
          $error = "Введите Вашу почту!";
      }
      elseif(empty($password)){
          $error = "Введите Ваш пароль!";
      }
      else{
          if(mysqli_num_rows($result) == 1){
              $_SESSION['role'] = "Администратор";
              $_SESSION['email'] = $email;
               echo
                "<script>
                window.location.replace('https://whereideasbegin.online/index.php');
                </script>";
          } else{
              $error = "Неверный логин или пароль!";
          }
      }
    }
    } else{
      $error = "Неверный логин или пароль!";
    }
    }
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
          <form id="form" action="login.php" method="post">
            <div class="flex items-center">
              <a href="../../index.php"><i class="fa fa-arrow-left lg:hidden pr-3 text-white"></i></a>
              <a href="../../index.php"><legend class="header">Вход</legend></a>
            </div>
            <?php if(isset($_POST['submit'])){ echo "<p style='color:red; font-weight: 800;'>" . $error . "</p>"; }?>
            <fieldset>
              <label for="email-input" aria-hidden="true"></label>
              <input type="email" name="email" placeholder="Ваш Email..." id="email-input"/>
            </fieldset>
            <fieldset>
              <label class="fa fa-password" for="message-input" aria-hidden="true"></label>
              <input type="password" name="password" placeholder="Ваш Пароль..." id="message-input""/>
            </fieldset>
            <fieldset>
              <button name="submit" type="submit" id="btn-submit">Войти</button>
            </fieldset>
            <fieldset>
              <a href='../../php/reg.php'>Нет аккаунта?</a>
            </fieldset>
          </form>
        </div>
      </div>
</main>
<?php
    include("footer.php");
?>