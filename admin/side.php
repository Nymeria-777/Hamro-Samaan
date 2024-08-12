<?php 

$sql="select product.*,categories.categories from product,categories where
 product.categories_id=categories.id order by product.id LIMIT 5";
$res=mysqli_query($con,$sql);
?>
<div class="col-xl-4 col-lg-5">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Latest Products</h6>
                  
                </div>
                <?php
                
                while($row=mysqli_fetch_assoc($res)){?>
									

                                    <div class="card-body" style="MARGIN-BOTTOM: -30px;" >
                 
                  
                  
                 
                  <div class="mb-3" >
                    <div class="small text-gray-800"><?php echo $row['name']?>
                      <div class="small float-right"><b> <?php

$productSoldQtyByProductId=productSoldQtyByProductId($con,$row['id']);
$pending_qty= $row['qty']-$productSoldQtyByProductId;
                                 ?>
                                    <?php echo $pending_qty ?> of <?php echo $row['qty']?>   Items</b></div>
                    </div>

                    
                  </div>
                </div>
										
										
										
									
									<?php } ?>

                
                <div class="card-footer text-center">
                  <a class="m-0 small text-primary card-link" href="product.php">View More <i
                      class="fas fa-chevron-right"></i></a>
                </div>
              </div>
            </div>