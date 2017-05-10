<?php

namespace AlMohaseb\Http\Controllers;

use AlMohaseb\Product;
use AlMohaseb\Category;
use Illuminate\Http\Request;
use AlMohaseb\Http\Requests\SaveProductRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = Product::with('category')->paginate(15);
        return view("admin.products.index")->with(compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $product = new Product;
        $categories = Category::pluck('title', 'id');
        return view('admin.products.create')->with(compact('product', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(SaveProductRequest $request)
    {
        Product::create($request->all());

        flash()->overlay('Product added successfully !', 'Success', 'success');

        return redirect(route('admin.products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
