<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Models\{User, Cake, Order};
use Illuminate\Http\Request;
use Auth;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Image;
use Filesystems;
use File;
use Illuminate\Support\Facades\Storage;

class OrderController extends BackendController{

	public function __construct(){

			$this->middleware('auth');
	}

	public function index(Request $request){

		$limit = trim($request->limit);
	    $status = trim($request->status);
	    $searchkey = trim($request->searchkey);
	    $limit = (isset($limit) && $limit!='') ? $limit : 20;

	    Session::put('limit', $limit);
	    Session::put('searchkey', $searchkey);
	    Session::put('status', $status);

	    $orders = Order::with('cake')->paginate($limit);
	    //dd($orders->toArray());
	    return view('backend/order/index', [ 'searchkey' => $searchkey,'orders' => $orders ,'limit'=>$limit, 'status'=>$status]);
	}
}