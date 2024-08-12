<!-- Message From Customer-->

<?php
$sql="select * from contact_us ";
$res=mysqli_query($con,$sql);

?>
<div class="col-xl-4 col-lg-5 ">
      <div class="card">
        <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-light">Message From Customer</h6>
        </div>
        <div>
         
          <div class="customer-message align-items-center" style="margin-left: 25px;">
          <?php if(mysqli_num_rows($res)>0){
						$i=1;
						while($row=mysqli_fetch_assoc($res)){
						?>
						<tr>
            
              <div class="text-truncate message-title"><td><?php echo $row['comment']?></td>
              </div>
             
              <div class="small text-gray-500 message-time font-weight-bold"> <td><?php echo $row['name']?></td> · <td><?php echo $row['added_on']?></td></div>
            
          </div>
          <div class="text-truncate message-title"  style="margin-left: 25px; ">
          <?php 
						$i++;
						} }?>
            </div>
          <div class="card-footer text-center">
            <a class="m-0 small text-primary card-link" href="#">View More <i
                class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>