<?php 
include('top.php');
$msg="";
$name="";
$mobile="";
$password="";
$id="";

if(isset($_GET['id']) && $_GET['id']>0){
	$id=($_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from delivery_boy where id='$id'"));
	$name=$row['name'];
	$password=$row['password'];
	$mobile=$row['mobile'];
}

if(isset($_POST['submit'])){
	$name=($_POST['name']);
	$password=($_POST['password']);
	$mobile=($_POST['mobile']);
	$added_on=date('Y-m-d h:i:s');
	
	if($id==''){
		$sql="select * from delivery_boy where mobile='$mobile'";
	}else{
		$sql="select * from delivery_boy where mobile='$mobile' and id!='$id'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="Provided number delivery boy already added";
	}else{
		if($id==''){
			
			mysqli_query($con,"insert into delivery_boy(name,password,mobile,status,added_on) values('$name','$password','$mobile',1,'$added_on')");
		}else{
			mysqli_query($con,"update delivery_boy set name='$name', password='$password' , mobile='$mobile' where id='$id'");
		}
		
		die();
	}
}
?>
<div class="row">
			<h1 class="grid_title ml10 ml15" style="    margin-left: 30px; margin-top:30px; margin-bottom:30px; ">Manage Delivery Boy</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" id="name" class="form-control" placeholder="name" name="name" required value="<?php echo $name?>">
                    </div>
					<div class="form-group">
                      <label for="exampleInputName1">Mobile</label>
                      <input type="telephone" id="mobile" class="form-control" placeholder="mobile" name="mobile" required value="<?php echo $mobile?>">
					  <div class="error mt8" style="color:red;font-weight:800;"><?php echo $msg?></div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Password</label>
                      <input type="password" required id="password" class="form-control" placeholder="Password" name="password"  value="<?php echo $password?>">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2" name="submit" onclick="user_register()">Submit</button>
                  </form>
                </div>
              </div>
            </div>
            
		 </div>
        
<?php include('footer.php');?>


<script type="text/javascript">
 
    function user_register(){
        var name=jQuery("#name").val();
       
        var mobile=jQuery("#mobile").val();
        var password=jQuery("#password").val();
   
        if(name==""){
            alert('please enter name');
        }
        
        else if(mobile=="" || isNaN(mobile)){
            alert('please enter mobile');
        }
        else if(password==""){
            alert('please enter password');
        }
        
        
    }
 </script>