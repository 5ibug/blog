<link rel="stylesheet" href="/src/admin/editor.md/css/editormd.css">

<div class="aright">
    <fieldset class="layui-elem-field layui-field-title" style="margin: 20px 30px 20px 20px;">
        <legend><?php echo isset($info['id']) ? '修改' : '添加'; ?>文章</legend>
    </fieldset>
    <form class="layui-form bform" method="post" enctype="multipart/form-data">
        <div class="layui-form-item">
            <label class="layui-form-label">文章标题</label>
            <div class="layui-input-block">
                <input type="text" name="title" required lay-verify="required" value="{$info.title}" placeholder="必填内容" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">缩略图</label>
            <div class="layui-input-block">
                <div class="file-box">
                    <i class="layui-icon">&#xe61f;</i>
                    <input class="file-btn" type="button" value="选择图片"> 
                    <input class="file-txt" type="text" autocomplete="off"  id="textfield">
                    <if ($info['img'])><img src="{$info.img|default=''}" width="120"><else/></if>
                    <input class="file-file" type="file" name="img" id="pic" size="28" onchange="document.getElementById('textfield').value = this.value" /> 
                </div>
            </div>
        </div>
        <div class="layui-form-item" style="width: 300px;">
            <label class="layui-form-label">文章类型</label>
            <div class="layui-input-block">
                <select name="type">
                    <option value="0">请选择</option>
                    <volist name="notes.type" id="vo">
                        <option <if ($info['type']==$key)>selected="selected"</if> value="{$key}">{$vo}</option>
                    </volist>
                </select>
            </div>
        </div>
        <div class="layui-form-item" style="width: 300px;">
            <label class="layui-form-label">文章状态</label>
            <div class="layui-input-block">
                <select name="status">
                    <option value="0">请选择</option>
                    <volist name="notes.status" id="vo">
                        <option <if ($info['status']==$key)>selected="selected"</if> value="{$key}">{$vo}</option>
                    </volist>
                </select>
            </div>
        </div>
		<div class="layui-form-item">
            <label class="layui-form-label">文章简介</label>
            <div class="layui-input-block">
                <textarea name = 'desc' placeholder="请输入内容" class="layui-textarea">{$info.desc}</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">文章内容</label>
            <div class="layui-input-block">
              <div id="test-editormd" style='height:550px;'>
                <textarea style="display:none;" name="content">{$info.content|raw}</textarea>
             </div>
              
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <input type="hidden" name="id" value="{$info.id}">
                <button class="layui-btn" lay-filter="formDemo" >立即提交</button> 
            </div>
        </div>
    </form>
</div>
<script src="/src/admin/editor.md/editormd.min.js"></script>
<script>
    layui.use('form', function () {
        var form = layui.form();
    });

			var testEditor;

            $(function() {
                testEditor = editormd("test-editormd", {
                    width   : "100%",
                    height  : 640,
                    syncScrolling : "single",
                    path    : "/src/admin/editor.md/lib/",
                    emoji: true,
                });
            });


</script>