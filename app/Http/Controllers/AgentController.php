<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentRequest;
use App\Http\Resources\AgentCollection;
use App\Http\Resources\AgentResource;
use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $agents = Agent::where("id", ">", 0);
        if ($request->last_name != null) {
            $agents = Agent::where("last_name", "like", "%".$request->last_name."%");
        }
        if ($request->sort_by != null) {
            $order = "asc";
            if (str_ends_with($request->sort_by, "_desc")) {
                $request->sort_by = str_replace("_desc", "", $request->sort_by);
                $order = "desc";
            }
            $agents = $agents->orderBy($request->sort_by, $order);
        }
        $agents = $agents->get();
        return new AgentCollection($agents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgentRequest $request)
    {
        $agent = Agent::create($request->all());
        return response()->json(['Agent sucessfully created.', new AgentResource($agent)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {
        return new AgentResource($agent);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $agent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(AgentRequest $request, Agent $agent)
    {
        $agent->fill($request->all());
        $agent->save();
        return response()->json(['Agent sucessfully updated.', new AgentResource($agent)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        $agent->delete();
        return response()->json('Agent sucessfully deleted.');
    }
}
