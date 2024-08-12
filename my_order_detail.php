<?php
require('top.php');
$order_id = get_safe_value($con, $_GET['id']);
?>
<div class="wishlist-area ptb--100 bg__white">
    <div class="container_next">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="wishlist-content">
                    <form action="#">
                        <div class="wishlist-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                  
                                        <th class="product-thumbnail">Product Name</th>
                                        <th class="product-name"><span class="nobr">Product Image</span></th>
                                        <th class="product-price"><span class="nobr"> QTY </span></th>
                                        <th class="product-stock-stauts"><span class="nobr">Price</span></th>
                                        <th class="product-stock-stauts"><span class="nobr">Total Price</span></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $uid = $_SESSION['USER_ID'];
                                    $res = mysqli_query($con, "select distinct(order_detail.id),
                                order_detail.*,product.name,product.image from order_detail,product,`order`  where order_detail.order_id='$order_id' and `order`.user_id='$uid' and 
                                order_detail.product_id=product.id");
                                    $total_price = 0;
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $id = $row['id'];
                                        $total_price = $total_price + ($row['qty'] * $row['price']);
                                    ?>

                                    <tr>
                                 
                                        <td class="product-add-to-cart">
                                            <a href="myorder.php?id=<?php echo $row['id'] ?>">
                                                <?php echo $row['name'] ?>
                                            </a>
                                        </td>
                                           
                                        <td class="product-name"><a href="product.php?id=<?php echo $row['product_id']?>">
                                                <img src="<?php echo 'media/product/' . $row['image'] ?>" width="50%"
                                                    id="ProductImg">
                                            </a></td>
                                        <td class="product-name">
                                                <?php echo $row['qty'] ?>

                                            </td>
                                        <td class="product-name">
                                                <?php echo $row['price'] ?>
                                            </td>
                                        <td class="product-name">
                                                <?php echo $row['qty'] * $row['price'] ?>
                                           </td>


                                    </tr>
                                    <?php } ?>
                                    <tr>

                                        <td colspan="3">


                                            </td>
                                        <td class="product-name">
                                                <b>Total Price</b>
                                            </td>
                                        <td class="product-name">
                                                <?php echo $total_price ?>
                                          </td>


                                    </tr>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('footer.php'); ?>