<?php 
require('top.php');

$categories="";
$msg="";



if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($con, $_GET['id']);
    $res = mysqli_query($con, "select * from categories where id='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $categories = $row['categories'];
    } else {
        header('location:category.php');
        die();
    }
}
if (isset($_POST['submit'])) {
    $categories = get_safe_value($con, $_POST['categories']);
    $res = mysqli_query($con, "select * from categories where categories='$categories'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($res);
            if ($id == $getData['id']) {
            } else {
                $msg = "categories already exists";
            }
        } else {
            $msg = "categories already exists";
        }
    }
    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $sql = "update categories set categories='$categories' where id='$id' ";
            mysqli_query($con, $sql);
        } else {
            $sql = "insert into categories(categories,status) values('$categories','1')";
            mysqli_query($con, $sql);
            
       
         
        }
        
        die();
        
        
    }
	
}

?>
<div class="row">
			<h1 class="grid_title ml10 ml15">Manage Category</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Categories</label>
                      <input type="text" name="categories" placeholder="Enter your categories name"
                                    class="form-control" require value="<?php echo $categories ?>">
					  
                   
                    
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
					<div class="error mt8"><?php echo $msg?></div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            
		 </div>
        
<?php include('footer.php');?>