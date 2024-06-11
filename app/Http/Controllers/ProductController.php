<?php

namespace App\Http\Controllers;

use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $product=Product::orderBy('created_at', 'DESC')->get();
        return view('products.index', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        try {
            Product::create($request->all());

            return redirect()->route('admin/products')->with('success','Product added successful');
        } catch (\Exception $e) {
            
            return redirect()->route('admin/products')->with('error', $e->getMessage());

        }
    }

    public function show(string $id)
    {
        $product=Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit(string $id)
    {
        $product=Product::findOrFail($id);
        return view('products.edit', compact('product'));   
    }

    public function update(Request $request, string $id)
    {
        try {
            $product=Product::findOrFail($id);
            $product->update($request->all());
            
            return redirect()->route('admin/products')->with('success','Product update successful');
        }
        catch(\Exception $e){
            return redirect()->route('admin/products')->with('error', $e->getMessage());
        }

    }

    public function destroy(string $id)
    {
        try {
            $product=Product::findOrFail($id);
            $product->delete();
            
            return redirect()->route('admin/products')->with('success','Product deleted successful');
        }
        catch(\Exception $e){
            return redirect()->route('admin/products')->with('error', $e->getMessage());
        }
    }
}
