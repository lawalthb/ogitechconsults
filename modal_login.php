<div id="login_modal" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('login_modal').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">login</h2>
      <form action="login_action.php" method="post" >
      <p>Login to be able to  order your items</p>
      <p><input class="w3-input w3-border" type="email" name="email" placeholder="Enter E-mail" required></p>
      <p><input class="w3-input w3-border" type="password" name="password" placeholder="Enter Password" required></p>
      <div class="row">
          <div class="w3-half w3-container w3-panel ">
              <span style="font-size:13px"> Please answer question to verify you are human <span id="lquestion"><b id="lqst1" style=""><?php echo(rand(1,9)); ?></b> + <b id="lqst2"><?php echo(rand(1,9)); ?></b> =
          </div>
          <div class="w3-half w3-container  ">

              <input class="w3-input w3-border" type="number" autocomplete="off" placeholder= " Answer ?"  id="log_ans" required>

          </div>
          <br>


      <br />
      </div>

      <button type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom " onclick="document.getElementById('viewcart').style.display='none'" title="Ans question correctly before submit" disabled id="log_submit">Submit</button>

      </form>

      <a href="#" onclick="document.getElementById('register_modal').style.display='block'" >[ Register Here ] </a>
      <a href="#" onclick="document.getElementById('forgot_modal').style.display='block'; document.getElementById('viewcart').style.display='none'; document.getElementById('login_modal').style.display='none' "" >[ Forgot Password ] </a>
   
   </div>
  </div>
</div>

<script>

$(document).ready(function(){


$("#log_ans").keyup(function(){
  //alert(1);
  var val1 = $("#lqst1").html();
  var val2 = $("#lqst2").html();
  var ans = $("#log_ans").val();
  var val3;
  val3 = Number(val1)+ Number(val2);

    if (val3 == ans) {
        //reg_submit

           $("#log_submit").removeAttr("disabled");
    }else{
       $("#log_submit").prop('disabled', true);
      // $(element).prop('disabled', true);
    }


}); // close calling function
});// close doc ready

</script>
