<?php
    session_start();
    include("db.php");
    $title = "Новости";
    include("header.php");
?>
<script src="https://cdn.tailwindcss.com"></script>
<main class="pt-20">
<div class="container my-24 px-6 mx-auto">

<!-- Section: Design Block -->
<section class="mb-32 text-gray-800 text-center md:text-left">

  <h2 class="text-3xl font-bold text-center">Новости</h2>
  <hr class="my-12">
<form action="read" method="get">
  <?php
    $query = "SELECT * FROM `news`";
    $result = mysqli_query($db, $query);
    foreach($result as $row){
        $date = strtotime($row['date']);
        $month = [
        	1  => 'января',
        	2  => 'февраля',
        	3  => 'марта',
        	4  => 'апреля',
        	5  => 'мая', 
        	6  => 'июня',
        	7  => 'июля',
        	8  => 'августа',
        	9  => 'сентября',
        	10 => 'октября',
        	11 => 'ноября',
        	12 => 'декабря'
        ];
        
  ?>
  <div class="flex flex-wrap mb-6">
    <div class="grow-0 shrink-0 basis-auto w-full md:w-3/12 px-3 mb-6 md:mb-0 ml-auto">
      <div
        class="relative overflow-hidden bg-no-repeat bg-cover relative overflow-hidden bg-no-repeat bg-cover ripple shadow-lg rounded-lg mb-6"
        data-mdb-ripple="true" data-mdb-ripple-color="light">
        <img src="<?php echo $row['img']; ?>"
          class="lg:w-full" alt="img" />
        <a href="#!">
          <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed opacity-0 hover:opacity-100 transition duration-300 ease-in-out"
            style="background-color: rgba(251, 251, 251, 0.2)"></div>
        </a>
      </div>
    </div>

    <div class="grow-0 shrink-0 basis-auto w-full md:w-9/12 xl:w-7/12 px-3 mb-6 md:mb-0 mr-auto text-left">
      <h5 class="text-lg font-bold mb-3"><?php echo $row['name']; ?></h5>
      <p class="text-gray-500 mb-6">
        <small>Опубликовано <u><?php echo date('d', $date) . ' ' . $month[date('n', $date)] . ' ' . date('Y', $date); ?></u><br> Автор: 
          <a href="" class="text-gray-900"><?php echo $row['author']; ?></a></small>
      </p>
      <p class="text-gray-500 line-clamp-3 text-justify">
      <?php echo $row['descr']; ?>
      </p>
      <br>
      <?php if($_SESSION['role'] == "Администратор"){ ?>
          <div class="flex gap-5 items-center rounded-md p-3">
              <a class="hover:text-orange-500 duration-200 ease-in-out" href="read.php?id=<?php echo $row['id']; ?>">Читать дальше...</a>
              <a class="hover:text-orange-500 duration-200 ease-in-out" href="e-news.php?id=<?php echo $row['id']; ?>">
                  <i class='fa fa-edit'></i>
              </a>
              <a class="hover:text-red-500 duration-200 ease-in-out" href="delnews.php?id=<?php echo $row['id']; ?>">
                  <i class="fa fa-times"></i>
              </a>
          </div>
      <?php } else { ?>
      <a class="hover:text-orange-500 duration-200 ease-in-out" href="read.php?id=<?php echo $row['id']; ?>">Читать дальше...</a>
      <?php } ?>
    </div>
  </div>
    <?php } ?>
    </form>
</section>
<!-- Section: Design Block -->

</div>
</main>
<?php include("footer.php"); ?>