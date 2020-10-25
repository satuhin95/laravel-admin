<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Image;
class AdminController extends Controller
{
    public function index(){
    	$admin = Admin::all();
    	return view('backend.admin.admin',compact('admin'));
    }

    public function create(){
    	return view('backend.admin.create');
    }
    public function store(Request $request){

    		$validatedData = $request->validate([
			'name' => 'required',
			'email' => 'required|unique:admins',
			'contact' => 'required',

		]);
		$admin = new Admin();
		$admin->name = $request->name;
		$admin->email = $request->email;
		$admin->contact = $request->contact;
		$images = $request->file('image');
		if ($images) {
			$image_name = hexdec(uniqid()).'.'.$images->getClientOriginalExtension();
			Image::make($images)->resize(300, 200)->save('images/admin/'.$image_name);
			$admin->image = 'images/admin/'.$image_name;
			$admin->save();
			
			$notification =array(
				'messege'=>'Data Insert Successfully',
				'alert-type'=>'success'
			);
			return Redirect()->back()->with($notification);
			}
		else{
			$admin->save();
			$notification =array(
				'messege'=>'Data Insert Successfully without images ',
				'alert-type'=>'success'
			);
			return Redirect()->back()->with($notification);

		}
    }

    public function edit($id){
    	$admin = Admin::find($id);

    	return view('backend.admin.edit',compact('admin'));

    }
    public function update(Request $request ,$id){
    	$admin = Admin::find($id);
    	
    	$old = $admin->image;
    	$admin->name = $request->name;
		$admin->email = $request->email;
		$admin->contact = $request->contact;
		$images = $request->file('image');
		if ($images) {
			//unlink($old);
			$image_name = hexdec(uniqid()).'.'.$images->getClientOriginalExtension();
			Image::make($images)->resize(300, 200)->save('images/admin/'.$image_name);
			$admin->image = 'images/admin/'.$image_name;
			$admin->save();
			
			$notification =array(
				'messege'=>'Data Insert Successfully',
				'alert-type'=>'success'
			);
			return Redirect()->route('dashboard.admin')->with($notification);
			}

     }
}
