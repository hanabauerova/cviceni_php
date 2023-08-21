<?php
$dbhost="sql6.webzdarma.cz";
$dbuser="bauerovaport1543";
$dbpass="C(DH029lng%,^Ehr9@bh";
$dbname="bauerovaport1543";

// $dbhost="localhost";
// $dbuser="login";
// $dbpass="heslologin";
// $dbname="login_test";

if (!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("Nelze se připojit k databázovému serveru!");
}
?>