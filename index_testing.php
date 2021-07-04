

<?php include 'connection.php';?>

<?php include 'header.php';?>
<!-- Sidebar/menu -->
<?php include 'sidebar.php';?>

<!-- Top menu on small screens -->
<?php include 'users_sub_header.php';?>

<h3> </h3>
  <!-- Product grid -->
  <div class="w3-row w3-grayscale">
<style>
.item_image  {
  height: 300px;
  width: 180px;
  background-color: rgb(<?=(rand(1,200));?>, <?=(rand(1,200));?>, <?=(rand(1,200));?>);
  border-style: solid;
  margin: 10px;
}
</style>

<?php



if(isset($_GET['search'])){
$item_name =$_GET['search'];

       $sql = "SELECT * FROM `products_tb`  where  `product_id` like '$item_name'  ORDER BY `product_id` DESC ";

}elseif(isset($_GET['department'])){

  $item_name =$_GET['department'];
  $cookie_name = "filter_department";
$cookie_value = $item_name;
//setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

  //  @setcookie ("filter_department",90,time()+ (10 * 365 * 24 * 60 * 60));
  $sql = "SELECT * FROM `products_tb`  where  `department_id` = '$item_name'   ORDER BY `product_id` DESC ";


}elseif(isset($_GET['vendor'])){
  $item_name =$_GET['vendor'];
  $sql = "SELECT * FROM `products_tb`  where  `vendor_id` = '$item_name'  ORDER BY `product_id` DESC ";
}else{
  $sql = "SELECT * FROM `products_tb` ORDER BY `product_id` DESC ";
}


$result = mysqli_query($conn, $sql);

if (@mysqli_num_rows($result) > 0) {
  // output data of each row
  $num  =0;
  while($row = mysqli_fetch_assoc($result)) {

     ?>
<style>
.item_image<?=$num?>  {
  height: 300px;
  width: 180px;
  background-color: rgb(<?=(rand(1,200));?>, <?=(rand(1,200));?>, <?=(rand(1,200));?>);
  border-style: solid;
  margin: 10px;
}
</style>
    <div class="w3-col l3 s6" >
      <div class="w3-container">
        <div class="w3-display-container item_image<?=$num?> " style="display: flex;overflow-x: hidden;   "  >
          <!-- <img src="book_image<?=(rand(1,4));?>.jpg" style="width:100%" height="300" width="400"> -->
          
          <!-- <span class="w3-tag w3-display-topleft">New</span> -->
          <div class="hero-text "  >
   <h2 ><?php echo strtoupper($row["product_name"]); ?></h2>

 </div>
 <?php
$ved_id = $row["vendor_id"];
$sql2 = "SELECT * FROM `vendors_tb` WHERE `vendor_id` = $ved_id ";
$result2 = mysqli_query($conn, $sql2);
$row2 = $result2->fetch_assoc();
  $ved_name = $row2['name'];
?>
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black itemname " title="<?php echo strtoupper($row["product_name"]); ?>" disc="<?php echo $row["description"] ?>"
item_id="<?php echo $row["product_id"] ?>"
vendor_name="<?php echo $ved_name  ?>"
vendor_id="<?php echo $row["vendor_id"] ?>"

               price="<?php echo $row["sell_rate"] ?>" onclick="document.getElementById('addcart').style.display='block';" >Add to cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p><?php echo  ucfirst($row["product_name"]); ?>  [<?php echo   $ved_name ?>]
          <br><b>₦<?php echo number_format($row["sell_rate"],2); ?></b>&nbsp;&nbsp;<i class="fa fa-hand-pointer-o" aria-hidden="true"></i></p>
      </div>
  </div>

  <style>
.item_image<?=$num?>  {
  height: 300px;
  width: 180px;
  background-color: rgb(<?=(rand(1,200));?>, <?=(rand(1,200));?>, <?=(rand(1,200));?>);
  border-style: solid;
  margin: 10px;
}
</style>
<?php
$num++;
}
} else {
 echo "No Item in stock";
}
?>
    </div>


  <!-- Footer -->
  <?php include 'footer.php';?>



  <!-- End page content -->
</div>
<div id="addcart" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('addcart').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide price" id="cartadd"> </h2>
      <p id="disc"></p>
      <div class="price">
    Price  ₦<span id="price"></span>
      </div>
      <div class="quantity">
                       <button  data-action="remove" id="minus" class="btn minus1 update-cart w3-button w3-circle w3-black" >-</button>
                       <input class="cart-quantity-input quantity" type="number" id="qty" name="quantity" min="1" max="100" value="1" required>
                       <button  data-action="add" id="plus" class="btn add1 update-cart w3-button w3-circle w3-black">+</button>

                   </div>
                   <div class="cart-total">
               <strong class="cart-total-title">Total</strong> ₦
               <span class="cart-total-price"></span>
           </div>
           <form method="post" action="order_action.php">
 <input value="" name="item_id" id="item_idf" type="hidden">
             <input value="" name="qty"  id="qtyf" type="hidden">
             <input value="" name="price" id="pricef" type="hidden">
              <input value="" name="total" id="totalf" type="hidden">
               <input value="" name="item_name" id="item_namef" type="hidden">
                <input value="" name="vendor_name" id="vendor_namef" type="hidden">
                <input value="" name="vendor_id" id="vendor_idf" type="hidden">
                  <input value="<?=@$_COOKIE[user_id]?>" name="user_id" id="user_id" type="hidden">
<?php
  if(@!isset($_COOKIE[firstname])) {
?>
      <button type="button" onclick="document.getElementById('login_modal').style.display='block'" class="w3-button w3-padding-large w3-red w3-margin-bottom" >Login to Order</button>
      <?php
      } else {
        ?>


        <button type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom" >Order Now </button><br ><br >
<span onclick="document.getElementById('addcart').style.display='none'">[close] </span>
      <?php  }
         ?>

    </form>
    </div>
  </div>
</div>
<!-- viewcart Modal -->
<?php include 'modal_view_cart.php';?>
<!-- Login Modal -->
<?php include 'modal_login.php';?>

<!-- Register Modal -->
<?php include 'modal_register.php';?>

<!-- Search Modal -->
<?php include 'modal_search.php';?>


<script>
$(document).ready(function () {
    $(".itemname").click(function () {
        // alert(" or " + $(this).attr("title"));
         $("#cartadd").html($(this).attr("title"));

          $("#item_namef").val($(this).attr("title"));
          $("#disc").html($(this).attr("disc"));
          $("#price").html($(this).attr("price"));
          $("#pricef").val($(this).attr("price"));

          $("#item_idf").val($(this).attr("item_id"));
          $("#vendor_namef").val($(this).attr("vendor_name"));
          $("#vendor_idf").val($(this).attr("vendor_id"));

            $("#qtyf").val($("#qty").val());

          $(".cart-total-price").html($(this).attr("price"));
            $("#totalf").val($(this).attr("price"));

    });


    $("#plus").click(function () {
       var price =$("#price").html();
       var qty =$("#qty").val();
       var total;
        total = (+price * +qty );
        //alert(total);
        $(".cart-total-price").html(total);
  $("#qtyf").val($("#qty").val());
    $("#totalf").val(total);

    });

    $("#minus").click(function () {
       var price =$("#price").html();
       var qty =$("#qty").val();
       var total;
        total = (+price * +qty );
        //alert(total);
      $("#totalf").val(total);
  $("#qtyf").val($("#qty").val());

    });

});


let deductBtnArr = document.getElementsByClassName('minus1');
let addButtonArr = document.getElementsByClassName('add1');

for(let deductBtn of deductBtnArr){
    deductBtn.onclick = function(){
        let currentInputBox = deductBtn.nextElementSibling;
        currentInputBox.value =  currentInputBox.value - 1;
        if(currentInputBox.value <= 1){
          alert("Error:  Quantity can not be less than 1");
            currentInputBox.value = 1;
        }
    }
}

for(let addButton of addButtonArr){
    addButton.onclick = () => {
        let currentInputBox = addButton.previousElementSibling;
        currentInputBox.value =  parseInt(currentInputBox.value) + 1;
    }
}
</script>
<script src="js/js_script.js"></script>
</body>
</html>
