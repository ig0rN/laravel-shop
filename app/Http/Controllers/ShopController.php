<?php

namespace App\Http\Controllers;

use App\Database\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function showAll()
    {
        $shops = Shop::all();
        return view('pages.shops', compact('shops'));
    }

    public function pickShop(Request $request)
    {
        session()->put(['shop_id' => $request->shop]);

        if(session()->has('shop_id')){
            return redirect()->route('shop');
        }
        return redirect()->back();
    }

    public function changeShop()
    {
        if(session()->has('shop_id')){
            session()->forget('shop_id');
        }
        return redirect()->route('shops');
    }

    public function shop()
    {
        return view('pages.shop');
    }
}