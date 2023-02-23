<?php
$name = $_GET['name'];
$password = $_GET['password'];

$ldap_cred=false;
$cert_cred=false;
// specify the LDAP server to connect to
$conn = ldap_connect("ldap_ssl1","389") or die("Could not connect to server");  
ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
// bind to the LDAP server specified above 
$r = ldap_bind($conn, "cn=admin,dc=marius,dc=com", "admin_pass") or die("Could not bind to server");     
// search for credentials
$result = ldap_search($conn,"dc=marius,dc=com", "(&(uid=".$name.")(userpassword=".$password.")(ou=dirigente))");
// get entry data as array
$info = ldap_get_entries($conn, $result);
if ($info["count"] == 0) {
	die("Invalid credentials");
}else {
		$ldap_cred=true;
}


ldap_close($conn);

   
?>
<html>
<head>
<title> Accesso </title>
</head>
<body>
	
 <br>
<?php
$cn = $_SERVER['SSL_CLIENT_S_DN_CN'];
$email = $_SERVER['SSL_CLIENT_S_DN_Email'];
;
if($cn != $entry["cn"][0]){
	die("Certificate e user name non corrispondono");
}
else 
	{
		$cert_cred=true;
	}
if($email != $entry["mail"][0]){
	die("Certificate and email does non corrispondono");
}
	else {
		$cert_cred=true;
	}

	$esitoLog=($ldap_cred && $cert_cred)?"<h1>".$name.": login avvenuto con successo</h1>":"<h1>".$name."login errato</h1>";
		echo $esitoLog;
	
?>

</body>
</html>