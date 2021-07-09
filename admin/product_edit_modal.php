

<?php include '../connection.php';?>
<div id="edit_products_modal" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('edit_products_modal').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">Edit product</h2>
      <p >Editing <span id="edit_product_vname2"></span></p>
      
    
<p id="edit_response"></p>
      <form action="product_edit_modal.php" method="post" >
      <div class="w3-row">
      
          
         
          <div class="w3-half w3-container w3-margin-bottom">
              <input class="w3-input w3-border" type="text" id="edit_product_name" name="name" placeholder="Enter Item Name" required>
              <input class="w3-input w3-border" type="hidden" id="edit_product_id" name="product_id" required>
              <input class="w3-input w3-border" type="text" id="edit_product_purchase" placeholder="purchase rate"  name="purchase_rate" required>
              
              
          </div>

          <div class="w3-half w3-container w3-margin-bottom">
                      
          <input list="vend" id="vend2" name="vendor"  class="w3-select w3-border" require>
          <datalist id="vend">
           
              <?php
            $sql4 = "SELECT * FROM `vendors_tb` WHERE `status` = 1";
            $result4 = mysqli_query($conn, $sql4);
            mysqli_num_rows($result4);
            while($row4 = $result4->fetch_assoc()) {
            echo "<option value='$row4[name]-$row4[vendor_id]'>";
            }
              ?>

          </datalist>
          </input>
          <input class="w3-input w3-border" type="text" id="edit_product_sell" placeholder="sale rate"  name="sell_rate" required>
          </div>
          
          
          <div class="w3-half w3-container w3-margin-bottom" >
             
              <textarea class="w3-input w3-border" name="description" id="edit_product_description"></textarea>
          </div>

          

         

          <div class="w3-half w3-container w3-margin-bottom">
          <input list="dept" id="department" name="department"  class="w3-select w3-border" require>
          <datalist id="dept">
            

              <?php
            $sql3 = "SELECT * FROM `departments_tb` WHERE `status` = 1";
            $result3 = mysqli_query($conn, $sql3);
            mysqli_num_rows($result3);
            while($row3 = $result3->fetch_assoc()) {
            echo "<option value='$row3[name] -$row3[department_id]'>";
            }
              ?>

          </datalist>
          </input>
         

          
          </div>
          

          <div class="w3-half w3-container w3-margin-bottom">
          <select class="w3-select w3-border" id="status" name="status"  required>
              
              <option value="1"  selected>Activate</option>
              <option value="0"  >Deactivate</option>
             
          </select>

          
          </div>
          
 
      </div> 
      <br />
      <button type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom"
            >Submit</button>
     </form>

    </div>
  </div>
</div>


<?php 



$name = "";
$title = "";
$email = "";

if (isset($_POST["name"])) {
   $name = trim($_POST["name"]);
  $purchase_rate = trim($_POST["purchase_rate"]);
  
  $department = trim($_POST["department"]);

  $department = explode("-",$department);
  $department_id =  $department[1];

  $product_id = trim($_POST["product_id"]);
  $status = trim($_POST["status"]);
  $sell_rate = trim($_POST["sell_rate"]);
  $description = trim($_POST["description"]);
  $vendor = trim($_POST["vendor"]);
  $vendor = explode("-",$vendor);
  $vendor_id =  $vendor[1];
  
   $sql = "UPDATE `products_tb` SET `product_name` = '$name', `description` = '$description', `vendor_id` = '$vendor_id',
    `department_id` = '$department_id', `sell_rate` = '$sell_rate',
   `purchase_rate` = '$purchase_rate', `status` = '$status' WHERE `products_tb`.`product_id` = $product_id;";

if (mysqli_query($conn, $sql)){ 
   

   header('Location: products.php?msg=suc');
  exit;
 
   
}
}


?>