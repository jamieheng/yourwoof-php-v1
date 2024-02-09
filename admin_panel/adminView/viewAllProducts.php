
<div class="body-product">
  <style>
    .body-product{
      padding-right: 5rem;
      width: 100%;
      
    }
  </style>
  <h2>Pet Lists</h2>
  <table class="table " >
    <thead>
      <tr>
        
        <th class="text-center" >No.</th>
        <th class="text-center" >Pet Image</th>
        <th class="text-center" >Pet Name</th>
        <th class="text-center" >Pet Age</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th class="text-center" >Pet Description</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th class="text-center" >Category Name</th>
        <th class="text-center" >Pet Breed</th>
        <th class="text-center" >Gender</th>
        <th class="text-center" >Status</th>
        <th colspan ="3" class="text-center" >Action</th>
        <th></th>
        

      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from product, category WHERE product.category_id=category.category_id";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><img style="height: 130px; width:130px" src='uploads/<?=$row["product_image"]?>'></td>
      <td><?=$row["product_name"]?></td>
      <td><?=$row["age"]?></td>
      <td colspan = "10"><?=$row["product_desc"]?></td> 
           
      <td><?=$row["category_name"]?></td> 
      <td><?=$row["breed"]?></td>
      <td><?=$row["gender"]?></td>
      <td><?=$row["pet_status"]?></td>

      <td><button class="btn btn-primary" style="height:40px" onclick="itemEditForm('<?=$row['product_id']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="itemDelete('<?=$row['product_id']?>')">Delete</button></td>
      
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Pet
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Pet</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  action="controller/addItemController.php" enctype='multipart/form-data'  method="POST">
            <div class="form-group">
              <label for="name">Pet Name:</label>
              <input type="text" class="form-control" name="p_name" id="p_name" required>
            </div>
            <div class="form-group">
              <label for="age">Pet Age:</label>
              <input type="text" class="form-control" name="p_age" id="p_age" required>
            </div>
            <div class="form-group">
              <label for="qty">Pet Description:</label>
              <input type="text" class="form-control" name="p_desc" id="p_desc" required>
            </div>

            <div class="form-group">
              <label>Pet Category:</label>
              <select name="category" id="category" >
                <option disabled selected>Select category</option>
                <?php

                  $sql="SELECT * from category";
                  $result = $conn-> query($sql);

                  if ($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                      echo"<option value='".$row['category_id']."'>".$row['category_name'] ."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="breed">Pet Breed:</label>
              <input type="text" class="form-control" name="p_breed" id="p_breed" required>
            </div>
            <div class="form-group">
              <label for="gender">Pet Gender:</label>
              <input type="text" class="form-control" name="p_gender" id="p_gender" required>
            </div>
            <div class="form-group">
              <label for="status">Status:</label>
              <input type="text" class="form-control" name="p_status" id="p_status">
            </div>
            <div class="form-group">
                <label for="file">Choose Image:</label>
                <input type="file" class="form-control-file" name="file" id="file">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" id="upload" style="height:40px">Add Item</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  
</div>
   