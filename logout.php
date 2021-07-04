<?php
// set the expiration date to one hour ago
setcookie("user", "", time() - 3600);
setcookie ("admin_username","",time()- 3600);
setcookie ("firstname","",time()- 3600);
setcookie ("lastname","",time()- 3600);
setcookie ("department","",time()- 3600);
setcookie ("status","",time()- 3600);
setcookie ("email","",time()- 3600);
setcookie ("user_id","",time()- 3600);
setcookie ("phone","",time()- 3600);

header('Location: index.php?msg=success');
?>
