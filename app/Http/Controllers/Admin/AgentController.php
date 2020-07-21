<?php

namespace App\Http\Controllers\Admin;

use App\Agent;
use App\AgentType;
use App\Http\Controllers\Controller;
use App\StatusMaster;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index(){
        $agents = Agent::all();
        return view('admin.agents.agentLists',['agents' => $agents]);
    }

    public function edit($id){
        $agent = Agent::find($id);
        $agentType = AgentType::all();
        $statusMaster = StatusMaster::whereIn('status_code',['sa','sag'])->get();
        return view('admin.agents.agentDetail',
            [
                'agent' => $agent,
                'agentType' => $agentType,
                'status' =>$statusMaster
                ]);
    }

    public function update(Request $request){

        $agent = Agent::find($request->agent_id);

        if ($request->submit == 'Accept'){
            $agent->agent_type_id = $request->agent_type_id;
            $agent->status_id = $request->status_id;
        }
        if (!$agent->save()) {
            $request->session()->flash('status', false);
            $request->session()->flash('message', 'Error Update Data');
            return redirect()->route('masterData');
        }
        $request->session()->flash('status', true);
        $request->session()->flash('message', 'Successfully Update Agent ');

        return redirect()->back();
    }
}
