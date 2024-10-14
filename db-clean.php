<?php

$host="localhost";$port=3306;$socket="";$user="root";$password="ppos_phpma";$dbname="pinpoint_live";
$con=new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Could not connect to the database server'.mysqli_connect_error());
$mem_sql="DELETE FROM `users-mem` WHERE `last-active`<'".(time()-(60*60*24*30*2))."'";
$quote_email_sql="UPDATE `quote-email` LEFT JOIN `quote` ON (`quote-email`.`quote`=`quote`.`id`) SET `generated`=NULL,`inserted`=NULL,`quote-data`=NULL WHERE `quote`.`id`>'1446' AND `quote`.`time`<'".date("Y-m-d H:i:s",time()-(60*60*24*30*2))."'";
//$quote_email_2_sql="UPDATE `quote-email` LEFT JOIN `quote` ON (`quote-email`.`quote`=`quote`.`id`) SET `message`=NULL WHERE `quote`.`id`>'1446' AND `quote`.`time`<'".date("Y-m-d H:i:s",time()-(60*60*24*30*4))."'";
$change_log_sql="DELETE FROM `change-log` WHERE `time`<'".date("Y-m-d H:i:s",time()-(60*60*24*30*4))."'";
if($con){
	$mem_res=mysqli_query($con,$mem_sql);
	if($mem_res){
		echo "<br><br>User Mem - ".mysqli_affected_rows($con)." rows affected";
	}else{echo "<br><br>User Mem - Failed - ".$mem_sql."<br>".mysqli_error($con);}
	$quote_email_res=mysqli_query($con,$quote_email_sql);
	if($quote_email_res){
		echo "<br><br>Quote Clean - ".mysqli_affected_rows($con)." rows affected";
	}else{echo "<br><br>Quote Clean - Failed - ".$quote_email_sql."<br>".mysqli_error($con);}
	//$quote_email_2_res=mysqli_query($con,$quote_email_2_sql);
	//if($quote_email_2_res){
	//	echo "<br><br>Quote Clean - ".mysqli_affected_rows($con)." rows affected";
	//}else{echo "<br><br>Quote Clean - Failed - ".$quote_email_2_sql."<br>".mysqli_error($con);}
	$change_log_res=mysqli_query($con,$change_log_sql);
	if($change_log_res){
		echo "<br><br>Change Log - ".mysqli_affected_rows($con)." rows affected";
	}else{echo "<br><br>Change Log - Failed - ".$change_log_sql."<br>".mysqli_error($con);}
}
?>