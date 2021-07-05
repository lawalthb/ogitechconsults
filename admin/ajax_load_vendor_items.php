

<?php include '../connection.php';?>



<?php




if (isset($_GET["vendor_id"])){

    $vendor_id = trim($_GET["vendor_id"]);


    $sql = "SELECT * FROM `products_tb` WHERE `vendor_id` =$vendor_id";
    $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            ?>
             <select name="item" id="vendor_item" class="w3-input w3-border" >
             <option disable >Select Item </option>
            <?php
           
            while($row = mysqli_fetch_assoc($result)) {
                ?>
              
                <option class="opt" value="<?=$row['product_id']?>" purchase_rate="<?=$row['purchase_rate']?>" sell_rate="<?=$row['sell_rate']?>" ><?=$row['product_name']?></option>
            <?php
            }
            ?>
            </select> 
            <?php
        } else{
            echo "<select name='item' id='vendor_item' class='w3-input w3-border' >
            <option disable selected >No Item for this lecturer </option> </select>";
        }
} else {
        echo "error";
        }




//echo "json_encode($response);"
//echo "lawal fixed";
?>
