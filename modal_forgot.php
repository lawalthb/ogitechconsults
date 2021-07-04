<div id="forgot_modal" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
        <div class="w3-container w3-white w3-center">
            <i onclick="document.getElementById('forgot_modal').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
            <h2 class="w3-wide">Forgot Password</h2><br />
        </div>
                <form action="forgot_action.php" method="post" >
                    <p>Request for new password</p>
                    <p><input class="w3-input w3-border" type="email" name="email" placeholder="Enter E-mail" required></p>
                    <div class="row">
                        <div class="w3-half w3-container w3-panel ">
                            <span style="font-size:13px"> Please answer question to verify you are human <span id="fquestion"><b id="fqst1" style=""><?php echo(rand(1,9)); ?></b> + <b id="fqst2"><?php echo(rand(1,9)); ?></b>=
                        </div>
                        <div class="w3-half w3-container  ">

                            <input class="w3-input w3-border" type="text" placeholder= " Answer ?"  id="f_ans" required>

                        </div>
          
                    </div>
                    <br />  <br />
                        <button type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom " onclick="document.getElementById('viewcart').style.display='none'; document.getElementById('login_modal').style.display='none' " title="Ans question correctly before submit" disabled id="f_submit">Submit Email</button>

                </form>
      <br /> <br />
                        <a href="#" onclick="register_login();" >[ Already Register Login Here ] </a>
    </div>
</div>

<script>

$(document).ready(function(){


$("#f_ans").keyup(function(){
  //alert(1);
  var val1 = $("#fqst1").html();
  var val2 = $("#fqst2").html();
  var ans = $("#f_ans").val();
  var val3;
  val3 = Number(val1)+ Number(val2);

    if (val3 == ans) {
        //reg_submit

           $("#f_submit").removeAttr("disabled");
    }else{
       $("#f_submit").prop('disabled', true);
      // $(element).prop('disabled', true);
    }


}); // close calling function
});// close doc ready

</script>
