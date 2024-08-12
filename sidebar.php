<div class="cat">
        
          <strong>
            <ul class="main__menu">
                                        <li class="drop" style="text-decoration:dotted; font-size:18px">Our Categories:</li>
                                        <?php
										foreach($cat_arr as $list){
											?>
											<li class="drop"><a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a>
                        <?php
                        $cat_id=$list['id'];
                        $sub_cat_res=mysqli_query($con,"select * from sub_categories where status='1' and categories_id='$cat_id'");
                        if(mysqli_num_rows($sub_cat_res)>0){
                        ?>
											
											  <ul class="dropdown">
                            <?php
                            while($sub_cat_rows=mysqli_fetch_assoc($sub_cat_res)){
                              echo '<li><a href="categories.php?id='.$list['id'].'&sub_categories='.$sub_cat_rows['id'].'">'.$sub_cat_rows['sub_categories'].'</a></li>
                            ';
                            }
                            ?>
												</ul>
												<?php } ?>
											</li>
											<?php
										}
										?>
            </ul>

          </strong>
        
    </div>