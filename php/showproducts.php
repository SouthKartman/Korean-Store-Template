<?php
    $query = "SELECT * FROM `news`";
    $result = mysqli_query($db, $query);
    foreach($result as $row){
?>
<script src="https://cdn.tailwindcss.com"></script>
<article class="main-post main-post--not-active">
              <div class="main-post__image">
                <img width="100%" src="<?php echo $row['img']; ?>" alt="img" />
              </div>
              <div class="main-post__content">
                <!--<div class="main-post__tag-wrapper">-->
                <!--  <span class="main-post__tag">Популярное</span>-->
                <!--  <span class="main-post__tag" style="background: red; margin-left: 10px;"><?php echo $row['category']; ?></span>-->
                <!--</div>-->
                <h1 class="main-post__title"><?php echo $row['name']; ?></h1>
                <p class="descripton-slider line-clamp-3"><?php echo $row['descr']; ?></p>
                <div style="padding-top: 30px; ">
                    <a href="../../php/read.php?id=<?php echo $row['id']; ?>" class="fill a slider_btn" style="border-radius: 7px;">
                        Читать
                    </a>
            </div>  
              </div>
</article>
<?php
    }
?>