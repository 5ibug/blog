<style>
  .layui-form-label{text-align:left;}
</style>
<div class="aright" style="text-align:center;">
<h2 style="margin:1em 0;">网站设置</h2>



<form class="layui-form" style="width:90%;text-align:left;margin:0 auto" data-type='ajax'action="{:url('options/update')}"> 
  
  <div class="layui-form-item">
    <label class="layui-form-label">站点名称</label>
    <div class="layui-input-block">
      <input type="text" name="webname" placeholder="站点的名称将显示在网页的标题处." autocomplete="off" class="layui-input" value="{$weboptions.webname}">
    </div>
  </div>
    
  <div class="layui-form-item">
    <label class="layui-form-label">站点描述</label>
    <div class="layui-input-block">
      <input type="text" name="description" placeholder="站点描述将显示在网页代码的头部." autocomplete="off" value="{$weboptions.description}" class="layui-input">
    </div>
  </div>
  
  
  <div class="layui-form-item">
    <label class="layui-form-label">关键词</label>
    <div class="layui-input-block">
      <input type="text" name="keywords" placeholder="请以半角逗号 , 分割多个关键字." autocomplete="off" value="{$weboptions.keywords}" class="layui-input" >
    </div>
  </div>

  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="*">保存设置</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
  
  </div>
  
</form>

<script>

  
$(document).on('submit','form[data-type=ajax]',function(){
            var url = $(this).attr('action');
            var data = $(this).serializeArray();
  			console.log(data);
  
            $.ajax({
                type: "POST",
                dataType: "json",
                url: url,
                data: data,
                success: function (msg) {
                    console.log(msg);
                  if (msg.code != '1') {
                    layer.msg(msg.msg);
                    return;
                  } else {
                     layer.msg(msg.msg);
                  }
                },
                error: function(data){
                    alert("网络错误");
                    
                }
            });
   


  
            return false;
        });

  
</script>