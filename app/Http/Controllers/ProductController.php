<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $units = Unit::all();
        return view('backend.products.create',compact('categories','units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'sp' => 'required',
            'feature' => 'required',
            'unit_id' => 'required',
        ]);
    
        $product = new Product();
        $product->sku = $request->sku;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->sp = $request->sp;
        $product->description = $request->description;
        $product->unit_id = $request->unit_id;
        if($request->hasFile('feature')){
            $file = $request->feature;
            $newName = time() . $file->getClientOriginalName();
            $file->move('feature',$newName);
            $product->feature = 'feature/' . $newName;
        }
        $product->category_id = $request->category_id;
        $product->save();

        // if($request->hasFile('images')){
        //     foreach($request->images as $image){
        //         $productImage = new ProductImage();
        //         $newName = time() . $image->getClientOriginalName();
        //         $image->move('images',$newName);
        //         $productImage->name = 'images/' . $newName;
        //         $productImage->product_id = $product->id;
        //         $productImage->save();
        //     }
        // }

        $request->session()->flash('message','Record Saved');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $units = Unit::all();
        return view('backend.products.edit',compact('product','categories','units'));
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
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'sp' => 'required',
            'unit_id' => 'required',

        ]);
    
        $product = Product::find($id);
        $product->sku = $request->sku;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->sp = $request->sp;
        $product->description = $request->description;
        $product->unit_id = $request->unit_id;
        if($request->hasFile('feature')){
            $file = $request->feature;
            $newName = time() . $file->getClientOriginalName();
            $file->move('feature',$newName);
            $product->feature = 'feature/' . $newName;
        }
        $product->category_id = $request->category_id;
        $product->update();

        // if($request->hasFile('images')){
        //     foreach($request->images as $image){
        //         $productImage = new ProductImage();
        //         $newName = time() . $image->getClientOriginalName();
        //         $image->move('images',$newName);
        //         $productImage->name = 'images/' . $newName;
        //         $productImage->product_id = $product->id;
        //         $productImage->save();
        //     }
        // }

        $request->session()->flash('message','Record Updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
