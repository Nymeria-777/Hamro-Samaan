<?php 
include('top.php');


if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status')
	{
	   $operation=get_safe_value($con,$_GET['operation']);
	   $id=get_safe_value($con,$_GET['id']);
	   if($operation=='active')
	   {
		  $status='1';
	   }
	   else{
		  $status='0';
	   }
	   $update_status="update categories set status='$status' where id='$id'";
	   mysqli_query($con,$update_status);
	}
	if($type=='delete')
	{
	   $id=get_safe_value($con,$_GET['id']);
	   $delete_sql="delete from categories where id='$id'";
	   mysqli_query($con,$delete_sql);
	}
 }
 $sql="select * from categories order by categories asc";
 $res=mysqli_query($con,$sql);
 ?>
  <div class="card">
            <div class="card-body">
              <h1 class="grid_title">Our Categories</h1>
			  <a href="add_categories.php" class="add_link">Add New Category</a>
              <div class="row grid_box">
				
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th width="10%">S.No #</th>
                            <th width="20%">Category Id</th>
                            <th width="25%">Category Name</th>
                            <th width="25%">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(mysqli_num_rows($res)>0){
						$i=1;
						while($row=mysqli_fetch_assoc($res)){
						?>
						<tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $row['id']?></td>
							<td><?php echo $row['categories']?></td>
							<td>
                                 <?php 
                                 if( $row['status']==1){
                                    echo "<a href='?type=status&operation=deactive&id=".$row['id']."' class='btn btn-primary' >Active</a>&nbsp";
                                 }
                                 else{
                                    echo "<a href='?type=status&operation=active&id=".$row['id']."'class='btn btn-primary'>Deactive</a>&nbsp";
                                 }
                                 echo "<a href='?type=delete&id=".$row['id']."' class='btn btn-danger'>Delete</a>&nbsp";
                                 echo "<a href='add_categories.php?type=edit&id=".$row['id']."' class='btn btn-primary'>Edit</a>";
                                 ?>
                              </td>
                           </tr>
                           <?php $i++;} } else { ?>
						<tr>
							<td colspan="5">No data found</td>
						</tr>
						<?php } ?>
                      </tbody>
                    </table>
                  </div>
				</div>
              </div>
            </div>
          </div>
        
<?php include('footer.php');?>