<?php       
            if(!empty($_GET)){
                if(isset($_GET['category'])){
                $category = $_GET['category'];
                $query = "SELECT * FROM `products` WHERE `category` LIKE '%$category%' OR `brand` LIKE '%$category%'";
                $result = mysqli_query($db, $query);
                }
                else {
                $search = $_GET['search'];    
                $search = preg_replace('/\s+/', '', $search);
                $query = "SELECT * FROM `products` WHERE `category` LIKE '%$search%' OR `name` LIKE '%$search%' OR `descr` LIKE '%$search%' OR `brand` LIKE '%$search%'";
                $result = mysqli_query($db, $query);
                }
            } else {
                $query = "SELECT * FROM `products`";
                $result = mysqli_query($db, $query);
            }
                foreach($result as $row){
                    if($row['id'] < 5){
            ?>
            <?php if($_SESSION['role'] == "Администратор"){ ?>
              <div class="grid items-center border-solid border-2 border-gray-200 rounded-md px-5 max-w-sm">
              <a href="../../php/product.php?id=<?php echo $row['id'];?>" class="grid justify-center">
                  <div class="flex justify-center py-5">
                    <img class="object-scale-down h-48 w-48" src="<?php echo $row['img']; ?>">
                  </div>
                  </a>
                  <div>
                    <p class="font-bold line-clamp-1 text-lg"><?php echo $row['name']; ?></p>
                    <h5 class="line-clamp-1"><?php echo $row['descr']; ?></h5>
                    <h5><?php echo $row['price'];?> ₽</h5>
                  </div>
                  <div class="flex w-100 py-4 gap-5">
                    <a href="../../php/product.php?id=<?php echo $row['id']; ?>">
                      <p class="sm:mx-0 bg-orange-500 hover:bg-black ease-in duration-200 text-white px-3 py-1 rounded-md">Подробнее</p>
                    </a>
                    <a href="../../php/delete.php?id=<?php echo $row['id']; ?>">
                      <i class="justify-end fa fa-trash p-2 hover:bg-red-500 hover:text-white rounded-md items-center ease-in duration-200"></i>
                    </a>
                    <a href="../../php/edit.php?id=<?php echo $row['id']; ?>">
                      <i class="justify-end fa fa-pencil-square-o p-2 hover:bg-orange-500 hover:text-white rounded-md items-center ease-in duration-200"></i>
                    </a>
                  </div>
              </div>
              <?php } else {?>

              <div class="grid items-center border-solid border-2 border-gray-200 rounded-md px-5 max-w-sm">
              <a href="../../php/product.php?id=<?php echo $row['id'];?>" class="grid justify-center">
                  <div class="flex justify-center py-5">
                    <img class="object-scale-down h-48 w-48" src="<?php echo $row['img']; ?>">
                  </div>
                  </a>
                  <div class="w-3/4">
                    <p class="font-bold line-clamp-1 text-lg"><?php echo $row['name']; ?></p>
                    <h5 class="line-clamp-1"><?php echo $row['descr']; ?></h5>
                    <h5><?php echo $row['price'];?> ₽</h5>
                  </div>
                  <div class="flex w-100 py-4 gap-5">
                    <a href="../../php/product.php?id=<?php echo $row['id']; ?>">
                      <p class="sm:mx-0 bg-orange-500 hover:bg-black ease-in duration-200 text-white px-3 py-1 rounded-md">Подробнее</p>
                    </a>
                    <a href="../../php/buy.php?id=<?php echo $row['id']; ?>">
                      <i class="justify-end fa fa-shopping-cart p-2 hover:bg-orange-500 hover:text-white rounded-md items-center ease-in duration-200"></i>
                    </a>
                    <a href="../../php/product.php?wish=<?php echo $row['id']; ?>">
                      <i class="justify-end fa fa-heart p-2 hover:bg-red-400 hover:text-white rounded-md items-center ease-in duration-200"></i>
                    </a>
                  </div>
              </div>
              
              <?php }} elseif(isset($_SESSION['more']) || isset($_GET['category'])){ ?>
                <?php if($_SESSION['role'] == "Администратор"){ ?>
              <div class="grid items-center border-solid border-2 border-gray-200 rounded-md px-5 max-w-sm">
              <a href="../../php/product.php?id=<?php echo $row['id'];?>" class="grid justify-center">
                  <div class="flex justify-center py-5">
                    <img class="object-scale-down h-48 w-48" src="<?php echo $row['img']; ?>">
                  </div>
                  </a>
                  <div class="w-3/4">
                    <p class="font-bold line-clamp-1 text-lg"><?php echo $row['name']; ?></p>
                    <h5 class="line-clamp-1"><?php echo $row['descr']; ?></h5>
                    <h5><?php echo $row['price'];?> ₽</h5>
                  </div>
                  <div class="flex w-100 py-4 gap-5">
                    <a href="../../php/product.php?id=<?php echo $row['id']; ?>">
                      <p class="sm:mx-0 bg-orange-500 hover:bg-black ease-in duration-200 text-white px-3 py-1 rounded-md">Подробнее</p>
                    </a>
                    <a href="../../php/delete.php?id=<?php echo $row['id']; ?>">
                      <i class="justify-end fa fa-trash p-2 hover:bg-red-500 hover:text-white rounded-md items-center ease-in duration-200"></i>
                    </a>
                    <a href="../../php/edit.php?id=<?php echo $row['id']; ?>">
                      <i class="justify-end fa fa-pencil-square-o p-2 hover:bg-orange-500 hover:text-white rounded-md items-center ease-in duration-200"></i>
                    </a>
                  </div>
              </div>

              <?php }else{ ?>
              <div class="grid items-center border-solid border-2 border-gray-200 rounded-md px-5 max-w-sm">
              <a href="../../php/product.php?id=<?php echo $row['id'];?>" class="grid justify-center">
                  <div class="flex justify-center py-5">
                    <img class="object-scale-down h-48 w-48" src="<?php echo $row['img']; ?>">
                  </div>
                  </a>
                  <div class="w-3/4">
                    <p class="font-bold line-clamp-1 text-lg"><?php echo $row['name']; ?></p>
                    <h5 class="line-clamp-1"><?php echo $row['descr']; ?></h5>
                    <h5><?php echo $row['price'];?> ₽</h5>
                  </div>
                  <div class="flex w-100 py-4 gap-5">
                    <a href="../../php/product.php?id=<?php echo $row['id']; ?>">
                      <p class="sm:mx-0 bg-orange-500 hover:bg-black ease-in duration-200 text-white px-3 py-1 rounded-md">Подробнее</p>
                    </a>
                    <a href="../../php/buy.php?id=<?php echo $row['id']; ?>">
                      <i class="justify-end fa fa-shopping-cart p-2 hover:bg-orange-500 hover:text-white rounded-md items-center ease-in duration-200"></i>
                    </a>
                    <a href="../../php/product.php?wish=<?php echo $row['id']; ?>">
                      <i class="justify-end fa fa-heart p-2 hover:bg-red-400 hover:text-white rounded-md items-center ease-in duration-200"></i>
                    </a>
                  </div>
              </div> 
              <?php }} elseif($row['id'] <= 9){ if($_SESSION['role'] == "Администратор"){?>
              <div class="grid items-center border-solid border-2 border-gray-200 rounded-md px-5 max-w-sm">
              <a href="../../php/product.php?id=<?php echo $row['id'];?>" class="grid justify-center">
                  <div class="flex justify-center py-5">
                    <img class="object-scale-down h-48 w-48" src="<?php echo $row['img']; ?>">
                  </div>
                  </a>
                  <div class="w-3/4">
                    <p class="font-bold line-clamp-1 text-lg"><?php echo $row['name']; ?></p>
                    <h5 class="line-clamp-1"><?php echo $row['descr']; ?></h5>
                    <h5><?php echo $row['price'];?> ₽</h5>
                  </div>
                  <div class="flex w-100 py-4 gap-5">
                    <a href="../../php/product.php?id=<?php echo $row['id']; ?>">
                      <p class="sm:mx-0 bg-orange-500 hover:bg-black ease-in duration-200 text-white px-3 py-1 rounded-md">Подробнее</p>
                    </a>
                    <a href="../../php/delete.php?id=<?php echo $row['id']; ?>">
                      <i class="justify-end fa fa-trash p-2 hover:bg-red-500 hover:text-white rounded-md items-center ease-in duration-200"></i>
                    </a>
                    <a href="../../php/edit.php?id=<?php echo $row['id']; ?>">
                      <i class="justify-end fa fa-pencil-square-o p-2 hover:bg-orange-500 hover:text-white rounded-md items-center ease-in duration-200"></i>
                    </a>
                  </div>
              </div>
              <?php } else{ ?>
            <div class="grid items-center border-solid border-2 border-gray-200 rounded-md px-5 hidden max-w-sm">
                <a href="../../php/product.php?id=<?php echo $row['id'];?>" class="grid justify-center">
                  <div class="flex justify-center py-5">
                    <img class="flex object-scale-down h-48 w-48" src="<?php echo $row['img']; ?>">
                  </div>
                </a>
                  <div class="lg:w-3/4 md:w-2/3">
                    <p class="font-bold line-clamp-1 text-lg"><?php echo $row['name']; ?></p>
                    <p class="line-clamp-1"><?php echo $row['descr']; ?></p>
                    <h5><?php echo $row['price'];?> ₽</h5>
                  </div>
                  <div class="flex w-100 py-4 gap-5">
                    <a href="../../php/product.php?id=<?php echo $row['id']; ?>">
                      <p class="sm:mx-0 bg-orange-500 hover:bg-black ease-in duration-200 text-white px-3 py-1 rounded-md">Подробнее</p>
                    </a>
                    <a href="../../php/buy.php?id=<?php echo $row['id']; ?>">
                      <i class="justify-end fa fa-shopping-cart p-2 hover:bg-orange-500 hover:text-white rounded-md items-center ease-in duration-200"></i>
                    </a>
                    <a href="../../php/product.php?wish=<?php echo $row['id']; ?>">
                      <i class="justify-end fa fa-heart p-2 hover:bg-red-400 hover:text-white rounded-md items-center ease-in duration-200"></i>
                    </a>
                  </div>
              </div>
                <?php }}}?>
                
                <?php if($_SESSION['more'] == 1 || !empty($_GET)){ ?>

                <?php } else {?>
                    <input type="submit" name="submit" class="grid hover:mx-3 py-3 bg-orange-500 lg:col-span-3 rounded-md cursor-pointer hover:bg-black text-white ease-in duration-200" value="Больше">
                <?php } ?>
                </div>
              </div>
            </div>