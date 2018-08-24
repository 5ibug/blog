<style>
  .layui-form-label{text-align:left;}
</style>
<div class="aright" style="text-align:center;">
<h2 style="margin:1em 0;">编辑用户 {$user.username}</h2>



<form class="layui-form" style="width:90%;text-align:left;margin:0 auto" data-type='ajax'action="{:url('admin/user/update')}"> 
  
  <div class="layui-form-item">
    <label class="layui-form-label">用户名*</label>
    <div class="layui-input-block">
      <input type="text" name="username" placeholder="用户名" autocomplete="off" value="{$user.username}" class="layui-input" lay-verify="required">
    </div>
  </div>
    
  <div class="layui-form-item">
    <label class="layui-form-label">用户昵称</label>
    <div class="layui-input-block">
      <input type="text" name="nickname" placeholder="昵称" autocomplete="off" value="{$user.nickname}" class="layui-input">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">用户密码</label>
    <div class="layui-input-block">
      <input type="password" name="password" placeholder="密码" autocomplete="off"  class="layui-input">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">电子邮件</label>
    <div class="layui-input-block">
      <input type="text" name="email" placeholder="email" autocomplete="off" value="{$user.email}" class="layui-input" lay-verify="email" >
    </div>
  </div>

  
  <div class="layui-form-item">
    <label class="layui-form-label">用户组</label>
    <div class="layui-input-block">
      <select lay-filter="aihao">
        <option value="0">管理员</option>
        <!--<option value="1">管理员</option>-->
      </select>
    </div>
  </div>
  
    <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">描述</label>
    <div class="layui-input-block">
      <textarea name = 'synopsis' placeholder="请输入内容" class="layui-textarea">{$user.synopsis}</textarea>
    </div>
  </div>

  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="*">立即提交</button>
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