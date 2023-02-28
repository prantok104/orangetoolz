<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
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
        try {
            $categories = Category::latest()->paginate(3);
            return view('categories.index', compact('categories'));
        } catch (\Exception $e) {
            Toastr::error('Something went wrong', 'Error');
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('categories.create');
        } catch (\Exception $e) {
            Toastr::error('Something went wrong', 'Error');
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        try {
            $category = new Category;
            $category->name = $request->name;
            $category->description = $request->description;
            $category->status = $request->status;
            $category->save();
            Toastr::success('Category create successfully completed', 'Success');
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            Toastr::error('Something went wrong', 'Error');
            return back();
        }
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
        try {
            $category = Category::findOrFail(decrypt($id));
            return view('categories.edit', compact('category'));
        } catch (\Exception $e) {
            Toastr::error('Something went wrong', 'Error');
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        try {
            $category = Category::findOrFail(decrypt($id));
            $category->name = $request->name;
            $category->description = $request->description;
            $category->status = $request->status;
            $category->save();
            Toastr::success('Category successfully updated', 'Success');
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            Toastr::error('Something went wrong', 'Error');
            return back();
        }
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
