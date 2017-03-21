<?php

namespace AlMohaseb\Http\Controllers;

use Illuminate\Http\Request;
use AlMohaseb\Agent;
use Validator;

class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $agents = Agent::paginate(15);
        return view("admin.agents.index")->with(compact("agents"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $agent = new Agent;
        return view("admin.agents.add", compact("agent"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $agent = new Agent;
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/(01)[0-9]{9}/'
        ]);
        //VALIDATION CASES
        if($validator->fails()) {
            return view("admin.agents.add", compact("agent"))->withErrors($validator);
        } else {
            $agent = Agent::create([
                'name' => request()->name,
                'email' => request()->email,
                'phone' => request()->phone
            ]);

            flash()->overlay('agent added successfully !', 'Success', 'success');
            return redirect(route("admin.agents.index"));
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
        $agent = Agent::find($id);
        return view("admin.agents.edit", compact("agent"));
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
        $agent = Agent::find($id);
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/(01)[0-9]{9}/'
        ]);
        //VALIDATION CASES
        if($validator->fails()) {
            return view("admin.agents.edit", compact("agent"))->withErrors($validator);
        } else {
            $agent = Agent::find($id);
            $agent->update([
                'name' => request()->name,
                'email' => request()->email,
                'phone' => request()->phone
            ]);
        }

        flash()->overlay('agent edited successfully !', 'Success', 'success');
        return redirect(route("admin.agents.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Agent $agent)
    {
        $agent->delete();
        flash()->overlay('agent deleted successfully !', 'Success', 'success');
        return redirect(route("admin.agents.index"));
    }
}
