<?php include '../connection.php';?>
<div id="add_modal" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('add_modal').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">Add product</h2>
      <p>Create New product</p>
      <form action="product_add_modal.php" method="post"  >
      <div class="w3-row">



          <div class="w3-half w3-container w3-margin-bottom">
              <input class="w3-input w3-border" type="text" name="pname" autofocus placeholder="Enter Product Name" required>
          </div>

          <div class="w3-half w3-container w3-margin-bottom">
          <select class="w3-select w3-border" name="unit"  required>

              <option value="" disabled selected>Select Unit</option>
              <option value="pcs">pcs</option>
              <option value="no" selected>no</option>
              <option value="kg">kg</option>
              <option value="box">box</option>
          </select>
          </div>
          <div class="w3-half w3-container w3-margin-bottom" >
              <input class="w3-input w3-border" type="number"  name="sell_rate" placeholder="Enter Selling Rate"  required >
          </div>

          <div class="w3-half w3-container w3-margin-bottom" >
              <input class="w3-input w3-border" type="number"  name="pur_rate" placeholder="Enter Purchase Rate" required >
          </div>

          <div class="w3-half w3-container w3-margin-bottom" >
              <input class="w3-input w3-border" type="text"  name="decs" placeholder="Enter product Description"  >
          </div>






          <div class="w3-half w3-container w3-margin-bottom">
          <select class="w3-select w3-border" name="department"  required>

              <option value="" disabled selected>Select Department</option>
              <?php
$sql2 = "SELECT * FROM `departments_tb`";
$result2 = mysqli_query($conn, $sql2);
mysqli_num_rows($result2);
while($row2 = $result2->fetch_assoc()) {
    echo "<option value='$row2[department_id]'>".$row2["name"]."</option>";
  }
              ?>
          </select>
          </div>

          <div class="w3-half w3-container w3-margin-bottom">
          <select class="w3-select w3-border" name="vendor"  required>

              <option value="" disabled selected>Select Vendor</option>
              <?php
$sql2 = "SELECT * FROM `vendors_tb`";
$result2 = mysqli_query($conn, $sql2);
mysqli_num_rows($result2);
while($row2 = $result2->fetch_assoc()) {
    echo "<option value='$row2[vendor_id]'>".$row2["title"]." ".$row2["name"]."</option>";
  }
              ?>
          </select>

          <select class="w3-select w3-border" name="level"  required>

          <option value="ND1">ND 1</option>
              <option value="ND2">ND 2</option>
              <option value="HND1">HND 1</option>
              <option value="HND2">HND 2</option>
              <option value="ND3">ND 3</option>
              <option value="HND3">HND 3</option>
          </select>
          </div>





          <div class="w3-half w3-container w3-margin-bottom" >

            <select class="w3-select w3-border" name="available_for[]" multiple >

              <option value="" disabled selected>Select Multiple Department [Hold Ctrl to select mult]</option>
              <?php
$sql2 = "SELECT * FROM `departments_tb` ORDER BY `departments_tb`.`name` ASC";
$result2 = mysqli_query($conn, $sql2);
mysqli_num_rows($result2);
while($row2 = $result2->fetch_assoc()) {
    echo "<option value='$row2[department_id]'>".$row2["name"]."</option>";
  }
              ?>
          </select>


          </div>
<!--  <div class="w3-half w3-container w3-margin-bottom w3-right " >
              <input class="w3-input w3-border" type="file"  name="image" placeholder="Choose Image"  >
          </div> -->






      </div>
      <br />
      <button type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom"
               onclick="document.getElementById('viewcart').style.display='none'">Submit</button>
     </form>

    </div>
  </div>
</div>

<?php include '../connection.php';?>
<?php



if (isset($_POST["pname"])) {
  $pname = trim($_POST["pname"]);
  $unit = trim($_POST["unit"]);
  $sell_rate = trim($_POST["sell_rate"]);
  $department = trim($_POST["department"]);

  $pur_rate = trim($_POST["pur_rate"]);
  $decs = trim($_POST["decs"]);
  $vendor = trim($_POST["vendor"]);
  $available_for = $_POST["available_for"];
  $level = $_POST["level"];

$chk="";
foreach($available_for as $chk1)
   {
      $chk .= $chk1.",";
   }

  echo $sql = "INSERT INTO `products_tb` ( `product_name`, `unit`, `description`,  `department_id`,  `level`, `status`, `reg_date`,`image`,
  `vendor_id`, `sell_rate`, `purchase_rate`, `available_for`,`admin_id`)
  VALUES ( '$pname', '$unit', '$decs',  '$department' ,'$level' , '1', CURRENT_TIMESTAMP,'images_01.jpg',
  $vendor,'$sell_rate','$pur_rate' , '$chk', 1 )";

if (mysqli_query($conn, $sql)){

?>
<script>
window.location.href = "products.php?msg=suc";
</script>
  <?php


}
}


?>
