<?php

   $sql_check="SELECT id, name, payment_type,payment_status,added_on FROM `order` LIMIT 5;";
   $res_check=mysqli_query($con,$sql_check);

    
?>

<div class="col-xl-8 col-lg-7 mb-4">
      <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Invoice</h6>
          <a class="m-0 float-right btn btn-danger btn-sm" href="order_master.php">View More <i
              class="fas fa-chevron-right"></i></a>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
              <th>Id</th>
             <th>Name</th>
                
                <th></th>
                <th>Type</th>
                <th>Status</th>
                <th>Added On</th>
                
              </tr>
            </thead>
            <tbody>
                        <?php if(mysqli_num_rows($res_check)>0){
						$i=1;
						while($row=mysqli_fetch_assoc($res_check)){
						?>
						<tr>
                            <td>
								<div class="div_order_id">
									<a href="#"><?php echo $row['id']?></a>
								</div>
							</td>
                            <td>
								<p><?php echo $row['name']?></p>
								
							<td>
								
							
						
							<td><?php echo $row['payment_type']?></td>
							<td>
								<div class="payment_status payment_status_<?php echo $row['payment_status']?>"><?php echo ucfirst($row['payment_status'])?></div>
							</td>
							<td><?php echo $row['added_on']?></td>
							<td>
							
							</td>
							
                        </tr>
                        <?php 
						$i++;
						} }?>
              <tr>  </tbody>
          </table>
        </div>
        <div class="card-footer"></div>
      </div>
    </div>