<?php
require('top.php');

if(isset($_GET['type']) && $_GET['type']!=''){
   $type=get_safe_value($con,$_GET['type']);
   
   if($type=='delete')
   {
      $id=get_safe_value($con,$_GET['id']);
      $delete_sql="delete from contact_us where id='$id'";
      mysqli_query($con,$delete_sql);
   }
}



$sql="select * from contact_us order by id desc";
$res=mysqli_query($con,$sql);
?>
  <div class="card">
            <div class="card-body">
              <h1 class="grid_title">Contact Us</h1>
              <div class="row grid_box">
				
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th width="2%">S.No </th>
                            <th width="2%">Id</th>
                            <th width="19%">Name</th>
							<th width="22%">Email</th>
							<th width="10%">Mobile</th>
							<th width="19%">Message</th>
							<th width="15%">Date</th>
							<th width="14">Status</th>
                            
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
                              <td><?php echo $row['name']?></td>
                              <td><?php echo $row['email']?></td>
                              <td><?php echo $row['mobile']?></td>
                              <td><?php echo $row['comment']?></td>
                              <td><?php echo $row['added_on']?></td>
							  <td>
								<a href="?id=<?php echo $row['id']?>&type=delete"><label class="badge badge-danger delete_red hand_cursor">Delete</label></a>
							</td>
                           
                        </tr>
                        <?php 
						$i++;
						} } else { ?>
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