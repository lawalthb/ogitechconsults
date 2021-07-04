<?php include '../connection.php';?>
<div id="add_pay_modal" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('add_pay_modal').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">Add Vendor Payment</h2>
      <p>Payment for: <b id="v_name"></b> </p>
      <form action="stock_add_payment_modal.php" method="post"  >
      <div class="w3-row">

      

         
          

          

          <div class="w3-half w3-container w3-margin-bottom" >
              Amount<input class="w3-input w3-border" type="number" id="amount" value="0"  name="amount"  required >
              <input  type="hidden" id="v_id"  name="vendor_id"   >
          </div>
         

          <div class="w3-half w3-container w3-margin-bottom" >
              Date: <input class="w3-input w3-border" type="date"  name="date" value="<?=date(Y-m-d)?>" >
          </div>
          <div class="w3-full w3-container w3-margin-bottom" >
              Comment: <textarea class="w3-input w3-border" name="comment"  ></textarea>
          </div>


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



if (isset($_POST["vendor_id"])) {
  
  $vendor = trim($_POST["vendor_id"]);
  $amount = trim($_POST["amount"]);
  
  $comment = trim($_POST["comment"]);
  $date = trim($_POST["date"]);
 
  $sql_pay ="INSERT INTO `payment_tb` (`payment_id`, `vendor_id`, `amount_in`, `amount_out`, `amount_balance`, `reg_date`, `cmment`, `date`) 
 VALUES (NULL, '$vendor', '0', '$amount', '$amount', CURRENT_TIMESTAMP, '$comment', '$date')";

if (mysqli_query($conn, $sql_pay)){
 
?>
<script>
window.location.href = "vendors.php?msg=suc";
</script>
  <?php


}
}


?>
