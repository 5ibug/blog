<div class="aright">
    <div class="aright_1">
        <blockquote style="padding: 10px;border-left: 5px solid #009688;" class="layui-elem-quote">系统信息：</blockquote>
        <table width="100%">
            <tr><td>服务器类型</td><td>{:php_uname('s')}</td></tr>
            <tr><td>PHP版本</td><td>{:PHP_VERSION}</td></tr>
            <tr><td>Zend版本</td><td>{:Zend_Version()}</td></tr>
            <tr><td>服务器解译引擎</td><td>{:$_SERVER['SERVER_SOFTWARE']}</td></tr>
            <tr><td>服务器语言</td><td>{:$_SERVER['HTTP_ACCEPT_LANGUAGE']}</td></tr>
            <tr><td>服务器Web端口</td><td>{:$_SERVER['SERVER_PORT']}</td></tr>
        </table>
        <blockquote style="padding: 10px;border-left: 5px solid #009688;" class="layui-elem-quote">开发团队：</blockquote>
        <table width="100%">
            <tr><td width="110px">版权所有</td><td><a href="https://www.5ibug.net/">5ibug保留所有权利</a></td></tr>
            <tr><td>版本号</td><td>{:config('config.version')}</td></tr>
        </table>
    </div>      
</div>