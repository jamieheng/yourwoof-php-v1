<div id="ordersBtn" >
  <h2>Order Details</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>NO</th>
        <th>Pet ID</th>
        <th>Fullname</th>
        <th>Phone number</th>
        <th>Email</th>
        <th>Address</th>
        <th>Delivery Type</th>
        <th>Order Status</th>
     </tr>
    </thead>
     <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from pet_order";
      $result=$conn-> query($sql);
      
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
       <tr>
          <td><?=$row["order_id"]?></td>
        
          <td><?=$row["pet_id"]?></td>
          <td><?=$row["fullname"]?></td>
          <td><?=$row["phone_number"]?></td>
          <td><?=$row["email"]?></td>
          <td><?=$row["home_address"]?></td>
          <td><?=$row["delivery_type"]?></td>
          <td>Pending...</td>
        
              
        <!-- <td><a class="btn btn-primary openPopup" data-href="./adminView/viewEachOrder.php?orderID=<?=$row['order_id']?>" href="javascript:void(0);">View</a></td> -->
        </tr>
    <?php
            
        }
      }
    ?>
     
  </table>
   
</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Order Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="order-view-modal modal-body">
        
        </div>
      </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
  </div>
<script>
     //for view order modal  
    $(document).ready(function(){
      $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
    
        $('.order-view-modal').load(dataURL,function(){
          $('#viewModal').modal({show:true});
        });
      });
    });
 </script>