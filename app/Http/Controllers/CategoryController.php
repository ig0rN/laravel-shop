<?php

namespace App\Http\Controllers;

use App\Database\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = getAllBasedOnCurrentShop('categories');
        return view('pages.category.show', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'created_by' => auth()->user()->id,
            'shop_id' => session()->get('shop_id')
        ]);
        Category::create($request->all());
        
        return redirect()->route('category')->with(['success' => 'You have successfully created new category']);
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
    public function edit(Category $category)
    {
        abort_unless($category->belongToShop(), 403);
        return view('pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        abort_unless($category->belongToShop(), 403);

        $request->merge([
            'edited_by' => auth()->user()->id,
            'edited_at' => Carbon::now()
        ]);
        $category->update($request->all());

        return redirect()->route('category')->with(['success' => 'You have successfully made changes']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        abort_unless($category->belongToShop(), 403);

        $category->update([
            'deleted_by' => auth()->user()->id
        ]);
        $category->delete();
        
        return redirect()->route('category')->with(['success' => 'You have successfully deleted category']);
    }
}
