<?php

namespace AlMohaseb\Http\Controllers;

use Illuminate\Http\Request;
use AlMohaseb\Category;
use Validator;

class CategoriesController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::paginate(15);
        return view("admin.categories.index")->with(compact("categories"));
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
        $categories = Category::paginate(15);
        $validator = Validator::make(request()->all(), [
            'title' => 'required'
        ]);
        //VALIDATION CASES
        if($validator->fails()) {
            return view("admin.categories.index", compact("categories"))->withErrors($validator);
        } else {
            $category = Category::insert([
                'title' => request()->title
            ]);

            flash()->overlay('Category added successfully !', 'Success', 'success');
            return redirect(route("admin.categories.index"));
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
    public function destroy(Category $category)
    {
        $category->delete();
        flash()->overlay('Category deleted successfully !', 'Success', 'success');
        return redirect(route("admin.categories.index"));
    }
}
