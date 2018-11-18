<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\department;
use App\Http\Controllers\Controller;



class departmentsController extends Controller
{
    public function index()
    {
    	$department = department::all();

    	return view('department.index',[
    		'title' => 'Show ALL Department',
    		'index' => $department
    	]);
    }

    public function create()
    {
    	return view('department.create',[
    		'title' => 'Create Department'
    	]);
    }

    public function store(Request $request)
    {
    
    	$data = $this->validate($request, [
    		'name' => 'required|string|max:30|min:3',
    		'type' => 'required|integer'
    	]);


         department::create($data);

		session()->flash('success', "Created Successfully");
        return redirect()->route('dep.index');
    }

     public function delete($id)
    {

        $delprod =product::where('id',$id)->first();

        $delprod->delete();
    }
}
