<?php
@error_reporting(0);
@session_start();
header("Content-Type:text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
        <title>Tây Du H5</title>
        <link rel="stylesheet" href="/theme/css/manga.css">
    </head>
    <body style="background: url(/theme/img/bg.jpg) center top no-repeat;">
		<div id="fb-root"></div>
        <script>
            window.fbAsyncInit = function () {
                FB.init({
                    appId: '',
                    autoLogAppEvents: true,
                    xfbml: true,
                    version: 'v2.11'
                });
            };

            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "https://connect.facebook.net/vi_VN/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
		<div class="main-content">
        <iframe scrolling="yes" id="ifr-game" src="login.html" width="100%" height="100%" frameborder="0"></iframe>  
        </div>
        <footer class="footer">H5 by ADDEPTRAI - www.h5tutien.net</footer>
        <script type="text/javascript" src="/theme/js/jquery.js"></script>
        <script type="text/javascript" src="/theme/js/manga.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {		
				$('#imgQR').attr('src','https://360game.vn/h5/qr?t=' + encodeURIComponent('https://www.devgame.net'));
            });
        </script>        
    </body>