<article>
  <include file="public_aside">
  <main class="r_box">
      <volist name='list' id='vo'>
        <li><i><a href="/info/{$vo.id}.html"><img src="{$vo.img|default='/src/blog/images/default.png'}"></a></i>
          <h3><a href="/info/{$vo.id}.html">{$vo.title}</a></h3>
          <p><?php echo $vo['desc'] ? htmlspecialchars_decode($vo['desc']) : '暂无简介'; ?>...
            <a href="/info/{$vo.id}.html">[查看全文]</a></p>
        </li>
      </volist>
  </main>
    <div class="pageshow">
      {$page|raw}
    </div>
</article>