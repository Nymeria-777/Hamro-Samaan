<?php
require('top.php');



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
       $update_status="update product_review set status='$status' where id='$id'";
       mysqli_query($con,$update_status);
    }
    if($type=='delete')
    {
       $id=get_safe_value($con,$_GET['id']);
       $delete_sql="delete from product_review where id='$id'";
       mysqli_query($con,$delete_sql);
    }
 }

$sql="select * from product_review order by id desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
      <div class="col-xl-1"></div>
         <div class="col-md-9">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title">Users Reviews</h4>
                  
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                     <table class="table ">
                        <thead>
                           <tr>
                              <th class="serial">SN</th>
                              <th>ID</th>
                              <th>Rating</th>
                              <th>Review</th>
                              <th>Date</th>
                              <th>Status</th>
                              <th></th>

                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                           $i=1;
                           while($row=mysqli_fetch_assoc($res)){?>
                           <tr>
                              <td class="serial"><?php echo $i?></td>
                              <td><?php echo $row['id']?></td>
                              <td><?php echo $row['rating']?></td>
                              <td><?php echo $row['review']?></td>
                          
                           
                              <td><?php echo $row['added_on']?></td>
                              

                              <td>
                              <?php 
                                 if( $row['status']==1){
                                    echo "<a href='?type=status&operation=deactive&id=".$row['id']."' class='btn btn-primary'>Active</a>&nbsp";
                                 }
                                 else{
                                    echo "<a href='?type=status&operation=active&id=".$row['id']."' class='btn btn-primary'>Deactive</a>&nbsp";
                                 }
                                 echo "<a href='?type=delete&id=".$row['id']."' class='btn btn-danger'>Delete</a>&nbsp";
                                 
                                 ?>
                                
                              </td>
                           </tr>
                           <?php $i++;}?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php
require('footer.php');
?>