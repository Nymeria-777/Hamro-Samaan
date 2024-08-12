<div class="abcd">
        <h2>
            Our Best Seller
        </h2>
    </div>
<div class="small-container">
    
    <div class="row">
    <?php
          $get_product = get_product($con, 4, '', '', '', '', 'yes');
        foreach ($get_product as $list) {
        ?>
        <div class="product" id="prd">
            <a href="product.php?id=<?php echo $list['id'] ?>">
                <img src="<?php echo 'media/product/' . $list['image'] ?>" height="200"></a>
                <div class="details">
                    <h2>
                        <?php echo $list['name'] ?>
                    </h2><span><p>
                    Rs <?php echo $list['price'] ?>

                    </p></span></h2>
                    <br>
                    <div class="price"></div>
                    
                    
                    <?php echo $list['short_desc'] ?>
                    
                    
                    
                </div>      
        </div>  
        <?php } ?>

    </div>

</div>