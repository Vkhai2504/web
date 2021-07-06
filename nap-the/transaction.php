<?php
session_start();
error_reporting(E_ALL^E_NOTICE);
error_reporting(E_ERROR);
header('Content-Type: text/html; charset=utf-8');
define('CORE_API_HTTP_USR', 'merchant_19150');
define('CORE_API_HTTP_PWD', '19150sAmK2OgUS4YI570ZXJrDvi24FfwTN1');
date_default_timezone_set('Asia/Ho_Chi_Minh');
include 'GB_API.php';
include "../config2.php";
$username = $_SESSION['username'];
$server = intval($_POST["serverid"]);
$seri = isset($_POST['txtseri']) ? $_POST['txtseri'] : '';
$sopin = isset($_POST['txtpin']) ? $_POST['txtpin'] : '';
$gia = isset($_POST['chonthe']) ? $_POST['chonthe'] : '';
$mang = isset($_POST['chonmang']) ? $_POST['chonmang'] : '';
if (empty($username) || empty($seri) || empty($sopin) || empty($gia) || empty($mang)) {
    echo '<script>alert("Vui lòng nhập đầy đủ thông tin!");window.location.href="/nap-the";</script>';
    exit;
}

$sql_query = "SELECT dbid FROM players WHERE account = '$username' and serverid = '$server';";
$sql_result = $pdo2->query($sql_query);
$player = $sql_result->fetch(PDO::FETCH_ASSOC);
if ($player === false) {
    echo '<script>alert("Vui lòng tạo nhân vật trước khi nạp thẻ!");window.location.href="/nap-the";</script>';
    exit;
}

if($mang=='1')         {$ten = "Viettel";}
else if($mang=='2')    {$ten = "Mobifone";}
else if($mang == '5')  {$ten = "Vcoin";}
else if($mang=='4')    {$ten = "Gate";}
else if($mang=='6')    {$ten = "Vietnammobile";}       
else $ten = "Vinaphone";

$merchant_id = 30442; // mã đăng kí GB
$api_user = "57a9343a697cb"; // user đăng kí GB
$api_password = "58ccb560a9f2b995177ad0beded7cce8"; // pass user đăng ký GB

$napthe = file_get_contents("http://sv.gamebank.vn/api/card2?merchant_id=".$merchant_id."&api_user=".trim($api_user)."&api_password=".trim($api_password)."&pin=".trim($sopin)."&seri=".trim($seri)."&card_type=".intval($mang)."&price_guest=".$gia."&note=".urlencode($username)."");
$info_card = str_replace("\xEF\xBB\xBF",'',$napthe);
$info_card = json_decode($napthe);
$code = $info_card->code; // mã lỗi dạng số
$msg = $info_card->msg; // mã dạng chữ
$info_card = $info_card->info_card; // mệnh giá thẻ 
	
$time = time();

if($code === 0 && $info_card >= 10000) {
    $amount = $info_card;
    //$rate = 1;
    //$extraRate = 1;
    //if (time() >= strtotime('2018-08-08 10:00:00') &&
        //time() <= strtotime('2018-08-08 23:59:59')) {
        //$rate = 2;
        //$extraRate = 2;
    //}

    switch($amount) {
        //case 10000: $xu = 100000 * $rate; break;
        //case 20000: $xu = 200000 * $rate; break;
        //case 30000: $xu = 300000 * $rate; break;
        //case 50000: $xu = 500000 * $rate; break;
        //case 100000: $xu = 1000000 * $rate; break;
        //case 200000: $xu = 2000000 * $rate; break;
        //case 300000: $xu = 3000000 * $rate; break;
        //case 500000: $xu = 5000000 * $extraRate; break;
        //case 1000000: $xu = 10000000 * $extraRate; break;
		case 10000: $change = 3 break;
        case 20000: $change = 4 break;
        case 30000: $change = 5 break;
        case 50000: $change = 6 break;
        case 100000: $change = 7 break;
        case 200000: $change = 8 break;
        case 300000: $change = 9 break;
        case 500000: $change = 10 break;
        case 1000000: $change = 11 break;
    }
    // Chuyển KNB vào nhân vật
	$playerid = $player[0]['dbid'];
	$sql = "insert into pay (`dbid`,`playerid`,`serverid`,`goodsid`) value('$time','$playerid','$server','$change')";
	$sql_result = $pdo2->query($sql);
	
	//Luu card ra log:
	$file = "carddung.log";
	$fh = fopen($file,'a') or die("cant open file");
	fwrite($fh,"Tai khoan: ".$username.", Loai the: ".$ten.", Menh gia: ".$amount.",Ma the: ".$sopin.", Seri: ".$seri.", Thoi gian: ".date('Y-m-d H:i:s'));
	fwrite($fh,"\r\n");
	fclose($fh);
	if ($amount>0){
	    echo '<script>alert("Bạn đã nạp thành công thẻ '.$ten.' mệnh giá '.$amount.', vui lòng vào lại game để kiểm tra!");location.href="/nap-the";</script>';
	    exit;
	}else{
	    echo '<script>alert("Có lỗi xảy ra, vui lòng liên hệ với hỗ trợ!");location.href="/nap-the";</script>';
	    exit;
	}
}
else{
    echo 'Status Code:' . $code . '<hr >';
    $error = $msg;
	echo $error;
    $file = "cardsai.log";
    $fh = fopen($file,'a') or die("cant open file");
    fwrite($fh,"Tai khoan: ".$username.", Ma the: ".$sopin.", Seri: ".$seri.", Noi dung loi: ".$error.", Thoi gian: ".date('Y-m-d H:i:s'));
    fwrite($fh,"\r\n");
    fclose($fh);
    echo '<script>alert("Thông tin thẻ cào không hợp lệ!");location.href="/nap-the"</script>';
	exit;
}