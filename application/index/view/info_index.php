<link href="/src/blog/css/info.css" rel="stylesheet">
<article>
<include file="public_aside">

  <main>
    <div class="infosbox">
      <div class="newsview">
        <h3 class="news_title">{$info.title}</h3>
        <div class="bloginfo">
          <ul>
            <li class="author">作者：<a href="/">{$webs.nickname}</a></li>
            <li class="lmname"><a href="/?type={$info.type}">{$headernav['type'][$info['type']]}</a></li>
            <li class="timer">时间：{$info.c_time}</li>
            <!--<li class="view">人已阅读</li>-->
          </ul>
        </div>
        {/* <div class="tags"><a href="/" target="_blank">个人博客</a> &nbsp; <a href="/" target="_blank">小世界</a></div> 
        <div class="news_about"><strong>简介</strong>个人博客，用来做什么？我刚开始就把它当做一个我吐槽心情的地方，也就相当于一个网络记事本，写上一些关于自己生活工作中的小情小事，也会放上一些照片，音乐。每天工作回家后就能访问自己的网站，一边听着音乐，一边写写文章。</div>
       */ }
        <hr style="margin:5px auto;"/>
            <div class="markdown-body editormd-preview-container" id="news_con" >
                  <textarea style="display:none;" placeholder="markdown语言">{$info.content|raw}</textarea>
            </div>
        
      </div>
      <div class="share">{/*makeRequest('/e/public/digg/?classid=3&amp;id=19&amp;dotop=1&amp;doajax=1&amp;ajaxarea=diggnum','EchoReturnedText','GET','');*/}
        <p class="diggit"><a href="JavaScript:alert('点赞功能后续添加')"> 很赞哦！ </a>(<b id="diggnum">13</b>)</p>
      </div>
      {/*
      <div class="nextinfo">
        <p>上一篇：<a href="/news/life/2018-03-13/804.html">作为一个设计师,如果遭到质疑你是否能恪守自己的原则?</a></p>
        <p>下一篇：<a href="/news/life/">返回列表</a></p>
      </div>
      */}
      <div class="news_pl">
        <h2>文章评论</h2>
        <div class="gbko"> 
          <div id="gitalk-container" style="width:90%;margin-left:5%"></div>
            <link rel="stylesheet" href="https://unpkg.com/gitalk/dist/gitalk.css">
            <script src="https://unpkg.com/gitalk/dist/gitalk.min.js"></script>
            <script>
              const gitalk = new Gitalk({
              clientID: '1551364859ea29a6335e',
              clientSecret: 'f5cef6f0e1b69c670cbd7e334241e543d7df0e6a',
              repo: '5ibug_comment',
              owner: '5ibugss',
              admin: ['5ibugss'],
              id: document.location.pathname,      // Ensure uniqueness and length less than 50
              distractionFreeMode: true  // Facebook-like distraction free mode
            })

            gitalk.render('gitalk-container')
            </script>
        </div>
      </div>
    </div>
  </main>
</article>
<script src="/src/admin/editor.md/lib/marked.min.js"></script>
<script src="/src/admin/editor.md/lib/prettify.min.js"></script>
<script src="/src/admin/editor.md/lib/raphael.min.js"></script>
<script src="/src/admin/editor.md/lib/underscore.min.js"></script>
<script src="/src/admin/editor.md/lib/sequence-diagram.min.js"></script>
<script src="/src/admin/editor.md/lib/flowchart.min.js"></script>
<script src="/src/admin/editor.md/lib/jquery.flowchart.min.js"></script>
<script src="/src/admin/editor.md/editormd.js"></script>
  
  <script>
    editormd.markdownToHTML("news_con", {
    htmlDecode      : "style,script,iframe",  
    emoji           : true,
    taskList        : true,
    tex             : true,  // 默认不解析
    flowChart       : true,  // 默认不解析
    sequenceDiagram : true  // 默认不解析
});
  </script>