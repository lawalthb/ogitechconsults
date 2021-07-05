<?php include '../connection.php';?>
<div id="add_modal" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('add_modal').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">Add Stock</h2>
      <p>Update Stock</p>
      <form action="stock_add_modal.php" method="post"  >
      <div class="w3-row">

      <div class="w3-half w3-container w3-margin-bottom">
            Select Vendor:
            <input list="names" name="vendor" id="names2" class="w3-select w3-border">
          <datalist id="names">
            

              <?php
            $sql3 = "SELECT * FROM `vendors_tb`";
            $result3 = mysqli_query($conn, $sql3);
            mysqli_num_rows($result3);
            while($row3 = $result3->fetch_assoc()) {
            echo "<option value='$row3[name] -$row3[vendor_id]'>";
            }
              ?>

          </datalist>
          </input>

          </div>

          <div class="w3-half w3-container w3-margin-bottom">
            Select Vendor's Item:
            <span id="vendor_item">
          <select name="item"  class="w3-input w3-border" >
            <option disable >You need to select vendor name first </option>
            
          </select> 
          </span>

          </div>
          

          <div class="w3-half w3-container w3-margin-bottom">
          Quantity:  <input class="w3-input w3-border" type="number"  id="qty" name="qty"   required >

          </div>
          <div class="w3-half w3-container w3-margin-bottom" >
            Selling Rate:  <input class="w3-input w3-border" type="number"  id="sell_rate" name="sell_rate" value="0"  required >
          </div>

          <div class="w3-half w3-container w3-margin-bottom" >
              Purchase Rate<input class="w3-input w3-border" type="number" id="pur_rate" value="0"  name="pur_rate"  required >
          </div>
          <div class="w3-half w3-container w3-margin-bottom" >
              Total Amount<input class="w3-input w3-border" type="text" id="total_amt" value="0" name="total_amt"  readonly >
          </div>

          <div class="w3-half w3-container w3-margin-bottom" >
              Date: <input class="w3-input w3-border" type="date"  name="date" value="<?=date(Y-m-d)?>" >
          </div>
          <div class="w3-half w3-container w3-margin-bottom" >
              Comment: <input class="w3-input w3-border" type="text"  name="comment" value="No Comment" >
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



if (isset($_POST["item"])) {
  $item = trim($_POST["item"]);
  $vendor = trim($_POST["vendor"]);
  $sell_rate = trim($_POST["sell_rate"]);
  $qty = trim($_POST["qty"]);

  $pur_rate = trim($_POST["pur_rate"]);
  $comment = trim($_POST["comment"]);
  $date = trim($_POST["date"]);
  $total_amt = $_POST["total_amt"];

  
  $item_e = explode('-',$item);
 $item_id = $item_e[1];

 $vendor_e = explode('-',$vendor);
 $vendor_id = $vendor_e[1];


 $sql_pay ="INSERT INTO `payment_tb` (`payment_id`, `vendor_id`, `amount_in`, `amount_out`, `amount_balance`, `reg_date`, `cmment`,`date`) 
 VALUES (NULL, '$vendor_id', '$total_amt', '0', '$total_amt', CURRENT_TIMESTAMP, '$comment', '$date')";

if (mysqli_query($conn, $sql_pay)){
  $payment_id = mysqli_insert_id($conn);


}
   $sql = "INSERT INTO `stock_tb` (`stock_id`, `date`, `item_id`, `vendor_id`, `item_in`, `item_out`, `item_balance`, `payment_id`, `reg_date`, `status`)
   VALUES (NULL, NOW(), '$item_id', '$vendor_id', '$qty', '0', '$qty', '$payment_id', CURRENT_TIMESTAMP, '1');";

if (mysqli_query($conn, $sql)){

?>
<script>
window.location.href = "stock.php?msg=suc";
</script>
  <?php


}
}


?>
<script>
  $(document).ready(function(){
      //alert(2);
  $("#names2").change(function(){
        var names2 = $("#names2").val();
        var vendor_id = names2.split("-");
       // alert(names2);
        $.ajax({
    url: "ajax_load_vendor_items.php?vendor_id=" + vendor_id[1],
    success: function(response) {
      
      $("#vendor_item").html(response);

    },
    error: function(xhr) {
     
      $("#vendor_item").html(xhr);
    }
});
      });



      $("#vendor_item").change(function(){
       // var names2 = $("#names2").val();
      //  var purchase_rate = $("#vendor_item").val();
        //var sell_rate = $("#names2").val();
        //alert($(".opt").attr("purchase_rate"));
        $("#pur_rate").val($("#vendor_item option:selected").attr("purchase_rate"));
        $("#sell_rate").val($("#vendor_item option:selected").attr("sell_rate"));

      // $("#pur_rate").val($(".opt").attr("purchase_rate"));
      // $("#sell_rate").val($(".opt").attr("sell_rate"));
      });
      

  });
</script>