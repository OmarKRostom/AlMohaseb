<?php

namespace AlMohaseb\Http\Controllers;

use Illuminate\Http\Request;
use AlMohaseb\{Option, Product};
use Validator;

class OptionsController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $options = Option::with("product")->paginate(15);
        $products = Product::all();
        return view("admin.options.index")->with(compact("options"))
        									->with(compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    	//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $options = Option::with("product")->paginate(15);
        $products = Product::all();
        $validator = Validator::make(request()->all(), [
            'title' => 'required'
        ]);
        //VALIDATION CASES
        if($validator->fails()) {
            return view("admin.options.index", compact("options", "products"))->withErrors($validator);
        } else {
            $option = Option::insert([
                'title' => request()->title,
                'product_id' => request()->product_id
            ]);

            flash()->overlay('Option added successfully !', 'Success', 'success');
            return redirect(route("admin.options.index"));
        }
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
    public function destroy(Option $option)
    {
        $option->delete();
        flash()->overlay('Option deleted successfully !', 'Success', 'success');
        return redirect(route("admin.options.index"));
    }
}
