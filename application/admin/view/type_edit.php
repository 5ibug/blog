<style>
  .layui-form-label{text-align:left;}
</style>
<div class="aright" style="text-align:center;">
<h2 style="margin:1em 0;"><?php echo isset($info['id']) ? '修改' : '添加'; ?>类型</h2>

<form class="layui-form" style="width:90%;text-align:left;margin:0 auto" data-type='ajax' action="<?php echo isset($info['id']) ? url('type/edit',['id'=>$info['id']]) : url('type/edit'); ?>" method="post" > 
  
  <div class="layui-form-item">
    <label class="layui-form-label">类型名称</label>
    <div class="layui-input-block">
      <input type="text" name="name" placeholder="类型." autocomplete="off" class="layui-input" value="{$info.name}">
    </div>
  </div>

  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="*"><?php echo isset($info['id']) ? '修改' : '添加'; ?>类型</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
  
  </div>
  
</form>
