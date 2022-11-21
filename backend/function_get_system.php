<?php
	function get_browser_name($user_agent)
	{
	    if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
	    else if (strpos($user_agent, 'Edge')) return 'Edge';
	    else if (strpos($user_agent, 'Chrome')) return 'Chrome';
	    else if (strpos($user_agent, 'Safari')) return 'Safari';
	    else if (strpos($user_agent, 'Firefox')) return 'Firefox';
	    else if (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';	    
	    return 'Other';
	}
	
	$user_id = $record['u_idcard'];
	$rlog_host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$rlog_ip = $_SERVER['REMOTE_ADDR'];
	$rlog_browser = get_browser_name($_SERVER['HTTP_USER_AGENT']);
	$rlog_save = date('Y-m-d H:i:s');
	
	$sqllog = "INSERT INTO tb_repair_log(r_no, s_id, technician_id, user_id, rlog_host, rlog_ip, rlog_browser, rlog_save) VALUES('$r_no', '$s_id', '$technician_id', '$user_id', '$rlog_host', '$rlog_ip', '$rlog_browser', '$rlog_save')";
	$queryulog = mysqli_query($conn, $sqllog);
	
?>