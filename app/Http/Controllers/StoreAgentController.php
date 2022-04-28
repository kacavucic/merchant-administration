<?php

namespace App\Http\Controllers;

use App\Http\Resources\AgentCollection;
use App\Models\Agent;
use Illuminate\Http\Request;

class StoreAgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($store_id)
    {
        $agents = Agent::get()->where('store_id', $store_id);
        return new AgentCollection($agents);
    }
}
