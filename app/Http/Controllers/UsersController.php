<?php

namespace AlMohaseb\Http\Controllers;

use Illuminate\Http\Request;
use AlMohaseb\User;
use Validator;
use Flashy;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::paginate(15);
        return view("admin.users.index")->with(compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $user = new User;
        $types = ['admin' => 'Admin', 'user' => 'User'];
        return view("admin.users.add", compact("user", "types"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'username' => 'required'
        ]);
        //VALIDATION CASES
        if($validator->fails()) {
            return view("admin.users.add", compact("user", "types"))->withErrors($validator);
        } else {
            $user = User::create([
                'name' => request()->name,
                'username' => request()->username,
                'type' => request()->type
            ]);

            flash()->overlay('User added successfully !', 'Success', 'success');
            return redirect(route("admin.users.create", $user));
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
        $user = User::find($id);
        $types = ['admin' => 'Admin', 'user' => 'User'];
        return view("admin.users.edit", compact("user", "types"));
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
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'username' => 'required'
        ]);
        //VALIDATION CASES
        if($validator->fails()) {
            return view("admin.users.edit", compact("user", "types"))->withErrors($validator);
        } else {
            $user = User::find($id);
            $user->update([
                'name' => request()->name,
                'username' => request()->username,
                'type' => request()->type
            ]);
        }

        flash()->overlay('User edited successfully !', 'Success', 'success');
        return redirect(route("admin.users.show", $user));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        flash()->overlay('User deleted successfully !', 'Success', 'success');
        return redirect(route("admin.users.index"));
    }
}
