<div class="aright">
    <div class="arz" style="float: left;margin: 0px 20px 20px 30px;"><a href="{:url('link/edit')}"><i class="layui-icon">&#xe608;</i>添加友链</a></div>

    <form method="post" class="aform cl " >
        <table width="100%">
            <tr>
                <th width="2%" align="center">id</th>
                <th width="10%" align="center">标题</th>
                <th width="15%" align="center">地址</th>
                <th width="5%" align="center">状态</th>
                <th width="10%" align="center">添加时间</th>
                <th width="10%" align="center">基本操作</th>
            </tr>
            <volist name="list" id="vo">
                <tr>
                    <td align="center">{$vo.id}</td>
                    <td align="center"><a target="_blank" href="{$vo.link}">{$vo.title}</a></td>
                    <td align="center"><a target="_blank" href="{$vo.link}">{$vo.link}</a></td>
                    <td align="center"><?php if($vo['state']=='1') echo '正常'; else echo '隐藏'; ?></td>
                    <td align="center">{$vo.c_time|date='Y-m-d H:i:s'}</td>
                    <td align="center">
                        <a href="{:url('link/edit',['id'=>$vo['id']])}" class="layui-btn layui-btn-small" style="margin-bottom:2px;">修改</a>
                        <a href="{:url('link/delete',['id'=>$vo['id']])}" class="layui-btn layui-btn-small layui-btn-danger" style="margin-bottom:2px;">删除</a> 
                    </td>
                </tr>
            </volist>
         
        </table>
    </form>
</div>
</div>
<script>
</script>
</body>
</html>