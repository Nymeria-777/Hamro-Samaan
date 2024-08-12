<?php 
ob_start();
require('header.php');
if(isset($_GET['id'])){
	$product_id=mysqli_real_escape_string($con,$_GET['id']);
	if($product_id>0){
		$get_product=get_product($con,'','',$product_id);
	}else{
		?>
		<script>
		window.location.href='index.php';
		</script>
		<?php
	}
	
	$resMultipleImages=mysqli_query($con,"select product_images from product_images where product_id='$product_id'");
	$multipleImages=[];
	if(mysqli_num_rows($resMultipleImages)>0){
		while($rowMultipleImages=mysqli_fetch_assoc($resMultipleImages)){
			$multipleImages[]=$rowMultipleImages['product_images'];
		}
	}
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}



if (isset($_POST['review_submit'])) {
    $rating = get_safe_value($con, $_POST['rating']);
    $review = get_safe_value($con, $_POST['review']);

    $added_on = date('Y-m-d h:i:s');
    mysqli_query($con, "insert into product_review(product_id,user_id,rating,review,status,added_on) values('$product_id','" . $_SESSION['USER_ID'] . "','$rating','$review','1','$added_on')");
?>
<script>
    window.location.href = "product.php?id=<?php echo $product_id ?>";
</script>
<?php

    die();
}


$product_review_res = mysqli_query($con, "select users.name,product_review.id,product_review.rating,product_review.review,product_review.added_on from users,product_review where product_review.status=1 and product_review.user_id=users.id and product_review.product_id='$product_id' order by product_review.added_on desc");

?>

<?php
    include("sidebar.php");
?>

<!---single product details--->
<div class="small-container single-product">
            <div class="row">
                <div class="col-2">
                <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>" width="426px" height="417px">
                                        </div>
<hr style="width:75%">
                    <div class="small-img-row">
                        
                        
										<?php if(isset($multipleImages[0])){?>
										<div id="multiple_images">
                                         
                                        
											<?php
											foreach($multipleImages as $list){
                                                
			echo "<img src='".PRODUCT_MULTIPLE_IMAGE_SITE_PATH.$list."' onclick=showMultipleImage('".PRODUCT_MULTIPLE_IMAGE_SITE_PATH.$list."')>";
											}
											?>
											
										</div>
										<?php } ?>  
                        </div>
                        
                    
                </div>
                <div class="col-2">
            <h1>
                <?php echo $get_product['0']['name'] ?>
            </h1>
            <h4>
                <?php
                 $productSoldQtyByProductId = productSoldQtyByProductId($con,$get_product['0']['id']);

                 $pending_qty=$get_product['0']['qty']-$productSoldQtyByProductId;

                 $cart_show='yes';
                    if($get_product['0']['qty']> $productSoldQtyByProductId){
                        $stock='In stock';
                        
                    }
                    else{
                        $stock='Not in stock';
                        $cart_show='';
                    }
               
               
               ?>
                Availability:&nbsp;<?php echo $stock; ?>
            </h4>
            <?php
               if($cart_show!=''){
                ?>    
            <h4>
              Quantity:
            
            <select id="qty">
            <?php
            
                   for($I=1; $I<=$pending_qty; $I++)
                        {
                            echo"<option> $I </option>";
                        }

                
                ?>
            </select>
                        </h4>
            <?php }?>   
            <h4>
              Price:  Rs
                <?php echo $get_product['0']['price'] ?>
            </h4>
            
               <?php
               if($cart_show!=''){
                ?>    
            <a href="javascript:void(0)" class="btn" onclick="manage_cart('<?php echo $get_product['0']['id'] ?>','add')">Add to Cart</a>
            <a href="javascript:void(0)" class=" buy_now" onclick="manage_cart('<?php echo $get_product['0']['id'] ?>','add','yes')">Buy Now</a>
            <?php }?>
            
            <h3>Product Details</h3>
            <h>
                <?php echo $get_product['0']['short_desc'] ?>
            </h>
            </p>
        </div>
    </div>
</div>
                
<div class="abcd">
        <h2>
            Our Products Reviews
        </h2>
    </div>  
<div class="small-container single-product">
    
    <?php
    if (mysqli_num_rows($product_review_res) > 0) {

        while ($product_review_row = mysqli_fetch_assoc($product_review_res)) {
    ?>



    <hr>

    <header class="text-left">
        <div><span class="comment-rating">
                <i>
                    <?php echo $product_review_row['rating'] ?>
                </i>
            </span> (
            <?php echo $product_review_row['name'] ?>)
        </div>
        <time class="comment-date">

            <?php
            $added_on = strtotime($product_review_row['added_on']);
            echo date('d M Y', $added_on);
                            ?>



        </time>
        <div class="comment-post">
            <p>
                <?php echo $product_review_row['review'] ?>
            </p>
            <hr>
        </div>
    </header>






    <?php }
    } else {
        echo "<h class='submit_review_hint'>No review added</h><br/>";
    }
    ?>
</div>


<div class="small-container ">
    <h3>Enter your review</h3>

    <?php
    if (isset($_SESSION['USER_LOGIN'])) {
    ?>
    <div class="row" id="post-review-box">
        <div class="form-group">
            <form action="" method="post">
                <select class=" form-control" name="rating" required>
                    <option value="">Select Rating</option>
                    <option>Worst</option>
                    <option>Bad</option>
                    <option>Good</option>
                    <option>Very Good</option>
                    <option>Fantastic</option>
                </select> <br />
                <textarea class=" form-control" cols="50" id="new-review" name="review"
                    placeholder="Enter your review here..." rows="5"></textarea>
                <div class="text-right mt10">
                    <button class="btn btn-success btn-lg" type="submit" name="review_submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <?php } else {
        echo "<a href='login.php'><span class='btn'>Please login to submit your review</span></a>";
    }
    ?>
</div>
<div class="abcd">
        <h2>
            Our Related Products 
        </h2>
    </div>
<div class="small-container1">
<?php foreach ($get_product as $list) {
        ?>
        
        <?php } ?>
        
    
</div>
<div class="small-container">

    <div class="row">
        <?php

        $cat_id = $list['categories_id'];
        $get_product = get_product($con, '4', $cat_id);

        foreach ($get_product as $list1) {

        ?>
        <div class="product" id="prd">
            <a href="product.php?id=<?php echo $list['id'] ?>">
                <img src="<?php echo 'media/product/' . $list1['image'] ?>" height="200"></a>
                <div class="details">
                    <h2>
                        <?php echo $list1['name'] ?>
                    </h2><span><p>
                    Rs <?php echo $list1['price'] ?>

                    </p></span></h2>
                    <br>
                    <div class="price"></div>
                    
                    
                    <?php echo $list1['short_desc'] ?>
                    
                    
                    
                </div>      
        </div>  
        <?php } ?>

    </div>
    <p style="text-align:center; font-size:18px; font-weight:500"><a href="categories.php?id=<?php echo $list['categories_id'] ?>">View More</a></p>

</div>


<script type="text/javascript">
function manage_cart(pid,type,is_checkout){
	if(type=='update'){
		var qty=jQuery("#"+pid+"qty").val();
	}else{
		var qty=jQuery("#qty").val();
	}
	jQuery.ajax({
		url:'manage_cart.php',
		type:'post',
		data:'pid='+pid+'&qty='+qty+'&type='+type,
		success:function(result){
            
                if(type=='update' || type=='remove'){
                    window.location.href=window.location.href;
                }
			if(result=='not_avaliable'){
				alert('Qty not avaliable');	
			}
            else{
                alert('Product has been added to cart');
                window.location.href=window.location.href;
            }
            if(is_checkout=='yes'){
                window.location.href='checkout.php';
            }
		}	
	});	
}

function showMultipleImage(im){
				jQuery('#img-tab-1').html("<img src='"+im+"'width='426px' height='417px'/> ");
			}

</script>
<script>
			
			</script>	
<?php require('footer.php'); ?>