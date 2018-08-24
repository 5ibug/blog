  <aside class="l_box">
      <div class="about_me">
        <h2>关于我</h2>
        <ul>
          <i><img src="{$webs.userimg}"></i>
          <p>{$webs.synopsis}</p>
        </ul>
      </div>
      <div class="search">
        <form action="{:url('/search')}" method="post" name="searchform" id="searchform">
          <input name="keyboard" id="keyboard" class="input_text" value="请输入关键字词" style="color: rgb(153, 153, 153);" onfocus="if(value=='请输入关键字词'){this.style.color='#000';value=''}" onblur="if(value==''){this.style.color='#999';value='请输入关键字词'}" type="text">
          <input name="show" value="title" type="hidden">
          <input name="tempid" value="1" type="hidden">
          <input name="tbname" value="news" type="hidden">
          <input name="Submit" class="input_submit" value="搜索" type="submit">
        </form>
      </div>
      <div class="fenlei">
        <h2>文章分类</h2>
        <ul>
         <volist name="headernav.type" id="v">
            <li>
                <a href="/type/{$key}.html"> {$v} </a>
            </li>
          </volist>
          </ul>
      </div>
      <div class="links">
        <h2>友情链接</h2>
        <ul>
          <volist name="link" id="voo">
              <?php
                if($voo['state'] == 1){
              ?>
              <a href="{$voo.link}">{$voo.title}</a>
              <?php } ?>
            </volist>
        </ul>
      </div>
      <div class="guanzhu">
        <h2>关注我 么么哒</h2>
        <ul>
          <img src="http://img.la/200x200">
        </ul>
      </div>
  </aside>