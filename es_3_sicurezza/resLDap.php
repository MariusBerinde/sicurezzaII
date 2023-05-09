<?php
$name = $_GET['name'];
$password = $_GET['password'];
// specify the LDAP server to connect to
$conn = ldap_connect("localhost","8389") or die("Could not connect to server");  
ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
// bind to the LDAP server specified above 
$userNameLDap="cn=admin,dc=marius,dc=com";
$lapPwd="admin_pass";
$r = ldap_bind($conn, $userNameLDap, $lapPwd) or die("Could not bind to server");     
// search for credentials
$result = ldap_search($conn,"dc=fmd,dc=marius,dc=com", "(&(uid=".$name.")(userpassword=".$password."))");
// get entry data as array
$info = ldap_get_entries($conn, $result);
if ($info["count"] == 0) {
	die("Invalid credentials");
}
$entry = $info[0];
ldap_close($conn);
?>