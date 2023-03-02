<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tags\TagRequest;
use App\Models\Tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $tags = Tag::latest()->Creator()->paginate(12);
            return view('tags.index', compact('tags'));
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
            return view('tags.create');
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
    public function store(TagRequest $request)
    {
        if ($request->isMethod('POST')) {
            try {
                $tag         = new Tag;
                $tag->creator_id   = Auth::id();
                $tag->name   = $request->name;
                $tag->status = $request->status;
                $tag->save();
                Toastr::success('Tag successfully created', 'Success');
                return redirect()->route('tags.index');
            } catch (\Exception $e) {
                Toastr::error('Something went wrong', 'Error');
                return back();
            }
        } else {
            Toastr::error('Method not allowed', 'Error');
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
            $tag = Tag::findOrFail(decrypt($id));
            return view('tags/edit', compact('tag'));
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
    public function update(TagRequest $request, $id)
    {
        if ($request->isMethod('PUT')) {
            try {
                $tag         = Tag::findOrFail(decrypt($id));
                $tag->name   = $request->name;
                $tag->status = $request->status;
                $tag->save();
                Toastr::success('Tag successfully updated', 'Success');
                return redirect()->route('tags.index');
            } catch (\Exception $e) {
                Toastr::error('Something went wrong', 'Error');
                return back();
            }
        } else {
            Toastr::error('Method not allowed', 'Error');
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
