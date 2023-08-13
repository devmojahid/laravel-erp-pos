<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\Category;
use Modules\Product\Entities\ProductAttribute;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $products = Product::with(["attributes","category"])->orderBy('id', 'desc')->get();
        return view("product::product.index", compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $products_attributes = ProductAttribute::orderBy('id', 'desc')->get();
        return view('product::product.create', compact(['categories', 'products_attributes']));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products',
        ]);

        $slug = $request->slug;
        if(Product::where('slug', $slug)->exists()) {
            $slug = $slug . '-' . time();
        }
        $thumbnail_name = null;

        if($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnail_name = 'uploads/products/thumbnail/' . time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('uploads/products/thumbnail'), $thumbnail_name);
        }
        $gallery_name = [] ;
        if($request->hasFile('gallery')) {
            $gallery = $request->file('gallery');
            foreach($gallery as $image) {
                $gallery_name[] = 'uploads/products/gallery/' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/products/gallery'), end($gallery_name));
            }
            $gallery_name = json_encode($gallery_name);
        }

        $product = new Product();
        $product->name = $request->name;
        $product->slug = $slug;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->sku = $request->sku;
        $product->barcode = $request->barcode;
        $product->gallery = $gallery_name ? $gallery_name : null;
        $product->thumbnail = $thumbnail_name;
        $product->video = $request->video;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->stock = $request->stock;
        $product->status = $request->status;
        $product->featured = $request->featured;
        $product->type = $request->type == 'simple' ? 'simple' : 'variable';
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->save();

        // save product attributes
        if($request->type == 'variable') {
            $product->attributes()->sync($request->product_attributes);
        }

        return redirect()->route('admin.product.index')->with('success', 'Product created successfully');
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
        //delete product
        $product = Product::find($id);
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully');
    }

   public function storeValue(Request $request) {
        // get the product attribute bay the requested id from the request and response json data
        $product_attribute = ProductAttribute::find($request->attribute_id);
        $value = $product_attribute->value;

        return response()->json([
            'success' => true,
            'data' => $value,
        ]);

   }
}
