<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $categories = \Modules\Product\Entities\Category::with('children')->get();
        return view('product::category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */

    public function create()
    {
        $categories = \Modules\Product\Entities\Category::with('children')->where('parent_id', null)->get();
        return view('product::category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:categories,slug',
            'image' => 'nullable|image',
        ]);

        $category = new \Modules\Product\Entities\Category();
        $slug = $request->slug;
        $count = \Modules\Product\Entities\Category::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . time();
        }
        $category->title = $request->title;
        $category->slug = $slug;
        $category->parent_id = $request->parent_id ?? null;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->featured = $request->featured ?? 'no';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename =  time(). '.' . $image->getClientOriginalExtension();
            $location = public_path('images/category/' . $filename);
            if (!File::exists(public_path('images/category/'))) {
                File::makeDirectory(public_path('images/category/'), 0777, true, true);
            }
            Image::make($image)->save($location);
            $category->image = 'images/category/' . $filename;
            $category->save();
        }
        $category->save();

        session()->flash('success', 'A new category has added successfully !!');

        return redirect()->route("admin.category.index")->with('message', 'Category created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = \Modules\Product\Entities\Category::find($id);
        $categories = \Modules\Product\Entities\Category::with('children')->where('parent_id', null)->get();
        return view('product::category.edit', compact('category', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $category = \Modules\Product\Entities\Category::find($id);
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:categories,slug,' . $category->id,
            'image' => 'nullable|image',
        ]);

        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->parent_id = $request->parent_id ?? null;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->featured = $request->featured ?? 'no';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/category/' . $filename);
            \Image::make($image)->save($location);
            $category->image = $filename;
            $category->save();
        }
        // $category->save();

        // category update with image upload
        $category->save();

        session()->flash('success', 'A new category has updated successfully !!');

        return redirect()->route("admin.category.index")->with('message', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {

            $category = \Modules\Product\Entities\Category::find($id);
            $category->delete();
            session()->flash('success', 'A new category has deleted successfully !!');
            return redirect()->route("admin.category.index")->with('message', 'Category deleted successfully.');
    }
}
