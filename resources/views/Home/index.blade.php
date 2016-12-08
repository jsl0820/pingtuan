@include('Home.header')
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
                    <a href="{{URL::action('IndexController@goods',['goodsid'=>$vo->goods_id])}}">
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
@include('Home.footer')
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
