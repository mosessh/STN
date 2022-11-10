<?php
include 'db_connect2.php';
$qry = $conn->query("SELECT * FROM sms_status where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
include 'new_ticket.php';
?>