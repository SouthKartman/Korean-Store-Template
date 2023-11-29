<?php
                $query = "SELECT * FROM `products`";
                $result = mysqli_query($db, $query);
                foreach($result as $row){
                    if($row['id'] < 5){
            ?>
              <div class="flex flex-col items-center border-solid border-2 border-gray-200 rounded-md px-5">
              <a href="../../php/product.php?id=<?php echo $row['id'];?>">
                  <div class="flex justify-center py-5">
                    <img class="object-scale-down h-48 w-48" src="<?php echo $row['img']; ?>">
                  </div>
                  </a>
                  <div>
                    <p class="font-bold text-lg line-clamp-1"><?php echo $row['name']; ?></p>
                    <h5 class="line-clamp-1"><?php echo $row['descr']; ?></h5>
                    <h5><?php echo $row['price'];?> ₽</h5>
                    <div class="flex w-100 py-4 gap-5 items-center justify-start">
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
                  
              </div>
              <?php }elseif($row['id'] <= 9){?>
            <div class="flex flex-col items-center border-solid border-2 border-gray-200 rounded-md px-5 hidden">
                <a href="../../php/product.php?id=<?php echo $row['id'];?>" class="flex flex-col">
                  <div class="flex justify-center py-5">
                    <img class="flex object-scale-down h-48 w-48" src="<?php echo $row['img']; ?>">
                  </div>
                </a>
                  <div>
                    <p class="font-bold text-lg line-clamp-1"><?php echo $row['name']; ?></p>
                    <h5 class="line-clamp-1"><?php echo $row['descr']; ?></h5>
                    <h5><?php echo $row['price'];?> ₽</h5>
                    <div class="flex w-100 py-4 gap-5 items-center justify-start">
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
                  
              </div>
                <?php }else{
                    
                }} ?>
                </div>
              </div>
            </div>