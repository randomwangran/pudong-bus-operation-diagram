<?php

session_start();
$roadline = $_GET['roadline'];
$roadline = strtr("$roadline","%","\\");
$rzw = '{"zw":'.'"'.$roadline.'"'."}";
$rzw = json_decode($rzw);
$roadline = $rzw -> zw ;

if (!empty($_SESSION['busp'][1])) {
    $x = count($_SESSION['busp']) +1;
    $_SESSION['busp'][$x] = $roadline;
} else $_SESSION['busp'][1] = $roadline;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="content-type" content="no-cache, must-revalidate" />
    <meta http-equiv="expires" content="Wed, 26 Feb 1997 08:21:57 GMT" />
    <meta name="viewport" content="width=device-width, minimum-scale=0.2, maximum-scale=2.0, user-scalable=yes" />
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Cache" content="no-cache">
    <title>模拟图</title>
    <style type="text/css">
    @font-face {
            font-family:OpenSans;
            src:url('css/OpenSans-Regular.ttf')
        }
        body {
            font-family:"OpenSans","Arial","等线";
            font-weight:12px;
            margin:0;
            padding:0;
            font-size:10px
        }
        .point1 { background:url(Images/Point1.svg) no-repeat;
            width:14px;
            height:14px;
            z-index:1000;
            float:left;
            position:absolute;
            left:-2.7px
        }
        .point2 { background:url(Images/Point2.svg) no-repeat;
            width:15px;
            height:15px;
            right:-19px;
            z-index:1000;
            position:absolute
        }
        .st { background:url(Images/Station.svg) no-repeat;
            width:12px;
            height:13px;
            margin-left:-4px;
            z-index:1
        }
        .line { background:url(Images/Line.svg) no-repeat;

            z-index:1
        }
        .upInSt { background:url(Images/down.gif);
            width:15px;
            height:15px;
            z-index:1000;
            float:left;
            position:absolute;
            left:-4px
        }
        .downInSt { background:url(Images/up.gif);
            width:15px;
            height:15px;
            right:-18px;
            z-index:1000;
            position:absolute;
            top:-1px
        }
        .dnone { display:none
        }
        .dblock { display:inherit
        }
        .leftst { margin-left:20px;
            width:70px;
            z-index:1000;
            position:relative
        }
        .rightst { margin-left:-70px;
            width:65px;
            text-align:right;
            z-index:1000;
            position:relative
        }
        #loading {
            position:fixed;_position:absolute;
            top:50%;
            left:50%;
            width:124px;
            height:124px;
            overflow:hidden;
            background:url(Images/loaderc.gif) no-repeat;
            z-index:7;
            margin:-62px 0 0 0
        }
        .waitveh {
            border-width: 15px;
            border: 1px solid #2196f3;
            border-radius: 20px;
	        margin: 0px auto;
	        padding: 2px;
            word-break:keep-all;/* 不换行 */
            white-space:nowrap;/* 不换行 */
            overflow:hidden;/* 内容超出宽度时隐藏超出部分的内容 */
            text-overflow:ellipsis;
        }
        .redcolor { 
            border-width: 15px;
            border: 1px solid #2196f3;
            border-radius: 20px;
	        margin: 0px auto;
	        padding: 2px;
            background: #2196f3;
            word-wrap:break-word;
            white-space:nowrap;/* 不换行 */
            overflow:hidden;/* 内容超出宽度时隐藏超出部分的内容 */

            color:white;
        }

        .leftdi { position:absolute;
            top:12px;
            left:22px
        }
        .rightdi { position:absolute;
            top:12px;
            right:5px
        }

        .facheping {
            color:#2196f3
        }
        ::selection {
        background:#AECBFA;
        color:#3a3646;
        }
        ::-moz-selection {
        background:#AECBFA;
        color:#3a3646;
        }
        ::-webkit-selection {
        background:#AECBFA;
        color:#3a3646;
        }
    </style>
    <script type="text/javascript" src="Scripts/jquery-1.4.1.min.js"></script>
    <script type="text/javascript" src="Scripts/SetMuX.js?version=2020021109"></script>
</head>
<body>
    <div id="loading"></div>
    <div id="RefreshM" style="display:none">
        模拟图加载不成功请点击<a href="javascript:window.top.location.reload()">刷新</a>
    </div>
    <div id="divNull" style="display:none">
        该线路模拟图暂未开通<a href="javascript:history.go(-1);">返回</a>
    </div>
    <div id="showModule" style=" width: 360px; margin:12px auto;  ">
        <div style=" margin:5px; width:100%; text-align:center; font-weight:bold;"></div>
        <div id="lastup" style="width: 360px; margin: auto; text-align: center; z-index:1000; position:static;line-height:20px;left:0px;margin-top: 20px">
        </div><br>
        <div style=" width:110px;  ">
            线路：<span id="RoadLine" style=" color: #2196f3; font-weight: 900; font-size:16px"></span><br />计划配车:<span id="busCount"></span><br />当前营运车辆:<span id="lineCount"></span>
        </div>
        <div style=" width:98px; float:right; position:relative; left:15px; top: -54px;">
            计划发车间隔:<span id="plan1"></span><br />预计发车间隔:<span id="dplan1"></span><br />本班车:<span id="vnup1" class="facheping"></span><br />                时间:&ensp;&ensp;&ensp;<span id="timeup1" class="facheping"></span>
        </div>
        <div style="width: 145px; margin: auto;">
            <div style="text-align: center; margin-top: -30px; height: 30px;" id="upst"></div>
            <div style="background: url(Images/b1.svg);background-size: contain; no-repeat 2px; height: 65px; position: relative">
                <div style="width: 38px; height: 28px; background: url(Images/Terminal.svg) no-repeat 2px; background-size: 90%;position: absolute; left:55px; top: -6px"></div>
            </div>
            <div id="stationall" style="width: 100%; height: 890px; z-index: 1; position:relative; top: 0px; left: 0px;">
                <div id="up" style="width: 4px; height: 100%; background-color: #2196f3; float: left;                    margin-left: 2px; z-index: 1; position:absolute"></div>
                <div id="park" style="z-index: 1000; position: absolute; width:130px; top: -1px; left: 0px;"></div>
                <div id="down" style="width: 4px; height: 100%; right: 2px;top:-1px; background-color: #2196f3;position:absolute"></div>
                <div id="downpark" style="z-index: 1000; position:relative; display:none "></div>
            </div>
            <div style="background: url(Images/b2.svg) no-repeat 2px; background-size: cover;height: 65px; width: 100%; position: relative;margin-left: -2px">
                <div style="width: 38px; height: 28px; background: url(Images/Terminal.svg) no-repeat 2px;background-size: 90%;position: absolute; top: 40px; left:55px"></div>
            </div>
            <div style="text-align: center; margin-top: 13px;" id="downst"></div>
        </div>
        <div style=" width:98px; float:right;  margin-top:-54px;position:relative; left:5px;  ">
            计划发车间隔:<span id="plan2"></span><br />预计发车间隔:<span id="dplan2"></span><br />本班车:<span id="vndown1" class="facheping"></span><br />                时间:&ensp;&ensp;&ensp;<span id="timedown1" class="facheping"></span>
        </div>
    </div>
    <div id="lastdown" style="width: 300px; height: 20px; margin: auto; text-align: center; line-height:20px;     margin-top: -3px;z-index:1000; position:relative"></div>
    <div style=" width:100%; height:60px"></div>
</div>
</body>
</html>
