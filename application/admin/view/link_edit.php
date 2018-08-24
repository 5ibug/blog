<style>
  .layui-form-label{text-align:left;}
</style>
<div class="aright" style="text-align:center;">
<h2 style="margin:1em 0;"><?php echo isset($info['id']) ? '修改' : '添加'; ?>友链</h2>

<form class="layui-form" style="width:90%;text-align:left;margin:0 auto" data-type='ajax' action="<?php echo isset($info['id']) ? url('link/edit',['id'=>$info['id']]) : url('link/edit'); ?>" method="post" > 
  
  <div class="layui-form-item">
    <label class="layui-form-label">标题</label>
    <div class="layui-input-block">
      <input type="text" name="title" placeholder="站点的标题." autocomplete="off" class="layui-input" value="{$info.title}">
    </div>
  </div>
    
  <div class="layui-form-item">
    <label class="layui-form-label">链接</label>
    <div class="layui-input-block">
      <input type="text" name="link" placeholder="网站的链接." autocomplete="off" value="{$info.link}" class="layui-input">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">状态</label>
    <div class="layui-input-block">
      <select lay-filter="aihao" name="state">
        <option value="1" <?php if($info['state'] == 1) echo 'selected = "selected"'; ?>>显示</option>
        <option value="2" <?php if($info['state'] == 2) echo 'selected = "selected"'; ?>>隐藏</option>
      </select>
    </div>
  </div>

  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="*"><?php echo isset($info['id']) ? '修改' : '添加'; ?>友链</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
  
  </div>
  
</form>
