<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use App\product;

use App\department;


class productsController extends Controller
{
    private $rules = [
        'name'     => 'string|required|max:15',
        'price' => 'required',
        'type' =>'integer',
        'dep_id'=>'integer',
        
    ];

  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $pro = product::with('theDepartment')->get();
        
        return view('products.index', [
            'title' => "Show All Products",
            'index' => $pro,
            'trashed' => product::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $deps =department::all();
        

        return view('products.create', [
            'title' => "Create Products",
            'deps' => $deps,
            
        ]);
    }
    
    public function alldepartments()
    {
 
     $provinces_id = Input::get('prov');

     $regencies = department::where('type', '=', $provinces_id)->get();
  
     return $regencies;
  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
      
        $data = $this->validate($request, $this->rules);
        
       
         product::create($data);

        session()->flash('success', "Created Successfully");
        return redirect()->route('product.index');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pro = product::where('id',$id)->with('thedepartment')->first();
        

        if ($pro) {
            return view('products.show', [
                'title' => "Show Products " . ' : ' . $pro->name,
                'show'  => $pro,
            ]);
        }

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pro = product::where('id',$id)->with('thedepartment')->first();
            $dep = department::all();
        if ($pro) {
            return view('products.edit', [
                'title' => "Edit Product" . ' : ' . $pro->name,
                'edit'  => $pro,
                'deps' => $dep
                
            ]);
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        $theproduct = product::find($id);
        
        $data = $this->validate($request, $this->rules);

        $theproduct->update($data); // true, false

        session()->flash('success', "Updated Successfully");
        return redirect()->route('product.show', [$id]);
    }

    

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  bool  $redirect
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro = product::find($id);

        if ($pro) {
            

            $pro->delete();

            session()->flash('success', "Product Deleted Successfully");
            return redirect()->route('product.index');
        }
    }

    public function destroyAll()
    {
        
        if(request()->has('restore') && request()->has('ids') )
        { 
            product::whereIn('id',request('ids'))->restore();
             session()->flash('success', "Product Restored Successfully");
            return redirect()->route('product.index');

        }
        else if (request()->has('forcedelete') && request()->has('ids'))
        {
             Product::whereIn('id',request('ids'))->forceDelete();
             session()->flash('success', "Product Force Deleted Successfully");
            return redirect()->route('product.index');

        }
        else if (request()->has('delete') && request()->has('ids')) 
        {
            Product::destroy(request('ids'));
            session()->flash('success', "Product Trashed Successfully");
            return redirect()->route('product.index');
        }
    }
   

    public function delete($id)
    {

        $delprod =product::where('id',$id)->first();


        $delprod->delete();
         session()->flash('success', "Product Trashed Successfully");
            return redirect()->route('product.index');
    }

    

    function fetch(Request $request)
    {
     
     $value = $request->get('value');
     $dependent = $request->get('dependent');

     $data = department::where('type',$value);

     $output = '<option value="">Select '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
     }
     echo $output;
    }


    

}
