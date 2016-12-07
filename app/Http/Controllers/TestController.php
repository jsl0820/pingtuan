<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
class TestController extends Controller{

	public function index (){

		$cats  = DB::table('category')
			   ->where('parent_id','=','0')
			   ->get();

		$goods = DB::table('goods')
		       ->where('is_on_sale','=','1')
		       ->get();  
        
		return view('Home.test',compact('goods','cats'));

	}
}

 ?>