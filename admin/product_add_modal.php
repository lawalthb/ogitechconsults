<?php include '../connection.php';?>
<div id="add_modal" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('add_modal').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">Add product</h2>
      <p>Create New product</p>
      <div id="body">
        
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
          <select class="w3-select w3-border" name="vendor" id="pvendor_email"  required>

              <option value="" disabled selected >Select Vendor</option>
              <?php
$sql2 = "SELECT * FROM `vendors_tb`";
$result2 = mysqli_query($conn, $sql2);
mysqli_num_rows($result2);
while($row2 = $result2->fetch_assoc()) {
    echo "<option value='$row2[vendor_id]' email='$row2[email]'>".$row2["title"]." ".$row2["name"]."</option>";
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
 <div class="w3-half w3-container w3-margin-bottom w3-right " >
              <input class="w3-input w3-border" type="text" id="pvendor_email_set" value="vendor@ogitechconsults.com"  name="vendor_email" placeholder="Vendor's Email"  >
          </div>






      </div>
      <br />
      <button type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom"
               onclick="document.getElementById('viewcart').style.display='none'">Submit</button>
     </form>
</div>
    </div>
  </div>
</div>

<?php include '../connection.php';?>
<?php



if (isset($_POST["pname"])) {
  echo "<script>
  document.getElementById('body').style.display = 'none';
  </script>";
  $pname = trim($_POST["pname"]);
  $unit = trim($_POST["unit"]);
  $sell_rate = trim($_POST["sell_rate"]);
  $department = trim($_POST["department"]);

  $pur_rate = trim($_POST["pur_rate"]);
  $decs = trim($_POST["decs"]);
  $vendor = trim($_POST["vendor"]);
  $available_for = $_POST["available_for"];
  $level = $_POST["level"];
  $vendor_email = $_POST["vendor_email"];
  
$chk="";
foreach($available_for as $chk1)
   {
      $chk .= $chk1.",";
   }

  echo $sql = "INSERT INTO `products_tb` ( `product_name`, `unit`, `description`,  `department_id`,  `level`, `status`, `reg_date`,`image`,
  `vendor_id`, `sell_rate`, `purchase_rate`, `available_for`,`admin_id`, `vendor_email`)
  VALUES ( '$pname', '$unit', '$decs',  '$department' ,'$level' , '1', CURRENT_TIMESTAMP,'images_01.jpg',
  $vendor,'$sell_rate','$pur_rate' , '$chk', 1, '$vendor_email' )";

if (mysqli_query($conn, $sql)){

   // send mail to vendor 
   $last_id = mysqli_insert_id($conn);
  
  $button = "<button><a href=http://ogitechconsults.com/vendor/index.php?vendor_mail=".$vendor_email."&product_id=".$last_id." >View Stock Flow </a></button>";
  $product_link = "http://ogitechconsults.com/vendor/index.php?vendor_mail=".$vendor_email."&product_id=".$last_id;
  $headers = "From: consults@ogitechconsults.com\r\n";
  $headers .= "Reply-To: consults@ogitechconsults.com\r\n";
  
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $msg = "Greeting from OGITECH CONSULTS<br />Below is the product link for $pname  <br />".$button."<br /> ".$product_link ."<br /> Kindly click the link to have access and see the status of your product <br /> <br /> Thanks ";

   // use wordwrap() if lines are longer than 70 characters
   $msg = wordwrap($msg,70);

   // send email
   mail($vendor_email,"NEW PRODUCT LINK - OGITECH CONSULTS",$msg, $headers);
?>
<script>
window.location.href = "products.php?msg=suc";
</script>
  <?php


}
}


?>

<script>
$(document).ready(function(){
$("#pvendor_email").change(function(){
       
        $("#pvendor_email_set").val($("#pvendor_email option:selected").attr("email"));
       

      
      });

    });

    </script>