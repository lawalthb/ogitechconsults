<div id="search_modal" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('search_modal').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">Search</h2>
      <p>Search for any item by typing few letters from the word</p>

      <form index.php>
      <input class="w3-input w3-border" autofocus type="text" placeholder="Enter Item" size="30" onkeyup="showResult(this.value)">
      <div id="livesearch" class="w3-left"></div>
      </form>
    </div>
  </div>
</div>

<script>
function showResult(str) {
//  alert();
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","search_item.php?q="+str,true);
  xmlhttp.send();
}
</script>
