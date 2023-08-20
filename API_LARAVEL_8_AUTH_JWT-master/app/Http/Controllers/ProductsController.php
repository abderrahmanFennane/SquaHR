<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\types;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreproductsRequest;
use App\Http\Requests\UpdateproductsRequest;
use Illuminate\Http\Request; 

class ProductsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = products::with('type')->get();
        $types = types::all();
        return response()->json([$products,$types]);    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreproductsRequest $request)
    {
        $store = new products;           
        $store->create( 
         [
         'name'=>$request->name,
         'description'=>$request->description,
         'typeId'=>$request->typeId,
         'size'=>$request->size,
         'cost'=>$request->cost,
         'price'=>$request->price,
         ]
        );

        return response()->json(['saved']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Editproducts = products::with('type')->select('*')->where('id',$id)->get();
        return response()->json([$Editproducts]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    { 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        
        $updaterProduct=products::where('id', $id)->update($request->except(['_method', '_token']));
        return response()->json([ $id, $request->except(['_method', '_token']) ]); 
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleteProducts= products::select('*')->where('id',$id)->delete();
    }
}
