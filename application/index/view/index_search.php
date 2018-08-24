<article>
  <include file="public_aside">
  <main class="r_box">
      <volist name='list' id='vo'>
        <li><i><a href="/info/{$vo.id}/"><img src="{$vo.img|default='/src/blog/images/default.png'}"></a></i>
          <h3><a href="/info/{$vo.id}/">{$vo.title}</a></h3>
          <p><?php echo $vo['desc'] ? htmlspecialchars_decode($vo['desc']) : '暂无简介'; ?>...
            <a href="/info/{$vo.id}/">[查看全文]</a></p>
        </li>
      </volist>
  </main>
</article>