<?php

namespace Modules\Pos\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Admin;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $categories = \Modules\Product\Entities\Category::all();
        $products = \Modules\Product\Entities\Product::all();
        $users = Admin::all();
        return view('pos::pos.pos',compact("categories","products","users"));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('pos::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('pos::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('pos::edit');
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

    public function getProducts(Request $request) {
        // $products = \Modules\Product\Entities\Product::where("name","like","%".$request->search."%")->get();
        // return response()->json($products);

        $category = $request->category_id ? $request->category_id : 0;
        if($category){
            $products = \Modules\Product\Entities\Product::where("category_id",$category)->get();
        }elseif($category == 0){
            $products = \Modules\Product\Entities\Product::all();
        }
        return response()->json([
            'data' => $products,
        ]);
    }
}
