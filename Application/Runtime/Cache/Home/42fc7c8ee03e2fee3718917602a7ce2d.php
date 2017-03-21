<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<base target="_self" />
<meta charset="UTF-8">
<title>创宜生物</title>
<link type="text/css" rel="stylesheet" href="/chuangyi/Public/style/style.css" />
<script type="text/javascript" src="/chuangyi/Public/style/jquery-1.8.0.min.js"></script>
</head>
<body>
 <div id="header">
  <div class="layout">
    
    <div id="nav">
      <div class="nav">
      <ul>
        <li class="mnav"><a href="/chuangyi/index.php" class="<?php if($index): ?>foucs<?php endif; ?>"><p>网站首页</p>
        <p class="en">Home</p></a></li>
      <?php if(is_array($cates)): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="mnav">
       <!-- 栏目的分类判断! -->
       <a href="/chuangyi/index.php/Home/<?php if($vo['cate_type'] == 0): ?>Page<?php else: ?>List<?php endif; ?>/index/cate_id/<?php echo ($vo["cate_id"]); ?>" class="">
         <p><?php echo ($vo["cate_name"]); ?></p>
         <p class="en"><?php echo ($vo["ctae_ename"]); ?></p>
       </a>
         <ul class="smenu" style="display: none;">
           <?php $_result=getChildrenids($vo['cate_id']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
             <a href="/chuangyi/index.php/Home/<?php if($vo['cate_type'] == 0): ?>Page<?php else: ?>List<?php endif; ?>/index/cate_id/<?php echo ($vo["cate_id"]); ?>"><?php echo ($vo["cate_name"]); ?></a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
      </div>
</div>

    <div class="logo">
      <a href="/"></a>
    </div>
  </div>
</div>
<div id="full-screen-slider-sec">
  <div class="layout">
      <div class="page-title">
      <?php echo ($catetop["cate_name"]); ?>
      </div>
    </div> 
</div>
<div class="main">
   <div class="layout cnt2">
     <div class="left">
        <ul id="nav2">
         
         <?php if(is_array($childids)): $i = 0; $__LIST__ = $childids;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li ><a href="/chuangyi/index.php/Home/<?php if($vo['cate_type'] == 0): ?>Page<?php else: ?>List<?php endif; ?>/index/cate_id/<?php echo ($vo["cate_id"]); ?>"><?php echo ($vo["cate_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>    
         
        </ul>
     </div>
     <div class="right">
        <h1>
           <div class="page">
             <a href='/chuangyi/index.php'>网站首页</a> >
                 <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/chuangyi/index.php/Home/<?php if($vo['cate_type'] == 0): ?>Page<?php else: ?>List<?php endif; ?>/index/cate_id/<?php echo ($vo["cate_id"]); ?>"><?php echo ($vo["cate_name"]); ?></a><?php if($i !=count($res)): ?>><?php endif; endforeach; endif; else: echo "" ;endif; ?>
           </div>
          <?php echo ($cateself["cate_name"]); ?>
        </h1>
        <div class="cnt-in">
         <div class="news-list-wimg">
           <ul>
           <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>            
                <h3> <a href="/chuangyi/index.php/Home/Article/index/ar_id/<?php echo ($vo["ar_id"]); ?>"><?php echo ($vo["ar_title"]); ?></a></h3>
                <p><img src="<?php if($vo['ar_pic'] != ''): ?>/chuangyi/<?php echo ($vo["ar_pic"]); else: ?>/chuangyi/Public/images/no.png<?php endif; ?>" width="120" height="90" style="float:left; margin-right:15px;">
                <span class="list-date">
                <?php echo ($vo["ar_desc"]); ?>
                </span>
                <span class="list-date">
                <?php echo (date("Y-m-d",$vo["ar_time"])); ?>
                </span></p>               
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
         </div>
       <div class="pages">
              <?php echo ($page); ?>
         </div>
        </div>
     </div>
     <div class="clr"></div>
   </div>
</div>
 <div id="footer">
  <div class="layout footer">
    <div class="footer-info">
      <p>Copyright © 2015  Chengdu  origissay  Diagnostics,LTD     技术支持：博海天韵 <a href="http://www.dedecms.com" target="_blank"></a>  蜀ICP12007941 </p>
    </div>
    <div class="footer-nav">
     <ul>
      <?php if(is_array($cates)): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
              <a href="/chuangyi/index.php/Home/<?php if($vo['cate_type'] == 0): ?>Page<?php else: ?>List<?php endif; ?>/index/cate_id/<?php echo ($vo["cate_id"]); ?>">
              <p><?php echo ($vo["cate_name"]); ?></p>
              </a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        
      
     </ul>
    </div>
    
    <div class="clr"></div>
  </div>
</div>
</body>
</html>
<script type="text/javascript">
 $(document).ready(function(){
  var hrefs=$("#nav2 > li > a");
  hrefs.each(function(i,val){
    var cururl=window.location.href;
    if(cururl.contains=(val)){
      $(this).addClass("foucs");
    }
  }); 
 });
</script>