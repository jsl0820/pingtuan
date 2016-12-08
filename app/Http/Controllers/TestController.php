<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
class TestController extends Controller{

	public function index (){

		//@$goodsid = $_GET['goodsid'];
		$goodsid = 37;
		$goods = DB::table('goods')
			   ->where('goods_id','=',$goodsid)
			   ->first();	
		//dump($goods);
		//exit();	   
		return view ('Home.test',compact('goods'));

	}
}

 ?>