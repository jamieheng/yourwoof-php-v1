<div class="body-user" >
<style>
    .body-user{
      padding-right: 5rem;
      width: 100%;
    }
    
  </style>
  <h2>All Users</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th class="text-center">Username </th>
        <th class="text-center">Email</th>
        <th class="text-center">User Type</th>
        <!-- <th class="text-center">Joining Date</th> -->
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from register";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["firstname"]?> <?=$row["lastname"]?></td>
      <td><?=$row["email"]?></td>
      <td><?=$row["user_type"]?></td>
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
  </table>