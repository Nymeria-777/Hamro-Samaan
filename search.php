<?php require('header.php');
$str = mysqli_real_escape_string($con, $_GET['str']);
if ($str != '') {
    $get_product = get_product($con, '', '', '', $str);
} else {
?>
<script>
    window.location.href = "index.php";
</script>
<?php } ?>

<div class="small-container">
    <?php if (count($get_product) > 0) { ?>

    
    
                <div class='abcd' style=''>
                    
                    <h1>Searched results</h1>
                    
                
                </div>
            
    
        
   
    <div class="row">
        <?php
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

    </div>

  
    <?php } else {
        echo "

        <div class='row'>
                <div class='abcd' style='margin-top:80px;'>
                    
                    <h1>Sorry! <br>No result found  &#128532</h1>
                    
                
                </div>
            
    
        </div>
    ";
    } ?>

</div>

<?php require('footer.php'); ?>