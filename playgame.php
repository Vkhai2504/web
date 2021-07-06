<?php
@error_reporting(0);
@session_start();
header("Content-Type:text/html; charset=utf-8");
if (!isset($_SESSION['username'])) {
	 header('Location: /index.php');
}
include_once ("config.php");
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>Phàm Nhân Tu Tiên H5</title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Cache-Control" CONTENT="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="0">
    <meta name="viewport" content="width=device-width,initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="full-screen" content="true" />
    <meta name="screen-orientation" content="portrait" />
    <meta name="x5-fullscreen" content="true" />
    <meta name="360-fullscreen" content="true" />
    <style>
        html,
        body {
            -ms-touch-action: none;
            background: #000000;
            padding: 0;
            border: 0;
            margin: 0;
            height: 100%;
            overflow: hidden;
        }
        
        #bgimgbg {
            height: 100%;
            width: 100%;
        }
        
        #bgimg {
            overflow: hidden;
            background-image: url(/flash/resource/assets/biH1P9OL0ZJ3/ui_xzfwq_p_show.jpg);
            background-position: top center;
            background-size: 100% 100%;
            height: 100%;
            width: 100%;
            position: absolute;
            display: flex;
            display: -webkit-flex;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-align-items: center;
            align-items: center;
        }
        
        .loader-inner {
            left: 50%;
            height: 5rem;
        }
        
        #load_text {
            width: 100%;
            text-align: center;
            color: #ffffff;
            font-size: 1rem;
            text-shadow: #000000 1px 1px;
        }
        
        @-webkit-keyframes ball-spin-fade-loader {
            50% {
                opacity: 0.3;
                -webkit-transform: scale(0.4);
                transform: scale(0.4);
            }
            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }
        
        @keyframes ball-spin-fade-loader {
            50% {
                opacity: 0.3;
                -webkit-transform: scale(0.4);
                transform: scale(0.4);
            }
            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }
        
        .ball-spin-fade-loader {
            position: relative;
        }
        
        .ball-spin-fade-loader > div:nth-child(1) {
            top: 25px;
            left: 0;
            -webkit-animation: ball-spin-fade-loader 1s 0s infinite linear;
            animation: ball-spin-fade-loader 1s 0s infinite linear;
        }
        
        .ball-spin-fade-loader > div:nth-child(2) {
            top: 17.04545px;
            left: 17.04545px;
            -webkit-animation: ball-spin-fade-loader 1s 0.12s infinite linear;
            animation: ball-spin-fade-loader 1s 0.12s infinite linear;
        }
        
        .ball-spin-fade-loader > div:nth-child(3) {
            top: 0;
            left: 25px;
            -webkit-animation: ball-spin-fade-loader 1s 0.24s infinite linear;
            animation: ball-spin-fade-loader 1s 0.24s infinite linear;
        }
        
        .ball-spin-fade-loader > div:nth-child(4) {
            top: -17.04545px;
            left: 17.04545px;
            -webkit-animation: ball-spin-fade-loader 1s 0.36s infinite linear;
            animation: ball-spin-fade-loader 1s 0.36s infinite linear;
        }
        
        .ball-spin-fade-loader > div:nth-child(5) {
            top: -25px;
            left: 0;
            -webkit-animation: ball-spin-fade-loader 1s 0.48s infinite linear;
            animation: ball-spin-fade-loader 1s 0.48s infinite linear;
        }
        
        .ball-spin-fade-loader > div:nth-child(6) {
            top: -17.04545px;
            left: -17.04545px;
            -webkit-animation: ball-spin-fade-loader 1s 0.6s infinite linear;
            animation: ball-spin-fade-loader 1s 0.6s infinite linear;
        }
        
        .ball-spin-fade-loader > div:nth-child(7) {
            top: 0;
            left: -25px;
            -webkit-animation: ball-spin-fade-loader 1s 0.72s infinite linear;
            animation: ball-spin-fade-loader 1s 0.72s infinite linear;
        }
        
        .ball-spin-fade-loader > div:nth-child(8) {
            top: 17.04545px;
            left: -17.04545px;
            -webkit-animation: ball-spin-fade-loader 1s 0.84s infinite linear;
            animation: ball-spin-fade-loader 1s 0.84s infinite linear;
        }
        
        .ball-spin-fade-loader > div {
            background-color: #fff;
            width: 15px;
            height: 15px;
            border-radius: 100%;
            margin: 2px;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
            position: absolute;
        }
        
        #iframe-wrapper {
            margin: 0 auto;
            width: 523px;
            height: 650px;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            overflow-x: hidden;
        }
        
        #iframe-wrapper iframe {
            width: 523px;
            height: 650px;
        }
    </style>
    <script type="text/javascript" src="/flash/jquery.min.js"></script>

</head>

<body onload="ready()" onunload="closeSocket()" ondragstart="return false">
    <div style="margin: auto;width: 100%;height: 100%;" class="egret-player" data-entry-class="Main" data-orientation="auto" data-scale-mode="fixedNarrow" data-frame-rate="60" data-show-paint-rect="false" data-content-width="720" data-content-height="1280" data-multi-fingered="2" data-show-fps="false" data-show-log="false" data-show-fps-style="x:0,y:0,size:12,textColor:0xffffff,bgAlpha:0.2">

        <div id="bgimgbg">
            <div id="bgimg">
                <div id="loader">
                    <div class="loader-inner ball-spin-fade-loader">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div id="load_text">Đang tải...</div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        /**
         * window["_CaclFont"] && window["_CaclFont"](this, character)
         * egret.$warn(1046, character)
         *
         */
        var _font = {}
        var _CaclFont = function(font, text) {
            var fontName = font.$font
            let dict = _font[fontName]
            if (!dict) {
                dict = _font[fontName] = {}
            }
            for (let s of text) {
                dict[s] = true
            }
            var str = []
            for (var key in _font) {
                var list = _font[key]
                str.push("==> " + key)
                var outStr = ""
                for (var key2 in list) {
                    outStr += key2
                }
                str.push(outStr)
            }
            console.log(str.join("\n"))
        }
    </script>
    <script type="text/javascript">
        var TEST_LOAD_ATLAS = false;
        var closeError = true;

        var __LOCAL_RES__ = 2;
        var __GAME_VER__ = 61;
        var _URL_ROOT_ = "";
        var verData = {};
        var serData = {};

        var __CONFIG__ = {
            "__SER_URL__": "192.168.1.210",
            "__PLATFORM_ID__": 1,
            "__RES_URL__": this.window.location.href.substring(0, this.window.location.href.lastIndexOf("index.html")),
            "__CLIENT_CONFIG__": 10,
            "__GAME_ID__": 6,
            "__RES_URL__": _URL_ROOT_ + "rel/",
            __ServerNameFunc__: function(id) {
                return nameDict[id]
            },
            __HTTP_PORT__: "80"
        }
        var __REC__ = function(x) {
            var timestamp = (new Date()).valueOf();
            var requestURL = "/pay/?uid=" + x.userRoleId + "&account=" + x.uid + "&userRoleName=" + x.userRoleName + "&serverid=" + x.userServer + "&rechargeid=" + x.goodsId + "&pay_orderid=" + timestamp + "&game=xyh5";
            location.href = requestURL;
            //window.open(requestURL);
            console.log(x);
        }

        // 使用本地的服务器列表
        var IsLocalIPList = true

        //调试服务器ip列表
        var serverList = [
            "S1_Avenger|192.168.1.240:5201",
            "DevGame_S2|192.168.1.240:5202",
        ];
        var nameDict = {}
        var shareObj = {};
        shareObj.level = 5;
        shareObj.func = function() {
            //console.log('调起分享');
            ShareIconRule.CallBackShare();
        }
        window['_ShareObj'] = shareObj
        var followObj = {};
        followObj.level = 10;
        followObj.end = true;
        followObj.func = function() {
            //console.log('调起关注');
            FollowIconRule.CallBackFollow();
        }
        window['_FollowObj'] = followObj
        var object2Search = function(a) {
            if ("object" != typeof a) {
                console.error("Tham số không hợp lệ")
                return ""
            }
            var b = "?";
            for (var c = Object.keys(a), d = 0; d < c.length; d++) {
                var arg = c[d] + "=" + a[c[d]];
                b += 0 == d ? arg : "&" + arg;
            }
            return b
        }

        function ready() {
            var list = [
                "/flash/libs/modules/egret/egret.min.js",
                "/flash/libs/modules/egret/egret.web.min.js",
                "/flash/libs/modules/game/game.min.js",
                "/flash/libs/modules/res/res.min.js",
                "/flash/libs/modules/tween/tween.min.js",
				"/flash/libs/modules/socket/socket.min.js",
                "/flash/libs/modules/socket/gateway.min.js",
                "/flash/libs/modules/ceui/eui/eui.js",
                "/flash/libs/modules/jszip/jszip.min.js",
                "/flash/libs/modules/start/start.min.js"
            ];

            window.loadScript(list, function() {
                __override__()
                egret.runEgret({
                    renderMode: "webgl",
                    audioType: 0
                });
            });
        }

        var browser = {
            versions: function() {
                var u = navigator.userAgent,
                    app = navigator.appVersion;
                return {
                    trident: u.indexOf('Trident') > -1,
                    presto: u.indexOf('Presto') > -1,
                    webKit: u.indexOf('AppleWebKit') > -1,
                    gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1,
                    mobile: !!u.match(/AppleWebKit.*Mobile.*/) || !!u.match(/AppleWebKit/),
                    ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/),
                    android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1,
                    iPhone: u.indexOf('iPhone') > -1 || u.indexOf('Mac') > -1,
                    iPad: u.indexOf('iPad') > -1,
                    webApp: u.indexOf('Safari') == -1
                };
            }(),
            language: (navigator.browserLanguage || navigator.language).toLowerCase()
        }

        var loadScript = function(list, callback) {
            if (list.length < 1) {
                callback()
                return
            }
            var loaded = 0;
            var startLen = 0
            var loadNext = function() {
                for (var i = 0; i < 10; ++i) {
                    var url = list[loaded++]
                    if (url) {
                        loadSingleScript(url, function() {
                            startLen++;
                            if (startLen >= list.length) {
                                callback();
                            } else {
                                loadNext();
                            }
                            if (window.Main && window.Main.Instance) {
                                var _p = startLen / list.length
                                Main.Instance.UpdateLoadingUI(true, "Đang tải dữ liệu", _p * 0.2, _p, 1)
                            }
                        })
                    }
                }
            };
            loadNext();
        };

        var loadSingleScript = function(src, callback) {
            var s = document.createElement('script');
            s.type = "text/javascript";
            s.setAttribute('crossorigin', '');
            s.async = false;
            s.src = src;
            s.addEventListener('load', function() {
                s.parentNode.removeChild(s);
                s.removeEventListener('load', arguments.callee, false);
                callback();
            }, false);
            document.body.appendChild(s);
        };

        function __StartLoading() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', './flash/ulY5Vje5mjKn.png?v=' + Math.random(), true);
            xhr.addEventListener("load", function() {
                var manifest = JSON.parse(xhr.response);
                window.verData = manifest;
                var list = [].concat(manifest.game);
                window.loadScript(list, function() {
                    StartMain.RunGame()
                });
            });
            xhr.send(null);

            /*var xhr = new XMLHttpRequest();
            var gameVer = Math.max(Main.Instance.mConnectServerData.version, window.__GAME_VER__)
            xhr.open('GET', _URL_ROOT_ + "ver/ver" + gameVer + "_" + __CONFIG__.__GAME_ID__ + ".json", true);
            xhr.addEventListener("load", function () {
            var manifest = JSON.parse(xhr.response);
            window.verData = manifest;
            var mainjsVer = manifest["main.min.js"] || manifest["__base_ver__"]
            var list = [
            __CONFIG__.__START_RES__ + "merged2.js",
            __CONFIG__.__RES_URL__ + mainjsVer + "/main_" + __CONFIG__.__GAME_ID__ + "_" + mainjsVer+ ".min.js",
            ]
            window.loadScript(list, function () {
            StartMain.RunGame()
            });
            });
            xhr.send(null);*/
        }



        function __CalcScreen() {
            var bgimgbg = document.getElementById("bgimgbg")
            if (!bgimgbg) {
                return
            }
            var myimg = document.getElementById("bgimg");
            if (!myimg || !bgimgbg) {
                return
            }

            var rect = bgimgbg.getBoundingClientRect()
            var screenWidth = rect.width
            var screenHeight = rect.height

            var ratio = screenWidth / screenHeight
            if (ratio < 0.5) {
                var scaleX = (screenWidth / 720) || 0;
                displayHeight = Math.round(1440 * scaleX);
            } else {
                displayHeight = screenHeight
            }
            var displayWidth = Math.floor(displayHeight / 4 * 3)

            myimg.style.width = displayWidth + "px";
            myimg.style.height = displayHeight + "px";
            myimg.style.top = ((screenHeight - displayHeight) >> 1) + "px";
            myimg.style.left = ((screenWidth - displayWidth) >> 1) + "px";
        }

        window.addEventListener("resize", __CalcScreen);
        __CalcScreen()

        function __RemoveBg() {
            var myimg = document.getElementById("bgimgbg");
            if (!myimg) {
                return
            }
            myimg.parentElement.removeChild(myimg)
            window.removeEventListener("resize", __CalcScreen);
        }

        function _startLoading(str) {
            var myloading = document.getElementById("loader");
            var load_text = document.getElementById("load_text");
            if (!myloading || !load_text) {
                return
            }
            load_text.innerText = str
            myloading.style.display = "block"
        }

        function __RemoveLoading() {
            var myloading = document.getElementById("loader");
            if (!myloading) {
                return
            }
            myloading.parentElement.removeChild(myloading)
        }

        function closeSocket() {
            if (Main.closesocket) {
                Main.closesocket();
            } else {
                console.error("not Main.closesocket")
            }
        }

        function showGame() {

        }

        function _LoginToken(callback) {
            if (!callback) {
                return
                var group = new egret.DisplayObjectContainer
                group.visible = false

                var rect1 = new egret.Bitmap
                rect1.touchEnabled = false
                group.addChild(rect1)
                RES.getResByUrl("/flash/resource/assets/game_start/login_bg.png", function(obj, name) {
                    group.visible = true
                    rect1.texture = obj
                    group.width = obj.textureWidth
                    group.height = obj.textureHeight
                    group.x = (egret.MainContext.instance.stage.stageWidth - group.width) >> 1
                    group.y = (egret.MainContext.instance.stage.stageHeight - group.height) >> 1
                }, this, RES.ResourceItem.TYPE_IMAGE)

                var text = new egret.TextField
                text.x = 190
                text.y = 140
                text.width = 350
                text.height = 60
                text.textAlign = "left"
                text.verticalAlign = egret.VerticalAlign.MIDDLE
                text.type = egret.TextFieldType.INPUT

                text.text = egret.localStorage.getItem("account");
                if (text.text == null || text.text == "") {
                    text.text = "Vui lòng nhập tài khoản"
                }

                group.addChild(text)

                var btn = new ServerGroup
                btn.x = 130
                btn.y = 300
                btn.width = 350
                btn.height = 70
                btn.touchEnabled = true
                group.addChild(btn)

                var click = function() {
                    egret.localStorage.setItem("account", text.text);
                    group.parent.removeChild(group)
                    if (callback && text.text != "Vui lòng nhập tài khoản") {
                        callback(text.text, JSON.stringify(serData))
                    }
                }

                btn.addEventListener(egret.TouchEvent.TOUCH_TAP, click, this)
                egret.MainContext.instance.stage.addChild(group)
            } else {
				<?php
				$account = $_SESSION['username'];
				$server = $_SESSION['serverid'];
				$accname = 's'.$server.'.'.$account;
				if($_SESSION['username']==''){
                echo 'egret.localStorage.setItem("account", "");
                callback("")';
				}else {
                echo 'egret.localStorage.setItem("account", "'.$accname.'");
                callback("'.$accname.'")';	
				}
				?>
            }
        }

        function __override__() {

            // var func1 = GameServerDescData.Get
            // GameServerDescData.Get = function(obj, ignore) {
            // 	var data = func1.call(null, obj, ignore)
            // 	if (data) {
            // 		data.ip = "192.168.1.240:50040"
            // 	}
            // 	return data
            // }

            if (!window["IsLocalIPList"]) {
                return
            }
            var list = []
            var startId = 100
            for (var i = 0; i < serverList.length; ++i) {
                var str = serverList[i]
                var strData = str.split("|")
                var serverid = startId--;
                if (strData[2]) {
                    serverid = Number(strData[2])
                }
                var t = egret.localStorage.getItem("__server_id__(" + serverid + ")");
                nameDict[serverid] = strData[0]
                list.push({
                    version: 1,
                    status: 2,
                    sid: serverid,
                    addr: strData[1],
                    time: t ? Number(t) : serverid,
                    job: (Math.floor(i / 2) % 3) + 1,
                    sex: i % 2,
                    name: "ID " + i,
                })
            }

            var serData = {
                data: {
                    player: {
                        username: "",
                        gm_level: 100,
                        lid: "3_51"
                    },
                    maxid: serverList.length,
                    ns: 0,
                    lpage: list,
                    recent: list.slice(),
                    // recent: [],
                },
                result_msg: "",
                status_msg: "",
                status: 1,
                result: 1,
            }

            HttpHelper.GetPlayerServerInfo = function(token, callback, thisObject) {
                serData.data.player.username = token
                callback.call(thisObject, {
                    currentTarget: {
                        response: JSON.stringify(serData)
                    }
                })
            };

            HttpHelper.GetServerList = function() {

            }

            var func = Main.prototype.StartLoadGame

            Main.prototype.StartLoadGame = function(serverData) {
                func.call(this, serverData)
                egret.localStorage.setItem("__server_id__(" + serverData.id + ")", new Date().getTime());
            }

        }
        window.onbeforeunload = function(e) {
            e = e || window.event;

            // For IE and Firefox prior to version 4
            if (e) {
                e.returnValue = 'Bạn muốn thoát game?';
            }

            // For Safari
            return 'Bạn muốn thoát game?';
        }
    </script>
</body>

</html>