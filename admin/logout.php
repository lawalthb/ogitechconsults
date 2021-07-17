<?php
// set the expiration date to one hour ago
setcookie("user", "", time() - 3600);
setcookie ("admin_username","",time()- 3600);
setcookie ("firstname","",time()- 3600);
setcookie ("lastname","",time()- 3600);
setcookie ("admin_type","",time()- 3600);
setcookie ("status","",time()- 3600);
setcookie ("vendor_mail","",time()- 3600);

header('Location: index.php?logout=success');
?>