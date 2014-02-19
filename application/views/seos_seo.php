<div class="body">
<h1>超级外链工具，增加外链中……</h1>
<div id="notice">
  <p><?php echo $notice;?></p>
</div>
<li>工作原理：当用户查询某个网站的Alexa 排名、Google PR值、搜索引擎收录等信息之后，这些工具网站都会把查询情况记录到数据库，并留下所查网站的链接，这样也就等于给自己的网站建立了外链。</li>
<li>目前共有<span class="red"><?php echo $searchUrlTotal;?></span>个查询网址，意味着可以瞬时将您的网站推广到这些地方。更奇妙的是，这一切都是免费的。好了，把这个页面缩小，做其他事吧。</li>
<!--TOOL 960*90，创建于2011-10-14-->
</div>
<div class="body">
<div class="clock">
您在本页已经停留了<span id="qian_li_v"></span>
一般30秒左右，本页的信息能够提交完毕，30秒后就可以翻页了。</div>
<div class="naxtpage">
<?php if($next_page){?>
<a id="red" href='<?php echo $next_page;?>'>如果无法自动翻页请点下一页，第<?php echo $page - 1;?>页</a>
<?php } ?>
【自动翻页功能当前状态：<span class="red"><?php echo $auto ?'开':'关';?>，每 <?php echo $st;?> 秒翻页</span>】
</div>

<div class="page">
<?php echo $page_string;?>
</div>
<div class="list">
<ol>
<?php foreach($searchUrlList as $row){ 
$kw_url = str_replace('qs_kw',$kw,$row['url']);
?>
<li><a href='<?php echo $kw_url;?>' target=_blank>宣传 <?php echo $kw;?> </a>
</li><br>
<iframe src='<?php echo $base_url;?>webseo.html?<?php echo $kw_url;?>' height='50' width='90%' marginwidth='0' marginheight='0' hspace='0' vspace='0' frameborder='0' scrolling='no'></iframe>
<?php } ?>
</ol>
<div class="page">
<?php echo $page_string;?>
</div>

</div>
</div>
