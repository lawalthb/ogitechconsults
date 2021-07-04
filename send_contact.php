<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$to = "consults@ogitechconsults.com, lawalthb@gmail.com";
$subject = "Contact OGITECH CONSULTS";

$message = "
<html>
<head>
<title>". $name." - Contact OGITECH CONSULTS</title>
</head>
<body>
<p><b>Message:</b><br > ".$message."</p>
<table border='2'>
<tr>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
</tr>
<tr>
<td>". $name."</td>
<td>". $email."</td>
<td>". $phone."</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <'.$email.'>' . "\r\n";


//mail($to,$subject,$message,$headers);
header('Location: index.php?msg=success');
?>
