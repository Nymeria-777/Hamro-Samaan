<?php 
require('top.php');
$categories = '';
$msg = '';
$sub_categories = '';
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($con, $_GET['id']);
    $res = mysqli_query($con, "select * from sub_categories where id='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $sub_categories = $row['sub_categories'];
        $categories = $row['categories_id'];
    } else {
        header('location:sub_categories.php');
        die();
    }
}
if (isset($_POST['submit'])) {
    $sub_categories = get_safe_value($con, $_POST['sub_categories']);
    $categories = get_safe_value($con, $_POST['categories_id']);
    $res = mysqli_query($con, "select * from sub_categories where categories_id='$categories' and sub_categories='$sub_categories'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($res);
            if ($id == $getData['id']) {
            } else {
                $msg = "Sub Categories already exists";
            }
        } else {
            $msg = "Sub Categories already exists";
        }
    }
    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $sql = "update sub_categories set categories_id='$categories', sub_categories='$sub_categories' where id='$id' ";
            mysqli_query($con, $sql);
        } else {
            $sql = "insert into sub_categories(categories_id,sub_categories,status) values('$categories','$sub_categories','1')";
            mysqli_query($con, $sql);
        }
        
        die();
    }
}

?>
<div class="row">
			<h1 class="grid_title ml10 ml15">Add Sub-Categories</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <form method="post">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Categories</label>
                                <select name="categories_id" class=" form-control" required>
                                    <option value="">Select Categories </option>
                                        <?php
                                        $res = mysqli_query($con, "select * from categories where status = '1'" );

                                        while($row=mysqli_fetch_assoc($res))
                                        {
                                            if($row['id']==$categories){
                                                echo "<option value=".$row['id']."selected>".$row['categories']."</option>";
                                            }
                                            else{
                                            echo "<option value=".$row['id'].">".$row['categories']."</option>";}
                                        }
                                        ?>
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Sub Categories</label>
                                <input type="text" name="sub_categories" placeholder="Enter Sub-Categories" class="form-control"
                                    require value="<?php echo $sub_categories ?>">
                            </div>
                            <button name="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">Submit</span>
                            </button>
                            <div class="field_error">
                                <?php echo $msg ?>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
            
		 </div>
        
<?php include('footer.php');?>