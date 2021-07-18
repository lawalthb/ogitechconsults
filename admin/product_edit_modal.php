

<?php include '../connection.php';?>
<div id="edit_products_modal" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('edit_products_modal').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">Edit product</h2>
      <p >Editing <span id="edit_product_vname2"></span></p>
      
    
<p id="edit_response"></p>
<div id="body">
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

              <input list="level" id="edit_level" name="level"  class="w3-select w3-border" require>
             
              <datalist id="level"> 
              <option value="ND1">
              
              <option value="ND2">
              <option value="HND1">
              <option value="HND2">
              <option value="ND3">
              <option value="HND3">
              </datalist>
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
          
          <div class="w3-half w3-container w3-margin-bottom w3-right " >
              <input class="w3-input w3-border" type="text" id="edit_vend_email"   name="vendor_email" placeholder="Vendor's Email"  >
          </div>
      </div> 
      <br />
      <button type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom"
            >Submit</button>
     </form>
          </div>
    </div>
  </div>
</div>


<?php 



$name = "";
$title = "";
$email = "";

if (isset($_POST["name"])) {
  echo "<script>
  document.getElementById('body').style.display = 'none';
  </script>";
   $name = trim($_POST["name"]);
  $purchase_rate = trim($_POST["purchase_rate"]);
  
  $department = trim($_POST["department"]);

  $department = explode("-",$department);
  $department_id =  $department[1];

  $level = trim($_POST["level"]);
  $vendor_email = trim($_POST["vendor_email"]);
  
  $product_id = trim($_POST["product_id"]);
  $status = trim($_POST["status"]);
  $sell_rate = trim($_POST["sell_rate"]);
  $description = trim($_POST["description"]);
  $vendor = trim($_POST["vendor"]);
  $vendor = explode("-",$vendor);
  $vendor_id =  $vendor[1];
  
  
   $sql = "UPDATE `products_tb` SET `product_name` = '$name', `description` = '$description', `vendor_id` = '$vendor_id',
    `department_id` = '$department_id', `sell_rate` = '$sell_rate',
   `purchase_rate` = '$purchase_rate', `status` = '$status', `level` = '$level' , `vendor_email` = '$vendor_email' WHERE `products_tb`.`product_id` = $product_id;";

if (mysqli_query($conn, $sql)){ 
   
// send mail to vendor 
//$last_id = mysqli_insert_id($conn);
$button = "<button><a href=http://ogitechconsults.com/vendor/index.php?vendor_mail=".$vendor_email."&product_id=".$last_id." >View Stock Flow </a></button>";
$product_link = "http://ogitechconsults.com/vendor/index.php?mail_c=".$vendor_email."&product_id=".$product_id;
$headers = "From: consults@ogitechconsults.com\r\n";
    $headers .= "Reply-To: consults@ogitechconsults.com\r\n";
    
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

 $msg = "Greeting from OGITECH CONSULTS<br  >Below is the product link for $name  <br  > ".$button."<br /> ".$product_link ."<br  > Kindly click the link to have access and see the status of your product <br  > <br  > Thanks ";

 // use wordwrap() if lines are longer than 70 characters
 $msg = wordwrap($msg,70);

 // send email
 mail($vendor_email,"NEW PRODUCT LINK - OGITECH CONSULTS",$msg,$headers);


  ?>
  <script>
  window.location.href = "products.php?msg=suc";

  </script>
    <?php
  
 
   
}
}


?>