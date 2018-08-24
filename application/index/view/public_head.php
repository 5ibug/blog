<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>{$webs.title|default='标题'}</title>
<meta name="keywords" content="{$keywords|default='keywords'}" />
<meta name="description" content="{$description|default='description'}" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="{$webs.userimg}" />
<link href="/src/blog/css/base.css" rel="stylesheet">
<link href="/src/blog/css/index.css" rel="stylesheet">
<link href="/src/blog/css/m.css" rel="stylesheet">
<script src="/src/blog/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/src/blog/js/comm.js"></script>
<link rel="stylesheet" href="/src/admin/editor.md/css/editormd.css" >
<!--[if lt IE 9]>
<script src="/src/blog/js/modernizr.js"></script>
<![endif]-->
</head>
<body>
<header class="header-navigation" id="header">
  <nav><div class="logo"><a href="/">{$webs.title|default='标题'}</a></div>
    <h2 id="mnavh"><span class="navicon"></span></h2>
    <ul id="starlist">
      <li class="menu-item menu-item-type-taxonomy menu-item-object-category">
        <a href="/">首页</a>
      </li>
      <volist name="headernav.type" id="v">
        <li class="menu-item menu-item-type-taxonomy menu-item-object-category">
            <a href="/type/{$key}.html" > {$v} </a>
        </li>
    </volist>
    </ul>
</nav>
</header>