@include('Home.header')
<link href="{wghd::RES}/ptuan/css/flexslider.css" rel="stylesheet" >
<script type="text/javascript" src="{wghd::RES}/ptuan/js/jquery.flexslider-min.js"></script>
<style>
.back-index a {
	display: block;
	border: none;
	background: #8acf1c;
	width: 100%;
	height: 45px;
	line-height: 45px;
	text-align: center;
	color: white;
	font-size: 20px;	
	border-radius: 2px;
}
</style>

<body>

<div class="container" id="scnhtm5">
    <section class="main-view">
        <div class="flexslider" style="margin-bottom:10px;">
            <ul class="slides" >
                                <li><img src="../{{$goods->little_img}}"/></li>
                            </ul>
        </div>
        <script type="text/javascript">
            $(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    slideDirection: "horizontal"
                });
            });
        </script> 
        <div class="tm">
        	<input type="hidden" id="good-limit-num" value="{{$goods->limit_buy_one}}">
        	<input type="hidden" id="good-number" value="{{$goods->goods_number}}">
            <form action="javascript:addToCart(41)" method="post" name="HHS_FORMBUY" id="HHS_FORMBUY" >
            <div class="td2">
                <div class="td2_name">{{$goods->goods_name}}</div>
                <div class="td2_cx">{{$goods->goods_brief}}</div>
                <div class="td2_info">
                    <div class="td2_price">市场价：¥<b>{{$goods->market_price}}</b></div>
                    <div class="td2_num">已售：<span>{{$goods->sales_num}}</span>件</div>

                    <a href="{wghd::U('Share/goodsInfo',array('goodid'=>$goods['goods_id']))}" class="td2_btn">查看商品详情 <i class="fa fa-angle-right"></i></a>
                </div>
                <div class="td2_hb">
				    <span class="td2_hb_ico"><i></i></span>
					<span class="td2_hb_txt">支付开团并邀请{{$goods->team_num}}人参团，人数不足自动退款，详见下方拼团玩法具体说明</span>
			    </div>
            </div>
                       
            <div class="buynum">
            <label>数量：</label>
                <a href="javascript:void(0);" onclick="goods_cut();changePrice()"><i class="fa fa-minus"></i></a>
                <input name="number" type="text" id="number" class="text" value="1" size="4" onblur="changePrice();"/>
                <a href="javascript:void(0);"  onclick="goods_add();changePrice()"><i class="fa fa-plus"></i></a>
                </div>
                          
            <div class="kt">
                <a class="kt_item" style="margin-right:2%;" onclick="if(changePrice()){OrderCart('team_goods')}"  href="javascript:;">
                    <div class="kt_price">￥<b id="tuan_more_price">{{$goods->team_price}}</b><i> / </i>件</div>
                    <div class="kt_btn"><b id="tuan_more_number">{{$goods->team_num}}人团</b></div>
                </a>
                <a class="kt_item kt_item_buy" onclick="if(changePrice()){OrderCart()}" onclick="changePrice()" href="javascript:;">
                    <div class="kt_price">￥<b>{{$goods->shop_price}}</b><i> / </i>件</div>
                    <div class="kt_btn">单独购买</div>
                </a>
            </div>
            
            
            
                
        <!--a href="GroupPurchase.php?goods_id=41">附近的团  <i class="fa fa-map-marker"></i></a-->
        
                
            </form>
        </div>
        <div class="step">
            <div class="step_hd">
                拼团玩法<a class="step_more" href="{wghd::U('Share/tuanRule')}">查看详情</a>
            </div>
            <div id="footItem" class="step_list">
                <div class="step_item step_item_on">
                    <div class="step_num">1</div>
                    <div class="step_detail">
                        <p class="step_tit">选择
                            <br>心仪商品</p>
                    </div>
                </div>
                <div class="step_item ">
                    <div class="step_num">2</div>
                    <div class="step_detail">
                        <p class="step_tit">支付开团
                            <br>或参团</p>
                    </div>
                </div>
                <div class="step_item ">
                    <div class="step_num">3</div>
                    <div class="step_detail">
                        <p class="step_tit">等待好友
                            <br>参团支付</p>
                    </div>
                </div>
                <div class="step_item">
                    <div class="step_num">4</div>
                    <div class="step_detail">
                        <p class="step_tit">达到人数
                            <br>团购成功</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('Home.footer');
<script type="text/javascript">
var goods_id = 41;
var goodsattr_style = 1;
var gmt_end_time = 0;
var day = "天";
var hour = "小时";
var minute = "分钟";
var second = "秒";
var end = "结束";
var goodsId = 41;
var now_time = 1478222354;
onload = function(){
  changePrice();
}
function goods_cut(){
	var num_val=document.getElementById('number');
	var new_num=num_val.value;
	 if(isNaN(new_num)){alert('请输入数字');return false}
	var Num = parseInt(new_num);
	if(Num>1)Num=Num-1;
	num_val.value=Num;
}
function goods_add(){
	var num_val=document.getElementById('number');
	var new_num=num_val.value;
	 if(isNaN(new_num)){alert('请输入数字');return false}
	var Num = parseInt(new_num);
	Num=Num+1;
	num_val.value=Num;
}
function changeAtt(t) {
t.lastChild.checked='checked';
for (var i = 0; i<t.parentNode.childNodes.length;i++) {
        if (t.parentNode.childNodes[i].className == 'cattsel') {
            t.parentNode.childNodes[i].className = '';
        }
    }
t.className = "cattsel";
changePrice();
}
function changePrice()
{
  var attr = getSelectedAttributes(document.forms['HHS_FORMBUY']);
  var qty = parseInt(document.forms['HHS_FORMBUY'].elements['number'].value);
  if(isNaN(qty)){
  	alert('请输入商品数量');
  	return false;
  }else{
  	return true;
  }
  //判断限购
  var limit_num = parseInt($('#good-limit-num').val());
  if(limit_num != 0){
  	if(qty > limit_num){
  		alert('超出商品限购数量');
  		return false;
  	}else{
  		return true;
  	}
  }
  //判断库存
  var goods_number = parseInt($('#good-number').val());

  if(qty > goods_number){
  	alert('超出商品库存');
  	return false;
  }else{
  	return true;
  }
  //Ajax.call('goods.php', 'act=price&id=' + goodsId + '&attr=' + attr + '&number=' + qty, changePriceResponse, 'GET', 'JSON');
}
function OrderCart(type){
	var qty = document.forms['HHS_FORMBUY'].elements['number'].value;
  $.ajax({
    url:"{wghd::U('Share/addToCart')}",
    data:{goods_id:{wghd:$goods['goods_id']},count:qty,type:type},
    dataType:'json',
    success:function(data){
      console.log(data);
      if(data.status != 1){
        floatNotify.simple(data.info)
      }else{
        if($.type(type) == 'undefined'){
          type = '';
        }
        var url = "{wghd::U('Share/checkout',array('type'=>'"+type+"'))}";
        jump_url(url);
      }
    }
  });
	// var url = "{wghd::U('Share/checkout',array('good_id'=>$goods['goods_id'],'buy_num'=>'"+qty+"','type'=>'team_goods'))}";
	// jump_url(url);
}
function changePriceResponse(res)
{

  if (res.err_msg.length > 0)
  {
    alert(res.err_msg);
	document.forms['HHS_FORMBUY'].elements['number'].value = res.number;
  }
  else
  {
    document.forms['HHS_FORMBUY'].elements['number'].value = res.qty;
    if (document.getElementById('HHS_GOODS_AMOUNT'))
      document.getElementById('HHS_GOODS_AMOUNT').innerHTML = res.result;
  }
}
</script>
</html>
