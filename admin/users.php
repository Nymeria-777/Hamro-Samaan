<?php
require('top.php');

if(isset($_GET['type']) && $_GET['type']!=''){
   $type=get_safe_value($con,$_GET['type']);
   
   if($type=='delete')
   {
      $id=get_safe_value($con,$_GET['id']);
      $delete_sql="delete from users where id='$id'";
      mysqli_query($con,$delete_sql);
   }
}



$sql="select * from users order by id desc";
$res=mysqli_query($con,$sql);
?>
  <div class="content pb-0">
   <div class="orders">
      <div class="row">
      <div class="col-sm-1"></div>
         <div class="col-md-10">
            <div class="card">
               <div class="card-body">  
              <h1 class="grid_title">Our Users</h1>
			  <div class="row grid_box">
				
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th width="10%">S.No #</th>
                            <th width="12%">Name</th>
                            <th width="12%">Email</th>
							<th width="12%">Mobile</th>
							
                            <th width="15%">Added On</th>
                            <th width="14%"></th>
                            <th width="14%"></th>
							
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(mysqli_num_rows($res)>0){
						$i=1;
						while($row=mysqli_fetch_assoc($res)){
						?>
						<tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $row['name']?></td>
							<td><?php echo $row['email']?></td>
							<td><?php echo $row['mobile']?></td>
						
							<td>
							<?php 
							$dateStr=strtotime($row['added_on']);
							echo date('d-m-Y',$dateStr);
							?>
							</td>
							<td>
								
                           
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
          </div>
          </div>
          
        
<?php include('footer.php');?>