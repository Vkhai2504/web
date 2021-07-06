<?php
$pdo2 = new PDO("mysql:host=localhost;dbname=dslh_s1","root","123456");
$pdo2->exec('set names utf8');
date_default_timezone_set('Asia/Ho_Chi_Minh');
$serverid = intval($_POST["serverid"]);
//Dùng lúc gộp server
if ($serverid == 1){
	$server = 1;
}else if ($serverid == 2){ //Có bao nhiêu server gộp chung thì thêm bấy nhiêu
	$server = 1; //Nếu server chọn là 2 thì id sẽ là 1 vì gộp server 2 vào 1
}else{
	$server = $serverid; //Ngoài ra thì là chính server đã chọn
}
$db2 = "dslh_s".$server;
$sql2 = "use $db2";
$pdo2 -> query($sql2);
$charges = array(
	'1'=> 'Thẻ Chung Thân',
	'2'=>'Thẻ Tháng',
	'3'=>'100000NB',
	'4'=>'200000NB',
	'5'=>'300000NB',
	'6'=>'500000NB',
	'7'=>'1000000NB',
	'8'=>'2000000NB',
	'9'=>'3000000NB',
	'10'=>'5000000NB',
	'11'=>'10000000NB',
	'12'=>'20000000NB',
	'13'=>'30000000NB',
	'14'=>'50000000NB',
	'15'=>'Mở server ngày 1: Gói quà 10NB',
	'16'=>'Mở server ngày 2: Gói quà 10NB',
	'17'=>'Mở server ngày 3: Gói quà 10NB',
	'18'=>'Mở server ngày 4: Gói quà 20NB',
	'19'=>'Mở server ngày 5: Gói quà 20NB',
	'20'=>'Mở server ngày 6: Gói quà 20NB',
	'21'=>'Mở server ngày 7: Gói quà 50NB',
	'22'=>'Mở server ngày 8: Gói quà 50NB',
	'23'=>'Nạp 10NB',
	'24'=>'Nạp 50NB',
	'25'=>'Nạp 100NB',
	'26'=>'Nạp 500NB',
);
?>