<!doctype html>
<html lang="zh-CN">
<head>
<meta name="Generator" content="haohaios v1.0" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta name="Keywords" content="一聚就惠" />
<meta name="Description" content="昊海拼团，优质水果新鲜直供，大家一起来玩吧！!" />
<title>昊海拼团  11-1【测试-网站演示专用】</title>
<link rel="shortcut icon" href="favicon.ico" />

<link href="../static/Home/css/haohaios.css" rel="stylesheet" />
<link href="../static/Home/css/font-awesome.min.css" rel="stylesheet" />
<link href="../static/Home/css/swiper.min.css" rel="stylesheet" >
<link href="../static/Home/css/notification.css" rel="stylesheet" >

<script type="text/javascript" src="../static/Home/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../static/Home/js/swiper.min.js"></script>
<script type="text/javascript" src="../static/Home/js/haohaios.js"></script>
<script type="text/javascript" src="../static/Home/js/notification.js" ></script>
</head>



<body>
<div id="loading">
<!-- 	<include file="Share:loading"/> -->
</div>
<div class="container" id="container" style="display:none;">
	<!-- 导航栏 -->
    <div class="main_menu">
        <ul>
            <li><a href="">首页</a></li>
			@foreach($cats as $key => $vo)
          	<li><a href="">{{$vo->cat_name}}</a></li>
			@endforeach
        </ul>
    </div>
	<!-- 轮播图 -->
 	<section class="main-view" style=" margin-top:40px;">

 		<!-- S 轮播 --> 	

 		<div class="swiper-container">
 			<div class="swiper-wrapper">
 				<volist name="banner" id="item">
     				<div class="swiper-slide" style="padding:0 10px;">
     					<a href="{wghd:$item.url}">
     						<img src="{wghd:$item.picurl}" width="100%">
     					</a>
     				</div>
               </volist>
 			</div>
 			<div class="swiper-pagination"></div>
 		</div>
 	</section>
	<!-- goodslist -->
    <section class="main-view">
        <div id="tuan" class="tuan" style="padding-top: 10px; display: block;">
            <div ms-repeat-item="goods_list">
			@foreach($goods as $key => $vo)
                <div class="tuan_g" >
                    <a href="##">
                        <div class="tuan_g_img">
                            <img src="../{{$vo->little_img}}">
							@if($vo->goods_number < 1)
                            <span class="sell_f"></span>
                            @else
                            <span class="tuan_mark tuan_mark2">
                            <span>{{$vo->team_num}}人团</span>
                            </span>
							@endif
                           <!--  <b>
								<php>
									echo round(($vo['team_price']/$vo['market_price']*100),1);
								</php>
                            折</b> -->
                        </div>

                        <div class="tuan_g_info">
                            <p class="tuan_g_name">{{$vo->goods_name}}</p>
                            <p class="tuan_g_cx">{{$vo->goods_brief}}</p>
                        </div>

                        <div class="tuan_g_core">
                            <div class="tuan_g_price">
                                <span>{{$vo->team_num}}人团</span>
                                <b>¥{{$vo->team_price}}</b>
                            </div>
                            <div class="tuan_g_btn">去开团</div>
                        </div>

                        <div class="tuan_g_mprice">市场价：
                            <del>¥{{$vo->market_price}}</del>
                        </div>
                    </a>
                </div>
            @endforeach
            </div>
        </div>
    </section>
 
</div>
<footer class="footer">
    <ul>
    	<li><a href="{wghd::U('Share/index')}" class="nav-controller <eq name='ACTION_NAME' value='index'>active</eq>"><i class="fa fa-home"></i>首页</a></li>
        <li><a href="{wghd::U('Share/rank',array('act'=>'is_hot'))}" class="nav-controller <eq name='ACTION_NAME' value='rank'>active</eq>"><i class="fa fa-trophy"></i>热榜</a></li>
        <li><a href="{wghd::U('Share/cats')}" class="nav-controller <eq name='ACTION_NAME' value='cats'>active</eq>"><i class="fa fa-list"></i>分类</a></li>
        <li><a href="{wghd::U('Share/user')}" class="nav-controller <eq name='ACTION_NAME' value='user'>active</eq>"><i class="fa fa-user"></i>个人中心</a></li>
    </ul>
</footer>
<script>
	window.onload=function(){
		$('#loading').remove();
		document.getElementById('container').style.display='';
		
			var swiper = new Swiper('.swiper-container', {
	        pagination: '.swiper-pagination',
	        paginationClickable: true,
	        spaceBetween: 30,
	        centeredSlides: true,
	        autoplay: 2500,
	        autoplayDisableOnInteraction: false
	    });
	}
</script>
</body>
</html>
