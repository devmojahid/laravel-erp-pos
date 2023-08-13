<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\ProductAttribute;
use Illuminate\Support\Str;


class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $productAttributes = ProductAttribute::orderBy('id','desc')->get();
        return view('product::product-attribute.index',compact('productAttributes'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('product::product-attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
              'name' => 'required|unique:product_attributes,name',
        ]);

        $value_json = $request->value;
        $value_array = json_decode($value_json[0],true);
        $value_sirialize = serialize($value_array);

        // $value_serialize = serialize(json_decode($request->value, true));

        // $value_sirialize = '';
        // if (is_array($request->value)) {
        //     // If $request->value is an array of JSON strings
        //     $value_serialize = array_map(function($item) {
        //         return serialize(json_decode($item, true));
        //     }, $request->value);
        // } else {
        //     // If $request->value is a single JSON string
        //     $value_serialize = serialize(json_decode($request->value, true));
        // }


        $slug = $request->slug;
        $count = ProductAttribute::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . time();
        }
        ProductAttribute::create([
            'name' => $request->name,
            'slug' => $slug ?? Str::slug($request->name),
            'value' => $value_sirialize,
        ]);
        session()->flash('success', 'A new Attribute has added successfully !!');
        return redirect()->route('admin.product-attribute.index')->with('success','Product Attribute Created Successfully');

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
        return view('product::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
