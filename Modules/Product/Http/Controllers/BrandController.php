<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $brands = \Modules\Product\Entities\Brand::orderBy('id', 'desc')->get();
        return view('product::brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('product::brand.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:brands,slug',
            'image' => 'nullable|image',
        ]);

        $brands = new \Modules\Product\Entities\Brand();
        $slug = $request->slug;
        $count = \Modules\Product\Entities\Brand::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . time();
        }
        $brands->title = $request->title;
        $brands->slug = $slug;
        $brands->description = $request->description;
        $brands->status = $request->status;
        $brands->featured = $request->featured ?? 'no';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename =  time(). '.' . $image->getClientOriginalExtension();
            $location = public_path('images/brands/' . $filename);
            if (!File::exists(public_path('images/brands/'))) {
                File::makeDirectory(public_path('images/brands/'), 0777, true, true);
            }
            Image::make($image)->save($location);
            $brands->image = 'images/brands/' . $filename;
            $brands->save();
        }
        $brands->save();

        session()->flash('success', 'A new Brand has added successfully !!');

        return redirect()->route("admin.brand.index")->with('message', 'Brand created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('product::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $brand = \Modules\Product\Entities\Brand::find($id);
        return view('product::brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $brand = \Modules\Product\Entities\Brand::find($id);
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:brands,slug,' . $brand->id,
            'image' => 'nullable|image',
        ]);

        $slug = $request->slug;
        $count = \Modules\Product\Entities\Brand::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . time();
        }

        $brand->title = $request->title;
        $brand->slug = $slug;
        $brand->description = $request->description;
        $brand->status = $request->status;
        $brand->featured = $request->featured ?? 'no';

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename =  time(). '.' . $image->getClientOriginalExtension();
            $location = public_path('images/brands/' . $filename);
            if (!File::exists(public_path('images/brands/'))) {
                File::makeDirectory(public_path('images/brands/'), 0777, true, true);
            }
            Image::make($image)->save($location);
            $brands->image = 'images/brands/' . $filename;
            $brands->save();
        }
        $brand->save();

        session()->flash('success', 'A new Brand has Update successfully !!');

        return redirect()->route("admin.brand.index")->with('message', 'Brand Update successfully.');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
            $brand = \Modules\Product\Entities\Brand::find($id);
            $brand->delete();
            session()->flash('success', 'A new brand has deleted successfully !!');
            return redirect()->route("admin.brand.index")->with('message', 'Brand deleted successfully.');
    }
}
