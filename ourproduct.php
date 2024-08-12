<?php 

    $active='Products';
    include("header.php");

?>
<div class="up">
            <?php
                include("sidebar.php");
            ?>  
        </div>

        <div class="abcd" id="productts">
        <h2>
            Our  Products
        </h2>
      
    </div>
   
   
               
           
           <div class="small-container"><!-- col-md-9 Begin -->
             
             
               
               <div class="row"><!-- row Begin -->
               
                   <?php 
                   
                        if(!isset($_GET['categories'])){
                            
                         if(!isset($_GET['sub_categories'])){
                            
                            $per_page=9; 
                             
                            if(isset($_GET['page'])){
                                
                                $page = $_GET['page'];
                                
                            }else{
                                
                                $page=1;
                                
                            }
                            
                            $start_from = ($page-1) * $per_page;
                             
                            $get_products = "select * from product where status=1 order by 1 DESC LIMIT $start_from,$per_page";
                             
                            $run_products = mysqli_query($con,$get_products);
                             
                            while($row_products=mysqli_fetch_array($run_products)){
                                
                                $id = $row_products['id'];
        
                                $title = $row_products['name'];

                                $price = $row_products['price'];

                                $img1 = $row_products['image'];

                                $short_desc = $row_products['short_desc'];
                                
                                echo "
                                
                                <div class='product' id='prd'>
                                <a href='product.php?id=$id'>
                                <img class='img-responsive' src='media/product/$img1' height='200'>
                <div class='details'>
                    <h2>
                    <a href='product.php?id=$id'> $title </a>
                    </h2><span><p>
                    Rs $price 

                    </p></span></h2>
                    <br>
                    <div class='price'></div>
                    
                    
                    $short_desc 
                    
                    
                    
                </div>      
        </div>    

                            <?php } ?>
                            
                        
                                
                                ";
                                
                        }
                        
                   ?>
               
               </div><!-- row Finish -->
               
               <center>
                
               <div class="pagination">
                   <ul><!-- pagination Begin -->
					 <?php
                             
                    $query = "select * from product";
                             
                    $result = mysqli_query($con,$query);
                             
                    $total_records = mysqli_num_rows($result);
                             
                    $total_pages = ceil($total_records / $per_page);
                             
                        echo "
                        
                            <li>
                            
                                <a href='ourproduct.php?page=1'> ".'First Page'." </a>
                            
                            </li>
                        
                        ";
                             
                        for($i=1; $i<=$total_pages; $i++){
                            
                              echo "
                        
                            <li>
                            
                                <a href='ourproduct.php?page=".$i."'> ".$i." </a>
                            
                            </li>
                        
                        ";  
                            
                        };
                             
                        echo "
                        
                            <li>
                            
                                <a href='ourproduct.php?page=$total_pages'> ".'Last Page'." </a>
                            
                            </li>
                        
                        ";
                             
					    	}
							
						}
					 
					 ?> 
                       
                   </ul>
                    </div><!-- pagination Finish -->
               </center>
                
               </div>
                        
     
   
   <?php 
    
    include("footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>