<?php
$files=glob('/home/pinpointdev/Dropbox/onpoint.pinpoint/public/products/quotes/attachments/*');
print_r($files);
foreach($files as $file){
	if(is_file($file)) unlink($file);
}
echo "<br><br>";
// $files=glob('/var/services/web/downloadshare/*');
// print_r($files);
// foreach($files as $file){
// 	if(is_file($file) && basename($file)!=".htaccess" && filemtime($file)<(time()-604800)) unlink($file);
// }
// echo "<br><br>";
// $files=glob('/var/services/web/order_files/file-share/*');
// print_r($files);
// foreach($files as $file){
// 	if(is_file($file) && basename($file)!=".htaccess" && filemtime($file)<(time()-604800)) unlink($file);
// }
// echo "<br><br>";
// $files=glob('/var/services/web/temp/raise/*');
// print_r($files);
// foreach($files as $file){
// 	if(is_file($file) && basename($file)!=".htaccess" && filemtime($file)<(time()-604800)) unlink($file);
// }
?>