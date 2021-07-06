<?php
@session_start();
if (!isset($_SESSION['username'])) {
	 header('Location: /index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nạp thẻ - Tây Du H5</title>
<link href="../static/Register_files/sweet-alert.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
<link rel="stylesheet" href="../static/Register_files/bootstrap.min.css">
<link href="../static/Register_files/Site.css" rel="stylesheet">
</head>
<body style="">
<div class="container body-content">
<div class="row">
<div class="col-md-12">
<div style="border: 1px solid #428bca; border-radius: 5px; padding: 0 !important">
<div class="list-group header-title">
<div class="list-group-item active" style="border-radius: 5px 5px 0px 0px">
<h3 class="list-group-item-heading"><i class="fa fa-info-circle"></i>NẠP THẺ CÀO</h3>
<p class="list-group-item-text">
<a href="/"><i class="fa fa-home"></i> Trang chủ</a>
<span>/</span>
<span>Nạp thẻ</span>
</p>
</div>
</div>
<div class="alert">
<div class="alert alert-warning">
<span id="MainContent_lblMsg">Lưu ý: Chọn chính xác mệnh giá.<br/>Chọn sai mệnh giá sẽ không nhận được KNB</span>
</div>
<div id="MainContent_pnlInputInfo">
<form action="transaction.php" method="POST">
<div class="form-group">
<label for="txtServer">Máy chủ:</label>
<select name="serverid" class="form-control" required>
<option value=""> -- Chọn máy chủ -- </option>
<option value="1">Tây Du S1</option>
<!--<option value="2">Tây Du S2</option>
<option value="3">Tây Du S3</option>
<option value="4">Tây Du S4</option>
<option value="5">Tây Du S5</option>-->
</select>
</div>
<div class="form-group">
<label for="txtUsername">Tài khoản:</label>
<input type="text" class="form-control" value="<?php echo $_SESSION['username']; ?>" disabled>
<input type="hidden" name="txtuser" value="<?php echo $_SESSION['username']; ?>" >
</div>
<div class="form-group">
<label for="txtCode">Loại thẻ:</label>
<select class="form-control" name="chonmang" required>
<option value="0"> -- Chọn loại thẻ  -- </option>
<option value="1">Viettel</option>
<option value="2">Mobifone</option>
<option value="3">Vinaphone</option>
<option value="4">Zing (VinaGame)</option>
<option value="5">GATE (FPT)</option>
</select>
</div>
<div class="form-group">
<label for="txtCode">Mệnh giá:</label>
<select class="form-control" name="chonthe" required>
<option value=""> -- Chọn đúng mệnh giá -- </option>
<option value="10000">10000 VNĐ = 100000 NB</option>
<option value="20000">20000 VNĐ = 200000 NB</option>
<option value="50000">50000 VNĐ = 500000 NB</option>
<option value="100000">100000 VNĐ = 1000000 NB</option>
<option value="200000">200000 VNĐ = 2000000 NB</option>
<option value="500000">500000 VNĐ = 5000000 NB</option>
</select>
</div>
<div class="form-group">
<label for="txtCode">Mã thẻ:</label>
<input type="text" class="form-control" id="txtpin" name="txtpin" placeholder="Mã thẻ" data-toggle="tooltip" data-title="Mã số sau lớp bạc mỏng" required />
</div>
<div class="form-group">
<label for="txtCode">Số seri:</label>
<input type="text" class="form-control" id="txtseri" name="txtseri" placeholder="Số seri" data-toggle="tooltip" data-title="Mã seri nằm sau thẻ" required />
</div>
<input type="submit" name="napthe" value="Xác Nhận" class="btn btn-success">
</form>
</div>
</div>
</div>
</div>
</div>
<hr>
<footer>
<div class="footer">
<ul>
<li><a href="/"><i class="fa fa-home"></i>Trang chủ</a></li>
<li>
<a href="https://www.facebook.com/netdevgame" target="_blank"><i class="fa fa-facebook">Facebook</i>
</a>
</li>
</ul>
<div style="clear: both"></div>
</div>
</footer>
</div>
</body>
</html>