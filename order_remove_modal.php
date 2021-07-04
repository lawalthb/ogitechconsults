

<?php include 'connection.php';?>
<div id="order_remove" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('order_remove').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">Remove Order</h2>
      <p >Are you sure you want to remove <span id="order_no"></span></p>


<p id="edit_response"></p>
      <form action="order_remove_modal.php" method="post" >
      <div class="w3-row">
         <input class="w3-input w3-border" type="hidden" id="order_id" name="order_id" required>
    </div>
      <br />
      <button type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom"
            >Submit</button>
     </form>

    </div>
  </div>
</div>


<?php




if (isset($_POST["order_id"])) {

  $order_id = trim($_POST["order_id"]);


   $sql = "UPDATE `order_tb` SET `order_status` = '2' WHERE `order_tb`.`order_id` = $order_id ; ";

if (mysqli_query($conn, $sql)){


   header('Location: order_history.php?msg=suc');
  exit;


}
}


?>
