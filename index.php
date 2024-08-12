<?php require('top.php');
?>


<div class="small-container">


    <div class="row">
        <?php
        $get_product = get_product($con, 9);
        foreach ($get_product as $list) {
        ?>
        <div class="product" id="prd">
            <a href="product.php?id=<?php echo $list['id'] ?>">
                <img src="<?php echo 'media/product/' . $list['image'] ?>" height="200"></a>
                <div class="details">
                    <h2>
                    <a href="product.php?id=<?php echo $list['id'] ?>"><?php echo $list['name'] ?></a>
                    </h2><span><p>
                    Rs <?php echo $list['price'] ?>

                    </p></span></h2>
                    <br>
                    <div class="price"></div>
                    
                    
                    <?php echo $list['short_desc'] ?>
                    
                    
                    
                </div>      
        </div>  
        <?php } ?>
        <a href="ourproduct.php" style="font-size:22px; font-weight:700; text-decoration:underline;">View More</a>
    </div>
   
</div>

<?php
    include("bestseller.php");
?>
</div>
<!----offer-->


<?php require('footer.php'); ?>