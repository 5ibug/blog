<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>文件没有找到 - 吾爱bug</title>
	<meta name="Keywords" content="404错误页面"/>
	<meta name="Description" content="404错误页面"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="icon" href="/favicon.ico">
    <link href="/src/404/404.css" rel="stylesheet">
	 <script type="text/javascript">
       window.onload=function (){
           var time = 5;
           document.getElementById('time').innerHTML=time;
           setInterval(function(){
             if(time == 0){ 
                 top.location='/';
             }else{
                 time--;
                 document.getElementById('time').innerHTML=time;
             }
           },1000);
       }
     </script> 
</head>

<body>
	<div class="error404">
		<div class="info">
			<h1>404</h1>
			<h2>抱歉，您访问的页面不存在或已被删除！ (｡•ˇ‸ˇ•｡)</h2>
			<p class="p1"><span id="time"></span>秒钟后将带您返回首页</p>
			<div class="menu">
				<a href="/">首 页</a> | <a href="https://www.5ibug.net">吾爱bug</a>
			</div>			
			<a href="/" class="btn">返回首页</a>
			<a href="#" class="btn btn-brown">返回上一步</a>
		</div>
		<div class="pic">
			<img src="/src/404/404.gif" alt="404图片" />
		</div>
	</div>
</body>
</html>