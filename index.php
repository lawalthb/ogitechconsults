

<?php include 'connection.php';?>

<?php include 'header.php';?>
<!-- Sidebar/menu -->
<?php include 'sidebar.php';?>

<!-- Top menu on small screens -->
<?php include 'users_sub_header.php';?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<h3> </h3>
<style>
  @media only screen and (max-device-width: 480px){
 /* in mobile css commands */ 

.navr2 {
  text-align: center;
  overflow: hidden;
  background-color: black;
  position: fixed;
  bottom: 0;
  width: 100%;
}

.navr2 a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.navr2 a:hover {
  background: white;
  color: black;
}

.navr2 a.active {
  background-color: white;
  color: black;
}

.main {
  padding: 16px;
  margin-bottom: 30px;
}

}
</style>
  <!-- Product grid -->
  <div class="w3-row w3-grayscale">

<style>
.item_image  {
  height: 300px;
  width: 160px;
  background-color: rgb(<?=(rand(1,200));?>, <?=(rand(1,200));?>, <?=(rand(1,200));?>);
  border-style: solid;
  margin: 25px;
}
</style>
<script>

function new_password(){
    document.getElementById('new_password_modal').style.display='block';
   
}
function login_now(){
    document.getElementById('login_modal').style.display='block';
   
}

</script>
<?php
$user_level = @$_COOKIE[level] ;
$user_department = @$_COOKIE[department] ;
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	$page_no = $_GET['page_no'];
	} else {
		$page_no = 1;
        }
        $total_records_per_page =10;
        $offset = ($page_no-1) * $total_records_per_page;
      $previous_page = $page_no - 1;
      $next_page = $page_no + 1;
      $adjacents = "2"; 
      $result_count_sql = "SELECT COUNT(*) As total_records FROM `products_tb` " ;
       if($user_level != ""){
        $result_count_sql ="SELECT COUNT(*) As total_records FROM `products_tb` where  `level` like '$user_level' and `department_id` like '$user_department'  ";
        
         
      }
      $result_count = mysqli_query($conn,  $result_count_sql);
      $total_records = mysqli_fetch_array($result_count);
      $total_records = $total_records['total_records'];
        $total_no_of_pages = ceil($total_records / $total_records_per_page);
      $second_last = $total_no_of_pages - 1; // total page minus 1
    

if(isset($_GET['search'])){
$item_name =$_GET['search'];

       $sql = "SELECT * FROM `products_tb`  where  `product_id` like '$item_name'   ORDER BY `product_id` DESC LIMIT $offset, $total_records_per_page ";
      
       if($user_level != ""){
        $sql = "SELECT * FROM `products_tb`  where  `product_id` like '$item_name' and 
          `level` like '$user_level' and `department_id` like '$user_department'    ORDER BY `product_id` DESC LIMIT $offset, $total_records_per_page ";
      }

}elseif(isset($_GET['department'])){

  $item_name =$_GET['department'];
  $cookie_name = "filter_department";
$cookie_value = $item_name;
//setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

  //  @setcookie ("filter_department",90,time()+ (10 * 365 * 24 * 60 * 60));
  $sql = "SELECT * FROM `products_tb`  where  `department_id` = '$item_name'   ORDER BY `product_id` DESC LIMIT $offset, $total_records_per_page ";
  
  if($user_level != ""){
    $sql = "SELECT * FROM `products_tb`  where  `department_id` = '$item_name' and 
      `level` like '$user_level' and `department_id` like '$user_department'    ORDER BY `product_id` DESC LIMIT $offset, $total_records_per_page ";
  }

}elseif(isset($_GET['vendor'])){
  $item_name =$_GET['vendor'];
  $sql = "SELECT * FROM `products_tb`  where  `vendor_id` = '$item_name'   ORDER BY `product_id` DESC LIMIT $offset, $total_records_per_page ";
  if($user_level != ""){
    $sql = "SELECT * FROM `products_tb`  where  `vendor_id` = '$item_name'  and 
      `level` like '$user_level' and `department_id` like '$user_department'    ORDER BY `product_id` DESC LIMIT $offset, $total_records_per_page ";
  }


}else{
   $sql = "SELECT * FROM `products_tb` ORDER BY `product_id` DESC LIMIT $offset, $total_records_per_page ";
   
if($user_level != ""){
    $sql = "SELECT * FROM `products_tb` where  
  `level` like '$user_level' and `department_id` like '$user_department' ORDER BY `product_id` DESC LIMIT $offset, $total_records_per_page ";
}


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
  //$ved_name = $row2['name'];
?>
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black itemname " title="<?php echo strtoupper($row["product_name"]); ?>" disc="<?php echo $row["description"] ?>"
item_id="<?php echo $row["product_id"] ?>"
vendor_name="<?php echo $ved_name  ?>"
vendor_id="<?php echo $row["vendor_id"] ?>"

               price="<?php echo $row["sell_rate"] ?>" onclick="document.getElementById('addcart').style.display='block';" >Add to cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p><?php echo  ucfirst($row["product_name"]); ?>  <?php echo   $ved_name ?>
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
    

<div class="w3-center">
<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>
<div class="w3-bar w3-border ">

	<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
	<a class=' w3-bar-item w3-button' <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
	<a class=' w3-bar-item w3-button' <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>

       
    <?php 
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<a class='active w3-bar-item w3-button'>$counter</a>";	
				}else{
           echo "<a class=' w3-bar-item w3-button' href='?page_no=$counter'>$counter</a>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "<a class='active w3-bar-item w3-button'>$counter</a>";	
				}else{
           echo "<a class=' w3-bar-item w3-button' href='?page_no=$counter'>$counter</a>";
				}
        }
		echo "<a  class=' w3-bar-item w3-button'>...</a>";
		echo "<a  class=' w3-bar-item w3-button' href='?page_no=$second_last'>$second_last</a>";
		echo "<a  class=' w3-bar-item w3-button' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a>";
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		echo "<a  class=' w3-bar-item w3-button' href='?page_no=1'>1</a>";
		echo "<a  class=' w3-bar-item w3-button' href='?page_no=2'>2</a>";
        echo "<a  class=' w3-bar-item w3-button'>...</a>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "<li class='active'><a  class=' w3-bar-item w3-button'>$counter</a>";	
				}else{
           echo "<a  class=' w3-bar-item w3-button' href='?page_no=$counter'>$counter</a>";
				}                  
       }
       echo "<a  class=' w3-bar-item w3-button'>...</a>";
	   echo "<a  class=' w3-bar-item w3-button' href='?page_no=$second_last'>$second_last</a>";
	   echo "<a  class=' w3-bar-item w3-button' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a>";      
            }
		
		else {
        echo "<a  class=' w3-bar-item w3-button' href='?page_no=1'>1</a>";
		echo "<a  class=' w3-bar-item w3-button' href='?page_no=2'>2</a>";
        echo "<a  class=' w3-bar-item w3-button'>...</a>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<a  class='active w3-bar-item w3-button'>$counter</a>";	
				}else{
           echo "<a  class=' w3-bar-item w3-button' href='?page_no=$counter'>$counter</a>";
				}                   
                }
            }
	}
?>
    
	<a class=' w3-bar-item w3-button' <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a  class=' w3-bar-item w3-button' <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
	
    <?php if($page_no < $total_no_of_pages){
		echo "<a  class=' w3-bar-item w3-button' href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a>";
		} ?>
</div>

</div>

<br />

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
<div class="navr2 w3-center" >
 
  <a href="#top" >Top</a>
  <a href="order_history.php?sales_status=1" class="active" >Cart</a>
  <a href="#footer">Contact</a>
  <a href="#" onclick="document.getElementById('search_modal').style.display='block'">Search</a>
      
</div>
<!-- viewcart Modal -->
<?php include 'modal_view_cart.php';?>
<!-- Login Modal -->
<?php include 'modal_login.php';?>

<!-- Register Modal -->
<?php include 'modal_register.php';?>





<!-- Search Modal -->
<?php include 'modal_search.php';?>

<!-- Search Modal -->
<?php include 'modal_new_password.php';?>


<!-- Edit user Modal -->
<?php include 'modal_edit_user.php';?>


<!-- Forgot Modal -->
<?php include 'modal_forgot.php';?>




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
