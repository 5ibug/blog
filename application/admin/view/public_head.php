<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>{$admin_title|default=WEB_TITLE}管理系统</title>
        <link rel="stylesheet" href="/src/admin/css/admin.css">
        <link rel="stylesheet" href="/src/admin/layui/css/layui.css">
        <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
        <script src="/src/admin/layui/layui.js"></script>

    </head>
    <body>
        <div class="header">
          <div class="logo">
                    <center>
                    <h2 class="z cl" style="width:200px;padding-left:0;" ><a href="{:url('index/index')}">{$admin_title|default=WEB_TITLE}</a></h2>
                    </center>
          </div>
              <ul class="layui-nav" style = 'padding:0;float:right;'>
                <li class="layui-nav-item">
                  <a href="">控制台</a>
                </li>
                <li class="layui-nav-item">
                  <a href="{:url('/')}">网站首页</a>
                </li>
                <li class="layui-nav-item">
                  <a href="javascript:;"><img src="{$admin_userimg|default='http://t.cn/RCzsdCq'}" class="layui-nav-img">{$admin_nickname|default="admin"}</a>
                  <dl class="layui-nav-child">
                    <dd><a href="{:url('user/index')}">修改信息</a></dd>
                    {/*<dd><a href="javascript:;">安全管理</a></dd>*/}
                    <dd><a href="{:url('login/out')}">退出</a></dd>
                  </dl>
                </li>
              </ul>
                        
        </div>
        <div class="admin">
            <div class="aleft">

                <ul class="layui-nav layui-nav-tree layui-nav-side"  lay-filter="test" style="padding-top:60px;">
                  <li class="layui-nav-item layui-nav-itemed">
                    <a href="javascript:;">网站管理</a>
                    <dl class="layui-nav-child">
                      <dd><a href="{:url('options/index')}">网站设置</a></dd>
                      <dd><a href="{:url('user/index')}">用户管理</a></dd>
                    </dl>
                  </li>
                  
                  <li class="layui-nav-item">
                    <a href="javascript:;">文章管理</a>
                    <dl class="layui-nav-child">
                      <dd><a href="{:url('Article/edit')}">添加文章</a></dd>
                      <dd><a href="{:url('Article/index')}">文章列表</a></dd>
                    </dl>
                  </li>
                  
                  <li class="layui-nav-item">
                    <a href="javascript:;">友链管理</a>
                    <dl class="layui-nav-child">
                      <dd><a href="{:url('Link/edit')}">添加友链</a></dd>
                      <dd><a href="{:url('Link/index')}">友链列表</a></dd>
                    </dl>
                  </li>
                  
                   <li class="layui-nav-item">
                    <a href="javascript:;">类型管理</a>
                    <dl class="layui-nav-child">
                      <dd><a href="{:url('Type/edit')}">添加类型</a></dd>
                      <dd><a href="{:url('Type/index')}">文章列表</a></dd>
                    </dl>
                  </li>
                  
                  <li class="layui-nav-item"><a href="https://www.5ibug.net">吾爱bug</a></li>
                </ul>
              
            </div>
        </div>