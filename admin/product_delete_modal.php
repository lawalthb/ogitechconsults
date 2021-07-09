

<?php include '../connection.php';?>
<div id="delete_products_modal" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('delete_products_modal').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">Delete Item</h2>
      <p >Are you sure you want to delete <span id="delete_product_name"></span></p>
      
    
<p id="edit_response"></p>
      <form action="product_delete_modal.php" method="post" >
      <div class="w3-row">
         <input class="w3-input w3-border" type="hidden" id="delete_product_id" name="delete_id" required>
    </div> 
      <br />
      <button type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom"
            >Submit</button>
     </form>

    </div>
  </div>
</div>


<?php 




if (isset($_POST["delete_id"])) {
 
  $delete_id = trim($_POST["delete_id"]);
 

   $sql = "DELETE FROM `products_tb` WHERE `products_tb`.`product_id` = $delete_id ";

if (mysqli_query($conn, $sql)){ 
   

   header('Location: products.php?msg=suc');
  exit;
 
   
}
}


?>