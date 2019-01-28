<?php

namespace App\Http\Controllers;

use App\Database\Sale;
use App\Database\Product;
use Carbon\Carbon;
use App\Http\Requests\Sale\StoreRequest;
use App\Http\Requests\Sale\UpdateRequest;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = getAllBasedOnCurrentShop('sales');
        return view('pages.sale.show', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = getAllBasedOnCurrentShop('products', true)->availableForSale();
        return view('pages.sale.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $request->merge([
            'created_by' => auth()->user()->id,
            'shop_id' => session()->get('shop_id'),
            'end_date' => dbFormat($request->end_date_srb)
        ]);
        $sale = Sale::create($request->except('end_date_srb', 'product_id'));

        foreach ($request->product_id as $id) {
            $product = Product::find($id);
            $product->update(['sale_id' => $sale->id]);
        }
        
        return redirect()->route('sale')->with(['success' => 'You have successfully created new sale']);
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
    public function edit(Sale $sale)
    {
        abort_unless($sale->belongToShop(), 403);
        
        $products = getAllBasedOnCurrentShop('products', true)->availableForSale();
        return view('pages.sale.edit', compact('sale', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Sale $sale)
    {
        abort_unless($sale->belongToShop(), 403);

        $request->merge([
            'edited_by' => auth()->user()->id,
            'edited_at' => Carbon::now(),
            'end_date' => dbFormat($request->end_date_srb)
        ]);
        $sale->update($request->except('end_date_srb', 'product_id'));

        if (isset($request->product_id)) {
            foreach ($request->product_id as $id) {
                $product = Product::find($id);
                $product->update(['sale_id' => $sale->id]);
            }
        }

        return redirect()->route('sale')->with(['success' => 'You have successfully made changes']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        abort_unless($sale->belongToShop(), 403);

        $sale->update([
            'deleted_by' => auth()->user()->id
        ]);
        foreach($sale->products as $product){
            $product = Product::find($product->id);
            $product->update(['sale_id' => NULL]);
        }
        $sale->delete();
        
        return redirect()->route('sale')->with(['success' => 'You have successfully deleted sale']);
    }

    public function removeFromSale(Product $product)
    {
        $product->update(['sale_id' => NULL]);
        return redirect()->back();
    }
}
