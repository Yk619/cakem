<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Models\{User, Cake};
use Illuminate\Http\Request;
use Auth;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Image;
use Filesystems;
use File;
use Illuminate\Support\Facades\Storage;

class CakeController extends BackendController{

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

	    $cakes = Cake::where('id', '>', '0')->paginate($limit);

	    return view('backend/cake/index', [ 'searchkey' => $searchkey,'cakes' => $cakes ,'limit'=>$limit, 'status'=>$status]);
	}
	public function form(Request $request,$id = null){

		$cake = new cake();

		if (!(is_null($id))) {
			$cake = Cake::find($id);
		}

		return view('backend.cake.form',['cake'=> $cake]);
		
	}
	public function create(Request $request){

		$cake = new Cake();
		$validator = Validator::make($request->all(), Cake::rules());

		if ($validator->fails()) {

		  return redirect()->back()->withErrors($validator)->withInput($request->all());

		}
		$this->save($request, $cake);

		Session::flash('success_msg', 'cake created successfully!');
	    return redirect()->route('cakes');

	}

	public function update(Request $request, $id){

		$cake = Cake::findorFail($id);

		$validator = Validator::make($request->all(), Cake::rules($id));

		if ($validator->fails()) {

		  return redirect()->back()->withErrors($validator)->withInput($request->all());

		}
		$this->save($request, $cake, TRUE);

		Session::flash('success_msg', 'cake updated successfully!');
	    return redirect()->route('cakes');

	}
	public function save(Request $request, cake $cake, $update = 'false' ){

		foreach ($request->only('name', 'price', 'quantity', 'type', 'image', 'weight') as $key => $value) {
			$cake->{$key} = $value;
		}

		if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $fileName = \Storage::disk('local')->put('cake', $file);

            $cake->image = $fileName;
        }else{
        	if($update == 'false'){
        		$cake->image = '';
	    	}
        }
	    
	    $cake->save();
	}

	public function show(Request $request,$id){

		$cake = Cake::where('id', $id)->firstOrFail();
		return view('backend.cake.show',compact('cake'));
	
	}

	public function delete(Request $request, $id){
		$cake = Cake::findorFail($id);
        $cake->delete();
		Session::flash('success_msg', 'cake deleted successfully!');
	    return redirect()->route('cakes');
	}
}