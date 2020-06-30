<?php
header("Content-Type: text/html; charset=utf-8");
$con=mysqli_connect('localhost','root','5d35fbc9c39d15f5');
if(!$con){
die('connect failed!');
}else{
}
mysqli_select_db( $con,"words");
mysqli_query($con,"SET NAMES utf8");
$result = mysqli_query($con, "select * from words3 order by rand() limit 1");
$row = mysqli_fetch_assoc($result);
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="referrer" content="no-referrer" />
    <title>OneTalk</title>
    <style>
	    body{
	  			margin: 0;
	  			padding: 0;
	  			font-family: "montserrat";
	  			background-image: linear-gradient(125deg,#2c3e50,#27ae60,#2980b9,#e74c3c,#8e44ad);
	  			background-size: 400%;
	  			animation: bganimation 15s infinite;
		  }
		.text{
            color: white;
            text-align: center;
            text-transform: uppercase;
            margin: 300px 0;
            font-size: 22px;
		}
		@keyframes bganimation {
	  		0%{
	    		background-position: 0% 50%;
	  		}
	  		50%{
	    		background-position: 100% 50%;
	  		}
	  		100%{
	    		background-position: 0% 50%;
	  		}
		}
    </style>
    <style>
        *{
            margin:0;
            padding:0;
        }
        ul{
            list-style-type:none;
            margin:100px 50px;/*margin:100px auto无效,不能使ul左右居中*/
            text-align:center;
            font-size:14px;
        }
        li{
            float:left;/*改动的地方*/
            width:80px;
            padding:10px;
            background-color:#ff9137;
        }
        a:link,a:visited,a:hover,a:active{
            color:#fff;
            text-decoration:none;
        }
        a{
            display:block;/*整体变为可点击区域，而不只是字*/
        }
    </style>
    <link rel="stylesheet" href="css/solid.css">
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet"  href="css/box.css">
    <script src="js/ripple.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/index.js"></script>
</head>

<body>
<ul>
        <li><a href="./index.php">主页</a></li>
        <li><a href="./check.html">登记体温</a></li>
        <li><a href="http://116.62.135.13:5000/" target="_blank">实时疫情数据</a></li>
        <li><a href="./introduce.html" target="_blank">关于我们</a></li>
        <li><a href="./index.html">退出</a></li>
    </ul>
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <main role="main" class="inner cover" align="center">
        <header class="masthead mb-auto">
        <div class="inner">
            <span class="masthead-brand"></span>
            <nav class="nav nav-masthead justify-content-center">
            </nav> 
        </div>
        </header>
                <div class="quote">
                    <div>
                        <div class="box box1">
                            <p class="lead"><strong><?php echo $row["contents"];?></strong></p>
                            <p class="lead">&nbsp;&nbsp;</p>
                            <p class="lead"><?php echo $row["author"];?></p>
                            <p class="lead"></p>
                        </div>
                    </div>
                    <div class="bg"></div>
                </div>
                <div class="container">
                        <a href="index.php">
                            <button class="btn ripple-effect">再来一条
                                    <span class="ripple" style="width: 100px; height: 100px; top: -20px; left: 14px;"></span>
                            </button>
                        </a>
                </div>
        </main>
    </div>
    <div id="dowebok">
        <div id="player">
            <div id="player-track">
                <div id="album-name"></div>
                <div id="track-name"></div>
                <div id="track-time">
                    <div id="current-time"></div>
                    <div id="track-length"></div>
                </div>
                <div id="s-area">
                    <div id="ins-time"></div>
                    <div id="s-hover"></div>
                    <div id="seek-bar"></div>
                </div>
            </div>
            <div id="player-content">
                <div id="album-art">
                     <img src="" class="active" id="album-pic"> 
                    <div id="buffer-box">加载中...</div>
                </div>
                <div id="player-controls">
                    <div class="control">
                        <div class="button" id="play-previous">
                            <i class="fas fa-backward"></i>
                        </div>
                    </div>
                    <div class="control">
                        <div class="button" id="play-pause-button">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <div class="control">
                        <div class="button" id="play-next">
                            <i class="fas fa-forward"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>