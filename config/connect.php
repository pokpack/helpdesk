<?php
	$conn = mysqli_connect("localhost", "root", "", "helpdesk") or die("Error Conn" .mysqli_error($conn));
	mysqli_query($conn,"SET NAMES 'UTF8' ");
	date_default_timezone_set("Asia/Bangkok");
	$sqlcom = "SELECT * FROM tb_company LIMIT 1";
	$querycom = mysqli_query($conn, $sqlcom);
	$rowcom = mysqli_fetch_array($querycom);
	$title = $rowcom['cmp_software'];
?>
