
// Accordion

function myAccFunc() {

  var x = document.getElementById("demoAcc");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

function myAccFunc1() {

  var x = document.getElementById("demoAcc1");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

function myAccFunc2() {

  var x = document.getElementById("demoAcc2");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}


function register_login(){
    document.getElementById('login_modal').style.display='block';
    document.getElementById('register_modal').style.display='none';
}


  $(".vendor_edit").click(function(){
    document.getElementById('edit_vendors_modal').style.display='block';

     var edit_id= $(this).attr("edit_id");
     var vname= $(this).attr("name");
     var vemail= $(this).attr("email");
     var vtitle= $(this).attr("title");
  var vdepart= $(this).attr("department");



     $("#edit_vendor_id").val(edit_id);
     $("#edit_vendor_vname").val(vname);
     $("#edit_vendor_vname2").html(vname);
     $("#edit_vendor_email").val(vemail);
     //$("#edit_vendor_title").val(3).prop;

     $("#edit_vendor_title option:selected").removeAttr("selected");
     $("#edit_vendor_title option[value='"+vtitle +"']").attr('selected', 'selected');
     $("#department option:selected").removeAttr("selected");
     $("#department option[value='"+vdepart+"']").attr('selected', 'selected');



      return false;

  });


// js for vendor payment
  $(".add_pay_modal").click(function(){
    document.getElementById('add_pay_modal').style.display='block';

     var v_id= $(this).attr("vendor_id");
     var vname= $(this).attr("name");
    



     $("#v_id").val(v_id);
     $("#v_name").html(vname);
   

      return false;

  });

  $(".payment_optn").change(function(){
    //alert(0);
    document.getElementById('edit_vendors_modal').style.display='block';

     var edit_id= $(this).attr("edit_id");
     var vname= $(this).attr("name");
     var vemail= $(this).attr("email");
     var vtitle= $(this).attr("title");
  var vdepart= $(this).attr("department");



     $("#edit_vendor_id").val(edit_id);
     $("#edit_vendor_vname").val(vname);
     $("#edit_vendor_vname2").html(vname);
     $("#edit_vendor_email").val(vemail);
     //$("#edit_vendor_title").val(3).prop;

      return false;

  });

  
  


  $(".product_edit").click(function(){
    document.getElementById('edit_products_modal').style.display='block';

     var edit_id= $(this).attr("edit_id");
     var pdescription= $(this).attr("description");
     var pvendor_id= $(this).attr("vendor_id");
     var pvendor_name= $(this).attr("vendor_name");
     var pdepartment= $(this).attr("department_name");
     var pdepartment_id= $(this).attr("department_id");
      var psell_rate= $(this).attr("sell_rate");
      var ppurchase_rate= $(this).attr("purchase_rate");
      var pname= $(this).attr("name");
      var plevel= $(this).attr("level");
      var pvendor_email= $(this).attr("vendor_email");
      //alert(pname);
      
      $("#edit_vend_email").val(pvendor_email);
      $("#edit_level").val(plevel);
     $("#edit_product_id").val(edit_id);
     $("#edit_product_sell").val(psell_rate);
     $("#edit_product_name").val(pname);
     $("#edit_product_purchase").val(ppurchase_rate);
     $("#edit_product_description").val(pdescription);
     
     
     $("#department").val(pdepartment+"-"+pdepartment_id);
     $("#vend2").val(pvendor_name+"-"+pvendor_id);
     //$("#edit_product_title").val(3).prop;

     $("#edit_product_title option:selected").removeAttr("selected");
     $("#edit_product_title option[value='"+vtitle +"']").attr('selected', 'selected');
     $("#department option:selected").removeAttr("selected");
     $("#department option[value='"+vdepart+"']").attr('selected', 'selected');



      return false;

  });

  $(".vendor_delete").click(function(){
    document.getElementById('delete_vendors_modal').style.display='block';

     var delete_id= $(this).attr("delete_id");
     var vname= $(this).attr("name");




     $("#delete_vendor_id").val(delete_id);
     $("#delete_vendor_name").html(vname);


      return false;

  });

  $(".product_delete").click(function(){
    document.getElementById('delete_products_modal').style.display='block';

     var delete_id= $(this).attr("delete_id");
     var vname= $(this).attr("name");




     $("#delete_product_id").val(delete_id);
     $("#delete_product_name").html(vname);


      return false;

  });


  $(".order_remove").click(function(){
    document.getElementById('order_remove').style.display='block';

     var order_id= $(this).attr("order_id");
     var order_no= $(this).attr("order_no");




     $("#order_id").val(order_id);
     $("#order_no").html(order_no);


      return false;

  });


  $(".checkout").click(function(){
      $(this).prop("disabled",true);
     var order_no= $(this).attr("order_no");
     var product_id= $(this).attr("product_id");
    //  $.get("checkout.php?order_id="+order_no+"&product_id="+product_id, function(data, status){
    //     //  alert("Data:" + data + "\nStatus: " + status);
    //       alert( "Status: " + status);
    //     //   $(this).attr("order_no")
    //       $(this).hide();

    //          //attr("order_no") = $(".checkout").html('Purchased');
    //     });
    //       $(this).html("Done");

          $.ajax({
            url: "checkout.php?order_id="+order_no+"&product_id="+product_id,
            success: function(response) {
                 //$(this).html(response);
                 alert(response);
            },
            error: function(xhr) {
                  $(this).html(xhr);
            }
          });

  });
//to update buyers payment option
$(".payment_optn2").change(function(){
   var order_no= $(this).attr("order_no");
    var pay_mt= $(this).val();

   $.get("payment_optn.php?order_id="+order_no+"&pay_mt="+pay_mt, function(data, status){
      //  alert("Data:" + data + "\nStatus: " + status);
        alert( "Status: " + status);
      //   $(this).attr("order_no")


           //attr("order_no") = $(".checkout").html('Purchased');
      });


});

// Click on the "Jeans" link on page load to open the accordion for demo purposes
//document.getElementById("myBtn").click();


// Open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}
//to calculate add stock total amount
$("#qty").keyup(function(){
  var qty= $("#qty").val();
  var pur_rate= $("#pur_rate").val();
  var tm ="";
  tm =pur_rate*qty;
   $("#total_amt").val(tm);
 
});

$("#pur_rate").keyup(function(){
  var qty= $("#qty").val();
  var pur_rate= $("#pur_rate").val();
  var tm ="";
  tm =pur_rate*qty;
   $("#total_amt").val(tm);
  
});
// refund query
$(".refund").click(function(){
  $(this).prop("disabled",true);
 var order_no= $(this).attr("order_no");
 $.get("refund.php?order_id="+order_no, function(data, status){
    //  alert("Data:" + data + "\nStatus: " + status);
      alert( "Status: " + status);
    //   $(this).attr("order_no")
      $(this).hide();

         //attr("order_no") = $(".refund").html('Purchased');
    });
      $(this).html("Done");

});

function myFunction() {
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");

  // Add the "show" class to DIV
  x.className = "show";

  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
} 

