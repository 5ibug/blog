<div class="aright">
    <div class="arz" style="float: left;margin: 0px 20px 20px 30px;"><a href="{:url('type/edit')}"><i class="layui-icon">&#xe608;</i>添加文章类型</a></div>

    <form method="post" class="aform cl " >
        <table width="100%">
            <tr>
                <th width="5%" align="center">id</th>
                <th width="15%" align="center">名称</th>
                <th width="10%" align="center">数量</th>
                <th width="15%" align="center">添加时间</th>
                <th width="15%" align="center">基本操作</th>
            </tr>
            <volist name="list" id="vo">
                <tr>
                    <td align="center">{$vo.id}</td>
                    <td align="center"><a target="_blank" href="{:url('index/Type/index',['id'=>$vo.id])}">{$vo.name}</a></td>
                    <td align="center">{$vo.num|default='0'}</td>
                    <td align="center">{$vo.time|date="Y-m-d H:i:s"}</td>
                    <td align="center">
                        <a href="{:url('type/edit',['id'=>$vo['id']])}" class="layui-btn layui-btn-small" style="margin-bottom:2px;">修改</a>
                        <a href="{:url('type/delete',['id'=>$vo['id']])}" class="layui-btn layui-btn-small layui-btn-danger" style="margin-bottom:2px;">删除</a> 
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