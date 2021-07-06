<?php
@error_reporting(0);
@session_start();
header("Content-Type:text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
    <title>Login Tây Du H5</title>
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="yes" name="apple-touch-fullscreen" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1"
    />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no" />
    <link rel="stylesheet" href="/static/v2/css/common_style.css">
    <link rel="stylesheet" href="/static/v2/css/h5_center.css">
    <script type="text/javascript" src="/static/js/jquery.min.js">
    </script>
    <script type="text/javascript" src="/static/js/h5_common.js">
    </script>
</head>

<body class="full">
<img src="/static/img/bg.jpg" style="width:100%; z-index:1; height: 100%;">
<div class="show_box" id="user_login">
    <?php if(@$_SESSION['username']){ ?>
     <div class="account-session">
		<script>window.location.href='/play.html';</script>
    </div>
	<?php }else{ ?>
    <div class="account-login">  
		<form id="frmLogin" method="post" action="login.php?act=login" target="_top">
            <input type="hidden" id="channel" name="channel" value="1">
            <input type="hidden" id="appid" name="appid" value="181">
            <input type="hidden" id="type" name="type" value="1">
            <span class="ltit ltit2">
                        Đăng Nhập
                    </span>
            <p class="acccount-p">
                        <span>
                            <img src="/static/v2/img/h5c_p1.png">
                        </span>
                <input id="username" name="username" type="text" placeholder="Tài Khoản">
            </p>
            <p class="acccount-p">
                        <span>
                            <img src="/static/v2/img/h5c_p2.png">
                        </span>
                <input id="password" name="password" type="password" placeholder="Mật Khẩu">
            </p>
			<p class="acccount-p">
                        <span>
                            <img src="/static/v2/img/h5c_p3.png">
                        </span>
                <select id="serverid" name="serverid" style="text-align: center; display: block; width: 100%; border: none; background: none; text-indent: 55px; font-size: 16px; color: #999; line-height: 27px;">
				<option value="">Chọn máy chủ</option>
								<option value="13">S13_Tân Sửu</option>
								<option value="12">S12-LINH VÕ</option>
								<option value="11">S11-AE MIỀN TRUNG</option>
								<option value="10">S10-Đà Nẵng</option>
								<option value="9">S9-HUYNH ĐỆ</option>
								<option value="1">S1_S8 Everglow</option>
								</select>
            </p>            
            <div style="text-align:center">
                <a href="javascript:;" class="login-btn2" id="btnlogin">
                    Vào Game
                </a>
                <a href="javascript:;" class="login-btn2" id="btnlogin" onclick="getsjreg()">
                    Đăng Ký
                </a>
            </div>
        </form>	
    </div>
</div>
<?php } ?>
<div class="show_box popup_bg" id="mobile_login" style="display: none;">
    <div class="phone-login">
        <form id="frmLogin" method="post" action="login.php?act=reg" target="_top">
            <input type="hidden" id="channel" name="channel" value="1">
            <input type="hidden" id="appid" name="appid" value="181">
            <input type="hidden" id="type" name="type" value="2">
            <a href="javascript:;" class="closed_b" onclick="getzhlogin()">
                <img src="/static/v2/img/h5c_closed.png">
            </a>
            <span class="ltit">
                        Đăng Ký
                    </span>
            <span class="inpt">
                        <input name="m_username" id="m_username" type="text" placeholder="Tài Khoản">
                    </span>
            <span class="inpt">
                        <input name="m_password" id="m_password" type="password" placeholder="Mật Khẩu">
                    </span>
            <span class="inpt">
                        <input name="m_password2" id="m_password2" type="password" placeholder="Nhập Lại Mật Khẩu">
                    </span>
            <a href="javascript:;" class="login-btn" id="btnreg">
                Đăng Ký
            </a>
        </form>
    </div>
</div>
<script type="text/javascript">
var $_GET = (function(){
    var url = window.document.location.href.toString();
    var u = url.split("?");
    if(typeof(u[1]) == "string"){
        u = u[1].split("&");
        var get = {};
        for(var i in u){
            var j = u[i].split("=");
            get[j[0]] = j[1];
        }
        return get;
    } else {
        return {};
    }
})();

    function getzhlogin() {
        $(".show_box").hide();
        $("#user_login").show();
    }

    function getsjreg() {
        $(".show_box").hide();
        $("#mobile_login").show();
    }
    
    $("#btnlogin").click(function() {
        checkLoginForm();
    });
    
    function checkLoginForm() {
        var lvUsername = $("#username").val();
        var lvPWD = $("#password").val();
		var lvServerID = $("#serverid").val();
        if (lvUsername == "") {
            alert("Vui lòng nhập tài khoản!");
        } else if (lvUsername.length < 4) {
            alert("Tài khoản phải lớn hơn 4 ký tự!");
        } else if (!funcChina(lvUsername)) {
            alert("Tài khoản không được chứa ký tự!");
        } else if (checkUserName(lvUsername)) {
            alert("Tài khoản chỉ được chứa chữ cái và số");
        } else if (lvPWD == "" || lvPWD == "Nhập mật khẩu") {
            alert("Nhập mật khẩu của bạn!");
        } else if (lvPWD.length < 6) {
            alert("Mật khẩu phải có 6 ký tự trở lên!");
        } else if (lvServerID == "") {
            alert("Vui lòng chọn máy chủ!");
        } else {
            $.post("api.php?act=login", {
                    "username": lvUsername,
                    "password": lvPWD,
					"serverid": lvServerID
                },
                function(data) {
                    console.log(data);
                    data = JSON.parse(data);
                    if (data.code < 1) {
                        alert(data.msg);
                    } else {
                        top.location.href="/";
                    }
                });
        }
    }

    $("#btnreg").click(function() {
        $("#type").val("1");
        checkRegForm();
    });

    function checkRegForm() {
        var lvUsername = $("#m_username").val();
        var lvPWD = $("#m_password").val();
        var lvPWD2 = $("#m_password2").val();

        if (!lvPWD) {
            alert("Vui lòng nhập mật khẩu của bạn!");
            return false;
        } else if (lvPWD != lvPWD2) {
            alert("2 mật khẩu khác nhau!");
            return false;
        } else if (lvUsername == lvPWD) {
            alert("Mật khẩu và tài khoản không thể giống nhau!");
            return false;
        } else if (lvUsername == "") {
            alert("Vui lòng nhập tên tài khoản!");
            return false;
        } else if (lvUsername.length < 4) {
            alert("Tài khoản phải lớn hơn 4 ký tự!");
        } else if (!funcChina(lvUsername)) {
            alert("Tài khoản không được chứa ký tự!");
        } else if (checkUserName(lvUsername)) {
            alert("Tài khoản chỉ được chứa chữ cái và số");
        } else if (lvPWD == "" || lvPWD == "Nhập mật khẩu") {
            alert("Nhập mật khẩu của bạn!");
        } else if (lvPWD.length < 6) {
            alert("Mật khẩu phải có 6 ký tự trở lên!");
        } else {
            $.post("api.php?act=reg", {
                    "username": lvUsername,
                    "password": lvPWD,
                    "password1": lvPWD2
                },
                function(data) {
                    console.log(data);
                    data = JSON.parse(data);
                    if (data.code < 1) {
                        alert(data.msg);
                    } else {
                        top.location.href="/";
                    }
                });
        }
    }
</script>
</body>
</html>