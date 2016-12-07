<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
class IndexController extends Controller{

	public function index (){

		$cats  = DB::table('category')
			   ->where('parent_id','=','0')
			   ->get();

		$goods = DB::table('goods')
		       ->where('is_on_sale','=','1')
		       ->get();  
        //dump($cats);
		//exit();  
		return view('Home.index',compact('goods','cats'));

	}

	public function detail(){

		
	}
}

 ?>