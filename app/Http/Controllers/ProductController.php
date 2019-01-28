<?php

namespace App\Http\Controllers;

use App\Database\Shop;
use App\Database\Product;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = getAllBasedOnCurrentShop('products');
        return view('pages.product.show', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = getAllBasedOnCurrentShop('categories');
        return view('pages.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $dbPath = uploadFileInPublicFolder($request->file('image'), $request->name, '/img/products/');

        $request->merge([
            'created_by' => auth()->user()->id,
            'shop_id' => session()->get('shop_id'),
            'image_path' => $dbPath
        ]);
        Product::create($request->except('image'));
        
        return redirect()->route('product')->with(['success' => 'You have successfully created new product']);
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
    public function edit(Product $product)
    {
        abort_unless($product->belongToShop(), 403);

        $categories = getAllBasedOnCurrentShop('categories');
        return view('pages.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Product $product)
    {
        abort_unless($product->belongToShop(), 403);
        
        // Request class doesn't know how to solve unique on update
        if(!$product->isUniqueArticleCode($request->article_code)){
            return redirect()->back()->with(['error' => 'Article Code MUST be UNIQUE']);
        }

        if(isset($request->image)){
            File::delete(public_path($product->image_path));

            $dbPath = uploadFileInPublicFolder($request->file('image'), $request->title, '/img/products/');
            $request->merge(['image_path' => $dbPath]);
        }

        $request->merge([
            'edited_by' => auth()->user()->id,
            'edited_at' => Carbon::now()
        ]);
        $product->update($request->except('image'));

        return redirect()->route('product')->with(['success' => 'You have successfully made changes']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        abort_unless($product->belongToShop(), 403);

        $product->update([
            'deleted_by' => auth()->user()->id
        ]);
        $product->delete();
        
        return redirect()->route('product')->with(['success' => 'You have successfully deleted product']);
    }
}
