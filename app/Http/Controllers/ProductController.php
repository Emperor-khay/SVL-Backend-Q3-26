<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    // FORMS
    public function addProductForm() {
        return view('product.add');
    }

    public function editProductForm(int $id) {
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }

    // CREATE
    public function addproduct(ProductRequest $request){
       $validated = $request->validated();

        dd($request);

        $product = Product::create([
            'name' => $validated['name'],
            'qty' => $validated['qty'],
            'price' => $validated['price'],
            'is_top_selling' => false,
            'discount' => $validated['discount'],
        ]);

        // $product = new Product();
        // $product->name = $request->input('name');
        // $product->save();
        // dd($product);
    }

    // READ
    public function getProducts(){
        $products = Product::latest()->get();
        dd($products);
    }


    public function getProduct(int $id){
        $product = Product::where('id', $id )->first();
        // $product = Product::findorfail(17);
        dd($product);
    }

    // UPDATE
    public function updateProduct(int $id, Request $request) {
    $product = Product::where('id', $id )->first();
        // $product = Product::findorfail(17);

        // $product->update([
        //     'name' => 'Unkown'
        // ]);

        $product->name = $request->input('productname');
        $product->qty = $request->input('qty');
        $product->price = $request->input('price');
        $product->discount = $request->input('discount');
        $product->save();
      
        dd($product);
    }

    public function restoreProduct(int $id){
         $product = Product::where('id', $id )->first();
        // $product = Product::findorfail(17);

        // dd($product);

        // $product->update([
        //     'deleted_at' => null
        // ]);

        $product->deleted_at = null;
        $product->save();

        return redirect('/product/index');
    }

    
    // DELETE
    public function deleteProduct(int $id) {
         $product = Product::where('id', $id )->first();
        // $product = Product::findorfail(17);

        $product->delete();

        return redirect('/product/index');
    }


}
