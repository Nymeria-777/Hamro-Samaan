<?php
require('top.php');
$name = '';
$categories_id = '';
$price = '';
$qty = '';
$image = '';
$short_desc = '';
$description = '';
$best_seller = '';
$msg = '';
$image_required = 'required';
$sub_categories_id='';
$multipleImageArr=[];


if(isset($_GET['pi']) && $_GET['pi']>0){
	$pi=get_safe_value($con,$_GET['pi']);
	$delete_sql="delete from product_images where id='$pi'";
	mysqli_query($con,$delete_sql);
}

if (isset($_GET['id']) && $_GET['id'] != '') {
    $image_required = '';
    $id = get_safe_value($con, $_GET['id']);
    $res = mysqli_query($con, "select * from product where id='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $categories_id = $row['categories_id'];
        $sub_categories_id = $row['sub_categories_id'];
        $name = $row['name'];
        $price = $row['price'];
        $qty = $row['qty'];
        $short_desc = $row['short_desc'];
        $description = $row['description'];
        $best_seller = $row['best_seller'];
        $image = $row['image'];

		$resMultipleImage=mysqli_query($con,"select id, product_images from product_images where product_id='$id'");

		if(mysqli_num_rows($resMultipleImage)>0){
			$jj=0;
			while($rowMultipleImage= mysqli_fetch_assoc($resMultipleImage)){
					$multipleImageArr[$jj]['product_images']=$rowMultipleImage['product_images'];
					$multipleImageArr[$jj]['id']=$rowMultipleImage['id'];
					$jj++;
			}
		}
       
    } else {
        header('location:product.php');
        die();
    }
}

if (isset($_POST['submit'])) {
    $categories_id = get_safe_value($con, $_POST['categories_id']);
    $sub_categories_id = get_safe_value($con, $_POST['sub_categories_id']);
    $name = get_safe_value($con, $_POST['name']);
    $price = get_safe_value($con, $_POST['price']);
    $qty = get_safe_value($con, $_POST['qty']);
    $short_desc = get_safe_value($con, $_POST['short_desc']);
    $description = get_safe_value($con, $_POST['description']);   
    $best_seller = get_safe_value($con, $_POST['best_seller']);
    $res = mysqli_query($con, "select * from product where name='$name'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($res);
            if ($id == $getData['id']) {
            } else {
                $msg = "product already exists";
            }
        } else {
            $msg = "product already exists";
        }
    }



    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            if ($_FILES['image']['name'] != '') {
                $image = rand(111111111, 99999999) . '_' . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], '../media/product/' . $image);
				$update_sql="update product set categories_id='$categories_id',name='$name',price='$price',qty='$qty',short_desc='$short_desc',description='$description',image='$image',best_seller='$best_seller',sub_categories_id='$sub_categories_id' where id='$id'";
            } else {
                $update_sql="update product set categories_id='$categories_id',name='$name',price='$price',qty='$qty',short_desc='$short_desc',description='$description',best_seller='$best_seller',sub_categories_id='$sub_categories_id' where id='$id'";
            }
            mysqli_query($con, $update_sql);
        } else {
            $image = rand(111111111, 99999999) . '_' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], '../media/product/' . $image);


            $sql = "insert into product(categories_id,name,price,qty,short_desc,description,status,image,best_seller,sub_categories_id) values('$categories_id','$name','$price','$qty','$short_desc','$description',1,'$image','$best_seller','$sub_categories_id')";
            mysqli_query($con, $sql);
			$id=mysqli_insert_id($con);
        }

			// Product Multiple Images Start 
			if (isset($_GET['id']) && $_GET['id'] != '') {
				foreach($_FILES['product_images']['name'] as $key =>$val){
					if($_FILES['product_images']['name'][$key]!=''){
						if(isset($_POST['product_images_id'][$key])){

							$image = rand(111111111, 99999999) . '_' . $_FILES['product_images']['name'][$key];
					move_uploaded_file($_FILES['product_images']['tmp_name'][$key], '../media/product_images/' . $image);

					mysqli_query($con,"update product_images='$image' where id='".$_POST['product_images_id'][$key]."'");

						}
						else{
							$image = rand(111111111, 99999999) . '_' . $_FILES['product_images']['name'][$key];
							move_uploaded_file($_FILES['product_images']['tmp_name'][$key], '../media/product_images/' . $image);

							mysqli_query($con,"insert into product_images(product_id,product_images)values('$id','$image')");
						}
					}
				}
			}
			else{
						if(isset($_FILES['product_images']['name'] )){
						foreach($_FILES['product_images']['name'] as $key =>$val){
							$image = rand(111111111, 99999999) . '_' . $_FILES['product_images']['name'][$key];
					move_uploaded_file($_FILES['product_images']['tmp_name'][$key], '../media/product_images/' . $image);

					mysqli_query($con,"insert into product_images(product_id,product_images)values('$id','$image')");

						}
					}
				}


				
				die();
    }
}

?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   <div class="form-group">
								<div class="row">
									<div class="col-lg-6">
										<label for="categories" class=" form-control-label">Categories</label>
										<select class="form-control" name="categories_id" id="categories_id" onchange="get_sub_cat('')" required>
											<option>Select Category</option>
											<?php
											$res=mysqli_query($con,"select id,categories from categories order by categories asc");
											while($row=mysqli_fetch_assoc($res)){
												if($row['id']==$categories_id){
													echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
												}else{
													echo "<option value=".$row['id'].">".$row['categories']."</option>";
												}
												
											}
											?>
										</select>
									</div>
									<div class="col-lg-6">
										<label for="categories" class=" form-control-label">Sub Categories</label>
										<select class="form-control" name="sub_categories_id" id="sub_categories_id">
											<option>Select Sub Category</option>
										</select>
									</div>
								</div>

									
								</div>
								
								
								
								<div class="form-group">
								
									<label for="categories" class=" form-control-label">Product Name</label>
									<input type="text" name="name" placeholder="Enter product name" class="form-control" required value="<?php echo $name?>">
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-lg-4">
											<label for="categories" class=" form-control-label">Best Seller</label>
											<select class="form-control" name="best_seller" required>
												<option value=''>Select</option>
												<?php
												if($best_seller==1){
													echo '<option value="1" selected>Yes</option>
														<option value="0">No</option>';
												}elseif($best_seller==0){
													echo '<option value="1">Yes</option>
														<option value="0" selected>No</option>';
												}else{
													echo '<option value="1">Yes</option>
														<option value="0">No</option>';
												}
												?>
											</select>
										</div>
										<div class="col-lg-4">
											<label for="categories" class=" form-control-label">Price</label>
											<input type="text" name="price" placeholder="Enter product price" class="form-control" required value="<?php echo $price?>">
										</div>
										<div class="col-lg-4">
											<label for="categories" class=" form-control-label">Qty</label>
											<input type="text" name="qty" placeholder="Enter qty" min="1" class="form-control" required value="<?php echo $qty?>" >
										</div>
									</div>
									
								</div>
								
								
								
								<div class="form-group">
									<div class="row"  id="image_box">
									  <div class="col-lg-10">
									   <label for="categories" class=" form-control-label">Image</label>
										<input type="file" name="image" class="form-control" <?php echo  $image_required?>>
										<?php
										if($image!=''){
echo "<a target='_blank' href='".PRODUCT_IMAGE_SITE_PATH.$image."'><img width='150px' src='".PRODUCT_IMAGE_SITE_PATH.$image."'/></a>";
										}
										?>
									  </div>
									  <div class="col-lg-2">
										<label for="categories" class=" form-control-label"></label>
										<button id="" type="button" class="btn btn-lg btn-info btn-block" onclick="add_more_images()">
											<span id="payment-button-amount">Add Image</span>
										</button>
									 </div>
									 
									 <?php
									 if(isset($multipleImageArr[0])){
foreach($multipleImageArr as $list){
	echo '<div class="col-lg-6" style="margin-top:20px;" id="add_image_box_'.$list['id'].'"><label for="categories" class=" form-control-label">Image</label><input type="file" name="product_images[]" class="form-control" ><a href="add_product.php?id='.$id.'&pi='.$list['id'].'" style="color:white;"><button type="button" class="btn btn-danger"><span id="payment-button-amount"><a href="add_product.php?id='.$id.'&pi='.$list['id'].'" style="color:white;">Remove</span></button></a>';
	echo "<a target='_blank' href='".PRODUCT_MULTIPLE_IMAGE_SITE_PATH.$list['product_images']."'><img width='150px' src='".PRODUCT_MULTIPLE_IMAGE_SITE_PATH.$list['product_images']."'/></a>";
	echo '<input type="hidden" name="product_images_id[]" value="'.$list['id'].'"/></div>';
	
}										 
									 }
									 ?>
									 
								  </div>
									 
								</div>
								
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Description</label>
									<textarea name="short_desc" placeholder="Enter product description" class="form-control" required><?php echo $short_desc?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Keywords</label>
									<textarea name="description" placeholder="Enter product searching keywords" required class="form-control"><?php echo $description?></textarea>
								</div>
								
								
								<div class="col-sm-2">
											
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   </div>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
		 
		 <script>
			function get_sub_cat(sub_cat_id){
				var categories_id=jQuery('#categories_id').val();
				jQuery.ajax({
					url:'get_sub_cat.php',
					type:'post',
					data:'categories_id='+categories_id+'&sub_cat_id='+sub_cat_id,
					success:function(result){
						jQuery('#sub_categories_id').html(result);
					}
				});
			}

			
			var total_image=1;
			function add_more_images(){
				total_image++;
				var html='<div class="col-lg-6" style="margin-top:20px;" id="add_image_box_'+total_image+'"><label for="categories" class=" form-control-label">Image</label><input type="file" name="product_images[]" class="form-control" required><button type="button" class=" col-lg-3 btn btn-lg btn-danger btn-block" onclick=remove_image("'+total_image+'")><span id="payment-button-amount">Remove</span></button></div>';
				jQuery('#image_box').append(html);
			}
			
			function remove_image(id){
				jQuery('#add_image_box_'+id).remove();
			}
		 </script>
         
		 <script>

<?php
if(isset($_GET['id'])){
?>
get_sub_cat('<?php echo $sub_categories_id?>');
<?php } ?>
</script>
<?php
require('footer.php');
?>